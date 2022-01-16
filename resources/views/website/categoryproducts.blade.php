


@extends('layouts.website')

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Collection /{{$category->title}} </h6>
        </div>
    </div>


    <div class="'py-5">
        <div class="container">
            <div class="row">
                <h2>{{$category->title}}</h2>


                    @foreach($products as $p)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                             <a href="{{url('category/'.$category->slug.'/'.$p->slug)}}">
                                <img src="{{asset('/storage/storage/'.$p->image)}}" class=" w-100" alt="product image">
                                <div class="card-body">
                                    <h5>{{$p->title}}</h5>
                                    <span class="float-start">{{$p->selling_price}}</span>
                                    <span class="float-end"><s>{{$p->original_price}}</s></span>
                                </div>
                             </a>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
@endsection