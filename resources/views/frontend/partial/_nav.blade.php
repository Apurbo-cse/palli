<div class="header-inner">
    <div class="container">
        <div class="cat-nav-head">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="menu-area">
                        <!-- Main Menu -->
                        <nav class="navbar navbar-expand-lg">
                            <div class="navbar-collapse">
                                <div class="nav-inner">
                                    <ul class="nav main-menu menu navbar-nav">
                                        <li class=""><a href="{{route('home')}}">Home</a></li>
                                        <li class=""><a href="{{route('about')}}">About Us</a></li>
                                        <li class=""><a href="{{route('productList')}}">Products</a><span
                                                class="new">New</span></li>

                                        <li>
                                            <a href="javascript:void(0);">Category<i
                                                    class="ti-angle-down"></i></a>
                                            <ul class="dropdown border-0 shadow">
                                                @foreach($categories as $category)
                                                    <li>
                                                        <a href="{{route('category.product', $category->id)}}">{{$category->name}}</a>
                                                        <ul class="dropdown sub-dropdown border-0 shadow">
                                                            @foreach($subcategories as $subcategory)
                                                            <li>
                                                                @if($subcategory->category_id == $category->id)
                                                                    <a href="{{route('subcategory.product', $category->id)}}">{{$subcategory->name}}</a>
                                                                @endif
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>

                                        <li class=""><a href="{{route('artisans')}}">Artisans</a></li>
                                        <li>
                                            <a href="javascript:void(0);">More Info<i class="ti-angle-down"></i></a>
                                            <ul class="dropdown border-0 shadow">
                                                <li><a href="{{route('fairTrade')}}">Fair Trade principles</a></li>
                                                <li><a href="{{route('material')}}">Materials & Techniques</a></li>
                                                <li><a href="{{route('video')}}">Video Session</a></li>
                                            </ul>
                                        </li>
                                        <li class=""><a href="{{route('blog')}}">Blog</a></li>
                                        <li class=""><a href="{{route('contact')}}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
