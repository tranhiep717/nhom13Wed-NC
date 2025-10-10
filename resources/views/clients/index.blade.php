@extends('layouts.main')

@section('title', 'home')

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('img/shop01.png') }}" alt="Bộ sưu tập máy tính xách tay">
                    </div>
                    <div class="shop-body">
                        <h3>Bộ sưu tập<br>Máy tính xách tay</h3>
                        {{-- Sửa: Sử dụng route 'laptop' --}}
                        <a href="{{route('laptop')}}" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('img/shop01.png') }}" alt="Bộ sưu tập phụ kiện">
                    </div>
                    <div class="shop-body">
                        <h3>Bộ sưu tập<br>Phụ kiện</h3>
                        {{-- Sửa: Sử dụng route 'accessories' --}}
                        <a href="{{route('accessories')}}" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('img/shop01.png') }}" alt="Bộ sưu tập camera">
                    </div>
                    <div class="shop-body">
                        <h3>Bộ sưu tập<br>Camera</h3>
                        {{-- Sửa: Sử dụng route 'camera' --}}
                        <a href="{{route('camera')}}" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản phẩm mới</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            {{-- Bạn có thể thêm các tab lọc theo danh mục ở đây nếu muốn --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="products-slick" data-nav="#slick-nav-1">
                        @foreach($newProducts as $product)
                        <div class="product" style="position:relative">
                            <a href="{{ route('products.show', $product->slug) }}" class="stretched-link" style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:2;"></a>
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                                @if($product->is_new)
                                <div class="product-label">
                                    <span class="new">MỚI</span>
                                </div>
                                @endif
                                @if($product->discount_percentage > 0)
                                <div class="product-label">
                                    <span class="sale">-{{ $product->discount_percentage }}%</span>
                                </div>
                                @endif
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p>
                                {{-- Sửa: Sử dụng route 'products.show' --}}
                                <h3 class="product-name"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                <h4 class="product-price">{{ number_format($product->price) }} VNĐ <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del></h4>
                                <div class="product-rating">
    @php
        $avgRating = $product->ratings->avg('rating');
    @endphp
    @for($i = 1; $i <= 5; $i++)
        <i class="fa fa-star{{ $i <= $avgRating ? '' : '-o' }}"></i>
    @endfor
    <span>({{ $product->ratings->count() }})</span>
</div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div id="slick-nav-1" class="products-slick-nav"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="hot-deal" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>02</h3>
                                <span>Ngày</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>10</h3>
                                <span>Giờ</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>34</h3>
                                <span>Phút</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>60</h3>
                                <span>Giây</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">Deal hot tuần này</h2>
                    <p>Giảm giá tới 50%</p>
                    <a class="primary-btn cta-btn" href="{{ route('store.index') }}">Mua ngay</a> {{-- Hoặc link đến một danh mục deal hot cụ thể --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Sản phẩm hàng đầu</h4>
                    <div class="section-nav">
                        <div id="slick-nav-2" class="products-slick-nav"></div>
                    </div>
                </div>
                <div class="products-widget-slick" data-nav="#slick-nav-2">
                    <div>
                        @foreach($widgetProducts1 as $product)
                        <div class="product-widget" style="position:relative">
                            <a href="{{ route('products.show', $product->slug) }}" class="stretched-link" style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:2;"></a>
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p>
                                {{-- Sửa: Sử dụng route 'products.show' --}}
                                <h3 class="product-name"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                <h4 class="product-price">{{ number_format($product->price) }} VNĐ <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del></h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div>
                        @foreach($widgetProducts2 as $product)
                        <div class="product-widget" style="position:relative">
                            <a href="{{ route('products.show', $product->slug) }}" class="stretched-link" style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:2;"></a>
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p>
                                {{-- Sửa: Sử dụng route 'products.show' --}}
                                <h3 class="product-name"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                <h4 class="product-price">{{ number_format($product->price) }} VNĐ <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del></h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Sản phẩm yêu thích</h4>
                    <div class="section-nav">
                        <div id="slick-nav-3" class="products-slick-nav"></div>
                    </div>
                </div>
                <div class="products-widget-slick" data-nav="#slick-nav-3">
                    <div>
                        @foreach($widgetProducts3 as $product)
                        <div class="product-widget" style="position:relative">
                            <a href="{{ route('products.show', $product->slug) }}" class="stretched-link" style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:2;"></a>
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p>
                                {{-- Sửa: Sử dụng route 'products.show' --}}
                                <h3 class="product-name"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                <h4 class="product-price">{{ number_format($product->price) }} VNĐ <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del></h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div>
                        @foreach($widgetProducts4 as $product)
                        <div class="product-widget" style="position:relative">
                            <a href="{{ route('products.show', $product->slug) }}" class="stretched-link" style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:2;"></a>
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p>
                                {{-- Sửa: Sử dụng route 'products.show' --}}
                                <h3 class="product-name"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                <h4 class="product-price">{{ number_format($product->price) }} VNĐ <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del></h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="clearfix visible-sm visible-xs"></div>

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Sản phẩm bán chạy</h4>
                    <div class="section-nav">
                        <div id="slick-nav-5" class="products-slick-nav"></div>
                    </div>
                </div>
                <div class="products-widget-slick" data-nav="#slick-nav-5">
                    <div>
                        @foreach($widgetProducts5 as $product)
                        <div class="product-widget" style="position:relative">
                            <a href="{{ route('products.show', $product->slug) }}" class="stretched-link" style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:2;"></a>
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p>
                                {{-- Sửa: Sử dụng route 'products.show' --}}
                                <h3 class="product-name"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                <h4 class="product-price">{{ number_format($product->price) }} VNĐ <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del></h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div>
                        {{-- Vòng lặp thứ hai cho topSellingProducts, đảm bảo biến $product được dùng đúng --}}
                        @foreach($topSellingProducts->take(3) as $product) {{-- Lấy 3 sản phẩm đầu tiên từ topSellingProducts --}}
                        <div class="product-widget" style="position:relative">
                            <a href="{{ route('products.show', $product->slug) }}" class="stretched-link" style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:2;"></a>
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p>
                                {{-- Sửa: Sử dụng route 'products.show' --}}
                                <h3 class="product-name"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                <h4 class="product-price">{{ number_format($product->price) }} VNĐ <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del></h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="newsletter" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Đăng ký nhận <strong>BẢN TIN</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Nhập Email của bạn">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Đăng ký</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
