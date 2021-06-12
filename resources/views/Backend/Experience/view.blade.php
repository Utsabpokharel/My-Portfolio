@extends('Backend.Layout.master')
@section('title', 'My Experiences')
@section('content')
<div class="page-title-breadcrumb pull-left">
    <ol class="breadcrumb page-breadcrumb ">
        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li><a class="parent-item" href="{{route('experience.index')}}">Experiences</a>&nbsp;<i
                class="fa fa-angle-right"></i>
        </li>
        <li class="active">My Experiences</li>
    </ol>
</div>
<div class="card-body p-0 border-0 shadow-lg">
    <!-- Nested Row within Card Body -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 row">
            <div class="col-md-6">
                <h6 class="font-weight-bold text-primary">My Experiences</h6>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success float-right" href="{{route('experience.create')}}">Add +</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Company Name</th>
                            <th>Company Location</th>
                            <th>Year</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Company Name</th>
                            <th>Company Location</th>
                            <th>Year</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    @foreach($experience as $experiences)
                    <tbody class="text-center">
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <td>{{$experiences->exp_title}}</td>
                            <td>{{$experiences->company}}</td>
                            <td>{{$experiences->location}}</td>
                            <td>{{$experiences->year}}</td>
                            <td>{{$experiences->description}}</td>
                            <td>
                                <form action="{{route('experience.edit',$experiences->id)}}" method="GET"
                                    style="display: inline-block">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <button class="btn btn-primary btn-sm" type="submit"><span
                                            class="fa fa-edit"></span></button>
                                </form>
                                <form action="{{ route('experience.destroy', $experiences->id)}}" method="post"
                                    style="display: inline-block">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger btn-sm" type="submit"><span
                                            class="fa fa-trash"></span></button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
