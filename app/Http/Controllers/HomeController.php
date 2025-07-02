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

class HomeController extends Controller
{
    public function show($participantId, $surveyId)
    {
        // Ambil data participant
        $participant = Participant::where('uuid', $participantId)->firstOrFail();

        // $participant = Participant::findOrFail($participantId);

        // Ambil data survei dan pertanyaan
        $survey = Survey::where('slug', $surveyId)->firstOrFail();

        // $survey = Survey::findOrFail($surveyId);
        $questions = Question::where('survey_id', $survey->id)->with('options')->get();

        return view('home.registration_response', compact('participant', 'survey', 'questions'));
    }

    public function index()
    {
        // Ambil total respons
        $totalResponses = Response::count();

        // Ambil total peserta
        $totalParticipants = Participant::count();

        // Ambil total survei aktif
        $totalActiveSurveys = Survey::where('is_active', true)->count();

        // Ambil data untuk grafik pie (participant berdasarkan umur)
        $ageGroups = AgeGroup::withCount('participants')->get();

        // Ambil data untuk grafik pie (participant berdasarkan gender)
        $genderCounts = Participant::select('gender', DB::raw('count(*) as count'))
            ->groupBy('gender')
            ->get();

        // Ambil data untuk grafik batang (jawaban per pertanyaan)
        $questions = Question::with('options.responses')->get();

        // Kirim data ke view
        return view('admin.home.dashboard', compact(
            'totalResponses',
            'totalParticipants',
            'totalActiveSurveys',
            'ageGroups',
            'genderCounts', // Add genderCounts to the compact array
            'questions'
        ));
    }
}
