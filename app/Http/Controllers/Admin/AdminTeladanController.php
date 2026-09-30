<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeFeatureCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTeladanController extends Controller
{
    public function index()
    {
        $teladans = HomeFeatureCard::where("section", "teladan")->orderBy("order")->get();
        return view("admin.teladan.index", compact("teladans"));
    }

    public function create()
    {
        return view("admin.teladan.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:150",
            "description" => "required|string",
            "image" => "required|image|mimes:jpeg,png,jpg,webp|max:4096",
            "order" => "nullable|integer",
        ]);

        $path = $request->file("image")->store("public/features");

        HomeFeatureCard::create([
            "section" => "teladan",
            "title" => $request->title,
            "description" => $request->description,
            "image_url" => Storage::url($path),
            "order" => $request->order ?? 0,
            "is_active" => true,
        ]);

        return redirect()->route("admin.teladan.index")->with("success", "Data Sekolah Teladan berhasil ditambahkan!");
    }

    public function edit(HomeFeatureCard $teladan)
    {
        return view("admin.teladan.edit", compact("teladan"));
    }

    public function update(Request $request, HomeFeatureCard $teladan)
    {
        $request->validate([
            "title" => "required|string|max:150",
            "description" => "required|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,webp|max:4096",
            "order" => "nullable|integer",
        ]);

        $data = [
            "title" => $request->title,
            "description" => $request->description,
            "order" => $request->order ?? $teladan->order,
        ];

        if ($request->hasFile("image")) {
            if ($teladan->image_url && str_starts_with($teladan->image_url, "/storage/")) {
                $oldPath = str_replace("/storage/", "public/", $teladan->image_url);
                Storage::delete($oldPath);
            }
            $path = $request->file("image")->store("public/features");
            $data["image_url"] = Storage::url($path);
        }

        $teladan->update($data);

        return redirect()->route("admin.teladan.index")->with("success", "Data Sekolah Teladan berhasil diperbarui!");
    }

    public function destroy(HomeFeatureCard $teladan)
    {
        if ($teladan->image_url && str_starts_with($teladan->image_url, "/storage/")) {
            $oldPath = str_replace("/storage/", "public/", $teladan->image_url);
            Storage::delete($oldPath);
        }
        $teladan->delete();
        return redirect()->route("admin.teladan.index")->with("success", "Data Sekolah Teladan berhasil dihapus!");
    }
}

