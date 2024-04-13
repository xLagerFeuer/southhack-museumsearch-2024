<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function viewPredictionPage() {
        return view('pages.prediction-search');
    }
}
