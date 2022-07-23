@extends('frontend.master')
@section('title', 'Palli Crafts || ABOUT US')
@section('main-content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">About Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-content">
                        <h3>Welcome To <span>Palli Crafts LTD.</span></h3>
                        <div style="text-align: justify;">
                            {!! $about_info->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    
    <section class="BGAbout about-us section ">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6 col-12">
                    <div class="about-img overlay">
                        <img src="{{asset($about_info->mission_image)}}" alt="mission">
                    </div>
                </div>
                
                <div class="col-lg-6 col-12">
                    <div class="about-content">
                        <h3><span>Mission</span></h3>
                        <div style="text-align: justify">
                            {!! $about_info->mission_desc !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <section class="about-us   section">
        <div class="container">
            <div class="row">
                
                 <div class="col-lg-6 col-12">
                    <div class="about-content">
                        <h3><span>Vision</span></h3>
                        <div style="text-align: justify">
                            {!! $about_info->vision_desc !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-img overlay">
                        <img src="{{asset($about_info->vision_image)}}" alt="vision">
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    
    <section class="BGAbout about-us section">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6 col-12">
                    <div class="about-img overlay  ms-3">
                       <img src="{{asset($about_info->goal_image)}}" alt="goal">
                    </div>
                </div>
                
                <div class="col-lg-6 col-12 ">
                    <div class="about-content">
                        <h3><span>Goal</span></h3>
                        <div style="text-align: justify">
                            {!! $about_info->goal_desc !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <section class="shop-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <h4 style="color:#F7941D">Membership</h4>
                </div>
            </div>
            <div class="row">
                @foreach($memberships as $membership)
                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    <div class="single-service text-center">
                        <img src="{{asset($membership->image)}}" alt="membership">
                        <p>{{$membership->title}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('frontend.partial._news_letter')
@endsection
