@extends('frontend.master')
@section('title', 'Palli Crafts || BLOG Details')
@push('css')
    <style>
        .title{
            margin: 0px;
            padding: 0px;
            font-family:  Open Sans, Arial,sans-serif;
            font-size: 14px;
            text-align: justify;
        }
        .details{
            font-family:  Open Sans, Arial, sans-serif;
            font-size: 14px;
            text-align: justify;
        }
        .pagination{
            display: flex;
        }
    </style>
@endpush
@section('main-content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{route('blog')}}">Blog<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-single shop-blog grid section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                            <div class="col-12">
                                <div class="shop-single-blog">
                                    <img src="{{asset($blog->image)}}" alt="blog">
                                    <div class="content text-justify">
                                        <p class="date">
                                            <i class="fa fa-calendar" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($blog->created_at)->format("j F Y")}}
                                            <span class="float-right"><i class="fa fa-user" aria-hidden="true"></i>Admin</span>
                                        </p>
                                        <h4 class="mb-3">
                                            {{$blog->title}}
                                        </h4>
                                        <div class="details">
                                            {!! $blog->details !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <div class="single-widget recent-post">
                            <h3 class="title">Recent post</h3>
                            @foreach($recent_blogs as $blog)
                                <div class="single-post">
                                    <div class="image">
                                        <img src="{{asset($blog->image)}}" alt="Blog">
                                    </div>
                                    <div class="content">
                                        <h5><a href="{{route('blog.details', $blog->id)}}">{{$blog->title}}</a></h5>
                                        <ul class="comment">
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format("j F Y")}}</li>
                                            <li><i class="fa fa-user" aria-hidden="true"></i>
                                                Admin
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="single-widget newsletter">
                            <h3 class="title">Newsletter</h3>
                            <div class="letter-inner" style="padding: 35px 15px !important;">
                                <h4>Subscribe & get news <br> latest updates.</h4>
                                <form action="{{route('newsletter')}}" method="post" class="form-inner" >
                                    @csrf
                                    <input class="mb-2" style="padding: 0px 60px 0px 10px !important;" type="email" name="email" autocomplete="false" value="{{ old('email') }}" placeholder="Enter your email address">
                                    <button class="btn" type="submit" style="width: 100%">Subscribe</button>
                                </form>
                                @error('email')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
