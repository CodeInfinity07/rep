@extends('layouts.bettor')

@section('title', 'Dashboard | BETGURU')

@section('content')
<style>
    #page-preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        z-index: 99999;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: opacity 0.3s ease;
    }
    .preloader-spinner {
        width: 50px;
        height: 50px;
        border: 5px solid #333;
        border-top: 5px solid #4CAF50;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div id="page-preloader">
    <div class="preloader-spinner"></div>
</div>

@endsection
