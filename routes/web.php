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
    Route::get('/museum/search', 'App\Http\Controllers\SearchController@viewPredictionPage')->name('museum.search');
    Route::get('/author', 'App\Http\Controllers\AuthorController@index')->name('author.index');
});
