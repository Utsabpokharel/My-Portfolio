@extends('Backend.Layout.master')
@section('title', 'Edit Interests')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="#">Interests</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Edit Interests</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->
    {{-- Edit --}}
    <form class="user" method="post" action="{{route('interest.update',$interest->id)}}" enctype="multipart/form-data">
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
                        <label class="control-label col-md-2">Interest Field
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="interest_field" required placeholder="Enter Your Interest Field"
                                id="exampleInputUser"
                                class="form-control   @error('interest_field') is-invalid @enderror"
                                value="{{old('interest_field',$interest->interest_field)}}" />
                            @error('interest_field')
                            <span class="invalid-feedback" about="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Icon
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="file" name="icon" placeholder="Enter Icon" accept="image/*" id="image-file"
                                class="form-control   @error('icon') is-invalid @enderror" onchange="readURL(this);"
                                value="{{old('icon','')}}" />
                            <img src="{{asset('Uploads/Interest/'.$interest->icon)}}" alt="image" id="image-preview"
                                width="150px">
                            @error('icon')
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
                    <a class="btn btn-secondary" href="{{route('interest.index')}}">Cancel</a>
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
