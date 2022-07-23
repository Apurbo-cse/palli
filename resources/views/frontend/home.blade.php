@extends('frontend.master')
@section('title', 'Palli Crafts || HOME PAGE')
@section('main-content')
    <section id="Gslider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#Gslider" data-slide-to="0" class="active"></li>
            <li data-target="#Gslider" data-slide-to="1" class=""></li>
            <li data-target="#Gslider" data-slide-to="2" class=""></li>

        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach($sliders as $key=>$slider)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img class="first-slide caImgz" src="{{asset($slider->image)}}" alt="First slide">
                <div class="carousel-caption d-none d-md-block text-left">
                    <h1 class="wow fadeInDown">{{$slider->title}}</h1>
                    <p>
                    <h2><span style="color: rgb(156, 0, 255); font-size: 2rem; font-weight: bold;">{{$slider->sub_title}}</span><br>
                    </h2>
                    <h2><span style="color: rgb(156, 0, 255);"></span></h2>
                    <a class="btn btn-lg ws-btn wow fadeInUpBig" href="productgrids.html" role="button">Shop Now<i
                            class="far fa-arrow-alt-circle-right"></i></a>
                </div>
            </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </section>

    <!--/ End Slider Area -->

    <!-- Start Small Banner  -->
    <section class="small-banner section">
        <div class="container-fluid">
            <div class="row">
                <!-- Single Banner  -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="{{asset('/')}}assets/frontend/img/IMG_2384.JPG" alt="assets/img/IMG_2384.JPG">
                        <div class="content">
                            <h3>Men&#039;s Fashion</h3>
                            <a href="product-cat/mens-fashion">Discover Now</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="{{asset('/')}}assets/frontend/img/IMG_2390.JPG" alt="assets/img/IMG_2390.JPG">
                        <div class="content">
                            <h3>Women&#039;s Fashion</h3>
                            <a href="product-cat/womens-fashion">Discover Now</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="{{asset('/')}}assets/frontend/img/IMG_2393.JPG" alt="assets/img/IMG_2393.JPG">
                        <div class="content">
                            <h3>Kid&#039;s</h3>
                            <a href="product-cat/kids">Discover Now</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
            </div>
        </div>
    </section>
    <!-- End Small Banner -->

    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Item</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="nav-main">
                            <!-- Tab Nav -->
                            <ul class="nav nav-tabs filter-tope-group" id="myTab" role="tablist">
                                <button class="btn" style="background:black" data-filter="*">
                                    All Products
                                </button>
                                @foreach($featuredCategories as $featuredCategory)
                                    <button class="btn" style="background:none;color:black;" data-filter=".{{$featuredCategory->id}}">
                                        {{$featuredCategory->name}}
                                    </button>
                                @endforeach
                            </ul>
                            <!--/ End Tab Nav -->
                        </div>
                        <div class="tab-content isotope-grid" id="myTabContent">
                            @foreach($products as $product)
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->category_id}}">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{route('product.details', $product->id)}}">
                                            <img class="default-img" src="{{asset($product->image)}}"
                                                 alt="product">
                                            <img class="hover-img" src="{{asset($product->image)}}" alt="product">
                                            @if($product->stock == 0)
                                                <span class="out-of-stock">out of stock</span>
                                            @else
                                            <span class="hot">{{$product->tag->name}}</span>
                                            @endif

                                        </a>
                                        <div class="button-head">
                                         <!--    <div class="product-action">
                                                <a data-toggle="modal" data-target="#10" title="Quick View" href="#"><i
                                                        class=" ti-eye"></i><span>Quick Shop</span></a>
                                                <a title="Wishlist"
                                                   href="wishlist/lorem-ipsum-is-simply-2008183507-655"><i
                                                        class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                            </div>
                                            <div class="product-action-2">
                                                <a title="Add to cart"
                                                   href="add-to-cart/lorem-ipsum-is-simply-2008183507-655">Add to
                                                    cart</a>
                                            </div>-->
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{route('product.details', $product->id)}}">{{$product->title}}</a></h3>
                                        <div class="product-price">
                                            <span>${{$product->offer_price}}</span>
                                            <del style="padding-left:4%;">${{$product->regular_price}}</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach



                            <!--/ End Single Tab -->

                            <!--/ End Single Tab -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Area -->

    <!-- Start Midium Banner  -->
    <section class="midium-banner">
        <div class="container">
            <div class="row">
                <!-- Single Banner  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="{{asset('/')}}assets/frontend/img/IMG_2384.JPG" alt="assets/img/IMG_2384.JPG">
                        <div class="content">
                            <p>Kid&#039;s</p>
                            <h3>Ladies Cotton Kurti Sha <br>Up to<span> 3%</span></h3>
                            <a href="product-detail/ladies-cotton-kurti-sha">Shop Now</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
                <!-- Single Banner  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        <img src="{{asset('/')}}assets/frontend/img/IMG_2390.JPG" alt="assets/img/IMG_2390.JPG">
                        <div class="content">
                            <p>Men&#039;s Fashion</p>
                            <h3>Melange Casual Black <br>Up to<span> 10%</span></h3>
                            <a href="product-detail/melange-casual-black">Shop Now</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
            </div>
        </div>
    </section>
    <!-- End Midium Banner -->

    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Hot Item</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        <!-- Start Single Product -->
                        @foreach($hotItems as $key=>$hotItem)
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{route('product.details', $hotItem->id)}}">
                                    <img class="default-img" src="{{$hotItem->image}}"
                                         alt="product">
                                    <img class="hover-img" src="{{$hotItem->image}}" alt="product">

                                </a>
                                <div class="button-head">
                                   <!-- <div class="product-action">
                                        <a data-toggle="modal" data-target="#{{$key}}" title="Quick View" href="#"><i
                                                class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="wishlist/lorem-ipsum-is-simply-2008183507-655"><i
                                                class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a href="add-to-cart/lorem-ipsum-is-simply-2008183507-655">Add to cart</a>
                                    </div>-->
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{route('product.details', $hotItem->id)}}">{{$hotItem->title}}</a></h3>
                                <div class="product-price">
                                    <span class="old">${{$hotItem->regular_price}}</span>
                                    <span>${{$hotItem->offer_price}}</span>
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
    <!-- End Most Popular Area -->

    <!-- Start Shop Home List  -->
    <section class="shop-home-list section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>Latest Items</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($latestItems as $key=>$item)
                        <div class="col-md-4">
                            <!-- Start Single List  -->
                            <div class="single-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="list-image overlay">
                                            <img src="{{asset($item->image)}}" alt="latest item">
                                            <a href="{{route('product.details', $item->id)}}" class="buy"><i
                                                    class="fa fa-shopping-bag"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 no-padding">
                                        <div class="content">
                                            <h4 class="title"><a href="{{route('product.details', $item->id)}}">{{$item->title}}</a></h4>
                                            <p class="price with-discount">${{$item->offer_price}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single List  -->
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Home List  -->

    <!-- Start Shop Blog  -->
    <section class="shop-blog section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>From Our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="{{asset($blog->image)}}" alt="blog">
                        <div class="content">
                            <p class="date">{{ \Carbon\Carbon::parse($blog->created_at)->format("j F Y")}}</p>
                            <a href="{{route('blog.details', $blog->id)}}" class="title">{{$blog->title}}</a>
                            <a href="{{route('blog.details', $blog->id)}}" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Shop Blog  -->



    <!-- Start Shop Services Area -->
    @include('frontend.partial._shop_service')
    <!-- End Shop Services Area -->

    <!-- Start Shop Newsletter  -->
    @include('frontend.partial._news_letter')
    <!-- End Shop Newsletter -->
    <!-- Modal -->
    <div class="modal fade" id="10" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                                                                                                      aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <div class="quickview-slider-active">
                                    <div class="single-slider">
                                        <img src="assets/img/IMG_2393.JPG" alt="assets/img/IMG_2393.JPG">
                                    </div>
                                    <div class="single-slider">
                                        <img src="assets/img/IMG_2393.JPG" alt="assets/img/IMG_2393.JPG">
                                    </div>
                                    <div class="single-slider">
                                        <img src="photos/1/Products/032f0-image3xxl-1-.jpg"
                                             alt="photos/1/Products/032f0-image3xxl-1-.jpg">
                                    </div>
                                </div>
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content">
                                <h2>Lorem Ipsum is simply</h2>
                                <div class="quickview-ratting-review">
                                    <div class="quickview-ratting-wrap">
                                        <div class="quickview-ratting">

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"> (0 customer review)</a>
                                    </div>
                                    <div class="quickview-stock">
                                        <span><i class="fa fa-check-circle-o"></i> 3 in stock</span>
                                    </div>
                                </div>
                                <h3><small><del class="text-muted">$300.00</del></small> $270.00 </h3>
                                <div class="quickview-peragraph">
                                    <p>
                                    <p><strong style="margin: 0px; padding: 0px; font-family: " Open Sans", Arial,
                                        sans-serif; font-size: 14px; text-align: justify;">Lorem
                                        Ipsum</strong><span style="font-family: " Open Sans", Arial, sans-serif;
                                        font-size: 14px; text-align: justify;"> is simply dummy text of the
                                        printing and typesetting
                                        industry. </span><br></p>
                                    </p>
                                </div>
                                <div class="size">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Size</h5>
                                            <select>
                                                <option>L</option>
                                                <option>XL</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <form action="add-to-cart" method="POST" class="mt-4">
                                    <input type="hidden" name="_token" value="WIPeOVF1KXapY14gtfRWQ3Vq45IWmKyviGUdsnNx">
                                    <div class="quantity">
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number"
                                                        disabled="disabled" data-type="minus" data-field="quant[1]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="hidden" name="slug"
                                                   value="lorem-ipsum-is-simply-2008183507-655">
                                            <input type="text" name="quant[1]" class="input-number" data-min="1"
                                                   data-max="1000" value="1">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number"
                                                        data-type="plus" data-field="quant[1]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </div>
                                    <div class="add-to-cart">
                                        <button type="submit" class="btn">Add to cart</button>
                                        <a href="wishlist/lorem-ipsum-is-simply-2008183507-655" class="btn min"><i
                                                class="ti-heart"></i></a>
                                    </div>
                                </form>
                                <div class="default-social">
                                    <!-- ShareThis BEGIN -->
                                    <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="9" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                                                                                                      aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <div class="quickview-slider-active">
                                    <div class="single-slider">
                                        <img src="assets/img/IMG_2393.JPG" alt="assets/img/IMG_2393.JPG">
                                    </div>
                                    <div class="single-slider">
                                        <img src="photos/1/Products/04776-pms000a.jpg"
                                             alt="photos/1/Products/04776-pms000a.jpg">
                                    </div>
                                    <div class="single-slider">
                                        <img src="photos/1/Products/04ec4-pmtk001t.jpg"
                                             alt="photos/1/Products/04ec4-pmtk001t.jpg">
                                    </div>
                                    <div class="single-slider">
                                        <img src="photos/1/Products/032f0-image3xxl-1-.jpg"
                                             alt="photos/1/Products/032f0-image3xxl-1-.jpg">
                                    </div>
                                </div>
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content">
                                <h2>Lorem Ipsum is simply</h2>
                                <div class="quickview-ratting-review">
                                    <div class="quickview-ratting-wrap">
                                        <div class="quickview-ratting">

                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                            <i class="yellow fa fa-star"></i>
                                        </div>
                                        <a href="#"> (1 customer review)</a>
                                    </div>
                                    <div class="quickview-stock">
                                        <span><i class="fa fa-check-circle-o"></i> 4 in stock</span>
                                    </div>
                                </div>
                                <h3><small><del class="text-muted">$200.00</del></small> $190.00 </h3>
                                <div class="quickview-peragraph">
                                    <p>
                                    <p><strong style="margin: 0px; padding: 0px; font-family: " Open Sans", Arial,
                                        sans-serif; font-size: 14px; text-align: justify;">Lorem
                                        Ipsum</strong><span style="font-family: " Open Sans", Arial, sans-serif;
                                        font-size: 14px; text-align: justify;"> is simply dummy text of the
                                        printing and typesetting
                                        industry.</span><br></p>
                                    </p>
                                </div>
                                <div class="size">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Size</h5>
                                            <select>
                                                <option>S</option>
                                                <option>M</option>
                                                <option>XL</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <form action="add-to-cart" method="POST" class="mt-4">
                                    <input type="hidden" name="_token" value="WIPeOVF1KXapY14gtfRWQ3Vq45IWmKyviGUdsnNx">
                                    <div class="quantity">
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number"
                                                        disabled="disabled" data-type="minus" data-field="quant[1]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="hidden" name="slug" value="lorem-ipsum-is-simply">
                                            <input type="text" name="quant[1]" class="input-number" data-min="1"
                                                   data-max="1000" value="1">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number"
                                                        data-type="plus" data-field="quant[1]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </div>
                                    <div class="add-to-cart">
                                        <button type="submit" class="btn">Add to cart</button>
                                        <a href="wishlist/lorem-ipsum-is-simply" class="btn min"><i
                                                class="ti-heart"></i></a>
                                    </div>
                                </form>
                                <div class="default-social">
                                    <!-- ShareThis BEGIN -->
                                    <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="8" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                                                                                                      aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <div class="quickview-slider-active">
                                    <div class="single-slider">
                                        <img src="assets/img/IMG_2384.JPG" alt="assets/img/IMG_2384.JPG">
                                    </div>
                                    <div class="single-slider">
                                        <img src="photos/1/Products/calvin.jpg" alt="photos/1/Products/calvin.jpg">
                                    </div>
                                    <div class="single-slider">
                                        <img src="photos/1/Products/d3fdb-image2xxl-4-.jpg"
                                             alt="photos/1/Products/d3fdb-image2xxl-4-.jpg">
                                    </div>
                                </div>
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content">
                                <h2>Baby Girls&#039; 2-Piece Yell</h2>
                                <div class="quickview-ratting-review">
                                    <div class="quickview-ratting-wrap">
                                        <div class="quickview-ratting">

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"> (0 customer review)</a>
                                    </div>
                                    <div class="quickview-stock">
                                        <span><i class="fa fa-check-circle-o"></i> 1 in stock</span>
                                    </div>
                                </div>
                                <h3><small><del class="text-muted">$200.00</del></small> $200.00 </h3>
                                <div class="quickview-peragraph">
                                    <p>
                                    <p><span style="font-family: " Open Sans", Arial, sans-serif; font-size: 14px;
                                        text-align: justify;">"Sed ut perspiciatis unde omnis iste natus error
                                        sit
                                        voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                        ipsa
                                        quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                                        sunt
                                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
                                        odit
                                        aut fugit,</span><br></p>
                                    </p>
                                </div>
                                <div class="size">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Size</h5>
                                            <select>
                                                <option>S</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <form action="add-to-cart" method="POST" class="mt-4">
                                    <input type="hidden" name="_token" value="WIPeOVF1KXapY14gtfRWQ3Vq45IWmKyviGUdsnNx">
                                    <div class="quantity">
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number"
                                                        disabled="disabled" data-type="minus" data-field="quant[1]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="hidden" name="slug" value="baby-girls-2-piece-yell">
                                            <input type="text" name="quant[1]" class="input-number" data-min="1"
                                                   data-max="1000" value="1">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number"
                                                        data-type="plus" data-field="quant[1]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </div>
                                    <div class="add-to-cart">
                                        <button type="submit" class="btn">Add to cart</button>
                                        <a href="wishlist/baby-girls-2-piece-yell" class="btn min"><i
                                                class="ti-heart"></i></a>
                                    </div>
                                </form>
                                <div class="default-social">
                                    <!-- ShareThis BEGIN -->
                                    <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="7" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                                                                                                      aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <div class="quickview-slider-active">
                                    <div class="single-slider">
                                        <img src="assets/img/IMG_2393.JPG" alt="assets/img/IMG_2393.JPG">
                                    </div>
                                    <div class="single-slider">
                                        <img src="photos/1/Products/07e30-mtk006b.jpg"
                                             alt="photos/1/Products/07e30-mtk006b.jpg">
                                    </div>
                                    <div class="single-slider">
                                        <img src="photos/1/Products/18b18-wbk003b.jpg"
                                             alt="photos/1/Products/18b18-wbk003b.jpg">
                                    </div>
                                </div>
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content">
                                <h2>GRAY BABY ROMPERS</h2>
                                <div class="quickview-ratting-review">
                                    <div class="quickview-ratting-wrap">
                                        <div class="quickview-ratting">

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"> (0 customer review)</a>
                                    </div>
                                    <div class="quickview-stock">

                                        <span><i class="fa fa-times-circle-o text-danger"></i> 0 out stock</span>
                                    </div>
                                </div>
                                <h3><small><del class="text-muted">$1,999.00</del></small> $1,939.03 </h3>
                                <div class="quickview-peragraph">
                                    <p>
                                    <p><span style="font-family: " Open Sans", Arial, sans-serif; font-size: 14px;
                                        text-align: justify;">"But I must explain to you how all this mistaken
                                        idea
                                        of denouncing pleasure and praising pain was born and I will give you a
                                        complete account of the system,</span><br></p>
                                    </p>
                                </div>
                                <div class="size">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Size</h5>
                                            <select>
                                                <option>L</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <form action="add-to-cart" method="POST" class="mt-4">
                                    <input type="hidden" name="_token" value="WIPeOVF1KXapY14gtfRWQ3Vq45IWmKyviGUdsnNx">
                                    <div class="quantity">
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number"
                                                        disabled="disabled" data-type="minus" data-field="quant[1]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="hidden" name="slug" value="gray-baby-rompers">
                                            <input type="text" name="quant[1]" class="input-number" data-min="1"
                                                   data-max="1000" value="1">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number"
                                                        data-type="plus" data-field="quant[1]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </div>
                                    <div class="add-to-cart">
                                        <button type="submit" class="btn">Add to cart</button>
                                        <a href="wishlist/gray-baby-rompers" class="btn min"><i
                                                class="ti-heart"></i></a>
                                    </div>
                                </form>
                                <div class="default-social">
                                    <!-- ShareThis BEGIN -->
                                    <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="6" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                                                                                                      aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <div class="quickview-slider-active">
                                    <div class="single-slider">
                                        <img src="assets/img/IMG_2384.JPG" alt="assets/img/IMG_2384.JPG">
                                    </div>
                                    <div class="single-slider">
                                        <img src="photos/1/Products/5ded8-image1xxl-5-.jpg"
                                             alt="photos/1/Products/5ded8-image1xxl-5-.jpg">
                                    </div>
                                    <div class="single-slider">
                                        <img src="photos/1/Products/74840-image4xxl-6-.jpg"
                                             alt="photos/1/Products/74840-image4xxl-6-.jpg">
                                    </div>
                                </div>
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content">
                                <h2>Ladies Cotton Kurti Sha</h2>
                                <div class="quickview-ratting-review">
                                    <div class="quickview-ratting-wrap">
                                        <div class="quickview-ratting">

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"> (0 customer review)</a>
                                    </div>
                                    <div class="quickview-stock">
                                        <span><i class="fa fa-check-circle-o"></i> 6 in stock</span>
                                    </div>
                                </div>
                                <h3><small><del class="text-muted">$6,000.00</del></small> $5,820.00 </h3>
                                <div class="quickview-peragraph">
                                    <p>
                                    <p><span style="font-family: " Open Sans", Arial, sans-serif; font-size: 14px;
                                        text-align: justify;">"But I must explain to you how all this mistaken
                                        idea
                                        of denouncing pleasure and praising pain was born and I will give you a
                                        complete account of the system,</span><br></p>
                                    </p>
                                </div>
                                <div class="size">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Size</h5>
                                            <select>
                                                <option>M</option>
                                                <option>L</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <form action="add-to-cart" method="POST" class="mt-4">
                                    <input type="hidden" name="_token" value="WIPeOVF1KXapY14gtfRWQ3Vq45IWmKyviGUdsnNx">
                                    <div class="quantity">
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number"
                                                        disabled="disabled" data-type="minus" data-field="quant[1]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="hidden" name="slug" value="ladies-cotton-kurti-sha">
                                            <input type="text" name="quant[1]" class="input-number" data-min="1"
                                                   data-max="1000" value="1">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number"
                                                        data-type="plus" data-field="quant[1]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </div>
                                    <div class="add-to-cart">
                                        <button type="submit" class="btn">Add to cart</button>
                                        <a href="wishlist/ladies-cotton-kurti-sha" class="btn min"><i
                                                class="ti-heart"></i></a>
                                    </div>
                                </form>
                                <div class="default-social">
                                    <!-- ShareThis BEGIN -->
                                    <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="5" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"
                                                                                                      aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <!-- Product Slider -->
                            <div class="product-gallery">
                                <div class="quickview-slider-active">
                                    <div class="single-slider">
                                        <img src="assets/img/IMG_2393.JPG" alt="assets/img/IMG_2393.JPG">
                                    </div>
                                </div>
                            </div>
                            <!-- End Product slider -->
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content">
                                <h2>Cotton High Quality Kurt</h2>
                                <div class="quickview-ratting-review">
                                    <div class="quickview-ratting-wrap">
                                        <div class="quickview-ratting">

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>

                                            <i class="fa fa-star"></i>
                                        </div>
                                        <a href="#"> (0 customer review)</a>
                                    </div>
                                    <div class="quickview-stock">

                                        <span><i class="fa fa-times-circle-o text-danger"></i> 0 out stock</span>
                                    </div>
                                </div>
                                <h3><small><del class="text-muted">$4,000.00</del></small> $3,600.00 </h3>
                                <div class="quickview-peragraph">
                                    <p>
                                    <p><span style="font-family: " Open Sans", Arial, sans-serif; font-size: 14px;
                                        text-align: justify;">At vero eos et accusamus et iusto odio dignissimos
                                        ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti
                                        quos
                                        dolores et quas molestias excepturi sint occaecati cupiditate non
                                        provident,</span><br></p>
                                    </p>
                                </div>
                                <div class="size">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <h5 class="title">Size</h5>
                                            <select>
                                                <option>M</option>
                                                <option>XL</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <form action="add-to-cart" method="POST" class="mt-4">
                                    <input type="hidden" name="_token" value="WIPeOVF1KXapY14gtfRWQ3Vq45IWmKyviGUdsnNx">
                                    <div class="quantity">
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number"
                                                        disabled="disabled" data-type="minus" data-field="quant[1]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="hidden" name="slug" value="cotton-high-quality-kurt">
                                            <input type="text" name="quant[1]" class="input-number" data-min="1"
                                                   data-max="1000" value="1">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number"
                                                        data-type="plus" data-field="quant[1]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </div>
                                    <div class="add-to-cart">
                                        <button type="submit" class="btn">Add to cart</button>
                                        <a href="" class="btn min"><i class="ti-heart"></i></a>
                                    </div>
                                </form>
                                <div class="default-social">
                                    <!-- ShareThis BEGIN -->
                                    <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        /*==================================================================
        [ Isotope ]*/
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');
        // filter items on button click
        $filter.each(function() {
            $filter.on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({
                    filter: filterValue
                });
            });
        });
        // init Isotope
        $(window).on('load', function() {
            var $grid = $topeContainer.each(function() {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine: 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });
        var isotopeButton = $('.filter-tope-group button');
        $(isotopeButton).each(function() {
            $(this).on('click', function() {
                for (var i = 0; i < isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }
                $(this).addClass('how-active1');
            });
        });
    </script>
    <script>
        function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen || el.webkitCancelFullScreen || el.mozCancelFullScreen || el
                .exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el
                .msRequestFullscreen;
            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>

    <script>
        setTimeout(function() {
            $('.alert').slideUp();
        }, 5000);
        $(function() {
            // ------------------------------------------------------- //
            // Multi Level dropdowns
            // ------------------------------------------------------ //
            $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
                event.preventDefault();
                event.stopPropagation();
                $(this).siblings().toggleClass("show");
                if (!$(this).next().hasClass('show')) {
                    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
                }
                $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                    $('.dropdown-submenu .show').removeClass("show");
                });
            });
        });
    </script>
@endpush
