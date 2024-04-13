<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/museum', 'App\Http\Controllers\MuseumController@index')->name('museum.index');
    Route::get('/museum/search', 'App\Http\Controllers\Controller@viewPredictionPage')->name('museum.search');
});
