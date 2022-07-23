@extends('frontend.master')
@section('title', 'Palli Crafts || Category product')
@push('css')
    <style>
        .pagination{
            display:inline-flex;
        }
        .filter_button{
            /* height:20px; */
            text-align: center;
            background:#F7941D;
            padding:8px 16px;
            margin-top:10px;
            color: white;
        }
        .search__result{
            background: #ddd;
            padding: 1px 4px;
            border-radius: 4px;
            margin-left: 10px;
            font-weight: 700;
        }

        .section {
            padding: 50px 0;
            position: relative;
        }
        .empty__message{
            margin: 20px 37px -18px;
            font-weight: 500;
            color: #f7941d;
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
                            <li class="active"><a href="javascript:void(0);">View result</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    <div class="single-shorter">
                                        <p>Total result <span class="search__result">{{count($products)}}</span></p>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row">
                        @if(count($products) == 0)
                            <div class="empty__message">Sorry!! no result found</div>
                        @endif
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{route('product.details', $product->id)}}">
                                            <img class="default-img" src="{{asset($product->image)}}" alt="product">
                                            <img class="hover-img" src="{{asset($product->image_two)}}" alt="product">
                                            <!--                                        <span class="price-dec">10 % Off</span>-->
                                        </a>
                                        <div class="button-head">
                                               <!--  
                                            <div class="product-action">
                                                <a data-toggle="modal" data-target="#1" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                <a title="Wishlist" href="wishlist/melange-casual-black" class="wishlist" data-id="1"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                            </div>
                                            <div class="product-action-2">
                                                <a title="Add to cart" href="add-to-cart/melange-casual-black">Add to cart</a>
                                            </div>
                                            -->
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{route('product.details', $product->id)}}">{{$product->title}}</a></h3>
                                        <span>${{$product->offer_price}}</span>
                                        <del style="padding-left:4%;">${{$product->regular_price}}</del>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12 justify-content-center d-flex">
                            <nav>
                                {!! $products->links() !!}
                            </nav>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="row mt-5 mb-2">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    <div class="single-shorter">
                                        <p>Related product</p>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row">
                        @if(count($newProducts) == 0)
                            <div class="empty__message">Sorry!! no result found</div>
                        @endif
                        @foreach($newProducts as $product)
                            <div class="col-lg-3 col-md-3 col-12">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{route('product.details', $product->id)}}">
                                            <img class="default-img" src="{{asset($product->image)}}" alt="product">
                                            <img class="hover-img" src="{{asset($product->image_two)}}" alt="product">
                                            <!--                                        <span class="price-dec">10 % Off</span>-->
                                        </a>
                                        <div class="button-head">
                                             <!--<div class="product-action">
                                                <a data-toggle="modal" data-target="#1" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                <a title="Wishlist" href="wishlist/melange-casual-black" class="wishlist" data-id="1"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                            </div>
                                            <div class="product-action-2">
                                                <a title="Add to cart" href="add-to-cart/melange-casual-black">Add to cart</a>
                                            </div>-->
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{route('product.details', $product->id)}}">{{$product->title}}</a></h3>
                                        <span>${{$product->offer_price}}</span>
                                        <del style="padding-left:4%;">${{$product->regular_price}}</del>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
