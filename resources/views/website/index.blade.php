

@extends('layouts.website')

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img width="100" height="800" src="{{asset('/storage/storage/portfolio-5.jpg')}}
                        " class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img width="100" height="800" src="{{asset('/storage/storage/portfolio-7.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img width="100" height="800" src="{{asset('/storage/storage/portfolio-3.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<br>
    <div class="'py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                <div class="owl-carousel featured-carousel owl-theme">

                    @foreach($product as $p)
                        <div class="item">

                            <div class="card">
                                <img src="{{asset('/storage/storage/'.$p->image)}}" class=" w-100" alt="product image">
                                <div class="card-body">
                                    <h5>{{$p->title}}</h5>
                                    <span class="float-start">{{$p->selling_price}}</span>
                                    <span class="float-end"><s>{{$p->original_price}}</s></span>
                                </div>
                            </div>

                        </div>
                    @endforeach


                </div>

            </div>
        </div>
    </div>




    <div class="'py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Category</h2>
                <div class="owl-carousel feature-carousel owl-theme">

                    @foreach($trending_category as $c)
                        <div class="item">
                            <a href="{{url('category/'.$c->slug)}}">
                            <div class="card">
                                <img src="{{asset('/storage/storage/'.$c->photo)}}" alt="product image">
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

    <script>
        $('.feature-carousel').owlCarousel({
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
                    items:3
                }
            }
        })
    </script>

    @endsection