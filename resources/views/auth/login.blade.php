{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


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
                    <div class="card border-0 shadow p-4 border-radius">
                        <div class="card-body text-center">
                            <a href="{{ route('landing') }}" class="backhome">
                                <img src="/assets/logo.png" alt="logo" />
                            </a>
                            <h1 class="form-title mb-4">sign in with a <br /> classroom account</h1>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Email Address"
                                        required name="email">
                                    <label for="email">Email Address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" placeholder="Password"
                                        required name="password">
                                    <label for="password">Password</label>
                                </div>
                                <div class="form-features">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                        <label class="form-check-label" for="remember_me">remember</label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="forgetpass-link">forgot password ?</a>
                                </div>
                                <div class="text-center my-4">
                                    <button class="btn btn-primary text-uppercase login-btn">Login</button>
                                </div>
                                <div class="form-footer">
                                    <span class="notice">
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
        </section>
    @endsection
