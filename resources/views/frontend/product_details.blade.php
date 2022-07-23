@extends('frontend.master')
@section('title', 'Palli Crafts || PRODUCT DETAILS')
@push('css')
    <style>
        .product__details{}
        .product__details h3{
            margin: 15px 0px;
            padding: 0px;
            font-weight: 700;
            font-size: 14px;
            font-family: "Open Sans", Arial, sans-serif;
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
                            <li class="active"><a href="javascript:void(0);">Product details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shop single section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <!-- Images slider -->
                                <div class="flexslider-thumbnails">
                                    <ul class="slides">
                                        <li data-thumb="{{asset($product->image)}}" rel="adjustX:10, adjustY:">
                                            <img src="{{asset($product->image)}}" alt="product">
                                        </li>
                                        <li data-thumb="{{asset($product->image_two)}}" rel="adjustX:10, adjustY:">
                                            <img src="{{asset($product->image_two)}}" alt="product">
                                        </li>
                                        <li data-thumb="{{asset($product->image_three)}}" rel="adjustX:10, adjustY:">
                                            <img src="{{asset($product->image_three)}}" alt="product">
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Images slider -->
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="product-des">
                                <!-- Description -->
                                <div class="short">
                                    <h4>Lorem Ipsum is simply</h4>
                                    <div class="rating-main">
                                        <ul class="rating">

                                            <li><i class="fa fa-star-o"></i></li>

                                            <li><i class="fa fa-star-o"></i></li>

                                            <li><i class="fa fa-star-o"></i></li>

                                            <li><i class="fa fa-star-o"></i></li>

                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <a href="#" class="total-review">{{$product->avg_review}} Review</a>
                                    </div>
                                    <p class="price"><span class="discount">${{$product->offer_price}}</span><s>${{$product->regular_price}}</s> </p>
                                    <p class="description">
                                    <p>
                                        {{$product->short_desc}}
                                    </p>
                                </div>
                                <!--/ End Description -->
                                <!-- Color -->

                                <!--/ End Color -->
                                <!-- Size -->
                                <div class="size mt-4">
                                    <h4>Size</h4>
                                    <ul>
                                        <li><a href="#" class="one">{{$product->size}}</a></li>
                                    </ul>
                                </div>
                                <!--/ End Size -->
                                <!-- Product Buy -->
                                <div class="product-buy">
                                    <form action="http://127.0.0.1:8000/add-to-cart" method="POST">
                                        <input type="hidden" name="_token"
                                               value="ns1qXISOJVob2MNuibyXVV0Ore82y21744HSxrlo">
                                        <div class="quantity">
                                            <h6>Contact :</h6>
                                            <!-- Input Order -->
<!--                                            <div class="input-group">
                                                <div class="button minus">
                                                    <button type="button" class="btn btn-primary btn-number"
                                                            disabled="disabled" data-type="minus" data-field="quant[1]">
                                                        <i class="ti-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="hidden" name="slug"
                                                       value="lorem-ipsum-is-simply-2008183507-655">
                                                <input type="text" name="quant[1]" class="input-number" data-min="1"
                                                       data-max="1000" value="1" id="quantity">
                                                <div class="button plus">
                                                    <button type="button" class="btn btn-primary btn-number"
                                                            data-type="plus" data-field="quant[1]">
                                                        <i class="ti-plus"></i>
                                                    </button>
                                                </div>
                                            </div>-->
                                            <!--/ End Input Order -->
                                        </div>
                                        <div class="add-to-cart mt-4">
                                            <a href="{{$contactInfo->whatsapp_link}}" target="_blank" class="btn">What's APP</a>
                                        </div>
                                        <div class="add-to-cart mt-4">
                                            <a href="mailto:{{$contactInfo->email}}" target="_blank" class="btn">Email</a>
                                        </div>
                                    </form>

                                    <p class="cat">Category: <a href="{{route('category.product', $product->category_id)}}">{{$product->category->name}}</a></p>
                                    <p class="cat mt-1">Sub Category: <a href="{{route('subcategory.product', $product->subcategory_id)}}">{{$product->subCategory->name}}</a></p>
                                    <p class="availability">Stock : <span class="badge badge-success">{{$product->stock}}</span></p>
                                </div>
                                <!--/ End Product Buy -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product-info">
                                <div class="nav-main">
                                    <!-- Tab Nav -->
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                                href="#description" role="tab">Description</a></li>
<!--                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews"
                                                                role="tab">Reviews</a></li>-->
                                    </ul>
                                    <!--/ End Tab Nav -->
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <!-- Description Tab -->
                                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                                        <div class="tab-single">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="single-des product__details">
                                                        {!! $product->details !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Description Tab -->
                                    <!-- Reviews Tab -->
<!--                                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                                        <div class="tab-single review-panel">
                                            <div class="row">
                                                <div class="col-12">

                                                    &lt;!&ndash; Review &ndash;&gt;
                                                    <div class="comment-review">
                                                        <div class="add-review">
                                                            <h5>Add A Review</h5>
                                                            <p>Your email address will not be published. Required fields
                                                                are marked</p>
                                                        </div>
                                                        <h4>Your Rating <span class="text-danger">*</span></h4>
                                                        <div class="review-inner">
                                                            &lt;!&ndash; Form &ndash;&gt;

                                                            <p class="text-center p-5">
                                                                You need to <a href="http://127.0.0.1:8000/user/login"
                                                                               style="color:rgb(54, 54, 204)">Login</a> OR <a
                                                                    style="color:blue"
                                                                    href="http://127.0.0.1:8000/user/register">Register</a>

                                                            </p>
                                                            &lt;!&ndash;/ End Form &ndash;&gt;
                                                        </div>
                                                    </div>

                                                    <div class="ratting-main">
                                                        <div class="avg-ratting">

                                                            <h4>0 <span>(Overall)</span></h4>
                                                            <span>Based on 0 Comments</span>
                                                        </div>
                                                    </div>

                                                    &lt;!&ndash;/ End Review &ndash;&gt;

                                                </div>
                                            </div>
                                        </div>
                                    </div>-->
                                    <!--/ End Reviews Tab -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="product-area most-popular related-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(count($relatedProducts) == 0)
                    <div class="empty__message">Sorry!! no result found</div>
                @endif
                <div class="col-12">
                    <div class="owl-carousel popular-slider">

                        @foreach($relatedProducts as $relatedProduct)
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{route('product.details', $relatedProduct->id)}}">
                                    <img class="default-img" src="{{asset($relatedProduct->image)}}"
                                         alt="product">
                                    <img class="hover-img" src="{{asset($relatedProduct->image)}}" alt="product">
<!--                                    <span class="price-dec">4 % Off</span>-->

                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#modelExample" title="Quick View"
                                           href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to
                                                Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to
                                                Compare</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a title="Add to cart" href="#">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{route('product.details', $relatedProduct->id)}}">{{$relatedProduct->title}}</a></h3>
                                <div class="product-price">
                                    <span class="old">${{$relatedProduct->offer_price}}</span>
                                    <span>${{$relatedProduct->regular_price}}</span>
                                </div>

                            </div>
                        </div>
                        @endforeach
                        <!-- End Single Product -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
