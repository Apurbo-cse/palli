@extends('admin.master')

@section('title', 'Edit about details')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Edit about details</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('admin.about.index')}}">About details</a></li>
                    <li class="active">Edit about details</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit about details</h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form role="form" action="{{route('admin.about.update', $about->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="form-group">
                                    <label for="phone">Title</label>
                                    <input type="text" name="title" value="{{$about->title ? $about->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" id="ex1" placeholder="Enter title">
                                </div>
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="tinymce" name="description">
                                        {{$about->description ? $about->description : old('description') }}
                                   </textarea>
                                </div>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="mission_desc">Mission description</label>
                                    <textarea id="tinymce" name="mission_desc">
                                        {{$about->mission_desc ? $about->mission_desc : old('mission_desc') }}
                                   </textarea>
                                </div>
                                @error('mission_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="mission_image">Old mission image</label>
                                    <img src="{{asset($about->mission_image)}}" alt="course thumbnail" class="img-responsive w-lg" style="height: 100px; width: 200px">
                                </div>

                                <div class="form-group">
                                    <label for="mission_image">Mission image</label>
                                    <input type="file" name="mission_image" value="{{ old('mission_image') }}" class="form-control @error('mission_image') is-invalid @enderror">
                                </div>
                                @error('mission_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="vision_desc">Vision description</label>
                                    <textarea id="tinymce" name="vision_desc">
                                        {{$about->vision_desc ? $about->vision_desc : old('vision_desc') }}
                                   </textarea>
                                </div>
                                @error('vision_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="image">Old vision image</label>
                                    <img src="{{asset($about->vision_image)}}" alt="course thumbnail" class="img-responsive w-lg" style="height: 100px; width: 200px">
                                </div>

                                <div class="form-group">
                                    <label for="image">Vision image</label>
                                    <input type="file" name="vision_image" value="{{ old('vision_image') }}" class="form-control @error('vision_image') is-invalid @enderror">
                                </div>
                                @error('vision_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="goal_desc">Goal description</label>
                                    <textarea id="tinymce" name="goal_desc">
                                        {{$about->goal_desc ? $about->goal_desc : old('goal_desc') }}
                                   </textarea>
                                </div>
                                @error('goal_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="goal_image">Old goal image</label>
                                    <img src="{{asset($about->goal_image)}}" alt="course thumbnail" class="img-responsive w-lg" style="height: 100px; width: 200px">
                                </div>

                                <div class="form-group">
                                    <label for="goal_image">Goal image</label>
                                    <input type="file" name="goal_image" value="{{ old('goal_image') }}" class="form-control @error('goal_image') is-invalid @enderror">
                                </div>
                                @error('goal_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                <a href="{{route('admin.about.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
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
