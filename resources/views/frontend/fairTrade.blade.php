@extends('frontend.master')
@section('title', 'Palli Crafts || Fair and trade')
@section('main-content')



           
            
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Fair Trade Principle</a></li>
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
                        <h3>Fair <span> Trade </span> Principles</h3>
                    </div>
                </div>
            </div>
            
             <div class="row">
                <div class="col-md-12 mb-5 ">
                    <div class="about-content">
                        <div class="text-justify">
                           Palli Crafts Ltd is enrolled with Ecota Fair Trade Forum, a regional Fair-Trade
                            Association of Bangladesh. We believe and adhere to fair trade principles
                            to create a fairer world for everyone. The fair trade 10 principles are as below:
                        </div>
                     </div>
                </div>
            </div>

            @foreach($fairTrades as $fairTrade)
            <div class="row d-flex col-md-12 mb-4 pb-3 p-3 m-1" style="background-color: rgb(254, 254, 254);box-shadow: 2px 5px 8px 2px #888888;"  >
                <div class="col-md-6 p-4">
                    <h6 class=" mb-2"> {{$loop->iteration}}. {{$fairTrade->title}}</h6>
                    <div style="text-align: justify">
                        {!! $fairTrade->sub_title !!}
                    </div>
                </div>
                <div class="col-md-6 p-4">
                    <div class="card p-2">
                        <img src="{{asset($fairTrade->image)}}" alt="fair and tread" >
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>

    @include('frontend.partial._shop_service')
    @include('frontend.partial._news_letter')
@endsection
