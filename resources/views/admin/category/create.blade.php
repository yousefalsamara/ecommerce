@extends('layouts.admin')

@section('content')



    <div class="card">
        <h5 class="card-header">Add Category</h5>
        <form action="{{url('store_category')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="form-group">

            <label  class="col-form-label">Title <span class="text-danger">*</span></label>
            <input id="title" type="text" name="title" placeholder="Enter title"   class="form-control">

        </div>

{{--        <div class="form-group">--}}
{{--            <label  class="col-form-label">slug<span class="text-danger">*</span></label>--}}
{{--            <input id="slug" type="text" name="slug" placeholder="Enter slug"   class="form-control">--}}

{{--        </div>--}}

        <label >status</label>
        <input type="checkbox" name="status">
        <div class="col-md-12 mb">
            <input type="file" name="photo" class="form-control">

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


