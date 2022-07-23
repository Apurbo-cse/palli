@extends('frontend.master')
@section('title', 'Palli Crafts || Video session')
@section('main-content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Video Session</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="about-content" style="margin-bottom: 50px;">
                        <h3>Video <span>Session</span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                @foreach($videos as $video)
                <div class="col-md-6 mb-4">
                    <div >
                        <div class="card p-2" style="box-shadow: 2px  #888888;">
                            <video src="{{asset($video->video)}}"  width="100%" controls></video>
                        </div>
                        <h6 class="p-2 mt-1">{{$video->title}}</h6>
                        <div class="p-2 pt-0 text-justify">
                            {!! $video->sub_title !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('frontend.partial._shop_service')
    @include('frontend.partial._news_letter')
@endsection
