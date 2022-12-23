@extends('layout.frontend.index')
@section('content')
    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    <!-- home page slider -->
    <div class="homepage-slider">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-1"
            style="background-image: url(https://media.istockphoto.com/id/1271388654/photo/rainbow-birthday-cake-with-candles.jpg?s=612x612&w=0&k=20&c=ExPphgwIojpoETTTMimyTO8cPNe_Cgx_JXvdysAeU1U=)">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Đẹp và thời thượng</p>
                                <h1>Mang đến cho bạn một sinh nhật tuyệt vời</h1>
                                <div class="hero-btns">
                                    <a href="shop.html" class="boxed-btn">Xem sản phẩm</a>
                                    <a href="contact.html" class="bordered-btn">Liên hệ với chúng tôi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-2"
            style="background-image: url(https://www.zastavki.com/pictures/1920x1080/2013/Holidays___Birthday_Chocolate_birthday_cake_051870_23.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Cửa hàng bánh sinh nhật</p>
                                <h1>Xịn nhất Thái Nguyên</h1>
                                <div class="hero-btns">
                                    <a href="shop.html" class="boxed-btn">Xem sản phẩm</a>
                                    <a href="contact.html" class="bordered-btn">Liên hệ với chúng tôi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-3"
            style="background-image: url(https://kidsinadelaide.com.au/wp-content/uploads/2021/07/adelaide-birthday-cakes.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-right">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Dịch vụ uy tín</p>
                                <h1>Hãy đặt bánh ngay nào</h1>
                                <div class="hero-btns">
                                    <a href="shop.html" class="boxed-btn">Xem sản phẩm</a>
                                    <a href="contact.html" class="bordered-btn">Liên hệ với chúng tôi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home page slider -->

    <!-- features list section -->
    <div class="list-section pt-80 pb-80">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content">
                            <h3>Miễn phí vẫn chuyển</h3>
                            <p>Đơn hàng trên 500k</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>Hỗ trợ 24/7</h3>
                            <p>Kể cả khi bạn ngủ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content">
                            <h3>Đổi trả</h3>
                            <p>Sản phẩm lỗi</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end features list section -->

    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Sản phẩm </span>nổi bật</h3>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($product as $item)
                    <div class="col-lg-4 col-md-6 text-center {{ $item->category->slug }}">
                        <div class="single-product-item">
                            <div class="product-image">
                                <span><img src="{{ asset('images/' . $item->img) }}" alt="product"></span>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <a href="{{ route('cart.checkout', ['id' => $item->id]) }}" class="cart-btn"><i
                                    class="fas fa-shopping-cart"></i> Đặt hàng</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end product section -->

    <!-- cart banner section -->
    {{-- <section class="cart-banner pt-100 pb-100">
    <div class="container">
        <div class="row clearfix">
            <!--Image Column-->
            <div class="image-column col-lg-6">
                <div class="image">
                    <div class="price-box">
                        <div class="inner-price">
                            <span class="price">
                                <strong>30%</strong> <br> off per kg
                            </span>
                        </div>
                    </div>
                    <img src="assets/img/a.jpg" alt="">
                </div>
            </div>
            <!--Content Column-->
            <div class="content-column col-lg-6">
                <h3><span class="orange-text">Deal</span> of the month</h3>
                <h4>Hikan Strwaberry</h4>
                <div class="text">Quisquam minus maiores repudiandae nobis, minima saepe id, fugit ullam similique! Beatae, minima quisquam molestias facere ea. Perspiciatis unde omnis iste natus error sit voluptatem accusant</div>
                <!--Countdown Timer-->
                <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2020/2/01"><div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div>
                <a href="cart.html" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
            </div>
        </div>
    </div>
</section> --}}
    <!-- end cart banner section -->

    <!-- testimonail-section -->
    <div class="testimonail-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="assets/img/avaters/avatar1.png" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Huy Smile<span>Chủ cửa hàng</span></h3>
                                <p class="testimonial-body">
                                    " Với chúng ta, ngày sinh nhật là một ngày trọng đại vì vậy chúng tôi luôn muốn đem đến
                                    cho mọi người một ngày sinh nhật tuyệt vời nhất"
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="assets/img/avaters/avatar2.png" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Hà Văn Ninh<span>Đồng sáng lập cửa hàng</span></h3>
                                <p class="testimonial-body">
                                    " Độ uy tín và dịch vụ là nòng cốt của cửa hàng, chúng tôi luôn muốn đó là điểm mạnh để
                                    mọi người tin tưởng vào của hàng của chúng tôi "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-slider">
                            <div class="client-avater">
                                <img src="assets/img/avaters/avatar3.png" alt="">
                            </div>
                            <div class="client-meta">
                                <h3>Thái Văn Cường <span>Đồng sáng lập cửa hàng</span></h3>
                                <p class="testimonial-body">
                                    " Ý kiến của tôi như hai người trước "
                                </p>
                                <div class="last-icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end testimonail-section -->

    <!-- advertisement section -->
    <div class="abt-section mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="abt-bg">
                        <a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i
                                class="fas fa-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="abt-text">
                        <p class="top-sub">Thành lập từ những năm 2000</p>
                        <h2>Chúng tôi là <span class="orange-text">NHC</span></h2>
                        <p>Với niềm đam mê với bánh sinh nhật và trọng trách lớn lao mang lại ngày sinh nhật ý nghĩa đến với
                            mỗi người.</p>
                        <p>Chúng tôi đã bắt tay thực hiện và dần len lỏi đến những bữa tiệc sinh nhật ý nghĩa.</p>
                        <a href="about.html" class="boxed-btn mt-4">Hiểu thêm về chúng tôi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end advertisement section -->

    <!-- shop banner -->
    {{-- <section class="shop-banner">
    <div class="container">
        <h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
        <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
        <a href="shop.html" class="cart-btn btn-lg">Shop Now</a>
    </div>
</section> --}}
    <!-- end shop banner -->

    <!-- latest news -->
    {{-- <div class="latest-news pt-150 pb-150">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">	
                    <h3><span class="orange-text">Our</span> News</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-news">
                    <a href="single-news.html"><div class="latest-news-bg news-bg-1"></div></a>
                    <div class="news-text-box">
                        <h3><a href="single-news.html">You will vainly look for fruit on it in autumn.</a></h3>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> Admin</span>
                            <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                        </p>
                        <p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
                        <a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-news">
                    <a href="single-news.html"><div class="latest-news-bg news-bg-2"></div></a>
                    <div class="news-text-box">
                        <h3><a href="single-news.html">A man's worth has its season, like tomato.</a></h3>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> Admin</span>
                            <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                        </p>
                        <p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
                        <a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                <div class="single-latest-news">
                    <a href="single-news.html"><div class="latest-news-bg news-bg-3"></div></a>
                    <div class="news-text-box">
                        <h3><a href="single-news.html">Good thoughts bear good fresh juicy fruit.</a></h3>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> Admin</span>
                            <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                        </p>
                        <p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
                        <a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="news.html" class="boxed-btn">More News</a>
            </div>
        </div>
    </div>
</div> --}}
    <!-- end latest news -->

    <!-- logo carousel -->
    {{-- <div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/1.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/2.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/3.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/4.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <!-- end logo carousel -->
@endsection
