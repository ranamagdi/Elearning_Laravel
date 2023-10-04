@extends('Admin.layout')
@section('content')
    <div class="container mt-5 p-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>Edit Category</h3>
            <a class="btn btn-dark" href="{{route('admin.cat')}}">Back</a>
        </div>
        @include('Admin.includes.errors')
    <form enctype="multipart/form-data" method="POST" action="{{route('admin.cat.update')}}">
    @csrf
    <input type="hidden" value="{{$categories->id}}" name="old_id">
    <div class="mb-3">
      <label  class="form-label " >Name</label>
      <input type="text" class="form-control" name="name" value="{{$categories->name}}">
    </div>

    <button type="submit" class="btn btn-primary">Edit</button>
  </form>


</div>
@endsection
