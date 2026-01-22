@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                    <h3 class="card-title mb-3 text-center">
                        Register
                    </h3>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input id="name" type="text" name="name" class="form-control"
                                value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" class="form-control"
                                value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation">
                                Confirm Password
                            </label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                class="form-control" required>
                        </div>

                        <button class="btn btn-success w-100">
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
