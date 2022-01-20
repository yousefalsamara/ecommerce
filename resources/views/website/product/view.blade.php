

@extends('layouts.website')

@section('content')
   <div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collection / {{$product->Category->title}} /{{$product->title}}</h6>
    </div>
   </div>
<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('/storage/storage/'.$product->image)}}" class=" w-100">
                </div>
                <div class="col-md-8">
                    <h2>
                        {{$product->title}}
                        @if($product->trending=='1')
                        <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                    </h2>

                    <hr>
                    <label class="me-3">Original Price:<s>Rs{{$product->original_price}}</s></label>
                    <label class="fw-bold">Selling Price:Rs{{$product->selling_price}}</label>
                    <p class="mt-3">

                        {!! $product->small_description !!}
                    </p>
                    <hr>
                    @if($product->qty > 0)
                        <label class="badge bg-success">In stock</label>
                    @else
                    <label class="badge bg-danger">Out of stock</label>
                    @endif
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" value="{{$product->id}}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3"  style="width:130px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity " value="1" class="form-control text-center qty-input">
                                    <button class="input-group-text increment-btn">+</button>

                                </div>
                            </div>
                            <div class="col-md-10">

                                <br>

                                @if($product->qty > 0)
                                    <label class="badge bg-success">In stock</label>
                                    <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to Cart <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-dash-fill" viewBox="0 0 16 16">
                                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM6.5 7h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1 0-1z"/>
                                        </svg></button>

                                @endif
                                <button type="button" class="btn btn-success me-3 addToWishlist float-start">Add to Wishlist <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                        <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                                    </svg></button>

                            </div>
                        </div>

                </div>
                <div class="col-md-12">
                    <hr>
                    <h3>Description</h3>
                    <p class="mt-3">
                        {!! $product->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection

