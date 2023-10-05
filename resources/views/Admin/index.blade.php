@extends('Admin.layout')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between " style="margin-top: 12rem">
      <div style="background-color: #C4C1A4 ;padding:40px;" class="text-center">
        <h2 class="h4 text-light mb-5">Categories</h2>
        <a class="btn btn-light " aria-current="page" href="{{route('admin.cat')}}">Show All</a>
      </div>
      <div style="background-color: #9E9FA5 ;padding:40px;" class="text-center">
        <h2 class="h4 text-light mb-5">Students</h2>
        <a class="btn btn-light " aria-current="page" href="{{route('admin.student')}}">Show All</a>
      </div>
      <div style="background-color:#7EAA92; padding:40px;" class="text-center" >
        <h2 class="h4 text-light mb-5">Trainers</h2>
        <a class="btn btn-light " aria-current="page" href="{{route('admin.trainer')}}">Show All</a>
      </div>
      <div style="background-color:#9ED2BE; padding:40px;" class="text-center" >
        <h2 class="h4 text-light mb-5">Courses</h2>
        <a class="btn btn-light " aria-current="page" href="{{route('admin.course')}}">Show All</a>
      </div>
    </div>
  </div>
@endsection
