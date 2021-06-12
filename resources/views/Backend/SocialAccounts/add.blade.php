@extends('Backend.Layout.master')
@section('title', 'Add Social Account')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('socialaccount.index')}}">Social Accounts</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li class="active">Add Social Account</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('socialaccount.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-2">Social Site
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="social_site" required placeholder="Enter Social Site Name"
                                id="exampleInputEmail" class="form-control   @error('social_site') is-invalid @enderror"
                                value="{{old('social_site','')}}" />
                            <span>
                                <i class="text-info ">Eg; Facebook,Twitter,etc</i>
                            </span>
                            @error('social_site')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Social Icon
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="file" name="icon" required placeholder="Enter Social icon" accept="image/*"
                                id="image-file" class="form-control   @error('icon') is-invalid @enderror"
                                onchange="readURL(this);" value="{{old('icon','')}}" />
                            <img src="{{asset('Backend/vendor/fontawesome-free/svgs/regular/image.svg')}}" alt="image"
                                id="image-preview" width="50px">
                            @error('icon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Account URL
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="url" name="url" required placeholder="Enter Your Social Account redirect url"
                                id="exampleInputEmail" class="form-control  @error('url') is-invalid @enderror"
                                value="{{old('url','')}}" />
                            <span>
                                <i class="text-info ">Eg;https://www.facebook.com/xyz123</i>
                            </span>
                            @error('url')
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
                    <a class="btn btn-secondary" href="{{route('socialaccount.index')}}">Cancel</a>
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
