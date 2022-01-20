@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Registered Users


                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name.' '.$item->lname}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td> <a href="{{url('view-user/'.$item->id)}}" class="btn btn-primary">View

                                        </a></td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>

            </div>
        </div>

    </div>
    </div>

    </div>
@endsection