@extends('layouts.master')

@section('title')
    ClassRoom | create lesson
@endsection

@section('stylelink')
    <link rel="stylesheet" href="{{ asset('css/pages/lesson/create.css') }}">
@endsection


@section('content')
    @include('components.header')
    <section id="add-classroom">
        <div class="container">
            <div class="shadow rounded p-4">
                <h1 class="text-primary">Create Lesson</h1>
                <p class="text-muted mb-4">Fill in your Lesson info.</p>
                <form action="{{ route('lesson.store', ['id' => $classroom->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- title --}}
                    <label for="title" class="my-2 my-2 text-capitalize"><span
                            class="text-secondary">*</span>title</label>
                    <input type="text"
                        class="form-control @error('title')
                                        is-invalid
                                    @enderror"
                        id="title" placeholder="Enter title" value="{{ old('title') }}" required autocomplete="off"
                        name="title">
                    <div class="invalid-feedback text-start">
                        @foreach ($errors->get('title') as $error)
                            {{ $error }} <br>
                        @endforeach
                    </div>
                    {{-- description --}}
                    <label for="description" class="my-2 text-capitalize"><span
                            class="text-secondary">*</span>description</label>
                    <textarea name="description" id="description" cols="10" rows="5"
                        class="form-control @error('description')
                                        is-invalid
                                    @enderror"
                        name="description" placeholder="Enter Description">{{ old('description') }}</textarea>
                    <div class="invalid-feedback text-start">
                        @foreach ($errors->get('description') as $error)
                            {{ $error }} <br>
                        @endforeach
                    </div>
                    {{-- file --}}
                    <label for="filename" class="my-2 text-capitalize"><span class="text-secondary">*</span>Lesson
                        file</label>
                    <input type="file"
                        class="form-control @error('filename')
                                        is-invalid
                                    @enderror"
                        id="filename" placeholder="Upload Your File" value="{{ old('filename') }}" required
                        autocomplete="off" name="filename">
                    <div class="invalid-feedback text-start">
                        @foreach ($errors->get('filename') as $error)
                            {{ $error }} <br>
                        @endforeach
                    </div>

                    <button class="btn btn-success mt-3">Create</button>
            </div>


            </form>
        </div>
        </div>
    </section>
@endsection
