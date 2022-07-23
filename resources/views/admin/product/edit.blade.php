@extends('admin.master')

@section('title', 'Edit product')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Edit product</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('admin.products.index')}}">All product</a></li>
                    <li class="active">Edit product</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit product</h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form role="form" action="{{route('admin.products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" value="{{$product->title ? $product->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" id="ex1" placeholder="Enter title">
                                </div>
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="short_desc">Short desc.</label>
                                    <input type="text" name="short_desc" value="{{$product->short_desc ? $product->short_desc : old('short_desc') }}" class="form-control @error('short_desc') is-invalid @enderror" id="ex1" placeholder="Enter short desc.">
                                </div>
                                @error('short_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="regular_price">Regular price</label>
                                    <input type="text" name="regular_price" value="{{$product->regular_price ? $product->regular_price : old('regular_price') }}" class="form-control @error('regular_price') is-invalid @enderror" placeholder="Enter regular price">
                                </div>
                                @error('regular_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="offer_price">Offer price</label>
                                    <input type="text" name="offer_price" value="{{$product->offer_price ? $product->offer_price : old('offer_price') }}" class="form-control @error('offer_price') is-invalid @enderror" placeholder="Enter details offer price">
                                </div>
                                @error('offer_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="text" name="stock" value="{{$product->stock ? $product->stock : old('stock') }}" class="form-control @error('stock') is-invalid @enderror" placeholder="Enter product stock">
                                </div>
                                @error('stock')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="size">Size</label>
                                    <input type="text" name="size" value="{{$product->size ? $product->size : old('size') }}" class="form-control @error('size') is-invalid @enderror" placeholder="Enter size">
                                </div>
                                @error('size')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="details">Details</label>
                                    <textarea id="tinymce" name="details">
                                        {{$product->details ? $product->details : old('details') }}
                                    </textarea>
                                </div>
                                @error('details')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="event_date">Category</label>
                                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                        @php
                                            if (old('category_id')){
                                                $c = old('category_id');
                                            }else {
                                                $c = $product->category_id;
                                            }
                                        @endphp
                                        <option>Select One</option>
                                        @foreach($categories as $category)
                                            <option {{$c==$category->id ? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="event_date">Subcategory</label>
                                    <select name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
                                        @php
                                            if (old('subcategory_id')){
                                                $c = old('subcategory_id');
                                            }else {
                                                $c = $product->subcategory_id;
                                            }
                                        @endphp
                                        <option>Select One</option>
                                        @foreach($subcategories as $subcategory)
                                            <option {{$c==$subcategory->id ? 'selected':''}} value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('subcategory_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="event_date">Tags</label>
                                    <select name="tag_id" class="form-control @error('tag_id') is-invalid @enderror">
                                        @php
                                            if (old('tag_id')){
                                                $c = old('tag_id');
                                            }else {
                                                $c = $product->tag_id;
                                            }
                                        @endphp
                                        <option>Select One</option>
                                        @foreach($tags as $tag)
                                            <option {{$c==$tag->id ? 'selected':''}} value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tag_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="status">Product status</label>
                                    <br>
                                    @php
                                        if (old('status')){
                                            $status = old('status');
                                        }else {
                                            $status = $product->status;;
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


                                <div class="form-group">
                                    <label for="status">Product isFeatured</label>
                                    <br>
                                    @php
                                        if (old('is_featured')){
                                            $status = old('is_featured');
                                        }else {
                                            $status = $product->is_featured;;
                                        }
                                    @endphp
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" value="1" name="is_featured" @if($status==1) {{'checked'}}@endif>
                                        <label for="inlineRadio1">Active</label>
                                    </div>
                                    <div class="radio radio-info radio-inline">
                                        <input type="radio" value="0" name="is_featured"@if($status==0) {{'checked'}}@endif>
                                        <label for="inlineRadio1">Inactive</label>
                                    </div>
                                </div>
                                @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="image">Product Image</label>
                                    <img src="{{asset($product->image)}}" alt="slider thumbnail" class="img-responsive w-lg" style="height: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="image">Product image</label>
                                    <input type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror">
                                </div>
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="image">Product image two</label>
                                    <img src="{{asset($product->image_two)}}" alt="slider thumbnail" class="img-responsive w-lg" style="height: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="image_two">Product image tow</label>
                                    <input type="file" name="image_two" value="{{ old('image_two') }}" class="form-control @error('image_two') is-invalid @enderror">
                                </div>
                                @error('image_two')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="image">Product Image three</label>
                                    <img src="{{asset($product->image_three)}}" alt="slider thumbnail" class="img-responsive w-lg" style="height: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="image_three">Product image three</label>
                                    <input type="file" name="image_three" value="{{ old('image_three') }}" class="form-control @error('image') is-invalid @enderror">
                                </div>
                                @error('image_three')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                <a href="{{route('admin.products.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
                                <a href="{{route('admin.products.show', $product->id)}}" class="btn btn-primary waves-effect waves-light">Details</a>
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
