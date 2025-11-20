<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/lock', function () {
    return view('lock');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/match', function () {
    return view('match');
});

Route::get('/position', function () {
    return view('position');
});

Route::get('/report', function () {
    return view('report');
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

Route::get('/star', function () {
    return view('star');
});

Route::get('/tennis', function () {
    return view('tennis');
});

Route::get('/users', function () {
    return view('users');
});
