@extends('layouts.master')

@section('title')
    ClassRoom | Login
@endsection

@section('stylelink')
    <link rel="stylesheet" href="/css/pages/login.css" />
@endsection

@section('content')
    <main id='login' class='d-flex justify-content-center align-items-center'>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 m-auto">
                    <div class="card border-0 shadow p-4 border-radius my-4">
                        <div class="card-body text-center">
                            <a href="{{ route('landing') }}" class="backhome">
                                <img src="/assets/logo.png" alt="logo" />
                            </a>
                            <h1 class="form-title mb-5">Sign in with a <br /> classroom account</h1>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="email"
                                        class="form-control @error('email')
                                        is-invalid
                                    @enderror"
                                        id="email" placeholder="Email Address" required name="email"
                                        value="{{ old('email') }}" autocomplete="off">
                                    <div class="invalid-feedback text-start">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <label for="email">Email Address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password"
                                        class="form-control @error('password')
                                        is-invalid
                                    @enderror"
                                        id="password" placeholder="Password" required name="password"
                                        value="{{ old('password') }}" autocomplete="off">
                                    <div class="invalid-feedback text-start">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <label for="password">Password</label>
                                </div>
                                <div class="form-features">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember"
                                            @if (old('remember')) checked @endif>
                                        <label class="form-check-label" for="remember_me">remember me</label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="forgetpass-link">forgot password ?</a>
                                </div>
                                <div class="text-center my-4">
                                    <button class="btn btn-primary text-uppercase login-btn">Login</button>
                                </div>
                                <div class="form-footer">
                                    <span class="notice mb-1">
                                        you don't have a classroom account ?
                                    </span>
                                    <a href="{{ route('register') }}" class="createacc-link">create account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
