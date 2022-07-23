<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <!-- Top Left -->
                <div class="top-left">
                    <ul class="list-main">
                        {{--{{$info}}--}}
                        <li><i class="ti-headphone-alt"></i> {{$info->phone}} </li>
                        <li><i class="ti-email"></i> {{$info->email}} </li>
                    </ul>
                </div>
                <!--/ End Top Left -->
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <!-- Top Right -->
                <div class="right-content">
                    <ul class="list-main">
                        <li><i class="ti-location-pin"></i> <a href="">Track Order</a></li>

                        <li>
                            <i class="ti-power-off"></i>
                            @if(Auth::user())
                                <a href="{{route('admin.dashboard')}}">Dashboard</a>
                            @else
                                <a href="{{route('login')}}">Login /</a>
                                <a href="">Register</a>
                            @endif
                        </li>
                    </ul>
                </div>
                <!-- End Top Right -->
            </div>
        </div>
    </div>
</div>
<!-- End Topbar -->
<div class="middle-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-12">
                <!-- Logo -->
                <div class="logo">

                    <a href="{{ route('home') }}"><img src="{{asset('assets/frontend')}}/img/Logo-02 png.png" class="image-fluid"
                                              style="margin-top:-65px" alt="logo"></a>
                </div>
                <!--/ End Logo -->
                <!-- Search Form -->
                <div class="search-top">
                    <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                    <!-- Search Form -->
                    <div class="search-top">
                        <form method="post" class="search-form">
                            <input type="text" name="search" autocomplete="false" placeholder="Search here...">
                            <button value="search" type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                    <!--/ End Search Form -->
                </div>
                <!--/ End Search Form -->
                <div class="mobile-nav"></div>
            </div>
            <div class="col-lg-8 col-md-7 col-12">
                <div class="search-bar-top">
                    <form action="{{route('search')}}" method="post">
                        @csrf
                        <div class="search-bar">
                            <select name="category">
                                <option value="all">All Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <input name="search" value="{{old('search')}}" placeholder="Search Products Here....." type="text">
                            <button class="btnn" type="submit"><i class="ti-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-12">
                <div class="right-bar">
                    <!-- Search Form -->
                    <div class="sinlge-bar shopping">
                        <a href="https://pallicraftsltd.com" class="single-icon"><i
                                class="fa fa-heart-o"></i> <span class="total-count">0</span></a>
                        <!-- Shopping Item -->
                        <!--/ End Shopping Item -->
                    </div>

                    <div class="sinlge-bar shopping">
                        <a href="" class="single-icon"><i class="ti-bag"></i> <span
                                class="total-count">0</span></a>
                        <!-- Shopping Item -->
                        <!--/ End Shopping Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header Inner -->
