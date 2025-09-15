<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // Validasi Input
        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
        ]);

        // Inisialisasi Input
        $search = $validated['search'] ?? null;

        // Ambil Berita
        $posts = Post::when($search, function ($query) use ($search) {
            $query->where('title', 'like', "%{$search}%");
        })
            ->where('status', 'Terbit')
            ->latest()
            ->paginate(4);

        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        // Ambil Berita berdasarkan slug
        $post = Post::where('slug', $slug)->where('status', 'Terbit')->firstOrFail();

        // Tambah views
        $sessionKey = 'viewed_post_' . $post->id;
        if (!session()->has($sessionKey)) {
            $post->increment('views');
            session()->put($sessionKey, true);
        }

        return view('posts.show', compact('post'));
    }
}
