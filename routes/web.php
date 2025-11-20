<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportsDataController;

Route::get('/api/sports-data', [SportsDataController::class, 'getSportsData']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('management.index');
    });
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


Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);

Route::get('/match', function () {
    return view('match');
});

Route::middleware(['auth'])->group(function () {
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

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);

    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create']);
    Route::post('/users/create', [App\Http\Controllers\UserController::class, 'store']);
    
    Route::get('/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/users/{id}/update', [App\Http\Controllers\UserController::class, 'update']);
    Route::post('/users/{id}/update-bet-sizes', [App\Http\Controllers\UserController::class, 'updateBetSizes']);
    
    Route::get('/users/{id}/cash-credit', [App\Http\Controllers\CashCreditController::class, 'show']);
    Route::post('/users/{id}/cash/deposit', [App\Http\Controllers\CashCreditController::class, 'depositCash']);
    Route::post('/users/{id}/cash/withdraw', [App\Http\Controllers\CashCreditController::class, 'withdrawCash']);
    Route::post('/users/{id}/credit/deposit', [App\Http\Controllers\CashCreditController::class, 'depositCredit']);
    Route::post('/users/{id}/credit/withdraw', [App\Http\Controllers\CashCreditController::class, 'withdrawCredit']);
    
    Route::get('/users/{id}/ledger', [App\Http\Controllers\LedgerController::class, 'show']);
    
    Route::get('/cricket/{marketId}', [App\Http\Controllers\MatchController::class, 'show']);
    Route::get('/api/match-odds/{marketId}', [App\Http\Controllers\MatchController::class, 'getOddsApi']);
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
