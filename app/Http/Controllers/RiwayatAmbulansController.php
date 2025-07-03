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
        $riwayat = RiwayatAmbulans::with('ambulans')
                    ->latest()
                    ->paginate(10);
        return view('admin.riwayat-ambulans.index', compact('riwayat'));
    }

    public function store(RiwayatAmbulansRequest $request)
    {
        $data = $request->validated();

        // Update status ambulans
        Ambulans::find($data['ambulans_id'])->update(['status' => 'dinas']);

        RiwayatAmbulans::create($data);

        return redirect()->route('riwayat-ambulans.index')
            ->with('success', 'Data riwayat berhasil ditambahkan');
    }

    public function show(RiwayatAmbulans $riwayat)
    {
        return view('admin.riwayat-ambulans.show', compact('riwayat'));
    }

    public function update(RiwayatAmbulansRequest $request, RiwayatAmbulans $riwayat)
    {
        $data = $request->validated();

        // Jika status diubah ke selesai dan waktu kembali diisi
        if ($data['status_perjalanan'] == 'selesai' && $data['waktu_kembali'] && $data['km_kembali']) {
            $riwayat->ambulans->update(['status' => 'standby']);
        }

        $riwayat->update($data);

        return redirect()->route('riwayat-ambulans.index')
            ->with('success', 'Data riwayat berhasil diperbarui');
    }

    public function destroy(RiwayatAmbulans $riwayat)
    {
        $riwayat->delete();
        return redirect()->route('riwayat-ambulans.index')
            ->with('success', 'Data riwayat berhasil dihapus');
    }
}
