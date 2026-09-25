<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class AdminGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('order')->orderByDesc('created_at')->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'caption' => 'nullable|string',
            'image_url' => 'nullable|string',
            'image_file' => 'nullable|image|max:8192',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('galleries', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        if (empty($validated['image_url'])) {
            return back()->withErrors(['image_url' => 'Harap masukkan URL foto atau unggah file foto.']);
        }

        $validated['category'] = $validated['category'] ?? 'Kegiatan Siswa';
        $validated['order'] = $validated['order'] ?? 0;

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto baru berhasil ditambahkan ke galeri.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'caption' => 'nullable|string',
            'image_url' => 'nullable|string',
            'image_file' => 'nullable|image|max:8192',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('galleries', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        $validated['category'] = $validated['category'] ?? $gallery->category ?? 'Kegiatan Siswa';
        $validated['order'] = $validated['order'] ?? 0;

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Foto galeri berhasil dihapus.');
    }
}

