@extends('layout.frontend.index')
@section('content')
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <form method="get" action="{{ route('frontend.search') }}">
                                <h3>Tìm kiếm sản phẩm:</h3>
                                <input type="text" name="query"placeholder="Tên sản phẩm">
                                <button type="submit">Tìm kiếm <i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search arewa -->

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        @if ($product_search != null)
                            <p class="subtitle">Kết quả tìm kiếm cho: </p><span style="color: white; font-size:3rem">{{ $search }}</span>
                        @else
                            <p class="subtitle">Chào mừng bạn đến với</p>
                            <span style="color: white; font-size:3rem">SẢN PHẨM CỦA CHÚNG TÔI</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            @if ($product_search != null)
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-filters">
                            <ul>
                                <li class="active" data-filter="*">Tất cả</li>
                                @foreach ($cate as $item)
                                    <li data-filter=".{{ $item->slug }}">{{ $item->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row product-lists">
                @if ($product_search != null)
                    @foreach ($product_search as $item)
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
                @else
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
                @endif
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        {{ $product->render('pages.frontend.paginate') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
