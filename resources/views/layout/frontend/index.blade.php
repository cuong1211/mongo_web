<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.frontend.source')
</head>

<body>

    <!--PreLoader-->
    {{-- <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div> --}}
    <!--PreLoader Ends-->

    <!-- header -->
    @include('layout.frontend.header')
    <!-- end header -->

    @yield('content')

    <!-- footer -->
    @include('layout.frontend.footer')
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Bản quyền năm &copy; 2022 - <a href="https://imransdesign.com/">Ninh Huy Cường</a>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="https://www.facebook.com/ANBU0012" target="_blank"><i class="fab fa-facebook-f"></i>Ninh</a></li>
                            <li><a href="https://www.facebook.com/maiduchuy01" target="_blank"><i class="fab fa-facebook-f">Huy</i></a></li>
                            <li><a href="https://www.facebook.com/thaicuong1211/" target="_blank"><i class="fab fa-facebook-f">Cuong</i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->

    <!-- jquery -->
    @yield('scripts')
    @stack('jsfrontend')

</body>

</html>
