@extends('frontend.master')
@section('title', 'Palli Crafts || Artisan')
@section('main-content')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Artisans</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-content">
                        <h3>Our <span>Artisans</span></h3>
                        <p style="text-align: justify;" data-rm-words="50">
                        <div style="text-align: justify;" >
                            {!! $artisanInfo->desc !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <br><br> <br>
                    <div class="about-img overlay">
                        <img src="{{asset($artisanInfo->image)}}" alt="artisan" >
                    </div>
                </div>

                <div class="col-md-12 mt-5">
                    <div class="about-content">
                        <h6>Behind The Scenes<span> :</span></h6>
                        <!--{!! $artisanInfo->sub_desc !!}-->
                    </div>
                </div>

                <div class="col-md-12 mt-5">
                    <div class="about-content">
                        <div class="row ">
                            @foreach($artisans as $artisan)
                            <div class="col-md-4 mb-4">
                                <div class="card text-center">
                                    <img src="{{asset($artisan->image)}}" style='height:300px !important;object-fit: cover' alt="artisan" >
                                    <b class="px-3">{{$artisan->name}}</b>
                                    <p  class="px-3">{{$artisan->designation}}</p>
                                    <div class="px-3  text-justify 
                                    <!--ScrollArt-->
                                    " style="max-height:200px; overflow-x: hidden; overflow-y: auto;">
                                        {!! $artisan->description !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.partial._shop_service')
    @include('frontend.partial._news_letter')
@endsection
