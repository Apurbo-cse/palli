<section class="shop-newsletter section">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <!-- Start Newsletter Inner -->
                    <div class="inner">
                        <h4>Newsletter</h4>
                        <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
                        <form action="{{route('newsletter')}}" method="post" class="newsletter-inner">
                            @csrf
                            <input type="email" name="email" autocomplete="false" value="{{ old('email') }}" placeholder="Enter your email address">
                            <button class="btn" type="submit">Subscribe</button>
                        </form>

                        @error('email')
                            <div style="color: red">{{ $message }}</div>
                        @enderror
                    </div>

                    @if (Session::has('success'))
                        <div class="alert alert-success mt-5">
                            <ul>
                                <li>{!! Session::get('success') !!}</li>
                            </ul>
                        </div>
                @endif
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
