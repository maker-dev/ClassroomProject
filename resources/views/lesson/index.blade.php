@extends('layouts.master')

@section('title')
    ClassRoom | {{ $classroom->name }}
@endsection

@section('stylelink')
    <link rel="stylesheet" href="{{ asset('css/pages/lesson/index.css') }}">
@endsection

@section('content')
    @include('components.header')
    <div class="classroom-navbar">
        <ul>
            <li><a href="{{ route('classroom.show', ['id' => $classroom->id]) }}">Overview</a></li>
            <li><a class="active" href="{{ route('lesson.index', ['id' => $classroom->id]) }}">Lessons</a></li>
            <li><a href="#">Homeworks</a></li>
            <li><a href="{{ route('classroom.peoples', ['id' => $classroom->id]) }}">Peoples</a></li>
        </ul>
    </div>
    <div class="container">
        @if ($classroom->IsTeacher(auth()->id()))
            <div class="text-end mb-3">
                <a href="{{ route('lesson.create', ['id' => $classroom->id]) }}" class="btn btn-success">Add Lesson</a>
            </div>
        @endif

        <div class="content">
            <div class="posts">
                <ul class="post-list">
                    @foreach ($lessons as $lesson)
                        <li class="post shadow rounded">
                            <h2 class="text-primary">{{ $lesson->title }}</h2>
                            <p class="text-secondary">{{ $lesson->description }}</p>
                            <div class="d-flex justify-content-between flex-wrap">
                                <p class="date">Posted on
                                    {{ date('F d, Y', strtotime($lesson->created_at)) }}</p>
                                <form action="{{ route('lesson.download', ['id' => $lesson->id]) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-info">Download</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="container mt-2">
            {{ $lessons->links() }}
        </div>
    @endsection
