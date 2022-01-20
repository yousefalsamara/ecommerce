@extends('layouts.website')

@section('content')


    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary ">
                        <h4>Show Order
                            <a href="{{url('my-orders')}}" class="btn btn-warning text-white float-end">Back</a>
                        </h4>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Shopping Details</h4>
                                <label for="">First Name</label>
                                <div class="border p-2">{{$orders->fname}}</div>

                                <label for="">last Name</label>
                                <div class="border p-2">{{$orders->lname}}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{$orders->email}}</div>
                                <label for="">Contact No.</label>
                                <div class="border p-2">{{$orders->phone}}</div>
                                <label for="">Address</label>
                                <div class="border p-2">{{$orders->address1}},<br>{{$orders->address2}},<br>{{$orders->city}},<br>{{$orders->state}},<br>{{$orders->country}}</div>

                                <label for="">Zip code</label>
                                <div class="border p-2">{{$orders->pincode}}</div>


                            </div>

                            <div class="col-md-6">
                             <h4>Order Details</h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($orders->orderitems as $item)
                                        <tr>

                                            <td>{{$item->products->title}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>{{$item->price}}</td>
                                            <td><img src="{{asset('/storage/storage/'.$item->products->image)}}" width="50px" alt="product image"></td>

                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                <h4>Grand Total:{{$orders->total_price}}</h4>
                            </div>
                        </div>


                    </div>


                </div>

            </div>
        </div>
    </div>
    </div>

@endsection

