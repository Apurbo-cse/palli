@extends('admin.master')

@section('title', 'Create new Settings')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Create settings</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('admin.categories.index')}}">All settings</a></li>
                    <li class="active">New settings</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Create new settings</h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form role="form" action="{{route('admin.settings.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="ex1" placeholder="Enter phone">
                                </div>
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="ex1" placeholder="Enter email">
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" id="ex1" placeholder="Enter address">
                                </div>
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="whatsapp">Whatsapp</label>
                                    <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" class="form-control @error('whatsapp') is-invalid @enderror" placeholder="Enter whatsapp">
                                </div>
                                @error('whatsapp')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="whatsapp_link">Whatsapp link</label>
                                    <input type="text" name="whatsapp_link" value="{{ old('whatsapp_link') }}" class="form-control @error('whatsapp_link') is-invalid @enderror" placeholder="Enter whatsapp link">
                                </div>
                                @error('whatsapp_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="facebook_link"> Facebook link</label>
                                    <input type="text" name="facebook_link" value="{{ old('facebook_link') }}" class="form-control @error('facebook_link') is-invalid @enderror" placeholder="Enter facebook link">
                                </div>
                                @error('facebook_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="twitter_link">Twitter link</label>
                                    <input type="text" name="twitter_link" value="{{ old('twitter_link') }}" class="form-control @error('twitter_link') is-invalid @enderror" id="ex1" placeholder="Enter twitter link">
                                </div>
                                @error('twitter_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="pintorest_link">Pintorest link</label>
                                    <input type="text" name="pintorest_link" value="{{ old('pintorest_link') }}" class="form-control @error('pintorest_link') is-invalid @enderror" placeholder="Enter pintorest link">
                                </div>
                                @error('pintorest_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="title">Messenger link</label>
                                    <input type="text" name="messenger_link" value="{{ old('messenger_link') }}" class="form-control @error('messenger_link') is-invalid @enderror" id="ex1" placeholder="Enter messenger link">
                                </div>
                                @error('messenger_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="title">About</label>
                                    <input type="text" name="about" value="{{ old('about') }}" class="form-control @error('about') is-invalid @enderror" id="ex1" placeholder="Enter about">
                                </div>
                                @error('about')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="title">Terms condition</label>
                                    <input type="text" name="terms_condition" value="{{ old('terms_condition') }}" class="form-control @error('terms_condition') is-invalid @enderror" id="ex1" placeholder="Enter terms condition">
                                </div>
                                @error('terms_condition')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="title">Privacy policy</label>
                                    <input type="text" name="privacy_policy" value="{{ old('privacy_policy') }}" class="form-control @error('privacy_policy') is-invalid @enderror" placeholder="Enter privacy policy">
                                </div>
                                @error('privacy_policy')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="title">Refund policy</label>
                                    <input type="text" name="refund_policy" value="{{ old('refund_policy') }}" class="form-control @error('refund_policy') is-invalid @enderror" placeholder="Enter refund policy">
                                </div>
                                @error('refund_policy')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="title">Google map link</label>
                                    <input type="text" name="google_map_link" value="{{ old('google_map_link') }}" class="form-control @error('google_map_link') is-invalid @enderror" placeholder="Enter google map link">
                                </div>
                                @error('google_map_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="image">Logo</label>
                                    <input type="file" name="logo" value="{{ old('logo') }}" class="form-control @error('logo') is-invalid @enderror">
                                </div>
                                @error('logo')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                <a href="{{route('admin.settings.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
