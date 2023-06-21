@extends('layouts.master')

@section('title')
    ClassRoom | {{ $assignment->title }}
@endsection

@section('stylelink')
    <link rel="stylesheet" href="{{ asset('css/pages/assignment/show.css') }}">
@endsection


@section('content')
    @include('components.header')
    <section>
        <div class="container">
            <div class="shadow rounded p-4">
                <h1 class="text-primary">{{ $assignment->title }}</h1>
                <p class="text-muted mb-4">Upload You Work Before The Deadline
                    {{ date('F d, Y', strtotime($assignment->created_at)) }}</p>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

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

                    <button class="btn btn-success mt-3">Submit</button>
            </div>


            </form>
        </div>
    </section>
@endsection
