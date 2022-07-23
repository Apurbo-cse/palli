<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('frontend.partial._header_link')
    <title>@yield('title')</title>
    @stack('css')
</head>

<body class="js">

<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- End Preloader -->

<!-- Header -->
<header class="header shop">
    @include('frontend.partial._header')
    @include('frontend.partial._nav')
</header>
<!--/ End Header -->
<!-- Slider Area -->
<section class="hero-slider">
    <!-- Single Slider -->

    <!--/ End Single Slider -->
</section>

@yield('main-content')


<!-- Start Footer Area -->
@include('frontend.partial._footer')
<!-- /End Footer Area -->
@include('frontend.partial._footer_link')

@stack('js')

</body>

</html>
