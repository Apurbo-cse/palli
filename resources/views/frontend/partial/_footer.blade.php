<footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer about">
                        <div class="logo">
                            <!-- <a href="index.html"><img src="https://pallicraftsltd.com/backend/img/logo2.png" alt="#"></a> -->
                            <h3 class="text-light">Pallicrafts LTD</h3>
                        </div>
                        <p class="text">
                        <p>{!! \Illuminate\Support\Str::limit($info->about, 150, $end='...') !!}<a style="color: #f7f5f2; margin-left: 15px;" href="{{route('about')}}">Read more</a></p>
                        <p class="call">Got Question? Call us 24/7<span><a href="tel:123456789"> {{$info->phone}}</a></span></p>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4>Information</h4>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('about')}}">About Us</a></li>
{{--                            <li><a href="#">Faq</a></li>--}}
{{--                            <li><a href="#">Terms & Conditions</a></li>--}}
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
{{--                            <li><a href="#">Help</a></li>--}}
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <h4>Customer Service</h4>
                        <ul>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Money-back</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <!-- End Single Widget -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer social">
                        <h4>Get In Tuch</h4>
                        <!-- Single Widget -->
                        <div class="contact">
                            <ul>
                                <li> {{$info->address}} </li>
                                <li> {{$info->email}} </li>
                                <li> {{$info->phone}} </li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                        <!-- <div class="sharethis-inline-follow-buttons"></div> -->
                    </div>
                    <!-- End Single Widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <div class="copyright">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="left">
                            <p>Copyright © {{date("Y")}} <a href="https://www.facebook.com/mizanurrahamanraihan"
                                                    target="_blank">Mizanur Rahaman Raihan</a> - All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="right">
                            <img src="https://pallicraftsltd.com/backend/img/payments.png" alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=======================================================================================-->
            <!--Developed by jahid hassan shovon, email: jahidhassandiu91@gmail.com-->
    <!--=======================================================================================-->
</footer>
