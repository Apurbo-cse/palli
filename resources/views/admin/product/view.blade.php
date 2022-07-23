@extends('admin.master')

@section('title', 'Product details')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Product details</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('admin.products.index')}}">Product</a></li>
                    <li class="active">Product details</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Product details</h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12" style="display: inline">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td style="width: 15%;">Title</td>
                                    <td>{{$product->title}}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Short desc</td>
                                    <td>{{$product->short_desc}}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Details</td>
                                    <td>{!! $product->details !!}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Regular price</td>
                                    <td>{{$product->regular_price}}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Offer price</td>
                                    <td>{{$product->offer_price}}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Stock</td>
                                    <td>{{$product->stock}}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Average review</td>
                                    <td>{{$product->avg_review}}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Total seel</td>
                                    <td>{{$product->total_sell}}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Size</td>
                                    <td>{{$product->size}}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">In stock</td>
                                    <td>{{$product->stock}}</td>
                                </tr>


                                <tr>
                                    <td style="width: 15%;">Is featured</td>
                                    <td>{{$product->is_featured == 1 ? 'Featured' : 'No Featured'}}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Status</td>
                                    <td>{{$product->status == 1 ? 'Active' : 'InActive'}}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Tag name</td>
                                    <td>{{$product->tag->name}}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Category name</td>
                                    <td>{{$product->category->name}}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Subcategory name</td>
                                    <td>{{$product->subCategory->name}}</td>
                                </tr>

                                <tr>
                                    <td style="width: 15%;">Imasge</td>
                                    <td>
                                        <img src="{{asset($product->image)}}" alt="image" style="width: 110px;">
                                        <img src="{{asset($product->image_two)}}" alt="image_one" style="width: 110px;">
                                        <img src="{{asset($product->image_two)}}" alt="image_two" style="width: 110px;">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Action</td>
                                    <td>
                                        <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-warning waves-effect waves-light">Edit</a>
                                        <a href="{{route('admin.products.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
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

