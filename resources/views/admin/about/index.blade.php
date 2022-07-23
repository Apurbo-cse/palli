@extends('admin.master')

@section('title', 'About details')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">About details</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">About details</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">About details</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12" style="display: inline">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td style="width: 15%;">Title</td>
                                    <td>{{$about->title}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 15%;">Description</td>
                                    <td>{!! $about->description !!}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Mission description</td>
                                    <td>{!! $about->mission_desc !!}</td>
                                </tr>
                                <tr>
                                    <td style="width: 15%;">Mission image</td>
                                    <td><img src="{{asset($about->mission_image)}}" alt="logo" style="width: 110px;"></td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Vision description</td>
                                    <td>{!! $about->vision_desc !!}</td>
                                </tr>
                                <tr>
                                    <td style="width: 15%;">Vision image</td>
                                    <td><img src="{{asset($about->vision_image)}}" alt="logo" style="width: 110px;"></td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Goal description</td>
                                    <td>{!! $about->goal_desc !!}</td>
                                </tr>
                                <tr>
                                    <td style="width: 15%;">Goal image</td>
                                    <td><img src="{{asset($about->goal_image)}}" alt="logo" style="width: 110px;"></td>
                                </tr>


                                <tr>
                                    <td>Action</td>
                                    <td>
                                        <a href="{{route('admin.about.edit', $about->id)}}" class="btn btn-info waves-effect waves-light">Edit</a>
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

