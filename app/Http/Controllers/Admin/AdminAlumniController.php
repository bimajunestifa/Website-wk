<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAlumniController extends Controller
{
    public function index(Request $request)
    {
        $query = Alumni::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('profession', 'like', "%{$search}%")
                  ->orWhere('major', 'like', "%{$search}%");
            });
        }

        $alumnis = $query->orderBy('order', 'asc')->orderBy('name', 'asc')->paginate(15);
        $totalAlumni = Alumni::count();
        $activeAlumni = Alumni::where('is_active', true)->count();

        return view('admin.alumni.index', compact('alumnis', 'totalAlumni', 'activeAlumni'));
    }

    public function create()
    {
        $majors = Major::where('is_active', true)->orderBy('order', 'asc')->get();
        return view('admin.alumni.create', compact('majors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'graduation_year' => 'nullable|string|max:50',
            'major' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'profession' => 'nullable|string|max:255',
            'quote' => 'nullable|string',
            'photo_url' => 'nullable|string|max:500',
            'photo_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo_file')) {
            $path = $request->file('photo_file')->store('alumni', 'public');
            $validated['photo_url'] = '/storage/' . $path;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? (Alumni::max('order') + 1);

        Alumni::create($validated);

        return redirect()->route('admin.alumni.index')->with('success', 'Data Alumni berhasil ditambahkan!');
    }

    public function edit(Alumni $alumni)
    {
        $majors = Major::where('is_active', true)->orderBy('order', 'asc')->get();
        return view('admin.alumni.edit', compact('alumni', 'majors'));
    }

    public function update(Request $request, Alumni $alumni)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'graduation_year' => 'nullable|string|max:50',
            'major' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'profession' => 'nullable|string|max:255',
            'quote' => 'nullable|string',
            'photo_url' => 'nullable|string|max:500',
            'photo_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo_file')) {
            if ($alumni->photo_url && str_starts_with($alumni->photo_url, '/storage/alumni/')) {
                $oldPath = str_replace('/storage/', '', $alumni->photo_url);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('photo_file')->store('alumni', 'public');
            $validated['photo_url'] = '/storage/' . $path;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? $alumni->order;

        $alumni->update($validated);

        return redirect()->route('admin.alumni.index')->with('success', 'Data Alumni berhasil diperbarui!');
    }

    public function destroy(Alumni $alumni)
    {
        if ($alumni->photo_url && str_starts_with($alumni->photo_url, '/storage/alumni/')) {
            $oldPath = str_replace('/storage/', '', $alumni->photo_url);
            Storage::disk('public')->delete($oldPath);
        }

        $alumni->delete();

        return redirect()->route('admin.alumni.index')->with('success', 'Data Alumni berhasil dihapus!');
    }

    public function toggleStatus(Alumni $alumni)
    {
        $alumni->update(['is_active' => !$alumni->is_active]);

        return response()->json([
            'success' => true,
            'is_active' => $alumni->is_active,
            'message' => 'Status alumni berhasil diperbarui.'
        ]);
    }
}

