@extends('layouts.master')

@section('title')
    ClassRoom | {{ $classroom->name }}
@endsection

@section('stylelink')
    <link rel="stylesheet" href="{{ asset('css/pages/assignment/index.css') }}">
@endsection

@section('content')
    @include('components.header')
    <div class="classroom-navbar">
        <ul>
            <li><a href="{{ route('classroom.show', ['id' => $classroom->id]) }}">Overview</a></li>
            <li><a href="{{ route('lesson.index', ['id' => $classroom->id]) }}">Lessons</a></li>
            <li><a class="active" href="{{ route('homework.index', ['id' => $classroom->id]) }}">Homeworks</a></li>
            <li><a href="{{ route('classroom.peoples', ['id' => $classroom->id]) }}">Peoples</a></li>
        </ul>
    </div>
    <div class="container">
        @if ($classroom->IsTeacher(auth()->id()))
            <div class="text-end mb-3">
                <a href="{{ route('homework.create', ['id' => $classroom->id]) }}" class="btn btn-success">Add
                    Assignment</a>
            </div>
        @endif

        <div class="content">
            <div class="posts">
                <ul class="post-list">
                    @foreach ($assignments as $assignment)
                        <li class="post shadow rounded">
                            <h2 class="text-primary">{{ $assignment->title }}</h2>
                            <p class="text-secondary">{{ $assignment->description }}</p>
                            <p class="deadline">Deadline:
                                {{ date('F d, Y', strtotime($assignment->deadline)) }}</p>
                            <div class="d-flex justify-content-between flex-wrap">
                                <p class="date">Posted on
                                    {{ date('F d, Y', strtotime($assignment->created_at)) }}</p>
                                <form action="{{ route('homework.download', ['id' => $assignment->id]) }}" method="POST">
                                    @csrf

                                    @if (!$classroom->IsTeacher(auth()->id()))
                                        @if (!$assignment->AssignmentResolved($assignment->id) && $assignment->deadline >= now())
                                            <a href="{{ route('homework.show', ['classroom_id' => $classroom->id, 'assignment_id' => $assignment->id]) }}"
                                                class="btn btn-warning">More</a>
                                        @elseif ($assignment->AssignmentResolved($assignment->id))
                                            <i class="fa-solid fa-check text-success mx-2 h3"></i>
                                        @elseif($assignment->deadline <= now())
                                            <i class="fa-solid fa-ban mx-2 h3 text-danger"></i>
                                        @endif
                                    @else   
                                        <a class="btn btn-primary" href="{{route('homework.viewwork', ['classroom_id' => $classroom->id, 'assignment_id' => $assignment->id])}}">Show Works</a>
                                    @endif
                                    <button class="btn btn-info">Download</button>
                                </form>
                                
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="container mt-2">
            {{ $assignments->links() }}
        </div>
    @endsection