@extends('admin.master')

@section('title', 'Edit Material')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Edit Material</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('admin.material.index')}}">All Material</a></li>
                    <li class="active">Edit Material</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Material</h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form role="form" action="{{route('admin.material.update', $material->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" value="{{$material->title ? $material->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" id="ex1" placeholder="Enter title">
                                </div>
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="sub_title">Sub title</label>
                                    <textarea id="tinymce" name="sub_title">
                                        {{$material->sub_title ? $material->sub_title : old('sub_title') }}
                                   </textarea>
                                </div>
                                @error('sub_title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="image">Old Material Image</label>
                                    <img src="{{asset($material->image)}}" alt="slider thumbnail" class="img-responsive w-lg" style="height: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="image">Material image</label>
                                    <input type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror">
                                </div>
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="image">Old Material image two</label>
                                    <img src="{{asset($material->image_two)}}" alt="slider thumbnail" class="img-responsive w-lg" style="height: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="image_two">Material image two</label>
                                    <input type="file" name="image_two" value="{{ old('image_two') }}" class="form-control @error('image_two') is-invalid @enderror">
                                </div>
                                @error('image_two')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="image">Old Material Image three</label>
                                    <img src="{{asset($material->image_three)}}" alt="slider thumbnail" class="img-responsive w-lg" style="height: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="image_three">Material image three</label>
                                    <input type="file" name="image_three" value="{{ old('image_three') }}" class="form-control @error('image') is-invalid @enderror">
                                </div>
                                @error('image_three')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="status">Material Status</label>
                                    <br>
                                    @php
                                        if(old('status')){
                                            $status = old('status');
                                        }else{
                                            $status = $material->status;
                                        }
                                    @endphp

                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="1" name="status" @if($status==1) {{'checked'}}@endif>
                                        <label for="inlineRadio1">Active</label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" id="inlineRadio1" value="0" name="status"@if($status==0) {{'checked'}}@endif>
                                        <label for="inlineRadio1">Inactive</label>
                                    </div>
                                </div>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                <a href="{{route('admin.material.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
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
