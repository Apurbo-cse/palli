@extends('admin.master')

@section('title', 'Edit settings')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Edit settings</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('admin.settings.index')}}">Settings</a></li>
                    <li class="active">Edit settings</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit settings</h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form role="form" action="{{route('admin.settings.update', $setting->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')


                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" value="{{$setting->phone ? $setting->phone : old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="ex1" placeholder="Enter phone">
                                </div>
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{$setting->email ? $setting->email : old('email') }}" class="form-control @error('email') is-invalid @enderror" id="ex1" placeholder="Enter email">
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" value="{{$setting->address ? $setting->address : old('address') }}" class="form-control @error('address') is-invalid @enderror" id="ex1" placeholder="Enter address">
                                </div>
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="whatsapp">Whatsapp</label>
                                    <input type="text" name="whatsapp" value="{{$setting->whatsapp ? $setting->whatsapp : old('whatsapp') }}" class="form-control @error('whatsapp') is-invalid @enderror" placeholder="Enter whatsapp">
                                </div>
                                @error('whatsapp')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="whatsapp_link">Whatsapp link</label>
                                    <input type="text" name="whatsapp_link" value="{{$setting->whatsapp_link ? $setting->whatsapp_link : old('whatsapp_link') }}" class="form-control @error('whatsapp_link') is-invalid @enderror" placeholder="Enter whatsapp link">
                                </div>
                                @error('whatsapp_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="facebook_link"> Facebook link</label>
                                    <input type="text" name="facebook_link" value="{{$setting->facebook_link ? $setting->facebook_link : old('facebook_link') }}" class="form-control @error('facebook_link') is-invalid @enderror" placeholder="Enter facebook link">
                                </div>
                                @error('facebook_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="twitter_link">Twitter link</label>
                                    <input type="text" name="twitter_link" value="{{$setting->twitter_link ? $setting->twitter_link : old('twitter_link') }}" class="form-control @error('twitter_link') is-invalid @enderror" id="ex1" placeholder="Enter twitter link">
                                </div>
                                @error('twitter_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="pintorest_link">Pintorest link</label>
                                    <input type="text" name="pintorest_link" value="{{$setting->pintorest_link ? $setting->pintorest_link : old('pintorest_link') }}" class="form-control @error('pintorest_link') is-invalid @enderror" placeholder="Enter pintorest link">
                                </div>
                                @error('pintorest_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="title">Messenger link</label>
                                    <input type="text" name="messenger_link" value="{{$setting->messenger_link ? $setting->messenger_link : old('messenger_link') }}" class="form-control @error('messenger_link') is-invalid @enderror" id="ex1" placeholder="Enter messenger link">
                                </div>
                                @error('messenger_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="title">About</label>
                                    <textarea id="tinymce" name="about">
                                        {{$setting->about ? $setting->about : old('about') }}
                                   </textarea>
                                </div>
                                @error('about')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="title">Terms condition</label>
                                    <textarea id="tinymce" name="terms_condition">
                                        {{$setting->terms_condition ? $setting->terms_condition : old('terms_condition') }}
                                   </textarea>
                                </div>
                                @error('terms_condition')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="title">Privacy policy</label>
                                    <textarea id="tinymce" name="privacy_policy">
                                        {{$setting->privacy_policy ? $setting->privacy_policy : old('privacy_policy') }}
                                   </textarea>
                                </div>
                                @error('privacy_policy')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="title">Refund policy</label>
                                    <textarea id="tinymce" name="refund_policy">
                                        {{$setting->refund_policy ? $setting->refund_policy : old('refund_policy') }}
                                   </textarea>
                                </div>
                                @error('refund_policy')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="title">Google map link</label>
                                    <input type="text" name="google_map_link" value="{{$setting->google_map_link ? $setting->google_map_link : old('google_map_link') }}" class="form-control @error('google_map_link') is-invalid @enderror" placeholder="Enter google map link">
                                </div>
                                @error('google_map_link')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="image">Old logo</label>
                                    <img src="{{asset($setting->logo)}}" alt="course thumbnail" class="img-responsive w-lg" style="height: 100px; width: 200px">
                                </div>

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

@push('scripts')
    <script src="{{asset('/')}}assets/admin/tinymce/tinymce.js"></script>

    <script>
        $(function () {
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('/')}}assets/admin/tinymce';
        });
    </script>
@endpush
