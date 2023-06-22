@extends('layouts.master')

@section('title')
    ClassRoom | create classroom
@endsection

@section('stylelink')
    <link rel="stylesheet" href="{{ asset('css/pages/classroom/create.css') }}">
@endsection

@section('scriptlink')
    <script src="{{ asset('js/pages/classroom/create.js') }}"></script>
@endsection

@section('content')
    @include('components.header')
    <section id="add-classroom">
        <div class="container">
            <div class="shadow rounded p-4">
                <h1 class="text-primary">Create Classroom</h1>
                <p class="text-muted mb-4">Fill in your classroom info.</p>
                <form action="{{ route('classroom.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- name --}}
                    <label for="name" class="my-2 my-2 text-capitalize"><span
                            class="text-secondary">*</span>Name</label>
                    <input type="text"
                        class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                        id="name" placeholder="Enter Name" value="{{ old('name') }}" required autocomplete="off"
                        name="name">
                    <div class="invalid-feedback text-start">
                        @foreach ($errors->get('name') as $error)
                            {{ $error }} <br>
                        @endforeach
                    </div>
                    {{-- subject --}}
                    <label for="subject" class="my-2 my-2 text-capitalize"><span
                            class="text-secondary">*</span>subject</label>
                    <input type="text"
                        class="form-control @error('subject')
                                        is-invalid
                                    @enderror"
                        id="subject" placeholder="Enter subject" value="{{ old('subject') }}" required autocomplete="off"
                        name="subject">
                    <div class="invalid-feedback text-start">
                        @foreach ($errors->get('subject') as $error)
                            {{ $error }} <br>
                        @endforeach
                    </div>
                    {{-- description --}}
                    <label for="subject" class="my-2 text-capitalize"><span
                            class="text-secondary">*</span>description</label>
                    <textarea name="description" id="description" cols="10" rows="5"
                        class="form-control @error('subject')
                                        is-invalid
                                    @enderror"
                        name="description" placeholder="Enter Description">{{ old('description') }}</textarea>
                    <div class="invalid-feedback text-start">
                        @foreach ($errors->get('description') as $error)
                            {{ $error }} <br>
                        @endforeach
                    </div>
                    {{-- cover image --}}
                    <label for="cover_image" class="my-2 text-capitalize">Cover
                        Image</label>
                    <div class="custom__image-container">
                        <label id="add-img-label" for="add-single-img">+</label>
                        <input name="cover_image" hidden type="file" id="add-single-img" accept="image/jpeg"
                            name="cover_image" />
                    </div>
                    <div class="my-invalid text-start">
                        @foreach ($errors->get('cover_image') as $error)
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
