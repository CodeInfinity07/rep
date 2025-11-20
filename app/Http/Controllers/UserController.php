<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function create()
    {
        $currentUser = Auth::user();
        $allowedTypes = $currentUser ? $currentUser->getAllowedChildTypes() : [];
        
        return view('management.create-user', compact('allowedTypes'));
    }

    public function store(Request $request)
    {
        $currentUser = Auth::user();
        
        if (!$currentUser) {
            return redirect('/login')->with('error', 'You must be logged in to create users.');
        }

        $validator = Validator::make($request->all(), [
            'username' => 'required|string|min:6|max:30|unique:users,username|alpha_dash',
            'password' => 'required|string|min:8|max:30',
            'type' => 'required|in:admin,supermaster,master,bettor',
            'downline_share' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
            'phone' => 'nullable|string|max:20',
            'reference' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $type = $request->input('type');
        
        if (!$currentUser->canCreateUserOfType($type)) {
            return back()
                ->withErrors(['type' => 'You are not authorized to create users of this type.'])
                ->withInput();
        }

        $downlineShare = $request->input('downline_share', 0);
        
        if ($type === 'bettor') {
            $downlineShare = $currentUser->downline_share;
        } else {
            $parentShare = $currentUser->downline_share;
            if ($downlineShare >= $parentShare) {
                return back()
                    ->withErrors(['downline_share' => "Downline share must be less than your share ({$parentShare}%)."])
                    ->withInput();
            }
        }

        if (!preg_match('/^(?=.*[a-zA-Z])(?=.*[0-9])/', $request->input('password'))) {
            return back()
                ->withErrors(['password' => 'Password must contain both letters and numbers.'])
                ->withInput();
        }

        $user = User::create([
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'type' => $type,
            'parent_id' => $currentUser->id,
            'downline_share' => $downlineShare,
            'is_active' => $request->has('is_active') ? true : false,
            'phone' => $request->input('phone'),
            'reference' => $request->input('reference'),
            'notes' => $request->input('notes'),
        ]);

        return redirect('/users')->with('success', "User {$user->username} created successfully!");
    }

    public function index(Request $request)
    {
        $currentUser = Auth::user();
        
        if (!$currentUser) {
            return redirect('/login');
        }

        $viewingUserId = $request->query('user_id');
        $viewingUser = null;
        
        if ($viewingUserId) {
            $viewingUser = User::find($viewingUserId);
            
            if (!$viewingUser || !$this->isInDownline($currentUser, $viewingUser)) {
                return redirect('/users')->with('error', 'You do not have permission to view this user\'s downline.');
            }
        } else {
            $viewingUser = $currentUser;
        }

        $users = User::where('parent_id', $viewingUser->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $parentUser = null;
        if ($viewingUser->parent_id) {
            $parentUser = User::find($viewingUser->parent_id);
        }

        return view('management.users', compact('users', 'viewingUser', 'currentUser', 'parentUser'));
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
