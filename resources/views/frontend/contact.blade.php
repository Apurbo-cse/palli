@extends('frontend.master')
@section('title', 'Palli Crafts || HOME PAGE')
@section('main-content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="form-main">
                            <div class="title">
                                <h4>Get in touch</h4>
                                <h3>Write us a message </h3>
                            </div>
                            <form class="form-contact form contact_form" method="post" action="{{route('user.contact')}}" id="contactForm" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Your Name<span>*</span></label>
                                            <input name="name" id="name" type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your name">
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label for="subject">Your Subjects<span>*</span></label>
                                            <input name="subject" type="text" value="{{ old('subject') }}" id="subject" placeholder="Enter Subject">
                                        </div>
                                        @error('subject')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Your Email<span>*</span></label>
                                            <input name="email" type="email" id="email" value="{{ old('email') }}" placeholder="Enter email address">
                                        </div>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">Your Phone<span>*</span></label>
                                            <input id="phone" name="phone" type="number" value="{{ old('phone') }}" placeholder="Enter your phone">
                                        </div>
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group message">
                                            <label for="message">your message<span>*</span></label>
                                            <textarea name="message" id="message" cols="30" rows="9" placeholder="Enter Message">
                                                {{ old('message') }}
                                            </textarea>
                                        </div>
                                        @error('message')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @if (Session::has('success'))
                                <div class="alert alert-success mt-5">
                                    <ul>
                                        <li>{!! Session::get('success') !!}</li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="single-head">
                            <div class="single-info">
                                <i class="fa fa-phone"></i>
                                <h4 class="title">Call us Now:</h4>
                                <ul>
                                    <li>{{$contact_us->phone}} </li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <i class="fa fa-envelope-open"></i>
                                <h4 class="title">Email:</h4>
                                <ul>
                                    <li><a href="mailto:{{$contact_us->email}}"> {{$contact_us->email}}</a></li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <i class="fa fa-location-arrow"></i>
                                <h4 class="title">Our Address:</h4>
                                <ul>
                                    <li> {{$contact_us->address}} </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <div class="map-section">
        <div id="myMap">
            <iframe
                src="{{$contact_us->google_map_link}}"
                width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                tabindex="0">

            </iframe>
        </div>
    </div>
    <!--/ End Map Section -->

    @include('frontend.partial._news_letter')

@endsection
