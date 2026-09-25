<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminMajorController extends Controller
{
    public function index()
    {
        $majors = Major::orderBy('order', 'asc')->get();
        return view('admin.majors.index', compact('majors'));
    }

    public function create()
    {
        return view('admin.majors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_name' => 'nullable|string|max:50',
            'description' => 'required|string',
            'advantages' => 'nullable|string',
            'career_prospects' => 'nullable|string',
            'image_file' => 'nullable|image|max:4096',
            'image_url' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $imageUrl = $validated['image_url'] ?? null;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('majors', 'public');
            $imageUrl = Storage::url($path);
        }

        Major::create([
            'name' => $validated['name'],
            'short_name' => $validated['short_name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'],
            'advantages' => $validated['advantages'] ?? null,
            'career_prospects' => $validated['career_prospects'] ?? null,
            'image_url' => $imageUrl,
            'icon' => $validated['icon'] ?? 'ri-computer-line',
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.majors.index')->with('success', 'Jurusan baru berhasil ditambahkan!');
    }

    public function edit(Major $major)
    {
        return view('admin.majors.edit', compact('major'));
    }

    public function update(Request $request, Major $major)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_name' => 'nullable|string|max:50',
            'description' => 'required|string',
            'advantages' => 'nullable|string',
            'career_prospects' => 'nullable|string',
            'image_file' => 'nullable|image|max:4096',
            'image_url' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $imageUrl = $major->image_url;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('majors', 'public');
            $imageUrl = Storage::url($path);
        } elseif (!empty($validated['image_url'])) {
            $imageUrl = $validated['image_url'];
        }

        $major->update([
            'name' => $validated['name'],
            'short_name' => $validated['short_name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'],
            'advantages' => $validated['advantages'] ?? null,
            'career_prospects' => $validated['career_prospects'] ?? null,
            'image_url' => $imageUrl,
            'icon' => $validated['icon'] ?? $major->icon,
            'order' => $validated['order'] ?? $major->order,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.majors.index')->with('success', 'Kompetensi keahlian berhasil diperbarui!');
    }

    public function destroy(Major $major)
    {
        $major->delete();
        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil dihapus!');
    }

    public function toggleStatus(Major $major)
    {
        $major->update(['is_active' => !$major->is_active]);
        $statusText = $major->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Status jurusan '{$major->name}' berhasil {$statusText}.");
    }
}
