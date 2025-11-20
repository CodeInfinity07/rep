<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportsDataController;

Route::get('/api/sports-data', [SportsDataController::class, 'getSportsData']);

Route::get('/', function () {
    return view('management.index');
});

Route::prefix('bettor')->group(function () {
    Route::get('/', function () {
        return view('bettor.index');
    });
});

Route::get('/bet-cricket', function () {
    return view('bet-cricket');
});

Route::get('/cricket', function () {
    return view('cricket');
});

Route::get('/history', function () {
    return view('history');
});

Route::get('/horse', function () {
    return view('horse');
});

Route::get('/hound', function () {
    return view('hound');
});

Route::get('/ledger', function () {
    return view('ledger');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/match', function () {
    return view('match');
});

Route::get('/position', function () {
    return view('management.position');
});

Route::get('/report', function () {
    return view('management.report');
});

Route::get('/lock', function () {
    return view('management.lock');
});

Route::get('/star', function () {
    return view('management.star');
});

Route::get('/users', function () {
    return view('management.users');
});

Route::get('/users/create', function () {
    return view('management.create-user');
});

Route::get('/result', function () {
    return view('result');
});

Route::get('/sample', function () {
    return view('sample');
});

Route::get('/soccer', function () {
    return view('soccer');
});

Route::get('/tennis', function () {
    return view('tennis');
});
