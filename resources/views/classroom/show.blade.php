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
                <li><a class="active" href="{{ route('classroom.show', ['id' => $classroom->id]) }}">Overview</a></li>
                <li><a href="{{ route('lesson.index', ['id' => $classroom->id]) }}">Lessons</a></li>
                <li><a href="{{ route('homework.index', ['id' => $classroom->id]) }}">Homeworks</a></li>
                <li><a href="{{ route('classroom.peoples', ['id' => $classroom->id]) }}">Peoples</a></li>
            </ul>
        </div>

        <div class="classroom container">
            <div class="classroom-header">
                <img src="/assets/classroomImages/{{ $classroom->background_image }}.jpg" alt="Classroom Background Image">
                <div class="class-info">
                    <h1>{{ $classroom->name }}</h1>
                    <p>{{ $classroom->subject }}</p>
                </div>
                @if ($classroom->IsTeacher(auth()->id()))
                    <div class="classroom-code-container">
                        <p>Class Code: {{ $classroom->secret_code->code }}</p>
                        <form action="{{ route('secretcode.regenerate', ['id' => $classroom->secret_code->id]) }}"
                            method="POST">
                            @csrf
                            @method('put')
                            <button>Regenerate</button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="classroom-details">
                <h1 class="classroom-name text-secondary">{{ $classroom->name }}</h1>
                <p class="classroom-teacher">Teacher: {{ $classroom->TeacherName() }}</p>
                <p class="classroom-subject">Subject: {{ $classroom->subject }}</p>
                <p class="classroom-description">{{ $classroom->description }}</p>
            </div>


        </div>

    </section>
@endsection
