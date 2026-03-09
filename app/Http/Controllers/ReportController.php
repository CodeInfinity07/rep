<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BookDetail;
use App\Models\User;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $handler = $request->query('handler');

        if ($handler) {
            return match ($handler) {
                'BookDetail' => $this->bookDetail($request),
                'SportsWise' => $this->sportsWise($request),
                'MarketsReports' => $this->marketsReports($request),
                default => response('Unknown handler', 400),
            };
        }

        return view('management.report');
    }

    private function bookDetail(Request $request)
    {
        $user = Auth::user();
        $from = $this->parseDate($request->query('from'), now()->startOfDay());
        $to = $this->parseDate($request->query('to'), now()->endOfDay());

        $children = User::where('parent_id', $user->id)->get();

        $amounts = BookDetail::where('parent_id', $user->id)
            ->whereBetween('report_date', [$from->toDateString(), $to->toDateString()])
            ->selectRaw('user_id, SUM(amount) as total_amount')
            ->groupBy('user_id')
            ->pluck('total_amount', 'user_id');

        $results = [];
        foreach ($children as $child) {
            $results[] = [
                'id' => $child->id,
                'name' => $child->username,
                'amount' => round($amounts->get($child->id, 0), 2),
            ];
        }

        $positives = array_filter($results, fn($r) => $r['amount'] >= 0);
        $negatives = array_filter($results, fn($r) => $r['amount'] < 0);

        $totalPositive = array_sum(array_column($positives, 'amount'));
        $totalNegative = array_sum(array_column($negatives, 'amount'));

        return view('management.partials.book-detail', [
            'username' => $user->username,
            'results' => $results,
            'positives' => $positives,
            'negatives' => $negatives,
            'totalPositive' => round($totalPositive, 2),
            'totalNegative' => round($totalNegative, 2),
            'from' => $from->format('m/d/Y h:i A'),
            'to' => $to->format('m/d/Y h:i A'),
        ]);
    }

    private function sportsWise(Request $request)
    {
        $user = Auth::user();
        $from = $this->parseDate($request->query('from'), now()->startOfDay());
        $to = $this->parseDate($request->query('to'), now()->endOfDay());
        $childId = $request->query('id');

        $child = User::where('id', $childId)->where('parent_id', $user->id)->firstOrFail();

        $sportTotals = BookDetail::where('user_id', $childId)
            ->where('parent_id', $user->id)
            ->whereBetween('report_date', [$from->toDateString(), $to->toDateString()])
            ->selectRaw('sport_name, SUM(amount) as total_amount')
            ->groupBy('sport_name')
            ->get();

        return view('management.partials.sports-wise', [
            'username' => $child->username,
            'sportTotals' => $sportTotals,
            'from' => $from->format('m/d/Y h:i A'),
            'to' => $to->format('m/d/Y h:i A'),
        ]);
    }

    private function marketsReports(Request $request)
    {
        $user = Auth::user();
        $from = $this->parseDate($request->query('from'), now()->startOfDay());
        $to = $this->parseDate($request->query('to'), now()->endOfDay());
        $childId = $request->query('id');
        $sportName = $request->query('id2');

        $marketDetails = BookDetail::where('user_id', $childId)
            ->where('parent_id', $user->id)
            ->where('sport_name', $sportName)
            ->whereBetween('report_date', [$from->toDateString(), $to->toDateString()])
            ->get();

        return view('management.partials.markets-reports', [
            'marketDetails' => $marketDetails,
            'sportName' => $sportName,
        ]);
    }

    private function parseDate(?string $dateStr, Carbon $default): Carbon
    {
        if (!$dateStr) {
            return $default;
        }

        try {
            return Carbon::parse($dateStr);
        } catch (\Exception $e) {
            return $default;
        }
    }
}
