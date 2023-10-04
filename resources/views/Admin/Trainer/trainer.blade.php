@extends('Admin.layout')
@section('content')
    <div class="container mt-5 p-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>Trainers</h3>
            <a class="btn btn-primary" href="{{route('admin.trainer.create')}}">Add New</a>
        </div>
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Sepcailization</th>
                        <th scope="col">Actions</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($trainers as $t)
                        <tr>
                            <th scope="row" >{{ $t->id}}</th>
                            <th scope="row" >{{ $t->name}}</th>
                            <th scope="row" ><img src="{{asset('Uploads/Trainers/'.$t->img)}}" style="height:50px"></th>

                            <th scope="row" >
                                @if ($t->phone!=null)
                                {{ $t->phone}}
                                @else
                                Not exist
                                @endif

                            </th>


                            <th scope="row" >{{ $t->spec}}</th>
                            <th scope="row"  class="d-flex">
                                <a href="{{route('admin.trainer.single',$t->id)}}" class="btn btn-success mx-2 p-2">Show</a>

                                <a class="btn btn-info mx-2 p-2" href="{{route('admin.trainer.edit',$t->id)}}">Edit</a>
                                <a class="btn btn-danger mx-2 p-2" href="{{route('admin.trainer.delete',$t->id)}}">Delete</a>

                            </th>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
