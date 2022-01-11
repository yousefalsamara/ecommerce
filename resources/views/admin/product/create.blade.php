@extends('layouts.admin')

@section('content')
    <script src="https://cdn.tiny.cloud/1/0udsl69thsof4bjfsh5n0mr4mls9m5bp5gd6s8zgn14hwmxc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


    <div class="card">
        <h5 class="card-header">Add Product</h5>
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="form-group">

            <label  class="col-form-label">Title <span class="text-danger">*</span></label>
            <input id="title" type="text" name="title" placeholder="Enter title"   class="form-control">

        </div>

        <div class="form-group">
            <label  class="col-form-label">small Description<span class="text-danger">*</span></label>
            <input id="small_description" type="text" name="small_description" placeholder="small Description"   class="form-control">

        </div>

            <div class="form-group">
                <label  class="col-form-label">Description<span class="text-danger">*</span></label>
                <textarea id="description" type="text" name="description"  placeholder="Description" class="form-control"></textarea>

            </div>

            <div class="col-md-3 form-group">

                <label  class="col-form-label">original price <span class="text-danger">*</span></label>
                <input id="original_price" type="number" name="original_price" placeholder="Enter original price"   class="form-control">

            </div>




            <div class="col-md-3 form-group">

                <label  class="col-form-label">selling price <span class="text-danger">*</span></label>
                <input id="selling_price" type="number" name="selling_price" placeholder="Enter selling_price" class="form-control" >

            </div>

            <div class="col-lg-6 form-group">
            <select class="form-select" aria-label="Default select example" id="cate_id" name="cate_id">
                <option selected>Select Category</option>
               @foreach($category as $c)
                    <option value="{{$c->id}}">{{$c->title}}</option>
@endforeach
            </select>
            </div>

            <div class="row">
                <div class="col-lg-3 form-group">
                    <input type="number" name="tax" class="form-control" id="tax" placeholder="tax" >

                </div>

                <div class="col-lg-3 form-group">
                    <input type="number"  name="qty" class="form-control " id="qty" placeholder="Quantity" >


                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 form-group">
                    <label >status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-lg-3 form-group">
                    <label >trending</label>
                    <input type="checkbox" name="trending">
                </div>
            </div>

            <div class="form-group">

                <label  class="col-form-label">meta title <span class="text-danger">*</span></label>
                <input id="meta_title" type="text" name="meta_title" placeholder="Enter meta title"   class="form-control">

            </div>
            <div class="form-group">

                <label  class="col-form-label">meta keywords <span class="text-danger">*</span></label>
                <input id="meta_keywords" type="text" name="meta_keywords" placeholder="Enter meta keywords"   class="form-control">

            </div>
            <div class="form-group">

                <label  class="col-form-label">meta description <span class="text-danger">*</span></label>
                <input id="meta_description" type="text" name="meta_description" placeholder="Enter meta_description"   class="form-control">

            </div>


        <div class="col-md-12 mb">
            <input type="file" name="image" id="image"class="form-control">

        </div>
        <br>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>

        </div>

        </form>
    </div>



    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
@endsection


