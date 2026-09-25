<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->paginate(15);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'author' => 'nullable|string|max:255',
            'image_file' => 'nullable|image|max:4096',
            'image_url' => 'nullable|string',
            'published_at' => 'nullable|date',
            'is_featured' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
        ]);

        $imageUrl = $validated['image_url'] ?? null;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('news', 'public');
            $imageUrl = Storage::url($path);
        }

        News::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) ? (Str::slug($validated['title']) . '-' . Str::random(5)) : ('berita-' . time()),
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'category' => $validated['category'] ?? 'Berita',
            'author' => $validated['author'] ?? 'Humas Wikrama',
            'image_url' => $imageUrl,
            'published_at' => $validated['published_at'] ?? now(),
            'is_featured' => $request->boolean('is_featured'),
            'is_published' => $request->has('is_published') ? $request->boolean('is_published') : true,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'author' => 'nullable|string|max:255',
            'image_file' => 'nullable|image|max:4096',
            'image_url' => 'nullable|string',
            'published_at' => 'nullable|date',
            'is_featured' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
        ]);

        $imageUrl = $news->image_url;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('news', 'public');
            $imageUrl = Storage::url($path);
        } elseif (!empty($validated['image_url'])) {
            $imageUrl = $validated['image_url'];
        }

        $news->update([
            'title' => $validated['title'],
            'slug' => $news->slug ?: (Str::slug($validated['title']) . '-' . Str::random(5)),
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'category' => $validated['category'] ?? $news->category ?? 'Berita',
            'author' => $validated['author'] ?? $news->author ?? 'Humas Wikrama',
            'image_url' => $imageUrl,
            'published_at' => $validated['published_at'] ?? $news->published_at ?? now(),
            'is_featured' => $request->boolean('is_featured'),
            'is_published' => $request->has('is_published') ? $request->boolean('is_published') : $news->is_published,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus!');
    }
}

