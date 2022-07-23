@extends('admin.master')

@section('title', 'Contact details')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Contact details</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('admin.contact.index')}}">Contact list</a></li>
                    <li class="active">Contact details</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Contact details</h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form role="form">

                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" name="title" value="{{$contact->name}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="title">Email</label>
                                    <input type="text" name="title" value="{{$contact->email}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="title">Phone</label>
                                    <input type="text" name="title" value="{{$contact->phone}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="title">Subject</label>
                                    <input type="text" name="title" value="{{$contact->subject}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="title">Message</label>
                                    <textarea id="tinymce" name="details">
                                         {{$contact->message}}
                                    </textarea>
                                </div>
                                <a href="{{route('admin.contact.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
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

