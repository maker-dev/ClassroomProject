@extends('layouts.master')

@section('title')
    ClassRoom | {{ $classroom->name }}
@endsection

@section('stylelink')
    <link rel="stylesheet" href="{{ asset('css/pages/classroom/peoples.css') }}">
@endsection
@section('content')
    @include('components.header')

    <section>
        <div class="classroom-navbar">
            <ul>
                <li><a href="{{ route('classroom.show', ['id' => $classroom->id]) }}">Overview</a></li>
                <li><a href="{{ route('lesson.index', ['id' => $classroom->id]) }}">Lessons</a></li>
                <li><a href="#">Homeworks</a></li>
                <li><a class="active" href="{{ route('classroom.peoples', ['id' => $classroom->id]) }}">Peoples</a></li>
            </ul>
        </div>

        <div class="container">
            <h2 class="text-primary mb-3">Teachers</h2>
            <div class="table-responsive">
                <table class="table bg-white rounded shadow-sm">
                    <thead>
                        <tr class='bg-primary text-white'>
                            <th scope="col">fullname</th>
                            <th scope="col">joined At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->name }}</td>
                                <td> {{ date('F d, Y', strtotime($teacher->Classroom($classroom->id)->created_at)) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h2 class="text-secondary mt-3">Students</h2>
            <div class="table-responsive">
                <table class="table bg-white rounded shadow-sm">
                    <thead>
                        <tr class='bg-secondary text-white'>
                            <th scope="col">fullname</th>
                            <th scope="col">joined At</th>
                            @if ($classroom->IsTeacher(auth()->id()))
                                <th scope="col">actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td> {{ date('F d, Y', strtotime($student->Classroom($classroom->id)->created_at)) }}
                                </td>
                                @if ($classroom->IsTeacher(auth()->id()))
                                    <td>
                                        <form
                                            action="{{ route('classroom.kick', ['classroom_id' => $classroom->id, 'user_id' => $student->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Kick</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
