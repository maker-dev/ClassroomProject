@extends('layouts.master')

@section('title')
    ClassRoom | Register
@endsection

@section('stylelink')
    <link rel="stylesheet" href="/css/pages/register.css" />
@endsection

@section('content')
    <main id='register' class='d-flex justify-content-center align-items-center'>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 m-auto">
                    <div class="card border-0 shadow p-4 border-radius my-4">
                        <div class="card-body text-center">
                            <a href="{{ route('landing') }}" class="backhome">
                                <img src="/assets/logo.png" alt="logo" />
                            </a>
                            <h1 class="form-title mb-5">Create a new <br /> classroom account</h1>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="text"
                                        class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                                        id="name" placeholder="Name" required name="name"
                                        value="{{ old('name') }}" autocomplete="off">
                                    <div class="invalid-feedback text-start">
                                        @foreach ($errors->get('name') as $error)
                                            {{ $error }} <br>
                                        @endforeach
                                    </div>
                                    <label for="name">Name</label>
                                </div>


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

                                <div class="form-floating mb-3">
                                    <input type="password"
                                        class="form-control @error('password_confirmation')
                                        is-invalid
                                    @enderror"
                                        id="password_confirmation" placeholder="Confirm Password" required
                                        name="password_confirmation" value="{{ old('password_confirmation') }}"
                                        autocomplete="off">
                                    <div class="invalid-feedback text-start">
                                        @foreach ($errors->get('password_confirmation') as $error)
                                            {{ $error }} <br>
                                        @endforeach
                                    </div>
                                    <label for="password_confirmation">Confirm Password</label>
                                </div>

                                <div class="text-center my-4">
                                    <button class="btn btn-primary text-uppercase register-btn">Register</button>
                                </div>
                                <div class="form-footer">
                                    <span class="notice mb-1">
                                        you already have a classroom account ?
                                    </span>
                                    <a href="{{ route('login') }}" class="createacc-link">login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
