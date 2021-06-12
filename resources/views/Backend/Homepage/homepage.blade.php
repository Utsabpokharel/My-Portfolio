@extends('Backend.Layout.master')
@section('title', 'Home')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="#">Home Page</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">My Home Page</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->
    {{-- Add --}}
    @if ($home == [])
    <form class="user" method="post" action="{{route('home.store')}}" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-2">Background Image
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="file" name="background_image" placeholder="Enter background_image"
                                accept="image/*" id="exampleInputUser"
                                class="form-control   @error('background_image') is-invalid @enderror"
                                onchange="readURL(this);" value="{{old('background_image','')}}" />
                            <img src="{{asset('Backend/img/undraw_profile.svg')}}" alt="image" id="image-preview"
                                width="150px">
                            @error('background_image')
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
                                placeholder="Enter Description of Home Page" id="exampleInputText"
                                class="form-control  @error('description') is-invalid @enderror">{{old('description','')}}</textarea>
                            @error('description')
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
                    <a class="btn btn-secondary" href="{{route('dashboard')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>
    @else
    <form class="user" method="post" action="{{route('home.update',$home->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-2">Background Image
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="file" name="background_image" placeholder="Enter background_image"
                                accept="image/*" id="exampleInputUser"
                                class="form-control   @error('background_image') is-invalid @enderror"
                                onchange="readURL(this);" value="{{old('background_image',$home->background_image)}}" />
                            <img src="{{asset('Uploads/Homepage/'.$home->background_image)}}" alt="image"
                                id="image-preview" width="150px">
                            @error('background_image')
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
                                placeholder="Enter Description of Home Page." id="exampleInputText"
                                class="form-control  @error('description') is-invalid @enderror">{{old('description',$home->description)}}</textarea>
                            @error('description')
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
                    <button type="submit" class="btn btn-success m-r-20">Update</button>
                    <a class="btn btn-secondary" href="{{route('dashboard')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>
    @endif
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
