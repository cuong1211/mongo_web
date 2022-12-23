<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="{{route('home')}}">
                            <img src="assets/img/nhc-logo1.png" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            @if (Request::route()->getName() == 'home')
                                <li class="current-list-item"><a href="{{route('home')}}">Trang chủ</a>
                                </li>
                            @else
                                <li><a href="{{route('home')}}">Trang chủ</a>
                                </li>
                            @endif
                            @if (Request::route()->getName() == 'frontend.product')
                                <li class="current-list-item"><a href="{{route('frontend.product')}}">Sản phẩm</a>
                                </li>
                            @else
                                <li><a href="{{route('frontend.product')}}">Sản phẩm</a>
                                </li>
                            @endif
                            
                            <li>
                                <div class="header-icons">
                                @if (Request::route()->getName() == 'frontend.product' ||  Request::route()->getName() == 'frontend.search')
                                    <a class="mobile-hide search-bar-icon"><i class="fas fa-search"></i></a>
                                @else

                                @endif
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>