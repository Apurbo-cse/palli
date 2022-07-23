@extends('admin.master')

@section('title', 'Blog details')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Blog details</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('admin.blog.index')}}">All blog</a></li>
                    <li class="active">Blog details</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Blog details</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12" style="display: inline">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td style="width: 15%; height: 100px">Image</td>
                                    <td>
                                        <img style="width: 10%;" src="{{asset($blog->image)}}" alt="user-img">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 15%;">Title</td>
                                    <td>{{ $blog->title }}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Details</td>
                                    <td>{!! $blog->details !!}</td>
                                </tr>
                                <tr>
                                    <td style="width: 15%;">Created At</td>
                                    <td>{{ \Carbon\Carbon::parse($blog->created_at)->format("j S F Y")}}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Updated At</td>
                                    <td>{{ \Carbon\Carbon::parse($blog->updated_at)->format("j S F Y")}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 15%;">Status</td>
                                    <td><span class="label {{$blog->status ? 'label-success':'label-warning'}}">{{$blog->status ? 'Active':'Inactive'}}</span></td>
                                </tr>

                                <tr>
                                    <td>Action</td>
                                    <td>
                                        <a href="{{route('admin.blog.edit', $blog->id)}}" class="btn btn-info waves-effect waves-light">Edit</a>
                                        <a href="{{route('admin.blog.index')}}" class="btn btn-success waves-effect waves-light">Back</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
