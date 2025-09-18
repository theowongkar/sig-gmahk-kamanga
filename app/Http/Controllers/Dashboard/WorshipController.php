<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Congregation;
use App\Models\Worship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WorshipController extends Controller
{
    public function index()
    {
        // Cek Izin
        if (! Gate::allows('manage-worship')) {
            abort(403);
        }

        // Ambil Ibadah
        $worships = Worship::with('preacher')
            ->when(request('category'), function ($query, $category) {
                $query->where('category', $category);
            })
            ->where('status', 'Diterima')
            ->orderBy('date', 'DESC')
            ->orderBy('start_time', 'DESC')
            ->paginate(20);

        return view('dashboard.worships.index', compact('worships'));
    }

    public function requestIndex()
    {
        // Cek Izin
        if (! Gate::allows('manage-request-worship')) {
            abort(403);
        }

        // Ambil Ibadah
        $worships = Worship::with('preacher')
            ->when(request('category'), function ($query, $category) {
                $query->where('category', $category);
            })
            ->where('status', 'Menunggu Persetujuan')
            ->orderBy('date', 'DESC')
            ->orderBy('start_time', 'DESC')
            ->paginate(20);

        return view('dashboard.request-worships.index', compact('worships'));
    }

    public function create()
    {
        // Cek Izin
        if (! Gate::allows('manage-worship')) {
            abort(403);
        }

        // Ambil Jemaat
        $congregations = Congregation::orderBy('name', 'ASC')->get();

        return view('dashboard.worships.create', compact('congregations'));
    }

    public function store(Request $request)
    {
        // Cek Izin
        if (! Gate::allows('manage-worship')) {
            abort(403);
        }

        // Validasi Input
        $validated = $request->validate([
            'preacher_id' => 'nullable|exists:congregations,id',
            'mc_id' => 'nullable|exists:congregations,id',
            'category' => 'required|string|max:255',
            'status' => 'required|string|in:Diterima,Menunggu Persetujuan',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
            'singer_id' => 'nullable|array',
            'singer_id.*' => 'exists:congregations,id',
        ]);

        // Simpan Ibadah
        $worship = Worship::create([
            'preacher_id' => $validated['preacher_id'] ?? null,
            'mc_id' => $validated['mc_id'] ?? null,
            'category' => $validated['category'],
            'status' => $validated['status'],
            'date' => $validated['date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'location' => $validated['location'],
        ]);

        // Simpan singers
        if (! empty($validated['singer_id'])) {
            $worship->singers()->attach($validated['singer_id']);
        }

        return redirect()->route('dashboard.worship.create')
            ->with('success', 'Ibadah berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        // Cek Izin
        if (! Gate::allows('manage-worship')) {
            abort(403);
        }

        // Ambil Ibadah berdasarkan ID
        $worship = Worship::findOrFail($id);

        // Ambil Jemaat
        $congregations = Congregation::orderBy('name', 'ASC')->get();

        return view('dashboard.worships.edit', compact('worship', 'congregations'));
    }

    public function requestEdit(string $id)
    {
        // Cek Izin
        if (! Gate::allows('manage-request-worship')) {
            abort(403);
        }

        // Ambil Ibadah berdasarkan ID
        $worship = Worship::findOrFail($id);

        // Ambil Jemaat
        $congregations = Congregation::orderBy('name', 'ASC')->get();

        return view('dashboard.request-worships.edit', compact('worship', 'congregations'));
    }

    public function update(Request $request, string $id)
    {
        // Cek Izin
        if (! Gate::allows('manage-worship')) {
            abort(403);
        }

        // Ambil Ibadah berdasarkan ID
        $worship = Worship::findOrFail($id);

        // Validasi Input
        $validated = $request->validate([
            'preacher_id' => 'nullable|exists:congregations,id',
            'mc_id' => 'nullable|exists:congregations,id',
            'category' => 'required|string|max:255',
            'status' => 'required|string|in:Diterima,Menunggu Persetujuan',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
            'singer_id' => 'nullable|array',
            'singer_id.*' => 'exists:congregations,id',
        ]);

        // Update data Ibadah
        $worship->update([
            'preacher_id' => $validated['preacher_id'] ?? null,
            'mc_id' => $validated['mc_id'] ?? null,
            'category' => $validated['category'],
            'status' => $validated['status'],
            'date' => $validated['date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'location' => $validated['location'],
        ]);

        // Update singers (sinkronisasi)
        if (! empty($validated['singer_id'])) {
            $worship->singers()->sync($validated['singer_id']);
        } else {
            $worship->singers()->detach();
        }

        return redirect()->route('dashboard.worship.edit', $worship->id)->with('success', 'Ibadah berhasil diperbarui.');
    }

    public function requestUpdate(Request $request, string $id)
    {
        // Cek Izin
        if (! Gate::allows('manage-request-worship')) {
            abort(403);
        }

        // Ambil Ibadah berdasarkan ID
        $worship = Worship::findOrFail($id);

        // Validasi Input
        $validated = $request->validate([
            'preacher_id' => 'nullable|exists:congregations,id',
            'mc_id' => 'nullable|exists:congregations,id',
            'category' => 'required|string|max:255',
            'status' => 'required|string|in:Diterima,Menunggu Persetujuan',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'location' => 'required|string|max:255',
            'singer_id' => 'nullable|array',
            'singer_id.*' => 'exists:congregations,id',
        ]);

        // Update data Ibadah
        $worship->update([
            'preacher_id' => $validated['preacher_id'] ?? null,
            'mc_id' => $validated['mc_id'] ?? null,
            'category' => $validated['category'],
            'status' => $validated['status'],
            'date' => $validated['date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'location' => $validated['location'],
        ]);

        // Update singers (sinkronisasi)
        if (! empty($validated['singer_id'])) {
            $worship->singers()->sync($validated['singer_id']);
        } else {
            $worship->singers()->detach();
        }

        return redirect()->route('dashboard.request-worship.edit', $worship->id)->with('success', 'Ibadah berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        // Cek Izin
        if (! Gate::allows('manage-worship')) {
            abort(403);
        }

        // Ambil Data Ibadah berdasarkan ID
        $worship = Worship::findOrFail($id);

        // Hapus Data Ibadah
        $worship->delete();

        return redirect()->route('dashboard.worship.index')->with('success', 'Data ibadah berhasil dihapus.');
    }

    public function requestDestroy(string $id)
    {
        // Cek Izin
        if (! Gate::allows('manage-request-worship')) {
            abort(403);
        }

        // Ambil Data Ibadah berdasarkan ID
        $worship = Worship::findOrFail($id);

        // Hapus Data Ibadah
        $worship->delete();

        return redirect()->route('dashboard.request-worship.index')->with('success', 'Data ibadah berhasil dihapus.');
    }
}
