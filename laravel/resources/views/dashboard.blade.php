@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>Dashboard</h2>
    <p>Hello, {{ auth()->user()->name }}</p>
@endsection
