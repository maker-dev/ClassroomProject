@extends('layouts.master')

@section('title')
    ClassRoom | forgot-password
@endsection

@section('stylelink')
    <link rel="stylesheet" href="/css/pages/auth/forgot-password.css" />
@endsection

@section('content')
    <main id='forgot-password' class='d-flex justify-content-center align-items-center'>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 m-auto">
                    <div class="card border-0 shadow p-2 border-radius my-4">
                        <div class="card-body text-center">
                            <a href="{{ route('landing') }}" class="backhome">
                                <img src="/assets/logo.png" alt="logo" />
                            </a>
                            <h1 class="form-title mb-4">Forgot your password? No problem. Just let us know your email
                                address and we will email you a password reset link that will allow you to choose a new one.
                            </h1>
                            <x-auth-session-status :status="session('status')" />
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="email"
                                        class="form-control @error('email')
                                        is-invalid
                                    @enderror"
                                        id="email" placeholder="Email Address" required name="email"
                                        value="{{ old('email') }}" autocomplete="off">
                                    <div class="invalid-feedback text-start">
                                        @foreach ($errors->get('email') as $error)
                                            {{ $error }} <br>
                                        @endforeach
                                    </div>
                                    <label for="email">Email Address</label>
                                </div>
                                <div class="text-center my-2">
                                    <button class="btn btn-primary text-uppercase forgot-password-btn">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
