@extends('Admin.layout')
@section('content')
    <div class="container mt-5 p-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>Add New Category</h3>
            <a class="btn btn-dark" href="{{route('admin.cat')}}">Back</a>
        </div>
        @include('Admin.includes.errors')
    <form enctype="multipart/form-data" method="POST" action="{{route('admin.cat.store')}}">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label" >Name</label>
      <input type="text" class="form-control" name="name" >
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
  </form>


</div>
@endsection
