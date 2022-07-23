@extends('frontend.master')
@section('title', 'Palli Crafts || PRODUCT GRID')
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
                            <li class="active"><a href="javascript:void(0);">Shop Grid</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Categories</h3>
                            <ul class="categor-list">
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{route('category.product', $category->id)}}">{{$category->name}}</a>
                                    <ul>
                                        @foreach($subcategories as $subcategory)
                                            @if($subcategory->category_id == $category->id)
                                                <li>
                                                    <a href="{{route('subcategory.product', $subcategory->id)}}">{{$subcategory->name}}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Shop By Price -->
                        <div class="single-widget range">
                            <h3 class="title">Shop by Price</h3>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range" data-min="0" data-max="6000"></div>
                                    <div class="product_filter">
                                        <button type="submit" class="filter_button">Filter</button>
                                        <div class="label-input">
                                            <span>Range:</span>
                                            <input style="" type="text" id="amount" readonly/>
                                            <input type="hidden" name="price_range" id="price_range" value=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ End Shop By Price -->
                        <!-- Single Widget -->
                        <div class="single-widget recent-post">
                            <h3 class="title">Recent post</h3>

                            @foreach($newProducts as $newProduct)
                                <div class="single-post first">
                                    <div class="image">
                                        <img src="{{asset($newProduct->image)}}" alt="product">
                                    </div>
                                    <div class="content">
                                        <h5><a href="{{route('product.details', $newProduct->id)}}">{{$newProduct->title}}</a></h5>
                                        <p class="price"><del class="text-muted">${{$newProduct->regular_price}}</del>   ${{$newProduct->offer_price}}  </p>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                         <!-- <div class="single-widget category">
                            <h3 class="title">Brands</h3>
                            <ul class="categor-list">
                                <li><a href="product-brand/adidas">Adidas</a></li>
                                <li><a href="product-brand/brand">Brand</a></li>
                                <li><a href="product-brand/kappa">Kappa</a></li>
                                <li><a href="product-brand/nike">Nike</a></li>
                                <li><a href="product-brand/prada">Prada</a></li>
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    <div class="single-shorter">
                                        <label>Show :</label>
                                        <select class="show" name="show" onchange="this.form.submit();">
                                            <option value="">Default</option>
                                            <option value="9" >09</option>
                                            <option value="15" >15</option>
                                            <option value="21" >21</option>
                                            <option value="30" >30</option>
                                        </select>
                                    </div>
                                    <div class="single-shorter">
                                        <label>Sort By :</label>
                                        <select class='sortBy' name='sortBy' onchange="this.form.submit();">
                                            <option value="">Default</option>
                                            <option value="title" >Name</option>
                                            <option value="price" >Price</option>
                                            <option value="category" >Category</option>
                                            <option value="brand" >Brand</option>
                                        </select>
                                    </div>
                                </div>
                                <ul class="view-mode">
                                    <li class="active"><a href=""><i class="fa fa-th-large"></i></a></li>
                                    <li><a href=""><i class="fa fa-th-list"></i></a></li>
                                </ul>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row">
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
                                        <!--<div class="product-action">
                                            <a data-toggle="modal" data-target="#1" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                            <a title="Wishlist" href="wishlist/melange-casual-black" class="wishlist" data-id="1"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="add-to-cart/melange-casual-black">Add to cart</a>
                                        </div> -->
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
        </div>
    </section>

@endsection
