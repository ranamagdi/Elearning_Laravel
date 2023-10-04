@extends('Admin.layout')
@section('content')
    <div class="container mt-5 p-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>Students</h3>
            <a class="btn btn-primary" href="{{route('admin.student.create')}}">Add New</a>
        </div>
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Eamil</th>
                        <th scope="col">Actions</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($student as $s)
                        <tr>
                            <th scope="row" >{{ $s->id}}</th>
                            <th scope="row" >{{ $s->name}}</th>
                            <th scope="row" >{{ $s->email}}</th>
                            <th scope="row"  class="d-flex">
                                <a href="{{route('admin.student.single',$s->id)}}" class="btn btn-success mx-2 p-2">Show</a>

                                <a class="btn btn-info mx-2 p-2" href="{{route('admin.student.edit',$s->id)}}">Edit</a>
                                <a class="btn btn-danger mx-2 p-2" href="{{route('admin.student.delete',$s->id)}}">Delete</a>

                            </th>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
