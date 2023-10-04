@extends('Admin.layout')
@section('content')
    <div class="container mt-5 p-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>Add New Trainer</h3>
            <a class="btn btn-dark" href="{{route('admin.trainer')}}">Back</a>
        </div>
        @include('Admin.includes.errors')
    <form enctype="multipart/form-data" method="POST" action="{{route('admin.trainer.update')}}">
    @csrf
    <input type="hidden" value="{{$trainer->id}}" name="old_id">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label" >Name</label>
      <input type="text" class="form-control" name="name" value="{{$trainer->name}}" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Phone</label>
        <input type="tel" class="form-control" name="phone" value="{{$trainer->phone}}" >
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Sepcailization</label>
        <input type="text" class="form-control" name="spec" value="{{$trainer->spec}}" >
      </div>
      <img src="{{asset('Uploads/Trainers/'.$trainer->img)}}" style="height:50px">
      <div class="mb-3">

        <input type="file" class="form-control-file" name="img"  >
      </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>


</div>
@endsection
