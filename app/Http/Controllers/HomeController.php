<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Worship;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Worship terbaru
        $worship = Worship::where('category', 'Ibadah Sabat')
            ->where('status', 'Diterima')
            ->latest()
            ->first();

        // Berita terbaru
        $posts = Post::where('status', 'Terbit')->latest()->take(4)->get();

        return view('index', compact('worship', 'posts'));
    }

    public function about()
    {
        return view('about');
    }
}
