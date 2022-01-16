

@extends('layouts.website')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All Categories</h2>
                <div class="row">
                @foreach($category as $c )
                        <div class="col-md-3 mb-3">
                            <a href="{{url('category/'.$c->slug)}}">
                        <div class="card">
                            <img src="{{asset('/storage/storage/'.$c->photo)}}" alt="Category image">
                            <div class="card-body">
                                <h5>{{$c->title}}</h5>
                            </div>
                        </div>
                            </a>
                </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

