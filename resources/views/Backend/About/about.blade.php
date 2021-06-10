@extends('Backend.Layout.master')
@section('title', 'About Me')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="#">About</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">About Me</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->
    {{-- Add --}}
    @if ($abt == [])
    <form class="user" method="post" action="{{route('about.store')}}" enctype="multipart/form-data">
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
                        <label class="control-label col-md-2">Profession
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="profession" required placeholder="Enter Your Profession"
                                id="exampleInputUser" class="form-control   @error('profession') is-invalid @enderror"
                                value="{{old('profession','')}}" />
                            @error('profession')
                            <span class="invalid-feedback" about="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Image
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="file" name="photo" required placeholder="Enter photo" accept="image/*"
                                id="exampleInputUser" class="form-control   @error('photo') is-invalid @enderror"
                                value="{{old('photo','')}}" />
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Short Description
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <textarea type="password" name="short_description" required
                                placeholder="Enter Short Description About You" id="exampleInputText"
                                class="form-control  @error('short_description') is-invalid @enderror">{{old('short_description','')}}</textarea>
                            @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">About
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <textarea type="password" name="about" required placeholder="Enter About Yourself"
                                id="exampleInputText"
                                class="form-control  @error('about') is-invalid @enderror">{{old('about','')}}</textarea>
                            @error('about')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Freelancing
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <select class="form-control  @error('freelancing') is-invalid @enderror" name="freelancing">
                                <option value="Available" selected>Available</option>
                                <option value="Not-Available">Not-Available </option>
                            </select>
                            @error('freelancing') <span class="invalid-feedback" role="alert">
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
    <form class="user" method="post" action="{{route('about.update',$abt->id)}}" enctype="multipart/form-data">
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
                        <label class="control-label col-md-2">Profession
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="profession" required placeholder="Enter Your Profession"
                                id="exampleInputUser" class="form-control   @error('profession') is-invalid @enderror"
                                value="{{old('profession',$abt->profession)}}" />
                            @error('profession')
                            <span class="invalid-feedback" about="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Image
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="file" name="photo" placeholder="Enter photo" accept="image/*"
                                id="exampleInputUser" class="form-control   @error('photo') is-invalid @enderror"
                                value="{{old('photo',$abt->photo)}}" />
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Short Description
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <textarea type="password" name="short_description" required
                                placeholder="Enter Short Description about you." id="exampleInputText"
                                class="form-control  @error('short_description') is-invalid @enderror">{{old('short_description',$abt->short_description)}}</textarea>
                            @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">About
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <textarea type="password" name="about" required placeholder="Enter About Yourself"
                                id="exampleInputText"
                                class="form-control  @error('about') is-invalid @enderror">{{old('about',$abt->about)}}</textarea>
                            @error('about')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Freelancing
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <select class="form-control  @error('freelancing') is-invalid @enderror" name="freelancing">
                                <option class="bg-info">-----Select Freelancing Status------</option>
                                <option value="Available" @if($abt->freelancing=='Available')selected @endif>Available
                                </option>
                                <option value="Not-Available" @if($abt->freelancing=='Not-Available')selected
                                    @endif>Not-Available
                                </option>
                            </select>
                            @error('freelancing')
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
