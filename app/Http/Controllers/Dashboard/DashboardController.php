<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Congregation;
use App\Models\Post;
use App\Models\Worship;

class DashboardController extends Controller
{
    public function index()
    {
        $congregationsData = $this->getCongregationsData();
        $postsData = $this->getPostsData();
        $worshipData = $this->getWorshipData();

        return view('dashboard.index', compact('congregationsData', 'postsData', 'worshipData'));
    }

    private function getCongregationsData()
    {
        $congregationTotal = Congregation::count();
        $congregationActive = Congregation::where('status', 'Aktif')->count();
        $congregationMale = Congregation::where('status', 'Aktif')->where('gender', 'Laki-laki')->count();
        $congregationFemale = Congregation::where('status', 'Aktif')->where('gender', 'Perempuan')->count();

        return [
            'total' => $congregationTotal,
            'active' => $congregationActive,
            'male' => $congregationMale,
            'female' => $congregationFemale,
        ];
    }

    private function getPostsData()
    {
        $postsTotal = Post::count();
        $postsPublished = Post::where('status', 'Terbit')->count();
        $postsDraft = Post::where('status', 'Draft')->count();
        $postsArchived = Post::where('status', 'Arsip')->count();

        return [
            'total' => $postsTotal,
            'published' => $postsPublished,
            'draft' => $postsDraft,
            'archived' => $postsArchived,
        ];
    }

    private function getWorshipData()
    {
        $totalWorship = Worship::count();
        $latestWorship = Worship::where('category', 'Ibadah Sabat')->where('status', 'Diterima')->latest('date')->first();

        return [
            'total' => $totalWorship,
            'latest' => $latestWorship,
        ];
    }
}
