<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function viewPredictionPage() {
        return view('pages.prediction-search');
    }
}
