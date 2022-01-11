@extends('layouts.admin')

@section('content')

    <div class="col-md-2" style="float: right">

        <a href="{{ url('product/create')}}" type="button" class="btn btn-primary">add Product</a>
    </div>

    <br>
    <br>
    <br>
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Product table</h6>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Product name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">price</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">price</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">photo</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Edit</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Delete</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($product as $p)

                    <tr>
                        <td>{{$p->id }}</td>
                        <td>{{$p->title}}</td>
                        <td> {{\App\Models\Category::find($p->cate_id)->title}}</td>
                        <td>{{$p->status}}</td>
                        <td>{{$p->selling_price}}</td>
                        <td>{{$p->Category->title}}</td>

                        <td><img src="{{asset('/storage/storage/'.$p->image)}}" width="100px" height="100px" alt="Image">
                        </td>

                        <form method="get" action="{{route('product.edit',$p->id)}}">
                            <th>
                                <button type="submit" class="btn btn-dark">edit</button>
                            </th>
                        </form>
                        <form method="post" action="{{route('product.destroy',$p->id)}}">
                            @csrf
                            @method('DELETE')
                            <th>
                                <button class="btn btn-danger" type="submit">delete</button>
                            </th>
                        </form>


                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection