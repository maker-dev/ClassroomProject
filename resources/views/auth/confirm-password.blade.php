@extends('layouts.master')

@section('title')
    ClassRoom | confirm-password
@endsection

@section('stylelink')
    <link rel="stylesheet" href="/css/pages/auth/confirm-password.css" />
@endsection

@section('content')
    <main id='confirm-password' class='d-flex justify-content-center align-items-center'>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 m-auto">
                    <div class="card border-0 shadow p-2 border-radius my-4">
                        <div class="card-body text-center">
                            <a href="{{ route('landing') }}" class="backhome">
                                <img src="/assets/logo.png" alt="logo" />
                            </a>
                            <h1 class="form-title mb-4">Please confirm your
                                password before continuing.
                            </h1>

                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="password"
                                        class="form-control @error('password')
                                        is-invalid
                                    @enderror"
                                        id="password" placeholder="Password" required name="password"
                                        value="{{ old('password') }}" autocomplete="off">
                                    <div class="invalid-feedback text-start">
                                        @foreach ($errors->get('password') as $error)
                                            {{ $error }} <br>
                                        @endforeach
                                    </div>
                                    <label for="password">Password</label>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary text-uppercase confirm-btn">Confirm</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
