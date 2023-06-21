@extends('layouts.master')

@section('title')
    ClassRoom | create assignment
@endsection

@section('stylelink')
    <link rel="stylesheet" href="{{ asset('css/pages/lesson/create.css') }}">
@endsection


@section('content')
    @include('components.header')
    <section id="add-classroom">
        <div class="container">
            <div class="shadow rounded p-4">
                <h1 class="text-primary">Create Assignment</h1>
                <p class="text-muted mb-4">Fill in your Assignment info.</p>
                <form action="{{ route('homework.store', ['id' => $classroom->id]) }}" method="POST"
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
                    {{-- deadline --}}
                    <label for="deadline" class="my-2 text-capitalize"><span
                            class="text-secondary">*</span>deadline</label>
                    <input type="date" name="deadline" id="deadline"
                        class="form-control @error('deadline')
                                        is-invalid
                                    @enderror"
                        name="deadline" />
                    <div class="invalid-feedback text-start">
                        @foreach ($errors->get('deadline') as $error)
                            {{ $error }} <br>
                        @endforeach
                    </div>
                    {{-- file --}}
                    <label for="filename" class="my-2 text-capitalize"><span class="text-secondary">*</span>Assignment
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
