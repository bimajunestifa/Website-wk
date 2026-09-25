<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminFacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::orderBy('order', 'asc')->get();
        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.facilities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'image_file' => 'nullable|image|max:8192',
            'image_url' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $imageUrl = $validated['image_url'] ?? null;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('facilities', 'public');
            $imageUrl = Storage::url($path);
        }

        Facility::create([
            'name' => $validated['name'],
            'category' => $validated['category'] ?? 'Sarana & Prasarana',
            'description' => $validated['description'] ?? null,
            'image_url' => $imageUrl,
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    public function edit(Facility $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'image_file' => 'nullable|image|max:8192',
            'image_url' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $imageUrl = $facility->image_url;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('facilities', 'public');
            $imageUrl = Storage::url($path);
        } elseif (!empty($validated['image_url'])) {
            $imageUrl = $validated['image_url'];
        }

        $facility->update([
            'name' => $validated['name'],
            'category' => $validated['category'] ?? $facility->category ?? 'Sarana & Prasarana',
            'description' => $validated['description'] ?? $facility->description,
            'image_url' => $imageUrl,
            'order' => $validated['order'] ?? $facility->order ?? 0,
        ]);

        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil diperbarui!');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();
        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil dihapus!');
    }
}

