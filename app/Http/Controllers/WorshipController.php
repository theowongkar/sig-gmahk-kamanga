<?php

namespace App\Http\Controllers;

use App\Models\Congregation;
use App\Models\Worship;
use Illuminate\Http\Request;

class WorshipController extends Controller
{
    public function index(Request $request)
    {
        // Validasi Input
        $validated = $request->validate([
            'category' => 'nullable|string|max:255',
        ]);

        // Inisialisasi Input
        $category = $validated['category'] ?? null;

        // Ambil Ibadah
        $worships = Worship::with('preacher', 'mc', 'singers')
            ->when($category, function ($query) use ($category) {
                $query->where('category', 'like', "%{$category}%");
            })
            ->where('status', 'Diterima')
            ->orderBy('date', 'DESC')
            ->orderBy('start_time', 'DESC')
            ->paginate(12);

        return view('worships.index', compact('worships'));
    }

    public function create()
    {
        $congregations = Congregation::all();

        return view('worships.create', compact('congregations'));
    }

    public function store(Request $request)
    {
        // Validasi Input
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        // Simpan Ibadah
        $worship = Worship::create([
            'category' => $validated['category'],
            'location' => $validated['location'],
            'date' => $validated['date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
        ]);

        return redirect()->route('worship.create')->with('success', 'Pengajuan ibadah berhasil dikirim. Tunggu konfirmasi dari admin.');
    }
}
