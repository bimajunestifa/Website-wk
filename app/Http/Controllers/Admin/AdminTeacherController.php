<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTeacherController extends Controller
{
    public function index(Request $request)
    {
        $query = Teacher::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%");
            });
        }

        $teachers = $query->orderBy('order', 'asc')->orderBy('name', 'asc')->paginate(15);
        $totalTeachers = Teacher::count();
        $activeTeachers = Teacher::where('is_active', true)->count();

        return view('admin.teachers.index', compact('teachers', 'totalTeachers', 'activeTeachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'photo_url' => 'nullable|string|max:500',
            'photo_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'bio' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo_file')) {
            $path = $request->file('photo_file')->store('teachers', 'public');
            $validated['photo_url'] = '/storage/' . $path;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? (Teacher::max('order') + 1);

        Teacher::create($validated);

        return redirect()->route('admin.teachers.index')->with('success', 'Data Dewan Guru / Tenaga Pendidik berhasil ditambahkan!');
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'photo_url' => 'nullable|string|max:500',
            'photo_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'bio' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo_file')) {
            // Delete old uploaded file if it starts with /storage/teachers/
            if ($teacher->photo_url && str_starts_with($teacher->photo_url, '/storage/teachers/')) {
                $oldPath = str_replace('/storage/', '', $teacher->photo_url);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('photo_file')->store('teachers', 'public');
            $validated['photo_url'] = '/storage/' . $path;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? $teacher->order;

        $teacher->update($validated);

        return redirect()->route('admin.teachers.index')->with('success', 'Data Dewan Guru / Tenaga Pendidik berhasil diperbarui!');
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->photo_url && str_starts_with($teacher->photo_url, '/storage/teachers/')) {
            $oldPath = str_replace('/storage/', '', $teacher->photo_url);
            Storage::disk('public')->delete($oldPath);
        }

        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with('success', 'Data Dewan Guru berhasil dihapus.');
    }

    public function toggleStatus(Teacher $teacher)
    {
        $teacher->update(['is_active' => !$teacher->is_active]);
        $statusText = $teacher->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Status guru '{$teacher->name}' berhasil {$statusText}.");
    }
}

