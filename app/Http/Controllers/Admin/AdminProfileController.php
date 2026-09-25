<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\VisionMission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function index()
    {
        $profile = SchoolProfile::firstOrCreate(['id' => 1]);
        $visionMission = VisionMission::firstOrCreate(['id' => 1], [
            'vision' => 'Visi sekolah...',
            'mission' => [],
            'motto' => 'Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah'
        ]);

        return view('admin.profile.index', compact('profile', 'visionMission'));
    }

    public function updateProfile(Request $request)
    {
        $profile = SchoolProfile::firstOrCreate(['id' => 1]);

        $validated = $request->validate([
            'school_name' => 'required|string|max:255',
            'logo_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'logo' => 'nullable|string',
            'tagline' => 'nullable|string|max:255',
            'motto' => 'nullable|string|max:255',
            'afirmasi' => 'nullable|string|max:255',
            'attitude' => 'nullable|string|max:255',
            'philosophy' => 'nullable|string',
            'description' => 'nullable|string',
            'principal_name' => 'nullable|string|max:255',
            'principal_title' => 'nullable|string|max:255',
            'principal_image_file' => 'nullable|image|max:4096',
            'principal_image' => 'nullable|string',
            'video_url' => 'nullable|string',
            'video_thumbnail_file' => 'nullable|image|max:4096',
            'video_thumbnail' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'whatsapp' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
            'address' => 'nullable|string',
            'maps_embed_url' => 'nullable|string',
            'brochure_url' => 'nullable|string',
            'spmb_url' => 'nullable|string',
            'pmb_banner_title' => 'nullable|string|max:255',
            'pmb_banner_subtitle' => 'nullable|string|max:255',
            'pmb_banner_text' => 'nullable|string',
            'pmb_banner_image_file' => 'nullable|image|max:4096',
            'pmb_banner_image' => 'nullable|string',
            'pmb_banner_btn_text' => 'nullable|string|max:100',
            'pmb_banner_btn_url' => 'nullable|string|max:255',
            'facebook_url' => 'nullable|string|max:255',
            'instagram_url' => 'nullable|string|max:255',
            'twitter_url' => 'nullable|string|max:255',
            'youtube_url' => 'nullable|string|max:255',
        ]);

        $logo = $profile->logo ?: '/assets/images/wikrama-logo-1.png';
        if ($request->hasFile('logo_file')) {
            $path = $request->file('logo_file')->store('profile', 'public');
            $logo = Storage::url($path);
        } elseif (!empty($validated['logo'])) {
            $logo = $validated['logo'];
        }

        $principalImage = $profile->principal_image;
        if ($request->hasFile('principal_image_file')) {
            $path = $request->file('principal_image_file')->store('profile', 'public');
            $principalImage = Storage::url($path);
        } elseif (!empty($validated['principal_image'])) {
            $principalImage = $validated['principal_image'];
        }

        $videoThumbnail = $profile->video_thumbnail;
        if ($request->hasFile('video_thumbnail_file')) {
            $path = $request->file('video_thumbnail_file')->store('profile', 'public');
            $videoThumbnail = Storage::url($path);
        } elseif (!empty($validated['video_thumbnail'])) {
            $videoThumbnail = $validated['video_thumbnail'];
        }

        $pmbBannerImage = $profile->pmb_banner_image;
        if ($request->hasFile('pmb_banner_image_file')) {
            $path = $request->file('pmb_banner_image_file')->store('profile', 'public');
            $pmbBannerImage = Storage::url($path);
        } elseif (!empty($validated['pmb_banner_image'])) {
            $pmbBannerImage = $validated['pmb_banner_image'];
        }

        $profile->update([
            'school_name' => $validated['school_name'] ?? $profile->school_name,
            'logo' => $logo,
            'tagline' => $validated['tagline'] ?? $profile->tagline,
            'motto' => $validated['motto'] ?? $profile->motto,
            'afirmasi' => $validated['afirmasi'] ?? $profile->afirmasi,
            'attitude' => $validated['attitude'] ?? $profile->attitude,
            'philosophy' => $validated['philosophy'] ?? $profile->philosophy,
            'description' => $validated['description'] ?? $profile->description,
            'principal_name' => $validated['principal_name'] ?? $profile->principal_name,
            'principal_title' => $validated['principal_title'] ?? $profile->principal_title,
            'principal_image' => $principalImage,
            'video_url' => $validated['video_url'] ?? $profile->video_url,
            'video_thumbnail' => $videoThumbnail,
            'phone' => $validated['phone'] ?? $profile->phone,
            'whatsapp' => $validated['whatsapp'] ?? $profile->whatsapp,
            'email' => $validated['email'] ?? $profile->email,
            'address' => $validated['address'] ?? $profile->address,
            'maps_embed_url' => $validated['maps_embed_url'] ?? $profile->maps_embed_url,
            'brochure_url' => $validated['brochure_url'] ?? $profile->brochure_url,
            'spmb_url' => $validated['spmb_url'] ?? $profile->spmb_url,
            'pmb_banner_title' => $validated['pmb_banner_title'] ?? $profile->pmb_banner_title,
            'pmb_banner_subtitle' => $validated['pmb_banner_subtitle'] ?? $profile->pmb_banner_subtitle,
            'pmb_banner_text' => $validated['pmb_banner_text'] ?? $profile->pmb_banner_text,
            'pmb_banner_image' => $pmbBannerImage,
            'pmb_banner_btn_text' => $validated['pmb_banner_btn_text'] ?? $profile->pmb_banner_btn_text,
            'pmb_banner_btn_url' => $validated['pmb_banner_btn_url'] ?? $profile->pmb_banner_btn_url,
            'facebook_url' => $validated['facebook_url'] ?? $profile->facebook_url,
            'instagram_url' => $validated['instagram_url'] ?? $profile->instagram_url,
            'twitter_url' => $validated['twitter_url'] ?? $profile->twitter_url,
            'youtube_url' => $validated['youtube_url'] ?? $profile->youtube_url,
        ]);

        return back()->with('success', 'Data profil sekolah berhasil diperbarui!');
    }

    public function updateVisionMission(Request $request)
    {
        $visionMission = VisionMission::firstOrCreate(['id' => 1]);

        $validated = $request->validate([
            'vision' => 'required|string',
            'motto' => 'required|string|max:255',
            'mission_items' => 'nullable|string', // newline-separated
        ]);

        $missionArray = array_values(array_filter(array_map('trim', explode("\n", $validated['mission_items'] ?? ''))));

        $visionMission->update([
            'vision' => $validated['vision'],
            'motto' => $validated['motto'],
            'mission' => $missionArray,
        ]);

        return back()->with('success', 'Visi, misi, dan motto berhasil diperbarui!');
    }
}

