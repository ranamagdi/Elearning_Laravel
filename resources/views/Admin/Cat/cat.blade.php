@extends('Admin.layout')
@section('content')
    <div class="container mt-5 p-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>Categories</h3>
            <a class="btn btn-primary" href="{{route('admin.cat.create')}}">Add New</a>
        </div>
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cat)
                        <tr>
                            <th scope="row" >{{ $cat->id}}</th>
                            <th scope="row" >{{ $cat->name}}</th>
                            <th scope="row"  class="d-flex">
                                <a href="{{route('admin.cat.single',$cat->id)}}" class="btn btn-success mx-2 p-2">Show</a>

                                <a class="btn btn-info mx-2 p-2" href="{{route('admin.cat.edit',$cat->id)}}">Edit</a>
                                <a class="btn btn-danger mx-2 p-2" href="{{route('admin.cat.delete',$cat->id)}}">Delete</a>

                            </th>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
