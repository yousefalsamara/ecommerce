

@extends('layouts.website')

@section('content')


<div class="container py-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">

                        <h5>You are Writing a review for {{$review->product->title}} </h5>
                        <form action="{{'/update-review'}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="review_id" value="{{$review->id}}">
                            <textarea class="form-control" name="user_review" rows="5" placeholder="writing a review">{{$review->user_review}}</textarea>
                            <button type="submit" class="btn bg-primary mt-3">Update Review</button>
                        </form>





                </div>
            </div>
        </div>
    </div>
</div>

@endsection
