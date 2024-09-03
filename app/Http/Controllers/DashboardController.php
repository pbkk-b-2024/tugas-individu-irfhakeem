<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showCards()
    {
        $cards = [
            [
                // total patients
            ],
            [
                // total doctor
            ],
            [
                // total reports
            ],
            [
                // total prescriptions
            ],
            [
                // total checkup last 7 days
            ]
        ];

        return view('dashboard', compact('cards'));
    }
}
