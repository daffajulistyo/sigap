<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AgeGroupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\WorkUnitController;
use App\Http\Controllers\OccupationController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\EducationLevelController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::fallback(function () {
    return redirect()->route('home');
});


Route::get('responden/register', [ParticipantController::class, 'create'])->name('responden.register');

Route::get('responden/isi-survey/{participant:uuid}/{survey:slug}', [HomeController::class, 'show'])->name('responden.isi-survey');
Route::post('/participants', [ParticipantController::class, 'store'])->name('participants.store');

Route::post('/responses', [ResponseController::class, 'store'])->name('responses.store');

Route::view('/thankyou', 'thankyou')->name('thankyou');
Route::get('/rekapitulasi', [ReportController::class, 'generateReport'])->name('report');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Route Group prefix admin



    Route::middleware(['role:superadmin'])->group(function () {
        Route::resource('users', UserController::class);
        Route::put('users/{user}/reset-password', [UserController::class, 'resetPassword'])->name('users.reset_password');
    });
    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
        // Route::get('/dashboard/data', [DashboardController::class, 'getSurveyData']);
        Route::get('/dashboard/filter', [DashboardController::class, 'filter']);
        Route::resource('unit_kerja', WorkUnitController::class);
        Route::resource('kelompok_umur', AgeGroupController::class);
        Route::resource('jenjang_pendidikan', EducationLevelController::class);
        Route::resource('pekerjaan', OccupationController::class);

        Route::get('responden/survey', [ParticipantController::class, 'index'])->name('responden.index');
        Route::delete('participants/{participant}', [ParticipantController::class, 'destroy'])->name('participants.destroy');


        Route::resource('survey', SurveyController::class);

        Route::post('surveys/{survey:slug}/questions', [QuestionController::class, 'store'])->name('surveys.questions.store');
        Route::get('survey/{survey}/tambah-pertanyaan', action: [QuestionController::class, 'create'])->name('surveys.questions.index');
        Route::get('survey/{survey:slug}/pertanyaan', [QuestionController::class, 'index'])->name('questions.index');
        Route::delete('questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
        Route::put('questions/{question}', [QuestionController::class, 'update'])->name('questions.update');
    });
});

require __DIR__ . '/auth.php';
