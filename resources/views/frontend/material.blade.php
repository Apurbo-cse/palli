@extends('frontend.master')
@section('title', 'Palli Crafts || Material\'s & Techniques')
@section('main-content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Materials & Techniques</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3 ">
                    <div class="about-content">
                        <h3> <span>Materials</span> </h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-5 ">
                    <div class="about-content">
                        <div class="text-justify">
                            {!! $materialInfo->description !!}
                        </div>
                     </div>
                </div>
                <div class="col-md-6 mb-5 ">
                    <div class="about-content">
                    <div class="about-img overlay">
                        <img src="{{asset($materialInfo->image)}}" alt="artisan" >
                    </div>
                     </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 mb-3 ">
                    <div class="about-content">
                        <h3> <span>Techniques</span> </h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-5 ">
                    <div class="about-content">
                        <div class="text-justify">
                            {!! $materialInfo->tech_description !!}
                        </div>
                     </div>
                </div>
            </div>




        


            @foreach($materials as $material)
            <div class="row d-flex col-md-12 mb-4 pb-3 p-3" style="background-color: rgb(254, 254, 254);box-shadow: 2px 5px 8px 2px #888888;">
                <div class="col-md-6 p-4">
                    <h6 class=" mb-2"> {{$material->title}}</h6>
                    <div class="text-justify">
                        {!! $material->sub_title !!}
                    </div>
                </div>
                <div class="col-md-6 p-4">
                    <div class="card p-2">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="first-slide caImgz" src="{{asset($material->image)}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="first-slide caImgz" src="{{asset($material->image_two)}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="first-slide caImgz" src="{{asset($material->image_three)}}" alt="First slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>

@include('frontend.partial._shop_service')
@include('frontend.partial._news_letter')
@endsection
