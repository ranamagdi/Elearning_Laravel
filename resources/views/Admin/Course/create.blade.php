@extends('Admin.layout')
@section('content')
    <div class="container mt-5 p-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>Add New Course</h3>
            <a class="btn btn-dark" href="{{route('admin.course')}}">Back</a>
        </div>
        @include('Admin.includes.errors')
    <form enctype="multipart/form-data" method="POST" action="{{route('admin.course.store')}}">
    @csrf

    <div class="mb-3 form-group">
      <label for="exampleInputEmail1" class="form-label" >Name</label>
      <input type="text" class="form-control" name="name" >
    </div>
    <div class="mb-3 ">
        <label class="form-label" >Categories</label>
        <select name="cat_id" class="form-control">

            @foreach ($cats as $c)
            <option value="{{$c->id}}">{{$c->name}}</option>
            @endforeach

        </select>
      </div>
      <div class="mb-3" >
        <label class="form-label" >Trainers</label>
        <select name="trainer_id" class="form-control">
       
            @foreach ($trainers as $t)

            <option value="{{$t->id}}">{{$t->name}}</option>
            @endforeach

        </select>
      </div>
    <div class="mb-3 form-group">
        <label for="exampleInputEmail1" class="form-label" >Price</label>
        <input type="number" class="form-control" name="price" >
      </div>
      <div class="mb-3 form-group">
        <label for="exampleInputEmail1" class="form-label" >Small Description</label>
        <input type="text" class="form-control" name="small_desc" >
      </div>
      <div class="mb-3 form-group">
        <label for="exampleInputEmail1" class="form-label" >Description</label>
        <textarea class="form-control" name="desc" cols="30" rows="10"></textarea>

      </div>
      <div class="mb-3 form-group">
        <label for="exampleInputEmail1" class="form-label" >Image</label>
        <input type="file" class="form-control-file" name="img" >
      </div>

    <button type="submit" class="btn btn-primary">Create</button>
  </form>


</div>
@endsection
