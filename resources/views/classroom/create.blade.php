{{-- @extends('layouts.master')

@section('title')
    ClassRoom | Create classroom
@endsection

@section('stylelink')
    <link rel="stylesheet" href="{{ asset('css/pages/classroom/create.css') }}">
@endsection

@section('scriptlink')
    <script src="{{ asset('js/pages/classroom/create.js') }}"></script>
@endsection

@section('content')
    @include('components.header')
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Profile') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <section>
                            <div>
                                <h2 class="section-title">
                                    {{ __('Create classroom') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Fill in your classroom info.') }}
                                </p>
                            </div>

                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>

                            <form method="post" action="{{ route('classroom.store') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('post')

                                <div>
                                    <x-input-label class="label" for="name" :value="__('Name')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                        required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>

                                <div>
                                    <x-input-label class="label" for="subject" :value="__('Subject')" />
                                    <x-text-input id="subject" name="subject" type="text" class="mt-1 block w-full"
                                        required autocomplete="subject" />
                                    <x-input-error class="mt-2" :messages="$errors->get('subject')" />
                                </div>

                                <div>
                                    <x-input-label class="label" for="description" :value="__('Description')" />
                                    <x-text-input id="description" name="description" type="text"
                                        class="mt-1 block w-full" required autocomplete="description" />
                                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                </div>

                                <div>
                                    <x-input-label class="label" for="cover_image" :value="__('Cover image')" />
                                    <div class="custom__image-container">
                                        <label id="add-img-label" for="add-single-img">+</label>
                                        <input name="cover_image" hidden type="file" id="add-single-img"
                                            accept="image/jpeg" />
                                    </div>
                                </div>

                                <div class="flex items-center gap-4">
                                    <button class="save">{{ __('Save') }}</button>

                                    @if (session('status') === 'profile-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                    @endif
                                </div>

                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}


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
                    <label for="cover_image" class="my-2 text-capitalize"><span class="text-secondary">*</span>Cover
                        Image</label>
                    <div class="custom__image-container">
                        <label id="add-img-label" for="add-single-img">+</label>
                        <input name="cover_image" hidden type="file" id="add-single-img" accept="image/jpeg"
                            name="cover_image" />
                    </div>
                    <div class="invalid-feedback text-start">
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
