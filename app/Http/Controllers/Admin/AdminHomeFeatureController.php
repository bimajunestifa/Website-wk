<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeFeatureCard;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminHomeFeatureController extends Controller
{
    public function index()
    {
        $profile = SchoolProfile::firstOrCreate([]);
        $karakterCards = HomeFeatureCard::where('section', 'karakter')->orderBy('order')->get();
        $budayaCards = HomeFeatureCard::where('section', 'budaya')->orderBy('order')->get();
        $pembelajarCards = HomeFeatureCard::where('section', 'pembelajar')->orderBy('order')->get();

        return view('admin.home_features.index', compact('profile', 'karakterCards', 'budayaCards', 'pembelajarCards'));
    }

    public function updateHeaders(Request $request)
    {
        $request->validate([
            'character_section_title' => 'nullable|string',
            'character_section_btn_text' => 'nullable|string|max:100',
            'character_section_btn_url' => 'nullable|string|max:255',
            'culture_section_title' => 'nullable|string',
            'culture_section_btn_text' => 'nullable|string|max:100',
            'culture_section_btn_url' => 'nullable|string|max:255',
            'learning_section_subtitle' => 'nullable|string|max:255',
            'learning_section_title' => 'nullable|string',
        ]);

        $profile = SchoolProfile::firstOrCreate([]);
        $profile->update([
            'character_section_title' => $request->character_section_title,
            'character_section_btn_text' => $request->character_section_btn_text,
            'character_section_btn_url' => $request->character_section_btn_url,
            'culture_section_title' => $request->culture_section_title,
            'culture_section_btn_text' => $request->culture_section_btn_text,
            'culture_section_btn_url' => $request->culture_section_btn_url,
            'learning_section_subtitle' => $request->learning_section_subtitle,
            'learning_section_title' => $request->learning_section_title,
        ]);

        return redirect()->route('admin.home-features.index')->with('success', 'Judul dan tombol seksi berhasil diperbarui!');
    }

    public function edit(HomeFeatureCard $card)
    {
        return view('admin.home_features.edit', compact('card'));
    }

    public function update(Request $request, HomeFeatureCard $card)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'link_url' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'link_url' => $request->link_url,
            'order' => $request->order ?? $card->order,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('image')) {
            // Delete old uploaded image if it was in storage
            if ($card->image_url && str_starts_with($card->image_url, '/storage/')) {
                $oldPath = str_replace('/storage/', 'public/', $card->image_url);
                Storage::delete($oldPath);
            }
            $path = $request->file('image')->store('public/features');
            $data['image_url'] = Storage::url($path);
        }

        $card->update($data);

        return redirect()->route('admin.home-features.index')->with('success', 'Kartu "' . $card->title . '" berhasil diperbarui!');
    }

    public function toggle(HomeFeatureCard $card)
    {
        $card->update(['is_active' => !$card->is_active]);
        $status = $card->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Kartu '{$card->title}' berhasil {$status}.");
    }
}

