@extends('admin.master')

@section('title', 'User info update')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Edit slider</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('admin.profile')}}">User profile</a></li>
                    <li class="active">Edit user profile</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit user profile</h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form role="form" action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="form-group">
                                    <label for="name">User name</label>
                                    <input type="text" name="name" value="{{$user_info->name ? $user_info->name : old('name') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Enter user name">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="email">User email</label>
                                    <input disabled value="{{$user_info->email ? $user_info->email : old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter user email">
                                </div>

                                <div class="form-group">
                                    <label for="phone">User phone</label>
                                    <input type="text" name="phone" value="{{$user_info->phone ? $user_info->phone : old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="ex1" placeholder="Enter user phone">
                                </div>
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="address">User address</label>
                                    <input type="text" name="address" value="{{$user_info->address ? $user_info->address : old('address') }}" class="form-control @error('address') is-invalid @enderror" id="ex1" placeholder="Enter user address">
                                </div>
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="image">User old image</label>
                                    @if(Auth::user()->image)
                                        <img style="width: 10%" src="{{asset(Auth::user()->image)}}" alt="user-img" class="img-responsive w-lg">
                                    @else
                                        <img style="width: 10%" src="{{asset('/')}}assets/admin/images/avatar.png" alt="user-img" class="img-responsive w-lg">
                                    @endif
                               </div>

                                <div class="form-group">
                                    <label for="image">User new image</label>
                                    <input type="file" name="image" value="{{$user_info->image ? $user_info->image : old('image') }}" class="form-control @error('image') is-invalid @enderror">
                                </div>
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                <a href="{{route('admin.profile')}}" class="btn btn-info waves-effect waves-light">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
