@extends('Admin.layout')
@section('content')
    <div class="container mt-5 p-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>Courses</h3>
            <a class="btn btn-primary" href="{{route('admin.course.create')}}">Add New</a>
        </div>
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <th scope="row" >{{ $course->id}}</th>
                            <th scope="row" >{{ $course->name}}</th>
                            <th scope="row" >${{ $course->price}}</th>
                            <th scope="row" ><img src="{{asset('Uploads/Courses/'.$course->img)}}" style="height:70px ;width:70px ; border-radius:50%"></th>
                            <th scope="row"  class="d-flex">
                                <a href="{{route('admin.course.single',$course->id)}}" class="btn btn-success mx-2 p-2">Show</a>

                                <a class="btn btn-info mx-2 p-2" href="{{route('admin.course.edit',$course->id)}}">Edit</a>
                                <a class="btn btn-danger mx-2 p-2" href="{{route('admin.course.delete',$course->id)}}">Delete</a>

                            </th>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center w-100 mb-5 mt-4">
                {!!$courses->render()!!}
             </div>
        </div>
    </div>
@endsection
