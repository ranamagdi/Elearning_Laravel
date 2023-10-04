@extends('Admin.layout')
@section('content')
    <div class="container mt-5 p-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>Trainer {{$trainers->name}}</h3>
            <a class="btn btn-dark" href="{{route('admin.trainer')}}">Back</a>
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



                    </tr>
                </thead>
                <tbody>
                      <tr>
                            <th scope="row" >{{ $trainers->id}}</th>
                            <th scope="row" >{{$trainers->name}}</th>
                            <th scope="row" ><img src="{{asset('Uploads/Trainers/'.$trainers->img)}}" style="height:50px ; border-radius:50%"></th>

                            <th scope="row" >
                                @if ($trainers->phone!=null)
                                {{ $trainers->phone}}
                                @else
                                Not exist
                                @endif

                            </th>


                            <th scope="row" >{{ $trainers->spec}}</th>


                        </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
