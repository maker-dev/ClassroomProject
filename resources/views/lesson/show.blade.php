@extends('layouts.master')

@section('title')
    ClassRoom | {{ $classroom->name }}
@endsection

@section('stylelink')
    <link rel="stylesheet" href="{{ asset('css/pages/classroom/show.css') }}">
@endsection
@section('content')
    @include('components.header')
    <section>
        <div class="classroom-navbar">
            <ul>
                <li><a href="{{ route('classroom.show', ['id' => $classroom->id]) }}">Home</a></li>
                <li><a class="active" href="{{ route('classroom.lessons', ['id' => $classroom->id]) }}">Lessons</a></li>
                <li><a href="#">Homework</a></li>
                <li><a href="#">Peoples</a></li>
            </ul>
        </div>
        <s
@endsection