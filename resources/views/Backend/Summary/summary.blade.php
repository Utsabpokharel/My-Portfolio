@extends('Backend.Layout.master')
@section('title', 'My Summary')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="#">Summary</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">My Summary</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->
    {{-- Add --}}
    @if ($summary == [])
    <form class="user" method="post" action="{{route('summary.store')}}" enctype="multipart/form-data">
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
                        <label class="control-label col-md-2">Title
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="title" required placeholder="Enter Summary Title"
                                id="exampleInputUser" class="form-control   @error('title') is-invalid @enderror"
                                value="{{old('title','')}}" />
                            @error('title')
                            <span class="invalid-feedback" about="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Summary Details
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <textarea type="password" name="summary" required placeholder="Enter Summary of Yourself"
                                id="exampleInputText"
                                class="form-control  @error('summary') is-invalid @enderror">{{old('summary','')}}</textarea>
                            @error('summary')
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
    <form class="user" method="post" action="{{route('summary.update',$summary->id)}}" enctype="multipart/form-data">
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
                        <label class="control-label col-md-2">Title
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="title" required placeholder="Enter Summary Title"
                                id="exampleInputUser" class="form-control   @error('title') is-invalid @enderror"
                                value="{{old('title',$summary->title)}}" />
                            @error('title')
                            <span class="invalid-feedback" about="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Summary Details
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <textarea type="password" name="summary" required placeholder="Enter Summary of Yourself"
                                id="exampleInputText"
                                class="form-control  @error('summary') is-invalid @enderror">{{old('summary',$summary->summary)}}</textarea>
                            @error('summary')
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
