@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">New Order

                        <a href="{{url('order-history')}}" class="btn btn-dark float-end">Order History</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Order Data</th>
                                <th>Tracking Number</th>
                                <th>total price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($order as $item)
                                <tr>
                                    <td>{{date('d-m-y',strtotime($item->created_at))}}</td>
                                    <td>{{$item->tracking_no}}</td>
                                    <td>{{$item->total_price}}</td>
                                    <td>{{$item->status=='0'?'pending':'completed'}}</td>
                                    <td> <a href="{{url('admin/view-order/'.$item->id)}}" class="btn btn-primary">View

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