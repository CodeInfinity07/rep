@extends('layouts.management')

@section('title', 'Users')

@section('content')
<div class="animated fadeIn">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>
                        <strong>{{ $viewingUser->username }}</strong> - Downline Users
                        @if ($viewingUser->id !== $currentUser->id && $parentUser)
                            <a href="/users?user_id={{ $parentUser->id }}" class="btn btn-sm btn-secondary float-right">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        @endif
                    </h5>
                </div>
                <div class="card-body" style="padding-bottom: 0;">
                    <div class="row col-12" style="overflow-x: auto;">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <th>Credit Balance</th>
                                    <th>Exposure</th>
                                    <th>Available Balance</th>
                                    <th>P/L</th>
                                    <th>Users</th>
                                </tr>
                                <tr>
                                    <th>0</th>
                                    <th>0</th>
                                    <th>0</th>
                                    <th>0</th>
                                    <th>{{ $users->count() }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <a href="/users/create" type="button" class="btn btn-sm btn-primary mb-3">
                        <i class="fa fa-user-o"></i>
                        <strong>New User</strong>
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Type</th>
                                        <th>Share (%)</th>
                                        <th>Credit Balance</th>
                                        <th>Exposure</th>
                                        <th>Available Balance</th>
                                        <th>P/L</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>
                                                @if($user->type !== 'bettor')
                                                    <a href="/users?user_id={{ $user->id }}">
                                                        <strong>{{ $user->username }}</strong>
                                                    </a>
                                                @else
                                                    <strong>{{ $user->username }}</strong>
                                                @endif
                                            </td>
                                            <td>{{ ucfirst($user->type === 'supermaster' ? 'SuperMaster' : $user->type) }}</td>
                                            <td>{{ number_format($user->downline_share, 2) }}</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>
                                                @if($user->is_active)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">No users found. Create your first downline user using the button above.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
