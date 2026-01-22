@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h2>Dashboard</h2>

    <p>
        Olá, {{ auth()->user()->name }}
    </p>

    @if (auth()->user()->user_type === 'admin')
        <p class="text-success">
            You have administrative privileges.
        </p>
    @endif

    @auth
        <p class="text-muted">
            You are logged in.
        </p>
    @endauth

    @guest
        <p>
            You are not authenticated.
        </p>
    @endguest

@endsection
