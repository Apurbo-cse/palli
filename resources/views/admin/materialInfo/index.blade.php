@extends('admin.master')

@section('title', 'Materials & Techniques')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Materials & Techniques</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">Materials & Techniques</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Materials & Techniques</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12" style="display: inline">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td style="width: 15%;">Metaril Description</td>
                                    <td>{!! $materialInfo->description !!}</td>
                                </tr>
                                <tr>
                                    <td style="width: 15%;">Techniques Description</td>
                                    <td>{!! $materialInfo->tech_description !!}</td>
                                </tr>
                                <tr>
                                <td style="width: 15%;">Metarial image</td>
                                    <td><img src="{{asset($materialInfo->image)}}" alt="logo" style="width: 110px;"></td>
                                </tr>

                                <tr>
                                    <td>Action</td>
                                    <td>
                                        <a href="{{route('admin.materialInfo.edit', $materialInfo->id)}}" class="btn btn-info waves-effect waves-light">Edit</a>
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

