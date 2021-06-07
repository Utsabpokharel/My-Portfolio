@extends('Backend.Layout.master')
@section('title', 'Edit User')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('user.index')}}">Users</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Edit User</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <form class="user" method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="form-group row">
                        <label class="control-label col-md-2">User Name
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="name" required placeholder="Enter User Name" id="exampleInputEmail"
                                class="form-control   @error('name') is-invalid @enderror"
                                value="{{old('name',$user->name)}}" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Email
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="email" name="email" required placeholder="Enter User Email"
                                id="exampleInputEmail" class="form-control   @error('email') is-invalid @enderror"
                                value="{{old('email',$user->email)}}" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Contact Number
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="contact" required placeholder="Enter Contact Number"
                                id="exampleInputEmail" class="form-control   @error('contact') is-invalid @enderror"
                                value="{{old('contact',$user->contact)}}" />
                            @error('contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Address
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="address" required placeholder="Enter Address"
                                id="exampleInputEmail" class="form-control   @error('address') is-invalid @enderror"
                                value="{{old('address',$user->address)}}" />
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Date of Birth
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="date" name="dob" required placeholder="Enter Date of Birth"
                                id="exampleInputEmail" class="form-control   @error('dob') is-invalid @enderror"
                                value="{{old('dob',$user->dob)}}" />
                            @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Educational Degree
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="degree" required placeholder="Enter Educational Degree"
                                id="exampleInputEmail" class="form-control   @error('degree') is-invalid @enderror"
                                value="{{old('degree',$user->degree)}}" />
                            @error('degree')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Gender
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <select class="form-control  @error('gender') is-invalid @enderror" name="gender"
                                value="{{old('username',$user->gender)}}">
                                <option class="bg-info" disabled>-----Select Gender-----</option>
                                <option value="Male" @if($user->gender=='Male')selected @endif>Male</option>
                                <option value="Female" @if($user->gender=='Female')selected @endif>Female</option>
                                <option value="Others" @if($user->gender=='Others')selected @endif>Others</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-2">User Role
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <select class="form-control  @error('role') is-invalid @enderror" name="role">
                                <option value="{{$user->role}}" selected>{{old('username',$user->roles->name)}}
                                </option>
                                <option class="bg-info" disabled>-----Select Role-----</option>
                                @foreach($role as $roles)
                                <option value="{{$roles->id}}">{{$roles->name}}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Status
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <select class="form-control  @error('status') is-invalid @enderror" name="status">
                                <option class="bg-info">-----Select Status------</option>
                                <option value="1" @if($user->status=='1')selected @endif>Active</option>
                                <option value="0" @if($user->status=='0')selected @endif>Inactive</option>

                            </select>
                            @error('status')
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
                    <a class="btn btn-secondary" href="{{route('user.index')}}">Cancel</a>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
