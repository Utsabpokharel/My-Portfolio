@extends('Backend.Layout.master')
@section('title', 'Add Services')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('service.index')}}">Services</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Add Services</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('service.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-2">Service Name
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="service_name" required placeholder="Enter service Service Name"
                                id="exampleInputEmail"
                                class="form-control   @error('service_name') is-invalid @enderror"
                                value="{{old('service_name','')}}" />
                            @error('service_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Service Image
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="file" name="thumbnail" required placeholder="Enter Service Image"
                                accept="image/*" id="image-file"
                                class="form-control   @error('thumbnail') is-invalid @enderror"
                                onchange="readURL(this);" value="{{old('thumbnail','')}}" />
                            <img src="{{asset('Backend/img/undraw_profile.svg')}}" alt="image" id="image-preview"
                                width="150px">
                            @error('thumbnail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Description
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <textarea type="password" name="description" required
                                placeholder="Enter Service Description" id="exampleInputText"
                                class="form-control  @error('description') is-invalid @enderror">{{old('description','')}}</textarea>
                            @error('about')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions p-3">
            <div class="row">
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-success m-r-20">Submit</button>
                    <a class="btn btn-secondary" href="{{route('service.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
@section('imageJS')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image-file").change(function(){
        readURL(this);
    });
</script>
@endsection
