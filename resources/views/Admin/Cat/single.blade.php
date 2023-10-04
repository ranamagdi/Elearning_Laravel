@extends('Admin.layout')
@section('content')
    <div class="container mt-5 p-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>Category {{ $categories->name}}</h3>
            <a class="btn btn-dark" href="{{route('admin.cat')}}">Back</a>
        </div>
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>



                    </tr>
                </thead>
                <tbody>

                        <tr>
                            <th scope="row" >{{ $categories->id}}</th>
                            <th scope="row" >{{ $categories->name}}</th>

                        </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
