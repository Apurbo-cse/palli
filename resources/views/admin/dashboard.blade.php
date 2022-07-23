@extends('admin.master')

@section('title', 'Poly craft - Admin Dashboard')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Dashboard</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('home')}}">Palli Crafts</a></li>
                    <li class="active">Dashboard</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Total Category</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>{{\App\Category::count()}}</b></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Total Subcategory</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>{{\App\SubCategory::count()}}</b></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Total Tag</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>{{\App\Tag::count()}}</b></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Total Slider</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>{{\App\Slider::count()}}</b></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Total Contact</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>{{\App\ContactUs::count()}}</b></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Total Product</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>{{\App\Product::count()}}</b></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Total Subscription</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>{{\App\Newsletter::count()}}</b></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Total Artisan</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>{{\App\Artisan::count()}}</b></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Total Material</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>{{\App\Material::count()}}</b></h3>
                </div>
            </div>
        </div>

<!--        <div class="col-sm-6 col-lg-3">
            <div class="panel panel-primary text-center">
                <div class="panel-heading">
                    <h4 class="panel-title">Order Status</h4>
                </div>
                <div class="panel-body">
                    <h3 class=""><b>3685</b></h3>
                    <p class="text-muted"><b>15%</b> Orders in Last 10 months</p>
                </div>
            </div>
        </div>-->
    </div>

@endsection
