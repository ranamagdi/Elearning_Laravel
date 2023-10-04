@extends('Admin.layout')
@section('content')
    <div class="container mt-5 p-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>Add New Student</h3>
            <a class="btn btn-dark" href="{{route('admin.student')}}">Back</a>
        </div>
        @include('Admin.includes.errors')
    <form enctype="multipart/form-data" method="POST" action="{{route('admin.student.store')}}">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label" >Name</label>
      <input type="text" class="form-control" name="name" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Eamil</label>
        <input type="email" class="form-control" name="email" >
      </div>

    <button type="submit" class="btn btn-primary">Create</button>
  </form>


</div>
@endsection
