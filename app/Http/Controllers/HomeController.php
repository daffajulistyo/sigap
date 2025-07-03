<?php

namespace App\Http\Controllers;

use App\Models\Ambulans;
use App\Models\Puskesmas;

class HomeController extends Controller
{
    public function index()
    {
        $puskesmas = Puskesmas::all();
        $ambulans = Ambulans::all();
        return view(
            'home.index',
            [
                'puskesmas' => $puskesmas,
                'ambulans' => $ambulans
            ]
        );
    }
}
