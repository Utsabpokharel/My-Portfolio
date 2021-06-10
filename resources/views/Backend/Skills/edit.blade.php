@extends('Backend.Layout.master')
@section('title', 'Edit Skill')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('skill.index')}}">Skills</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Edit Skill</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('skill.update',$skill->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-2">Skill Name
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="skill_name" required placeholder="Enter Skill Name"
                                id="exampleInputEmail" class="form-control   @error('skill_name') is-invalid @enderror"
                                value="{{old('skill_name',$skill->skill_name)}}" />
                            @error('skill_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Ability (%)
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="ability" required placeholder="Enter Skill Ability in percent"
                                id="exampleInputEmail" class="form-control  @error('ability') is-invalid @enderror"
                                value="{{old('ability',$skill->ability)}}" />
                            @error('ability')
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
                    <a class="btn btn-secondary" href="{{route('skill.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
