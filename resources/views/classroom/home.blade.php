{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


@extends('layouts.master')

@section('title')
    ClassRoom | home
@endsection

@section('stylelink')
    <link rel="stylesheet" href="/css/pages/classroom/home.css" />
@endsection

@section('content')
    @include('components.header')
    <section id="classroom-cards" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow border rounded">
                        <img src="/assets/imagePlaceholder.png" class="card-img-top classroomImage" alt="classroom image">
                        <div class="card-body">
                            <h5 class="card-title text-capitalize ls-1">Card title</h5>
                            <p class="card-text text-secondary">User</p>
                            <a href="#" class="btn btn-primary">Enter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer id="classroomFooter">
        <div class="container">
            <p class="text-white">CopyRight © 2023, All Rights reserved</p>
            <div>
                <a class="btn btn-info me-2" href="#">Join</a>
                <a class="btn btn-success " href="#">Create</a>
            </div>
        </div>
    </footer>
@endsection
