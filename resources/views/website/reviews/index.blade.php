

@extends('layouts.website')

@section('content')


<div class="container py-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if($varified_purchase->count() > 0 )
                        <h5>You are Writing a review for {{$product->title}} </h5>
                        <form action="{{'/add-review'}}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <textarea class="form-control" name="user_review" rows="5" placeholder="writing a review"></textarea>
                            <button type="submit" class="btn bg-primary mt-3">Submit Review</button>
                        </form>


                        @else
                        <div class="alert alert-danger">
                            <h5>You are not eligible to review this product</h5>
                            <p>for the trusthworthiness of the reviews , only customers who purchased the product car write a review about the product</p>
                            <a href="{{url('front')}}" class="btn btn-primary">Go to home page</a>
                        </div>

                        @endif


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
