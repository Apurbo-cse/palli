@extends('admin.master')

@section('title', 'Artisan information')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Artisan information</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">Artisan information</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Artisan information</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12" style="display: inline">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td style="width: 15%;">Description</td>
                                    <td>{!! $artisanInfo->desc !!}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Sub description</td>
                                    <td>{!! $artisanInfo->sub_desc !!}</td>
                                </tr>
                                <tr>
                                    <td style="width: 15%;">Image</td>
                                    <td><img src="{{asset($artisanInfo->image)}}" alt="logo" style="width: 110px;"></td>
                                </tr>

                                <tr>
                                    <td>Action</td>
                                    <td>
                                        <a href="{{route('admin.artisanInfo.edit', $artisanInfo->id)}}" class="btn btn-info waves-effect waves-light">Edit</a>
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

