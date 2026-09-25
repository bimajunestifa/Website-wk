<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order', 'asc')->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'website' => 'nullable|string|max:255',
            'badge_text' => 'nullable|string|max:255',
            'logo_file' => 'nullable|image|max:8192',
            'logo_url' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $logoUrl = $validated['logo_url'] ?? null;
        if ($request->hasFile('logo_file')) {
            $path = $request->file('logo_file')->store('partners', 'public');
            $logoUrl = Storage::url($path);
        }

        Partner::create([
            'name' => $validated['name'],
            'category' => $validated['category'] ?? 'Mitra Industri',
            'website' => $validated['website'] ?? null,
            'badge_text' => $validated['badge_text'] ?? null,
            'logo_url' => $logoUrl,
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Mitra berhasil ditambahkan!');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'website' => 'nullable|string|max:255',
            'badge_text' => 'nullable|string|max:255',
            'logo_file' => 'nullable|image|max:8192',
            'logo_url' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $logoUrl = $partner->logo_url;
        if ($request->hasFile('logo_file')) {
            $path = $request->file('logo_file')->store('partners', 'public');
            $logoUrl = Storage::url($path);
        } elseif (array_key_exists('logo_url', $validated) && $validated['logo_url'] !== null) {
            $logoUrl = $validated['logo_url'];
        }

        $partner->update([
            'name' => $validated['name'],
            'category' => $validated['category'] ?? $partner->category ?? 'Mitra Industri',
            'website' => $validated['website'] ?? $partner->website,
            'badge_text' => $validated['badge_text'] ?? $partner->badge_text,
            'logo_url' => $logoUrl,
            'order' => $validated['order'] ?? $partner->order ?? 0,
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Mitra berhasil diperbarui!');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Mitra berhasil dihapus!');
    }
}

