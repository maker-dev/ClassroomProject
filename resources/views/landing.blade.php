@extends('layouts.master')
@section('title')
    ClassRoom
@endsection

@section('stylelink')
    <link rel="stylesheet" href="/css/pages/landing.css" />
@endsection


@section('content')
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <img src="/assets/heroImage.jpg" alt="hero image" class="heroImage" />
        <div class="container text-center title text-white">
            <h1 class="text-capitalize font-weight-bold mb-3">Welcome To ClassRoom</h1>
            <a href="{{ route('register') }}">
                Get Started
            </a>
        </div>
    </section>
@endsection
