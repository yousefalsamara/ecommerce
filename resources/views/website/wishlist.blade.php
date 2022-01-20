@extends('layouts.website')

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{url('front')}}"> Home

                </a>/<a href="{{url('wishlist')}}">WishList

                </a></h6>
        </div>
    </div>


    <div class="container my-5">
        <div class="card shadow ">
            <div class="card-body">


                @if($wishlist->count() >0)


                    @foreach($wishlist as $item)
                        <div class="row product_data">

                            <div class="col-md-2 my-auto">
                                <img src="{{asset('/storage/storage/'.$item->products->image)}}" height="70px"
                                     width="70px" alt="image here">
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{$item->products->title}}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{$item->products->selling_price}}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                                @if ($item->products->qty >0)
                                    <h6>in stack</h6>
                                    {{--                                        <label for="Quantity">Quantity</label>--}}
                                    {{--                                        <div class="input-group text-center mb-3"  style="width:130px">--}}
                                    {{--                                            <button class="input-group-text decrement-btn">-</button>--}}
                                    {{--                                            <input type="text" name="quantity " value="1" class="form-control text-center qty-input">--}}
                                    {{--                                            <button class="input-group-text increment-btn">+</button>--}}

                                    {{--                                        </div>--}}

                                @else
                                    <h6>Out of Stack</h6>
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-primary me-3 addToCartBtn float-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-cart-dash-fill" viewBox="0 0 16 16">
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM6.5 7h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1 0-1z"/>
                                    </svg>
                                    Add to Cart
                                </button>
                            </div>


{{--                            <div class="col-md-2 my-auto">--}}
{{--                                <button class="btn btn-danger remove-wishlist-item">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
{{--                                         class="bi bi-trash-fill" viewBox="0 0 16 16">--}}
{{--                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>--}}
{{--                                    </svg>--}}
{{--                                    Remove--}}
{{--                                </button>--}}
{{--                            </div>--}}

                        </div>

                    @endforeach
            </div>


            @else
                <h4>There are no Products in your Wishlist</h4>
            @endif
        </div>
    </div>
    </div>
@endsection



