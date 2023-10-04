@extends('Admin.layout')
@section('content')
    <div class="container mt-5 p-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>Course {{ $courses->name}}</h3>
            <a class="btn btn-dark" href="{{route('admin.cat')}}">Back</a>
        </div>
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>


                    </tr>
                </thead>
                <tbody>

                        <tr>
                            <th scope="row" >{{ $courses->id}}</th>
                            <th scope="row" >{{ $courses->name}}</th>
                            <th scope="row" >${{ $courses->price}}</th>
                            <th scope="row" ><img src="{{asset('Uploads/Courses/'.$courses->img)}}" style="height:70px ;width:70px ; border-radius:50%"></th>

                        </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
