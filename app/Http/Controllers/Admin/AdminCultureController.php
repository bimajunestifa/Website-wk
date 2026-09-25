<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolCulture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCultureController extends Controller
{
    public function index()
    {
        $akhlakActivities = SchoolCulture::where('category', 'akhlak_activity')->orderBy('order', 'asc')->get();
        $cultures = SchoolCulture::where('category', '!=', 'akhlak_activity')->orderBy('order', 'asc')->get();
        return view('admin.cultures.index', compact('akhlakActivities', 'cultures'));
    }

    public function create()
    {
        $defaultCategory = request('category', 'akhlak_activity');
        return view('admin.cultures.create', compact('defaultCategory'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|in:budaya,akhlak_activity',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'image_file' => 'nullable|image|max:5120',
            'image_url' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $imageUrl = $validated['image_url'] ?? null;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('cultures', 'public');
            $imageUrl = Storage::url($path);
        }

        SchoolCulture::create([
            'title' => $validated['title'],
            'category' => $validated['category'] ?? 'akhlak_activity',
            'subtitle' => $validated['subtitle'],
            'description' => $validated['description'],
            'icon' => $validated['icon'] ?? null,
            'image_url' => $imageUrl,
            'order' => $validated['order'] ?? 0,
        ]);

        $msg = ($validated['category'] ?? '') === 'akhlak_activity' 
            ? 'Kegiatan pengembangan akhlak mulia berhasil ditambahkan!' 
            : 'Budaya sekolah berhasil ditambahkan!';

        return redirect()->route('admin.cultures.index')->with('success', $msg);
    }

    public function edit(SchoolCulture $culture)
    {
        return view('admin.cultures.edit', compact('culture'));
    }

    public function update(Request $request, SchoolCulture $culture)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|in:budaya,akhlak_activity',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'image_file' => 'nullable|image|max:5120',
            'image_url' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $imageUrl = $culture->image_url;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('cultures', 'public');
            $imageUrl = Storage::url($path);
        } elseif ($request->filled('image_url')) {
            $imageUrl = $validated['image_url'];
        }

        $culture->update([
            'title' => $validated['title'],
            'category' => $validated['category'] ?? $culture->category ?? 'akhlak_activity',
            'subtitle' => $validated['subtitle'],
            'description' => $validated['description'],
            'icon' => $validated['icon'] ?? $culture->icon,
            'image_url' => $imageUrl,
            'order' => $validated['order'] ?? $culture->order,
        ]);

        $msg = $culture->category === 'akhlak_activity' 
            ? 'Data & foto kegiatan akhlak mulia berhasil diperbarui!' 
            : 'Data budaya sekolah berhasil diperbarui!';

        return redirect()->route('admin.cultures.index')->with('success', $msg);
    }

    public function destroy(SchoolCulture $culture)
    {
        $isAkhlak = $culture->category === 'akhlak_activity';
        $culture->delete();
        $msg = $isAkhlak ? 'Kegiatan akhlak mulia berhasil dihapus!' : 'Budaya sekolah berhasil dihapus!';
        return redirect()->route('admin.cultures.index')->with('success', $msg);
    }
}

