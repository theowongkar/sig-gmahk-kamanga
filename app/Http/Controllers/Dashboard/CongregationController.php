<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Congregation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CongregationController extends Controller
{
    public function index(Request $request)
    {
        // Cek Izin
        if (! Gate::allows('manage-congregation')) {
            abort(403);
        }

        // Validasi Input
        $validated = $request->validate([
            'status' => 'nullable|in:Aktif,Tidak Aktif,Pindah,Meninggal Dunia',
            'gender' => 'nullable|in:Laki-laki,Perempuan',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'search' => 'nullable|string|max:255',
        ]);

        // Inisialisasi Input
        $status = $validated['status'] ?? null;
        $gender = $validated['gender'] ?? null;
        $start_date = $validated['start_date'] ?? null;
        $end_date = $validated['end_date'] ?? null;
        $search = $validated['search'] ?? null;

        // Ambil Jemaat
        $congregations = Congregation::query()
            ->when($status, fn ($query) => $query->where('status', $status))
            ->when($gender, fn ($query) => $query->where('gender', $gender))
            ->when($start_date, fn ($query) => $query->where('created_at', '>=', $start_date))
            ->when($end_date, fn ($query) => $query->where('created_at', '<=', $end_date))
            ->when($search, fn ($query) => $query->where('name', 'like', "%{$search}%"))
            ->orderBy('name', 'ASC')
            ->paginate(20);

        return view('dashboard.congregations.index', compact('congregations'));
    }

    public function create()
    {
        // Cek Izin
        if (! Gate::allows('manage-congregation')) {
            abort(403);
        }

        return view('dashboard.congregations.create');
    }

    public function store(Request $request)
    {
        // Cek Izin
        if (! Gate::allows('manage-congregation')) {
            abort(403);
        }

        // Validasi Input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'position' => 'required|string|in:Pendeta,Wakil Ketua,Sekretaris,Bendahara,Penatua,Diaken,Anggota',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Simpan Data Jemaat
        Congregation::create($validated);

        return redirect()->route('dashboard.congregation.create')->with('success', 'Data jemaat berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        // Cek Izin
        if (! Gate::allows('manage-congregation')) {
            abort(403);
        }

        // Ambil Data Jemaat berdasarkan ID
        $congregation = Congregation::findOrFail($id);

        return view('dashboard.congregations.edit', compact('congregation'));
    }

    public function update(Request $request, string $id)
    {
        // Cek Izin
        if (! Gate::allows('manage-congregation')) {
            abort(403);
        }

        // Ambil Data Jemaat berdasarkan ID
        $congregation = Congregation::findOrFail($id);

        // Validasi Input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'position' => 'required|string|in:Pendeta,Wakil Ketua,Sekretaris,Bendahara,Penatua,Diaken,Anggota',
            'status' => 'required|string|in:Aktif,Tidak Aktif,Pindah,Meninggal Dunia',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Update Data Jemaat
        $congregation->update($validated);

        return redirect()->route('dashboard.congregation.edit', $congregation->id)->with('success', 'Data jemaat berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        // Cek Izin
        if (! Gate::allows('manage-congregation')) {
            abort(403);
        }

        // Ambil Data Jemaat berdasarkan ID
        $congregation = Congregation::findOrFail($id);

        // Hapus Data Jemaat
        $congregation->delete();

        return redirect()->route('dashboard.congregation.index')->with('success', 'Data jemaat berhasil dihapus.');
    }
}
