@extends('Backend.Layout.master')
@section('title', 'Edit Training')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('training.index')}}">Trainings</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li class="active">Edit Training</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('training.update',$training->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-2">Training Title
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="training_title" required
                                placeholder="Enter Training Title You have taken" id="exampleInputEmail"
                                class="form-control   @error('training_title') is-invalid @enderror"
                                value="{{old('training_title',$training->training_title)}}" />
                            @error('training_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Training Source
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="trained_at" required
                                placeholder="Enter Where You have taken training" id="exampleInputEmail"
                                class="form-control   @error('trained_at') is-invalid @enderror"
                                value="{{old('trained_at',$training->trained_at)}}" />
                            @error('trained_at')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Training Duration
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="duration" required placeholder="Enter Training Duration"
                                id="exampleInputEmail" class="form-control   @error('duration') is-invalid @enderror"
                                value="{{old('duration',$training->duration)}}" />
                            @error('duration')
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
                            <input type="text" name="year" required placeholder="Enter Training taken Year"
                                id="exampleInputEmail" class="form-control   @error('year') is-invalid @enderror"
                                value="{{old('year',$training->year)}}" />
                            @error('year')
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
                    <a class="btn btn-secondary" href="{{route('training.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
