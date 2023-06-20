@extends('layouts.master')

@section('title')
    ClassRoom | home
@endsection

@section('stylelink')
    <link rel="stylesheet" href="/css/pages/classroom/home.css" />
@endsection

@section('content')
    @include('components.header')
    <section id="classroom-cards">
        <div class="container">
            <div class="row">
                @foreach ($classrooms as $classroom)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow border rounded my-2">
                            <img src="@if ($classroom->cover_image) /storage/cover_images/{{ $classroom->cover_image }} @else /assets/imagePlaceholder.png @endif"
                                class="card-img-top classroomImage" alt="classroom image">
                            <div class="card-body">
                                <h5 class="card-title text-capitalize ls-1 fw-500">{{ $classroom->name }}</h5>
                                <p class="card-text text-secondary">-{{ $classroom->subject }}</p>
                                <form action="{{ route('classroom.destroy', ['id' => $classroom->classroom_id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('classroom.show', ['id' => $classroom->classroom_id]) }}"
                                        class="btn btn-primary">Enter</a>
                                    @if ($classroom->IsTeacher(auth()->id()))
                                        <a href="{{ route('classroom.edit', ['id' => $classroom->classroom_id]) }}"
                                            class="btn btn-info">edit</a>
                                        <button class="btn btn-danger">Delete</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="container mt-2">
        {{ $classrooms->links() }}
    </div>
    <footer id="classroomFooter">
        <div class="container">
            <p class="text-white">CopyRight © 2023, All Rights reserved</p>
            <form action="{{ route('classroom.join') }}" method="POST">
                @csrf
                <a class="btn btn-success " href="{{ route('classroom.create') }}">Create</a>
                <input type="text" placeholder="Enter Code"
                    class="joinInput @error('secret_code')
                                        invalid
                                    @enderror"
                    name="secret_code" autocomplete="off" />
                <button class="btn btn-info me-2">Join</button>
            </form>
        </div>
    </footer>
@endsection
