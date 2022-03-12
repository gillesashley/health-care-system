@extends('layouts.app')

@section('navbar')
@endsection

@section('sidenav')
@endsection

@section('content')
<div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form action="{{ route('login') }}" class="form-signin" method="POST">
                        @csrf
                        <div class="account-logo">
                            <a href="demo.html"><img src="{{ asset('frontend/img/logo-dark.png') }}" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" type="text" autofocus="" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus">
                            
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback " role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
