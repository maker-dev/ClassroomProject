@extends('layouts.master')

@section('title')
ClassRoom | Create classroom
@endsection

@section('stylelink')
<link rel="stylesheet" href="{{ asset('css/pages/classroom/create.css') }}">
@endsection

@section('scriptlink')
<script src="{{asset('js/pages/classroom/create.js')}}"></script>
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
                                {{ __("Fill in your classroom info.") }}
                            </p>
                        </div>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <x-input-label class="label" for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label class="label" for="subject" :value="__('Subject')" />
                                <x-text-input id="subject" name="subject" type="text" class="mt-1 block w-full" required autocomplete="subject" />
                                <x-input-error class="mt-2" :messages="$errors->get('subject')" />
                            </div>

                            <div>
                                <x-input-label class="label" for="description" :value="__('Description')" />
                                <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" required autocomplete="description" />
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>

                            <div>
                                <x-input-label class="label" for="cover_image" :value="__('Cover image')" />
                                <div class="custom__image-container">
                                    <label id="add-img-label" for="add-single-img">+</label>
                                    <input name="cover_image" hidden type="file" id="add-single-img" accept="image/jpeg" />
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <button class="save">{{ __('Save') }}</button>

                                @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </div>

                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection