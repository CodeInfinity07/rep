<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LedgerEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LedgerController extends Controller
{
    public function show($id, Request $request)
    {
        $currentUser = Auth::user();
        
        if (!$currentUser) {
            return redirect('/login');
        }

        $user = User::find($id);
        
        if (!$user) {
            return redirect('/users')->with('error', 'User not found.');
        }
        
        if (!$this->isInDownline($currentUser, $user)) {
            return redirect('/users')->with('error', 'You do not have permission to view this user\'s ledger.');
        }

        $from = $request->input('from', Carbon::today()->format('Y-m-d'));
        $to = $request->input('to', Carbon::today()->format('Y-m-d'));

        $fromDateTime = Carbon::parse($from)->startOfDay();
        $toDateTime = Carbon::parse($to)->endOfDay();

        $openingBalance = $this->getOpeningBalance($user->id, $fromDateTime);

        $entries = LedgerEntry::where('user_id', $user->id)
            ->whereBetween('created_at', [$fromDateTime, $toDateTime])
            ->orderBy('created_at', 'asc')
            ->get();

        return view('management.ledger', compact('user', 'entries', 'openingBalance', 'from', 'to'));
    }

    private function getOpeningBalance($userId, $fromDate)
    {
        $lastEntry = LedgerEntry::where('user_id', $userId)
            ->where('created_at', '<', $fromDate)
            ->orderBy('created_at', 'desc')
            ->first();

        return $lastEntry ? $lastEntry->balance : 0;
    }

    private function isInDownline($parent, $user)
    {
        if ($parent->id === $user->id) {
            return true;
        }
        
        if ($user->parent_id === null) {
            return false;
        }
        
        if ($user->parent_id === $parent->id) {
            return true;
        }
        
        $userParent = User::find($user->parent_id);
        if (!$userParent) {
            return false;
        }
        
        return $this->isInDownline($parent, $userParent);
    }
}
