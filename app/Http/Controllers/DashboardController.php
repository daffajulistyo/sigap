<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\AgeGroup;
use App\Models\Ambulans;
use App\Models\Question;
use App\Models\Response;
use App\Models\WorkUnit;
use App\Models\Puskesmas;
use App\Models\Occupation;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'superadmin') {
            // Hitung rasio ketersediaan ambulans
            $totalAmbulans = Ambulans::count();
            $standbyCount = Ambulans::where('status', 'standby')->count();
            $availabilityRatio = $totalAmbulans > 0 ? ($standbyCount / $totalAmbulans) * 100 : 0;

            $chartData = [
                'availability' => round($availabilityRatio, 1),
                'standby' => $standbyCount,
                'on_duty' => Ambulans::where('status', 'on_duty')->count(),
                'total' => $totalAmbulans
            ];

            return view('admin.home.dashboard', [
                'totalPuskesmas' => Puskesmas::count(),
                'totalAmbulans' => $totalAmbulans,
                'ambulansStanby' => $standbyCount,
                'chartData' => $chartData
            ]);
        } else {
            // Tetap sama seperti sebelumnya untuk admin biasa
            $puskesmasId = $user->puskesmas_id;
            $puskesmas = Puskesmas::find($puskesmasId);

            return view('admin.home.dashboard', [
                'totalAmbulansPuskesmas' => Ambulans::where('puskesmas_id', $puskesmasId)->count(),
                'ambulansStanbyPuskesmas' => Ambulans::where('puskesmas_id', $puskesmasId)
                    ->where('status', 'standby')->count(),
                'ambulansPuskesmas' => Ambulans::where('puskesmas_id', $puskesmasId)
                    ->with('puskesmas')
                    ->orderBy('status')
                    ->get(),
                'puskesmas' => $puskesmas,
                'chartData' => null // Tidak ada chart untuk admin biasa
            ]);
        }
    }
}
