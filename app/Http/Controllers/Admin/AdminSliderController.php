<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSliderController extends Controller
{
    public function index(Request $request)
    {
        $query = Slider::orderBy('order', 'asc');
        if ($request->has('type') && in_array($request->type, ['home', 'spmb'])) {
            $query->where('type', $request->type);
        }
        $sliders = $query->get();
        $currentType = $request->type ?? 'all';
        return view('admin.sliders.index', compact('sliders', 'currentType'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'nullable|string|in:home,spmb',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'image_url' => 'nullable|string',
            'btn_text' => 'nullable|string|max:100',
            'button_text' => 'nullable|string|max:100',
            'btn_url' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable',
        ]);

        $imageUrl = $validated['image_url'] ?? null;
        $file = $request->file('image') ?? $request->file('image_file');
        if ($file) {
            $path = $file->store('sliders', 'public');
            $imageUrl = Storage::url($path);
        }

        Slider::create([
            'type' => $validated['type'] ?? 'home',
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'] ?? null,
            'image_url' => $imageUrl,
            'btn_text' => $validated['btn_text'] ?? $validated['button_text'] ?? 'Daftar Sekarang',
            'btn_url' => $validated['btn_url'] ?? $validated['button_link'] ?? '/spmb',
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->has('is_active') ? (bool)$request->input('is_active') : false,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Banner slider berhasil ditambahkan!');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'type' => 'nullable|string|in:home,spmb',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:5120',
            'image_url' => 'nullable|string',
            'btn_text' => 'nullable|string|max:100',
            'button_text' => 'nullable|string|max:100',
            'btn_url' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable',
        ]);

        $imageUrl = $slider->image_url;
        $file = $request->file('image') ?? $request->file('image_file');
        if ($file) {
            $path = $file->store('sliders', 'public');
            $imageUrl = Storage::url($path);
        } elseif (!empty($validated['image_url'])) {
            $imageUrl = $validated['image_url'];
        }

        $slider->update([
            'type' => $validated['type'] ?? $slider->type ?? 'home',
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'] ?? null,
            'image_url' => $imageUrl,
            'btn_text' => $validated['btn_text'] ?? $validated['button_text'] ?? 'Daftar Sekarang',
            'btn_url' => $validated['btn_url'] ?? $validated['button_link'] ?? '/spmb',
            'order' => $validated['order'] ?? $slider->order,
            'is_active' => $request->has('is_active') ? (bool)$request->input('is_active') : false,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Banner slider berhasil diperbarui!');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Banner slider berhasil dihapus!');
    }
}
