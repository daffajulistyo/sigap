<?php

namespace App\Http\Controllers;

use App\Models\Puskesmas;
use App\Models\WorkUnit;
use Illuminate\Http\Request;
use App\Http\Requests\PuskesmasRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PuskesmasController extends Controller
{
    public function index()
    {
        $puskesmas = Puskesmas::paginate(10);
        return view('admin.puskesmas.index', compact('puskesmas'));
    }

    public function show(Puskesmas $puskesma)
    {
        // Untuk request AJAX
        if (request()->ajax()) {
            return response()->json($puskesma);
        }

        // Untuk request biasa (jika diperlukan)
        return view('puskesmas.show', compact('puskesma'));
    }

    public function store(PuskesmasRequest $request)
    {
        Puskesmas::create($request->validated());

        return redirect()->route('puskesmas.index')
            ->with('success', 'Puskesmas berhasil ditambahkan');
    }

    public function update(Request $request, Puskesmas $puskesma)
    {
        $validatedData = $request->validate([
            'kode_puskesmas' => [
                'required',
                'string',
                'max:10',
                Rule::unique('puskesmas')->ignore($puskesma->id)
            ],
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kecamatan' => 'required|string|max:100',
            'desa' => 'required|string|max:100',
            'nomor_telepon' => 'required|string|max:15',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180'
        ]);

        $puskesma->update($validatedData);

        return redirect()->route('puskesmas.index')
            ->with('success', 'Data Puskesmas berhasil diperbarui');
    }

    public function destroy(Puskesmas $puskesma)
    {
        $puskesma->delete();
        return redirect()->route('puskesmas.index')
            ->with('success', 'Data Puskesmas berhasil dihapus');
    }
}
