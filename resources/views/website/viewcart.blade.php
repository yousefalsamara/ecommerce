

@extends('layouts.website')

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{url('front')}}"> Home

                </a>/<a href="{{url('cart')}}">Cart

                </a></h6>
        </div>
    </div>


    <div class="container my-5">
        <div class="card shadow ">
            <div class="card-body">
                @if($cartitem->count() >0)
                @php $total=0 @endphp
                @foreach($cartitem as $item)
                <div class="row product_data">

                    <div class="col-md-2 my-auto">
                        <img src="{{asset('/storage/storage/'.$item->products->image)}}" height="70px" width="70px" alt="image here">
                    </div>
                    <div class="col-md-3 my-auto" >
                        <h6>{{$item->products->title}}</h6>
                    </div>
                    <div class="col-md-2 my-auto" >
                        <h6>{{$item->products->selling_price}}</h6>
                    </div>
                    <div class="col-md-3 my-auto">
                        <input type="hidden"  class="prod_id" value="{{$item->prod_id}}">
                        @if ($item->products->qty >= $item->prod_qty)
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width:130px">
                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                            <input type="text" name="quantity " value="{{$item->prod_qty}}" class="form-control text-center qty-input">
                            <button class="input-group-text changeQuantity increment-btn">+</button>

                        </div>
                            @php $total += $item->products->selling_price * $item->prod_qty @endphp
                            @else
                            <h6>Out of Stack</h6>
                            @endif
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-danger delete-cart-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>Remove</button>
                    </div>

                </div>

                    @endforeach
            </div>
            <div class="card-footer">
                <he>Total price: {{$total}}$
                <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">proceed to Checkout</a>
                </he>
            </div>

            @else
                <div class="card-body text-center">
                    <h2>Your Cart is empty</h2>
                    <a href="{{url('category')}}" class="btn btn-outline-primary">Continue Shopping</a>
                </div>
                @endif
        </div>
    </div>
    @endsection



