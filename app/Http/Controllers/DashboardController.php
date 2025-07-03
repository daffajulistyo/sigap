<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\AgeGroup;
use App\Models\Question;
use App\Models\Response;
use App\Models\WorkUnit;
use App\Models\Occupation;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.home.dashboard');
    }
}
