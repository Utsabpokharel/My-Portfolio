@extends('Backend.Layout.master')
@section('title', 'Edit Projects')
@section('content')

<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="#">Portfolio</a>&nbsp;<i class="fa fa-angle-right"></i>
        </li>
        <li class="active">Edit Projects</li>
    </ol>
</div>

<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->
    <form class="user" method="post" action="{{route('portfolio.update',$portfolio->id)}}"
        enctype="multipart/form-data">
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
                        <label class="control-label col-md-2">Project Name
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="project_name" required placeholder="Enter Your Project Name"
                                id="exampleInputUser" class="form-control   @error('project_name') is-invalid @enderror"
                                value="{{old('project_name',$portfolio->project_name)}}" />
                            @error('project_name')
                            <span class="invalid-feedback" about="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Project Image
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <input type="file" name="image" placeholder="Enter Screen Shot" accept="image/*"
                                id="image-file" class="form-control   @error('image') is-invalid @enderror"
                                onchange="readURL(this);" value="{{old('image','')}}" />
                            <img src="{{asset('Uploads/Portfolio/'.$portfolio->image)}}" alt="image" id="image-preview"
                                width="150px">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Project Description
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <textarea type="password" name="description" required
                                placeholder="Enter Short Description About Your Project" id="exampleInputText"
                                class="form-control  @error('description') is-invalid @enderror">{{old('description',$portfolio->description)}}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-2">Project Category
                            <span class="required text-danger"> * </span>
                        </label>
                        <div class="col-md-6">
                            <select class="form-control  @error('category') is-invalid @enderror" name="category">
                                <option class="bg-info">-----Select Project Category------</option>
                                <option value="Web" @if($portfolio->category=='Web')selected
                                    @endif>Web
                                </option>
                                <option value="App" @if($portfolio->category=='App')selected
                                    @endif>App
                                </option>
                                <option value="Others" @if($portfolio->category=='Others')selected
                                    @endif>Others
                                </option>
                            </select>
                            @error('category') <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Client Name
                            <span class="required text-danger"> </span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="client" placeholder="Enter Your Client Name" id="exampleInputUser"
                                class="form-control   @error('client') is-invalid @enderror"
                                value="{{old('client',$portfolio->client)}}" />
                            @error('client')
                            <span class="invalid-feedback" about="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Project URL
                            <span class="required text-danger"> (if any) </span>
                        </label>
                        <div class="col-md-6">
                            <input type="url" name="project_url" placeholder="Enter Your Project Url"
                                id="exampleInputUser" class="form-control   @error('project_url') is-invalid @enderror"
                                value="{{old('project_url',$portfolio->project_url)}}" />
                            @error('project_url')
                            <span class="invalid-feedback" about="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2">Project Date
                            <span class="required text-danger"></span>
                        </label>
                        <div class="col-md-6">
                            <input type="date" name="project_date" required
                                placeholder="Enter Your Project Completion Date" id="exampleInputUser"
                                class="form-control   @error('project_date') is-invalid @enderror"
                                value="{{old('project_date',$portfolio->project_date)}}" />
                            @error('project_date')
                            <span class="invalid-feedback" about="alert">
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
                    <a class="btn btn-secondary" href="{{route('portfolio.index')}}">Cancel</a>
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
