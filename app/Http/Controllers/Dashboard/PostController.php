<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // Validasi Input
        $validated = $request->validate([
            'status' => 'nullable|in:,Draf,Terbit,Arsip',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'search' => 'nullable|string|max:255',
        ]);

        // Inisialisasi Input
        $search = $validated['search'] ?? null;
        $status = $validated['status'] ?? null;
        $start_date = $validated['start_date'] ?? null;
        $end_date = $validated['end_date'] ?? null;

        // Ambil Berita
        $posts = Post::with('author')
            ->when($search, fn($query) => $query->where('title', 'like', "%{$search}%"))
            ->when($status, fn($query) => $query->where('status', $status))
            ->when($start_date, fn($query) => $query->where('created_at', '>=', $start_date))
            ->when($end_date, fn($query) => $query->where('created_at', '<=', $end_date))
            ->orderBy('created_at', 'DESC')
            ->paginate(20);

        return view('dashboard.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('dashboard.posts.create');
    }

    public function store(Request $request)
    {
        // Validasi Input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:Draf,Terbit,Arsip',
            'image' => 'nullable|image|max:2048',
        ]);

        // Simpan Gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $validated['image'] = $imagePath;
        }

        // Simpan Berita
        $post = Post::create([
            'author_id' => Auth::id(),
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => $validated['status'],
            'image' => $validated['image'] ?? null,
        ]);


        return redirect()->route('dashboard.post.create')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function update(Request $request, $slug)
    {
        // Ambil Berita berdasarkan Slug
        $post = Post::where('slug', $slug)->firstOrFail();

        // Validasi Input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:Draf,Terbit,Arsip',
            'image' => 'nullable|image|max:2048',
        ]);

        // Simpan Gambar
        if ($request->hasFile('image')) {
            // Hapus Gambar Lama jika ada
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $imagePath = $request->file('image')->store('posts', 'public');
            $validated['image'] = $imagePath;
        }

        // Update Berita
        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => $validated['status'],
            'image' => $validated['image'] ?? $post->image,
        ]);

        return redirect()->route('dashboard.post.edit', $post->slug)->with('success', 'Berita berhasil diperbarui.');
    }

    public function edit($slug)
    {
        // Ambil Berita berdasarkan Slug
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('dashboard.posts.edit', compact('post'));
    }

    public function destroy($slug)
    {
        // Ambil Berita berdasarkan Slug
        $post = Post::where('slug', $slug)->firstOrFail();

        // Hapus Gambar Berita
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        // Hapus Berita
        $post->delete();

        return redirect()->route('dashboard.post.index')->with('success', 'Berita berhasil dihapus.');
    }
}
