@extends('layouts.master')

@section('title')
    ClassRoom | verify-email
@endsection

@section('stylelink')
    <link rel="stylesheet" href="/css/pages/auth/verify-email.css" />
@endsection

@section('content')
    <main id='verify-email' class='d-flex justify-content-center align-items-center'>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 m-auto">
                    <div class="card border-0 shadow p-2 border-radius my-4">
                        <div class="card-body text-center">
                            <a href="{{ route('landing') }}" class="backhome">
                                <img src="/assets/logo.png" alt="logo" />
                            </a>
                            <h1 class="form-title mb-4">Thanks for signing up! Before getting started, could you verify your
                                email address by clicking on the link we just emailed to you? If you didn't receive the
                                email, we will gladly send you another.
                            </h1>
                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-2 small text-success email-received text-start email-received">
                                    A new verification link has been sent to the email address you provided during
                                    registration.
                                </div>
                            @endif
                            <div class="d-flex justify-content-between flex-wrap">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button class="btn btn-info">Resend Verification Email</button>
                                </form>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn btn-danger">Log Out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
