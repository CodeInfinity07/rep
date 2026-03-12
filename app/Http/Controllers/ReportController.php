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

    public function commission(Request $request)
    {
        if ($request->query('handler') === 'Commission') {
            $user = Auth::user();

            $from = $request->query('from')
                ? Carbon::parse($request->query('from'))->startOfDay()
                : Carbon::now()->subDay()->startOfDay();
            $to = $request->query('to')
                ? Carbon::parse($request->query('to'))->endOfDay()
                : Carbon::now()->endOfDay();

            $children = User::where('parent_id', $user->id)->get();

            $commissions = BookDetail::where('parent_id', $user->id)
                ->whereBetween('created_at', [$from, $to])
                ->selectRaw('user_id, SUM(commission_amount) as total_commission')
                ->groupBy('user_id')
                ->pluck('total_commission', 'user_id');

            $rows = [];
            foreach ($children as $child) {
                $amt = round((float) $commissions->get($child->id, 0), 2);
                $rows[] = [
                    'name'       => $child->username,
                    'commission' => $amt,
                ];
            }

            usort($rows, fn($a, $b) => strcmp($a['name'], $b['name']));
            $total = round(array_sum(array_column($rows, 'commission')), 2);

            return response()->json(['rows' => $rows, 'total' => $total]);
        }

        return view('management.report-commission');
    }

    public function finalSheet(Request $request)
    {
        if ($request->query('handler') === 'Report') {
            $user = Auth::user();

            $children = User::where('parent_id', $user->id)->get();

            $amounts = BookDetail::where('parent_id', $user->id)
                ->selectRaw('user_id, SUM(amount) as total_amount')
                ->groupBy('user_id')
                ->pluck('total_amount', 'user_id');

            $entries = [];
            foreach ($children as $child) {
                $entries[] = [
                    'name'   => $child->username,
                    'amount' => round((float) $amounts->get($child->id, 0), 2),
                ];
            }

            usort($entries, fn($a, $b) => strcmp($a['name'], $b['name']));
            $total = round(array_sum(array_column($entries, 'amount')), 2);

            return view('management.partials.final-sheet-report', [
                'username' => $user->username,
                'entries'  => $entries,
                'total'    => $total,
            ]);
        }

        return view('management.report-final-sheet');
    }

    public function daily(Request $request)
    {
        $handler = $request->query('handler');

        if ($handler) {
            return match ($handler) {
                'DailyReport'        => $this->dailyReportData($request),
                'DailyReportSports'  => $this->dailyReportSports($request),
                'DailyReportMarkets' => $this->dailyReportMarkets($request),
                default              => response('Unknown handler', 400),
            };
        }

        return view('management.report-daily');
    }

    public function dailyPl(Request $request)
    {
        $handler = $request->query('handler');

        if ($handler) {
            return match ($handler) {
                'DailyPl'       => $this->dailyPlData($request),
                'DailyPlSports' => $this->dailyPlSports($request),
                'DailyPlMarkets'=> $this->dailyPlMarkets($request),
                default         => response('Unknown handler', 400),
            };
        }

        return view('management.report-daily-pl');
    }

    public function detail2(Request $request)
    {
        $handler = $request->query('handler');

        if ($handler) {
            return match ($handler) {
                'Detail2Sports' => $this->detail2Sports($request),
                'Detail2Markets' => $this->detail2Markets($request),
                'Detail2MarketDetail' => $this->detail2MarketDetail($request),
                default => response('Unknown handler', 400),
            };
        }

        return view('management.report-detail2');
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

    private function dailyReportData(Request $request)
    {
        $user = Auth::user();
        $from = $this->parseDate($request->query('from'), now()->startOfDay());
        $to   = $this->parseDate($request->query('to'), now()->endOfDay());

        $children = User::where('parent_id', $user->id)->get();

        $amounts = BookDetail::where('parent_id', $user->id)
            ->whereBetween('report_date', [$from->toDateString(), $to->toDateString()])
            ->selectRaw('user_id, SUM(amount) as total_amount')
            ->groupBy('user_id')
            ->pluck('total_amount', 'user_id');

        $results = [];
        foreach ($children as $child) {
            $results[] = [
                'id'     => $child->id,
                'name'   => $child->username,
                'amount' => round((float) $amounts->get($child->id, 0), 2),
            ];
        }

        $positives = array_values(array_filter($results, fn($r) => $r['amount'] >= 0));
        $negatives = array_values(array_filter($results, fn($r) => $r['amount'] < 0));

        return response()->json([
            'positives'     => $positives,
            'negatives'     => $negatives,
            'totalPositive' => round(array_sum(array_column($positives, 'amount')), 2),
            'totalNegative' => round(array_sum(array_column($negatives, 'amount')), 2),
        ]);
    }

    private function dailyReportSports(Request $request)
    {
        $user    = Auth::user();
        $from    = $this->parseDate($request->query('from'), now()->startOfDay());
        $to      = $this->parseDate($request->query('to'), now()->endOfDay());
        $childId = $request->query('id');

        $child = User::where('id', $childId)->where('parent_id', $user->id)->firstOrFail();

        $sportTotals = BookDetail::where('user_id', $childId)
            ->where('parent_id', $user->id)
            ->whereBetween('report_date', [$from->toDateString(), $to->toDateString()])
            ->selectRaw('sport_name, SUM(amount) as total_amount')
            ->groupBy('sport_name')
            ->get();

        return view('management.partials.daily-pl-sports', [
            'username'    => $child->username,
            'userId'      => $child->id,
            'sportTotals' => $sportTotals,
        ]);
    }

    private function dailyReportMarkets(Request $request)
    {
        $user      = Auth::user();
        $from      = $this->parseDate($request->query('from'), now()->startOfDay());
        $to        = $this->parseDate($request->query('to'), now()->endOfDay());
        $childId   = $request->query('id');
        $sportName = $request->query('id2');

        $marketDetails = BookDetail::where('user_id', $childId)
            ->where('parent_id', $user->id)
            ->where('sport_name', $sportName)
            ->whereBetween('report_date', [$from->toDateString(), $to->toDateString()])
            ->get();

        return view('management.partials.daily-pl-markets', [
            'sportName'     => $sportName,
            'marketDetails' => $marketDetails,
        ]);
    }

    private function dailyPlData(Request $request)
    {
        $user = Auth::user();
        $from = $this->parseDate($request->query('from'), now()->startOfDay());
        $to   = $this->parseDate($request->query('to'), now()->endOfDay());

        $children = User::where('parent_id', $user->id)->get();

        $amounts = BookDetail::where('parent_id', $user->id)
            ->whereBetween('report_date', [$from->toDateString(), $to->toDateString()])
            ->selectRaw('user_id, SUM(amount) as total_amount')
            ->groupBy('user_id')
            ->pluck('total_amount', 'user_id');

        $results = [];
        foreach ($children as $child) {
            $results[] = [
                'id'     => $child->id,
                'name'   => $child->username,
                'amount' => round((float) $amounts->get($child->id, 0), 2),
            ];
        }

        $positives = array_values(array_filter($results, fn($r) => $r['amount'] >= 0));
        $negatives = array_values(array_filter($results, fn($r) => $r['amount'] < 0));

        return response()->json([
            'positives'     => $positives,
            'negatives'     => $negatives,
            'totalPositive' => round(array_sum(array_column($positives, 'amount')), 2),
            'totalNegative' => round(array_sum(array_column($negatives, 'amount')), 2),
        ]);
    }

    private function dailyPlSports(Request $request)
    {
        $user    = Auth::user();
        $from    = $this->parseDate($request->query('from'), now()->startOfDay());
        $to      = $this->parseDate($request->query('to'), now()->endOfDay());
        $childId = $request->query('id');

        $child = User::where('id', $childId)->where('parent_id', $user->id)->firstOrFail();

        $sportTotals = BookDetail::where('user_id', $childId)
            ->where('parent_id', $user->id)
            ->whereBetween('report_date', [$from->toDateString(), $to->toDateString()])
            ->selectRaw('sport_name, SUM(amount) as total_amount')
            ->groupBy('sport_name')
            ->get();

        return view('management.partials.daily-pl-sports', [
            'username'    => $child->username,
            'userId'      => $child->id,
            'sportTotals' => $sportTotals,
        ]);
    }

    private function dailyPlMarkets(Request $request)
    {
        $user      = Auth::user();
        $from      = $this->parseDate($request->query('from'), now()->startOfDay());
        $to        = $this->parseDate($request->query('to'), now()->endOfDay());
        $childId   = $request->query('id');
        $sportName = $request->query('id2');

        $marketDetails = BookDetail::where('user_id', $childId)
            ->where('parent_id', $user->id)
            ->where('sport_name', $sportName)
            ->whereBetween('report_date', [$from->toDateString(), $to->toDateString()])
            ->get();

        return view('management.partials.daily-pl-markets', [
            'sportName'     => $sportName,
            'marketDetails' => $marketDetails,
        ]);
    }

    private function detail2Sports(Request $request)
    {
        $user = Auth::user();
        $from = $this->parseDate($request->query('from'), now()->startOfDay());
        $to = $this->parseDate($request->query('to'), now()->endOfDay());

        $sportTotals = BookDetail::where('parent_id', $user->id)
            ->whereBetween('report_date', [$from->toDateString(), $to->toDateString()])
            ->selectRaw('sport_name, SUM(amount) as total_amount')
            ->groupBy('sport_name')
            ->get();

        $total = $sportTotals->sum('total_amount');

        return view('management.partials.detail2-sports', [
            'username' => $user->username,
            'sportTotals' => $sportTotals,
            'total' => round($total, 2),
        ]);
    }

    private function detail2Markets(Request $request)
    {
        $user = Auth::user();
        $from = $this->parseDate($request->query('from'), now()->startOfDay());
        $to = $this->parseDate($request->query('to'), now()->endOfDay());
        $sportName = $request->query('id');

        $events = BookDetail::where('parent_id', $user->id)
            ->where('sport_name', $sportName)
            ->whereBetween('report_date', [$from->toDateString(), $to->toDateString()])
            ->selectRaw('event_name, SUM(amount) as total_amount')
            ->groupBy('event_name')
            ->get();

        return view('management.partials.detail2-markets', [
            'sportName' => $sportName,
            'events' => $events,
        ]);
    }

    private function detail2MarketDetail(Request $request)
    {
        $user = Auth::user();
        $from = $this->parseDate($request->query('from'), now()->startOfDay());
        $to = $this->parseDate($request->query('to'), now()->endOfDay());
        $sportName = $request->query('id');
        $eventName = $request->query('id2');

        $marketDetails = BookDetail::where('parent_id', $user->id)
            ->where('sport_name', $sportName)
            ->where('event_name', $eventName)
            ->whereBetween('report_date', [$from->toDateString(), $to->toDateString()])
            ->get();

        return view('management.partials.detail2-market-detail', [
            'eventName' => $eventName,
            'marketDetails' => $marketDetails,
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
