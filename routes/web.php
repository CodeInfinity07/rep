<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SportsDataController;

Route::get('/api/sports-data', [SportsDataController::class, 'getSportsData']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $user = Auth::user();
        if (strtolower($user->type) === 'bettor') {
            return app(\App\Http\Controllers\BettorController::class)->index();
        }
        return view('management.index');
    });
});

Route::prefix('bettor')->middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\BettorController::class, 'index']);
});

Route::get('/bet-cricket', function () {
    return view('bet-cricket');
});

Route::get('/cricket', [App\Http\Controllers\SportsPageController::class, 'cricket'])->middleware(['auth']);

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

Route::middleware(['auth', 'restrictBettors'])->group(function () {
    Route::get('/position', function () {
        return view('management.position');
    });

    Route::get('/report', [App\Http\Controllers\ReportController::class, 'index']);
    Route::get('/report2', [App\Http\Controllers\ReportController::class, 'detail2']);
    Route::get('/Reports/Detail2', function () { return redirect('/report2'); });
    Route::get('/report-daily-pl', [App\Http\Controllers\ReportController::class, 'dailyPl']);
    Route::get('/Reports/DailyPl', function () { return redirect('/report-daily-pl'); });
    Route::get('/report-daily', [App\Http\Controllers\ReportController::class, 'daily']);
    Route::get('/Reports/Daily', function () { return redirect('/report-daily'); });
    Route::get('/report-final-sheet', [App\Http\Controllers\ReportController::class, 'finalSheet']);
    Route::get('/Reports/FinalSheet', function () { return redirect('/report-final-sheet'); });
    Route::get('/report-commission', [App\Http\Controllers\ReportController::class, 'commission']);
    Route::get('/Reports/Commission', function () { return redirect('/report-commission'); });

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
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cricket/{gmid}', [App\Http\Controllers\MatchController::class, 'showCricketIdMatch']);
    Route::get('/soccer/{gmid}', [App\Http\Controllers\MatchController::class, 'showSoccerMatch']);
    Route::get('/tennis/{gmid}', [App\Http\Controllers\MatchController::class, 'showTennisMatch']);
    Route::get('/match/{gmid}', [App\Http\Controllers\MatchController::class, 'showCricketIdMatch']);
    Route::get('/Common/Dashboard', function () {
        return redirect('/');
    });
    Route::get('/Customer/Profile', [App\Http\Controllers\BettorController::class, 'profile']);
    Route::get('/Customer/Bets', [App\Http\Controllers\BettorController::class, 'bets']);
    Route::get('/Customer/ProfitLoss', [App\Http\Controllers\BettorController::class, 'profitLoss']);
    Route::get('/Customer/Ledger', [App\Http\Controllers\BettorController::class, 'statement']);
    Route::get('/Customer/Ledger/', [App\Http\Controllers\BettorController::class, 'statement']);
    Route::get('/Common/Result', [App\Http\Controllers\BettorController::class, 'results']);
    Route::get('/Common/Result/', [App\Http\Controllers\BettorController::class, 'results']);
    
    Route::post('/api/bets/place', [App\Http\Controllers\BetController::class, 'placeBet']);
    Route::get('/api/bets', [App\Http\Controllers\BetController::class, 'getUserBets']);
    Route::get('/api/bets/open', [App\Http\Controllers\BetController::class, 'getOpenBets']);
    Route::post('/api/bets/{betId}/cancel', [App\Http\Controllers\BetController::class, 'cancelBet']);
});

Route::get('/api/casino-games', [App\Http\Controllers\CasinoController::class, 'getGames']);

// Public API routes (accessible without authentication)
Route::get('/api/cricket-matches', [App\Http\Controllers\SportsDataController::class, 'getCricketMatches']);
Route::get('/api/match-odds/{marketId}', [App\Http\Controllers\MatchController::class, 'getOddsApi']);

// Protected API routes for prices data
Route::middleware(['auth'])->group(function () {
    Route::get('/api/prices/{marketId}', [App\Http\Controllers\MatchController::class, 'getPricesApi']);
    Route::get('/api/all-prices/{marketId}', [App\Http\Controllers\MatchController::class, 'getAllPricesApi']);
    Route::get('/api/cricketid/matches', [App\Http\Controllers\MatchController::class, 'getCricketIdMatchListApi']);
    Route::get('/api/cricketid/odds/{gmid}', [App\Http\Controllers\MatchController::class, 'getCricketIdOddsApi']);
    Route::get('/api/cricketid/score', [App\Http\Controllers\MatchController::class, 'getCricketIdScoreProxy']);
    Route::get('/api/match-details/{gmid}', [App\Http\Controllers\MatchController::class, 'getMatchDetailsFromDb']);
    Route::get('/api/results', [App\Http\Controllers\MatchController::class, 'getResultsApi']);
});

Route::get('/result', function () {
    return view('result');
});

Route::get('/sample', function () {
    return view('sample');
});

Route::get('/soccer', [App\Http\Controllers\SportsPageController::class, 'soccer'])->middleware(['auth']);

Route::get('/tennis', [App\Http\Controllers\SportsPageController::class, 'tennis'])->middleware(['auth']);
