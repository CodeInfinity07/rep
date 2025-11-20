<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CashCreditController extends Controller
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
        
        if ($currentUser->id === $user->id) {
            return redirect('/users')->with('error', 'You cannot manage your own cash/credit.');
        }
        
        if (!$this->isInDownline($currentUser, $user)) {
            return redirect('/users')->with('error', 'You do not have permission to manage this user.');
        }

        $tab = $request->query('tab', 'cash');
        
        return view('management.cash-credit', compact('user', 'tab'));
    }

    public function depositCash($id, Request $request)
    {
        $currentUser = Auth::user();
        
        if (!$currentUser) {
            return redirect('/login')->with('error', 'You must be logged in.');
        }

        $user = User::find($id);
        
        if (!$user) {
            return redirect('/users')->with('error', 'User not found.');
        }
        
        if ($currentUser->id === $user->id) {
            return redirect('/users')->with('error', 'You cannot manage your own cash/credit.');
        }
        
        if (!$this->isInDownline($currentUser, $user)) {
            return redirect('/users')->with('error', 'You do not have permission to manage this user.');
        }

        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $amount = $request->input('amount');

        DB::transaction(function () use ($user, $amount) {
            $user->cash += $amount;
            $user->balance += $amount;
            $user->save();
        });

        return redirect('/users/' . $user->id . '/cash-credit?tab=cash')
            ->with('success', 'Cash deposited successfully! Amount: ' . number_format($amount, 2) . ' ' . $user->currency);
    }

    public function withdrawCash($id, Request $request)
    {
        $currentUser = Auth::user();
        
        if (!$currentUser) {
            return redirect('/login')->with('error', 'You must be logged in.');
        }

        $user = User::find($id);
        
        if (!$user) {
            return redirect('/users')->with('error', 'User not found.');
        }
        
        if ($currentUser->id === $user->id) {
            return redirect('/users')->with('error', 'You cannot manage your own cash/credit.');
        }
        
        if (!$this->isInDownline($currentUser, $user)) {
            return redirect('/users')->with('error', 'You do not have permission to manage this user.');
        }

        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $amount = $request->input('amount');

        if ($amount > $user->cash) {
            return back()->with('error', 'Insufficient cash balance. Available: ' . number_format($user->cash, 2) . ' ' . $user->currency);
        }

        DB::transaction(function () use ($user, $amount) {
            $user->cash -= $amount;
            $user->balance -= $amount;
            $user->save();
        });

        return redirect('/users/' . $user->id . '/cash-credit?tab=cash')
            ->with('success', 'Cash withdrawn successfully! Amount: ' . number_format($amount, 2) . ' ' . $user->currency);
    }

    public function depositCredit($id, Request $request)
    {
        $currentUser = Auth::user();
        
        if (!$currentUser) {
            return redirect('/login')->with('error', 'You must be logged in.');
        }

        $user = User::find($id);
        
        if (!$user) {
            return redirect('/users')->with('error', 'User not found.');
        }
        
        if ($currentUser->id === $user->id) {
            return redirect('/users')->with('error', 'You cannot manage your own cash/credit.');
        }
        
        if (!$this->isInDownline($currentUser, $user)) {
            return redirect('/users')->with('error', 'You do not have permission to manage this user.');
        }

        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $amount = $request->input('amount');

        if ($currentUser->type !== 'owner') {
            if ($amount > $currentUser->credit_remaining) {
                return back()->with('error', 'Insufficient credit remaining. Available: ' . number_format($currentUser->credit_remaining, 2) . ' ' . $currentUser->currency);
            }
        }

        DB::transaction(function () use ($user, $amount, $currentUser) {
            $user->credit_received += $amount;
            $user->credit_remaining += $amount;
            $user->save();

            if ($currentUser->type !== 'owner') {
                $currentUser->credit_remaining -= $amount;
                $currentUser->save();
            }
        });

        return redirect('/users/' . $user->id . '/cash-credit?tab=credit')
            ->with('success', 'Credit given successfully! Amount: ' . number_format($amount, 2) . ' ' . $user->currency);
    }

    public function withdrawCredit($id, Request $request)
    {
        $currentUser = Auth::user();
        
        if (!$currentUser) {
            return redirect('/login')->with('error', 'You must be logged in.');
        }

        $user = User::find($id);
        
        if (!$user) {
            return redirect('/users')->with('error', 'User not found.');
        }
        
        if ($currentUser->id === $user->id) {
            return redirect('/users')->with('error', 'You cannot manage your own cash/credit.');
        }
        
        if (!$this->isInDownline($currentUser, $user)) {
            return redirect('/users')->with('error', 'You do not have permission to manage this user.');
        }

        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $amount = $request->input('amount');

        if ($amount > $user->credit_remaining) {
            return back()->with('error', 'Cannot take back more credit than available. Available: ' . number_format($user->credit_remaining, 2) . ' ' . $user->currency);
        }

        DB::transaction(function () use ($user, $amount, $currentUser) {
            $user->credit_received -= $amount;
            $user->credit_remaining -= $amount;
            $user->save();

            if ($currentUser->type !== 'owner') {
                $currentUser->credit_remaining += $amount;
                $currentUser->save();
            }
        });

        return redirect('/users/' . $user->id . '/cash-credit?tab=credit')
            ->with('success', 'Credit taken back successfully! Amount: ' . number_format($amount, 2) . ' ' . $user->currency);
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
