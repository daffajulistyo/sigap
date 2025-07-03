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
            $data = [
                'totalPuskesmas' => Puskesmas::count(),
                'totalAmbulans' => Ambulans::count(),
                'ambulansStanby' => Ambulans::where('status', 'stanby')->count(),
            ];
        } else {
            $puskesmasId = $user->puskesmas_id;
            $puskesmas = Puskesmas::find($puskesmasId); // Langsung query jika tidak yakin

            $data = [
                'totalAmbulansPuskesmas' => Ambulans::where('puskesmas_id', $puskesmasId)->count(),
                'ambulansStanbyPuskesmas' => Ambulans::where('puskesmas_id', $puskesmasId)
                    ->where('status', 'stanby')
                    ->count(),
                'ambulansPuskesmas' => Ambulans::where('puskesmas_id', $puskesmasId)
                    ->with('puskesmas')
                    ->orderBy('status')
                    ->get(),
                'puskesmas' => $puskesmas,
            ];
        }

        return view('admin.home.dashboard', $data);
    }
}
