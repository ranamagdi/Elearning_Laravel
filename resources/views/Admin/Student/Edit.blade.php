@extends('Admin.layout')
@section('content')
    <div class="container mt-5 p-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>Edit student</h3>
            <a class="btn btn-dark" href="{{route('admin.student')}}">Back</a>
        </div>
        @include('Admin.includes.errors')
    <form enctype="multipart/form-data" method="POST" action="{{route('admin.student.update')}}">
    @csrf
    <input type="hidden" value="{{$student->id}}" name="old_id">
    <div class="mb-3">
      <label  class="form-label " >Name</label>
      <input type="text" class="form-control" name="name" value="{{$student->name}}">
    </div>
    <div class="mb-3">
        <label  class="form-label " >Name</label>
        <input type="email" class="form-control" name="email" value="{{$student->email}}">
      </div>

    <button type="submit" class="btn btn-primary">Edit</button>
  </form>


</div>
@endsection
