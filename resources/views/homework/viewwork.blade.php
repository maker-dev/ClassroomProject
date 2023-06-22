@extends('layouts.master')

@section('title')
ClassRoom | {{ $classroom->name }}
@endsection

@section('stylelink')
<link rel="stylesheet" href="{{ asset('css/pages/assignment/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/homework/viewwork.css') }}">
@endsection

@section('content')
@include('components.header')
<section>
    <div class="container">
        <h1 class="text-info">Student Submissions</h1>
        @foreach ($resolvers as $resolver)
        <div class="card">
            <h3>{{$resolver->user->name}}</h3>
            <p>Date Turned: {{ date('F d, Y', strtotime($resolver->created_at)) }}</p>
            <form action="{{ route('homework.downloadwork', ['id' => $resolver->id]) }}" method="POST">
                @csrf
                <button class="btn btn-info">Download</button>
            </form>
            
        </div>
        @endforeach
    </div>
    </section>
    @endsection