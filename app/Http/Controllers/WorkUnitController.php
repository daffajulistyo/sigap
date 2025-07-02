<?php

namespace App\Http\Controllers;

use App\Models\WorkUnit;
use Illuminate\Http\Request;

class WorkUnitController extends Controller
{
    public function index()
    {
        $workUnits = WorkUnit::paginate(10);
        return view('admin.data.work_units', compact('workUnits'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        WorkUnit::create($request->all());
        return redirect()->route('unit_kerja.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, WorkUnit $unit_kerja)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $unit_kerja->update($request->all());
        return redirect()->route('unit_kerja.index')->with('success', 'Data Berhasil Di Perbarui');
    }

    public function destroy(WorkUnit $unit_kerja)
    {
        $unit_kerja->delete();
        return redirect()->route('unit_kerja.index')->with('success', 'Data Berhasil Dihapus');
    }
}
