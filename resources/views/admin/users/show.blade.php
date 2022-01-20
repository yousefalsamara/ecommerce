@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">User Details
                            <a href="{{url('users')}}"  class="btn btn-dark float-end">Back</a>


                        </h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-4">
                                <label for="">Role</label>

                                <div class="p-2 border">{{$user->role_as =='0'?'User':'Admin'}}</div>
                            </div>

                            <div class="col-md-4">
                                <label for="">First Name</label>

                                <div class="p-2 border">{{$user->name}}</div>
                            </div>


                        <div class="col-md-4">
                            <label for="">Last Name</label>

                            <div class="p-2 border">{{$user->lname}}</div>
                        </div>

                        <div class="col-md-4">
                            <label for="">email</label>

                            <div class="p-2 border">{{$user->email}}</div>
                        </div>


                    <div class="col-md-4">
                        <label for="">Phone</label>

                        <div class="p-2 border">{{$user->phone}}</div>
                    </div>

                <div class="col-md-4">
                    <label for="">Address1</label>

                    <div class="p-2 border">{{$user->address1}}</div>
                </div>

                            <div class="col-md-4">
                                <label for="">Address2</label>

                                <div class="p-2 border">{{$user->address2}}</div>
                            </div>


                            <div class="col-md-4">
                                <label for="">City</label>

                                <div class="p-2 border">{{$user->city}}</div>
                            </div>

                            <div class="col-md-4">
                                <label for="">Country</label>

                                <div class="p-2 border">{{$user->country}}</div>
                            </div>



                            <div class="col-md-4">
                                <label for="">state</label>

                                <div class="p-2 border">{{$user->state}}</div>
                            </div>


                            <div class="col-md-4">
                                <label for="">PinCode</label>

                                <div class="p-2 border">{{$user->pincode}}</div>
                            </div>



            </div>


                    </div>

                    </div>


                </div>

            </div>
        </div>

    </div>


@endsection


