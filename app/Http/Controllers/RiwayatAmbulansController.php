<?php

namespace App\Http\Controllers;

use App\Models\RiwayatAmbulans;
use App\Models\Ambulans;
use App\Models\User;
use App\Http\Requests\RiwayatAmbulansRequest;
use Illuminate\Http\Request;

class RiwayatAmbulansController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'superadmin') {
            $riwayat = RiwayatAmbulans::with(['ambulans.puskesmas'])
                ->latest()
                ->paginate(10);
        } else {
            $riwayat = RiwayatAmbulans::whereHas('ambulans', function ($query) use ($user) {
                $query->where('puskesmas_id', $user->puskesmas_id);
            })
                ->with(['ambulans.puskesmas'])
                ->latest()
                ->paginate(10);
        }

        return view('admin.riwayat-ambulans.index', compact('riwayat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ambulans_id' => 'required|exists:ambulans,id',
            'tujuan' => 'required|string|max:255',
            'keperluan' => 'required|string',
            'waktu_berangkat' => 'required|date',
            'waktu_kembali' => 'nullable|date|after_or_equal:waktu_berangkat',
            'km_berangkat' => 'required|integer|min:0',
            'km_kembali' => 'nullable|integer|min:' . $request->km_berangkat,
            'catatan' => 'nullable|string',
            'status_perjalanan' => 'required|in:berjalan,selesai'
        ]);

        $user = auth()->user();
        $ambulans = Ambulans::findOrFail($request->ambulans_id);

        // Validasi kepemilikan ambulans untuk admin puskesmas
        if ($user->role !== 'superadmin' && $ambulans->puskesmas_id !== $user->puskesmas_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke ambulans ini.');
        }

        $riwayat = RiwayatAmbulans::create($request->all());

        // Update status ambulans jika sedang berjalan
        if ($request->status_perjalanan === 'berjalan') {
            $ambulans->update(['status' => 'dinas']);
        }

        return redirect()->route('riwayat-ambulans.index')
            ->with('success', 'Riwayat perjalanan berhasil ditambahkan');
    }
    public function show($id)
    {
        $riwayat = RiwayatAmbulans::with(['ambulans.puskesmas'])->findOrFail($id);
        $user = auth()->user();

        // Validasi kepemilikan untuk admin puskesmas
        if ($user->role !== 'superadmin' && $riwayat->ambulans->puskesmas_id !== $user->puskesmas_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.riwayat-ambulans.show', compact('riwayat'));
    }

    public function edit($id)
    {
        $riwayat = RiwayatAmbulans::findOrFail($id);
        $user = auth()->user();

        // Validasi kepemilikan untuk admin puskesmas
        if ($user->role !== 'superadmin' && $riwayat->ambulans->puskesmas_id !== $user->puskesmas_id) {
            abort(403, 'Unauthorized action.');
        }

        if ($user->role === 'superadmin') {
            $ambulans = Ambulans::with('puskesmas')->get();
        } else {
            $ambulans = Ambulans::where('puskesmas_id', $user->puskesmas_id)
                ->with('puskesmas')
                ->get();
        }

        return view('admin.riwayat-ambulans.edit', compact('riwayat', 'ambulans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ambulans_id' => 'required|exists:ambulans,id',
            'tujuan' => 'required|string|max:255',
            'keperluan' => 'required|string',
            'waktu_berangkat' => 'required|date',
            'waktu_kembali' => 'nullable|date|after_or_equal:waktu_berangkat',
            'km_berangkat' => 'required|integer|min:0',
            'km_kembali' => 'nullable|integer|min:' . $request->km_berangkat,
            'catatan' => 'nullable|string',
            'status_perjalanan' => 'required|in:berjalan,selesai'
        ]);

        $riwayat = RiwayatAmbulans::findOrFail($id);
        $user = auth()->user();
        $ambulans = Ambulans::findOrFail($request->ambulans_id);

        // Validasi kepemilikan untuk admin puskesmas
        if ($user->role !== 'superadmin' && $ambulans->puskesmas_id !== $user->puskesmas_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke ambulans ini.');
        }

        $riwayat->update($request->all());

        // Update status ambulans
        if ($request->status_perjalanan === 'berjalan') {
            $ambulans->update(['status' => 'digunakan']);
        } else {
            $ambulans->update(['status' => 'stanby']);
        }

        return redirect()->route('riwayat-ambulans.index')
            ->with('success', 'Riwayat perjalanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $riwayat = RiwayatAmbulans::findOrFail($id);
        $user = auth()->user();

        // Validasi kepemilikan untuk admin puskesmas
        if ($user->role !== 'superadmin' && $riwayat->ambulans->puskesmas_id !== $user->puskesmas_id) {
            abort(403, 'Unauthorized action.');
        }

        $riwayat->delete();

        return redirect()->route('riwayat-ambulans.index')
            ->with('success', 'Riwayat perjalanan berhasil dihapus');
    }
}
