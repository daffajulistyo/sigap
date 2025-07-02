<?php

namespace App\Http\Controllers;

use App\Models\Ambulans;
use App\Models\Puskesmas;
use App\Http\Requests\AmbulansRequest;

class AmbulansController extends Controller
{
    public function index()
    {
        
        $ambulans = Ambulans::with('puskesmas')->latest()->paginate(10);
        return view('admin.ambulans.index', compact('ambulans'));
    }

    public function store(AmbulansRequest $request)
    {
        Ambulans::create($request->validated());
        return redirect()->route('ambulans.index')->with('success', 'Data ambulans berhasil ditambahkan');
    }

    public function show(Ambulans $ambulan)
    {
        return view('admin.ambulans.show', compact('ambulan'));
    }

    public function update(AmbulansRequest $request, Ambulans $ambulan)
    {
        $ambulan->update($request->validated());
        return redirect()->back()->with('success', 'Data ambulans berhasil diperbarui');
    }

    public function destroy(Ambulans $ambulan)
    {
        $ambulan->delete();
        return redirect()->back()->with('success', 'Data ambulans berhasil dihapus');
    }
}
