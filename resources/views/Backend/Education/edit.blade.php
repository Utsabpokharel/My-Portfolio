@extends('Backend.Layout.master')
@section('title', 'Edit Education')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('education.index')}}">educations</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li class="active">Edit Education</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('education.update',$education->id)}}"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-2">Course Name
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="course" required placeholder="Enter Course course"
                                id="exampleInputEmail" class="form-control   @error('course') is-invalid @enderror"
                                value="{{old('course',$education->course)}}" />
                            @error('course')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Year
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="year" required placeholder="Enter Course Completed Year"
                                id="exampleInputEmail" class="form-control   @error('year') is-invalid @enderror"
                                value="{{old('year',$education->year)}}" />
                            @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Institute Name
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="institute" required placeholder="Enter Course Studied Institute"
                                id="exampleInputEmail" class="form-control   @error('institute') is-invalid @enderror"
                                value="{{old('institute',$education->institute)}}" />
                            @error('institute')
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
                                placeholder="Enter education Description" id="exampleInputText"
                                class="form-control  @error('description') is-invalid @enderror">{{old('description',$education->description)}}</textarea>
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
                    <button type="submit" class="btn btn-success m-r-20">Update</button>
                    <a class="btn btn-secondary" href="{{route('education.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
