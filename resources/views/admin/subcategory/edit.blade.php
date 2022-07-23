@extends('admin.master')

@section('title', 'Edit Subcategory')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Edit Subcategory</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('admin.subcategories.index')}}">All Subcategory</a></li>
                    <li class="active">Edit Subcategory</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Subcategory</h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <form role="form" action="{{route('admin.subcategories.update', $subCategory->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="name">Subcategory Name</label>
                                    <input type="text" name="name" value="{{$subCategory->name ? $subCategory->name : old('name') }}" class="form-control @error('name') is-invalid @enderror" id="ex1" placeholder="Enter subcategory name">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group" style="margin-left: -10px;">
                                    <label class="col-sm-12 control-label">Parent Category</label>
                                    <div class="col-sm-12">
                                        <select name="category_id" class="form-control m-b-10 @error('category_id') is-invalid @enderror">
                                            @php
                                                if (old('category_id')){
                                                    $c = old('category_id');
                                                }else {
                                                        $c = $subCategory->category_id;
                                                }
                                            @endphp
                                            <option>Select one</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$c==$category->id ? 'selected':''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <label for="status">Subcategory Status</label>
                                    <br>
                                    @php
                                        if(old('status')){
                                            $status = old('status');
                                        }else{
                                            $status = $subCategory->status;
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
                                <a href="{{route('admin.categories.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
