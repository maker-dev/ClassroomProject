@extends('layouts.master')

@section('title')
    ClassRoom | {{$classroom->name}}
@endsection

@section('stylelink')
    <link rel="stylesheet" href="{{ asset('css/pages/classroom/show.css') }}">
@endsection
@section('content')
@include('components.header')

<section>
  <div class="classroom-navbar">
    <ul>
    <li><a class="active" href="{{ route('classroom.show', ['id' => $classroom->id])}}">Home</a></li>
      <li><a href="{{ route('classroom.lessons', ['id' => $classroom->id])}}">Lessons</a></li>
      <li><a href="{{ route('classroom.homeworks', ['id' => $classroom->id])}}">Homework</a></li>
      <li><a href="{{ route('classroom.tickets', ['id' => $classroom->id])}}">Tickets</a></li>
    </ul>
  </div>

  <div class="classroom">
    <div class="classroom-header">
      <img src="https://www.gstatic.com/classroom/themes/img_code.jpg" alt="Classroom Background Image">
      <div class="class-info">
        <h1>{{$classroom->name}}</h1>
        <p>{{$classroom->subject}} - {{$classroom->description}}</p>
      </div>
      <div class="classroom-code-container">
        <p>Class Code: {{$secretcode->code}}</p>
        <button>Regenerate</button>
      </div>
    </div>
    
    <div class="content">
      <div class="posts">
        <ul class="post-list">
          <li class="post">
            <h2>Post Title</h2>
            <p>Post content...</p>
            <p class="date">Posted on June 20, 2023</p>
          </li>
          <li class="post">
            <h2>Another Post Title</h2>
            <p>More post content...</p>
            <p class="date">Posted on June 19, 2023</p>
          </li>

        </ul>
      </div>
      
      <div class="homeworks">
        <div class="homeworks-container">
          <h2>Homeworks</h2>
          <div class="homework-item">
            <h3>Homework Title</h3>
            <p>Homework description...</p>
            <p class="due-date">Due Date: June 30, 2023</p>
          </div>
          <div class="homework-separator"></div>
          <div class="homework-item">
            <h3>Another Homework Title</h3>
            <p>Another homework description...</p>
            <p class="due-date">Due Date: July 5, 2023</p>
          </div>
        </div>
        <a class="view-more-link" href="{{ route('classroom.homeworks', ['id' => $classroom->id])}}">View More</a>
      </div>
    </div>
    
    <div class="add-button">
      <button>Add Post</button>
    </div>
</section>
