

@extends('layouts.website')

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{url('front')}}"> Home

                </a>/<a href="{{url('cart')}}">Cart

                </a></h6>
        </div>
    </div>
<div class="container mt-5">
    <form action="{{url('place-order')}}" method="POST">
        {{csrf_field()}}
    <div class="row">
        <div class="col-md-7">
            <div class="card">

                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for=""> First Name</label>
                            <input type="text" class="form-control firstname" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" name="fname" placeholder="Enter first Name">
                         <span id="fname_error"  class=" text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for=""> Last Name</label>
                            <input type="text" class="form-control lastname" value="{{\Illuminate\Support\Facades\Auth::user()->lname}}" name="lname" placeholder="Enter last Name">
                            <span id="lname_error"  class=" text-danger"></span>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" name="email" placeholder="Enter Email">
                            <span id="email_error"  class=" text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for=""> Phone Number</label>
                            <input type="text" class="form-control phone" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}" name="phone" placeholder="Enter phone Number">
                            <span id="phone_error"  class=" text-danger"></span>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for=""> Address 1</label>
                            <input type="text" class="form-control address1" value="{{\Illuminate\Support\Facades\Auth::user()->address1}}" name="address1" placeholder="Enter Address 1">
                            <span id="address1_error"  class=" text-danger"></span>
                        </div>


                        <div class="col-md-6 mt-3">
                            <label for=""> Address 2</label>
                            <input type="text" class="form-control address2" value="{{\Illuminate\Support\Facades\Auth::user()->address2}}" name="address2" placeholder="Enter Address 2">
                            <span id="address2_error"  class=" text-danger"></span>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for=""> City</label>
                            <input type="text" class="form-control city" value="{{\Illuminate\Support\Facades\Auth::user()->city}}"  name="city" placeholder="Enter City">
                            <span id="city_error"  class=" text-danger"></span>
                        </div>


                        <div class="col-md-6 mt-3">
                            <label for=""> state</label>
                            <input type="text" class="form-control state" value="{{\Illuminate\Support\Facades\Auth::user()->state}}" name="state" placeholder="Enter state">
                            <span id="state_error"  class=" text-danger"></span>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for=""> Country</label>
                            <input type="text" class="form-control country" value="{{\Illuminate\Support\Facades\Auth::user()->country}}" name="country" placeholder="Enter Country">
                            <span id="country_error"  class=" text-danger"></span>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for=""> Pin Code</label>
                            <input type="text" class="form-control pincode" value="{{\Illuminate\Support\Facades\Auth::user()->pincode}}" name="pincode" placeholder="Enter Pin Code">
                            <span id="pincode_error"  class=" text-danger"></span>
                        </div>



                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-5">
            <div class="card">

                <div class="card-body">
                   <h6> Order Details </h6>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>QTY</th>
                            <th>price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartitems as $item)
                            <tr>
                                <td>{{$item->products->title}}</td>
                                <td>{{$item->prod_qty}}</td>
                                <td>{{$item->products->selling_price}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <input type="hidden" name="payment_mode"  value="COD">
                    <button type="submit" class="btn btn-primary   float-end">Place Order</button>
                    <br>
                    <br>

                    <button type="button" class="btn btn-dark  float-end razorpay_btn"> pay with Razorpay </button>


                </div>
            </div>

        </div>

    </div>
    </form>
</div>
@endsection

@section('script')

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    @endsection