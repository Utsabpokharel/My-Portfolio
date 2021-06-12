@extends('Backend.Layout.master')
@section('title', 'Edit Experience')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('experience.index')}}">Experiences</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li class="active">Edit Experience</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('experience.update',$experience->id)}}"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-2">Job Title
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="exp_title" required placeholder="Enter Your Position/Job Title"
                                id="exampleInputEmail" class="form-control   @error('exp_title') is-invalid @enderror"
                                value="{{old('exp_title',$experience->exp_title)}}" />
                            @error('exp_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Company
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="company" required placeholder="Enter Worked Company Name"
                                id="exampleInputEmail" class="form-control   @error('company') is-invalid @enderror"
                                value="{{old('company',$experience->company)}}" />
                            @error('company')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Company Location
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="location" required placeholder="Enter Company Location"
                                id="exampleInputEmail" class="form-control   @error('location') is-invalid @enderror"
                                value="{{old('location',$experience->location)}}" />
                            @error('location')
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
                            <input type="text" name="year" required placeholder="Enter Worked Year in year"
                                id="exampleInputEmail" class="form-control   @error('year') is-invalid @enderror"
                                value="{{old('year',$experience->year)}}" />
                            @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Job Description
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <textarea type="password" name="description" required
                                placeholder="Enter Your Job Description" id="exampleInputText"
                                class="form-control  @error('description') is-invalid @enderror">{{old('description',$experience->description)}}</textarea>
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
                    <a class="btn btn-secondary" href="{{route('experience.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
