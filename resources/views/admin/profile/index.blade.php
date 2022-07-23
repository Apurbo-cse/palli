@extends('admin.master')

@section('title', 'User profile')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">User profile</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">User profile</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">User profile</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12" style="display: inline">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td style="width: 15%; height: 100px">Image</td>
                                    <td>
                                        @if(Auth::user()->image)
                                            <img style="width: 10%;" src="{{asset(Auth::user()->image)}}" alt="user-img">
                                        @else
                                            <img style="width: 10%;" src="{{asset('/')}}assets/admin/images/avatar.png" alt="user-img" >
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 15%;">Name</td>
                                    <td>{{ $user_info->name }}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Email</td>
                                    <td>{{ $user_info->email }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 15%;">Phone</td>
                                    <td>{{ $user_info->phone }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 15%;">Address</td>
                                    <td>{{ $user_info->address }}</td>
                                </tr>

                                <tr>
                                    <td>Action</td>
                                    <td>
                                        <a href="{{route('admin.profile.edit')}}" class="btn btn-info waves-effect waves-light">Profile update</a>
                                        <a href="{{route('admin.password.edit')}}" class="btn btn-success waves-effect waves-light">Password update</a>
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
