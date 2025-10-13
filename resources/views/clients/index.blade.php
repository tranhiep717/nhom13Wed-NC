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
                        <a href="{{route('laptop')}}" class="cta-btn">Mua ngay <i
                                class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="{{route('accessories')}}" class="cta-btn">Mua ngay <i
                                class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="{{route('camera')}}" class="cta-btn">Mua ngay <i
                                class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="{{ route('products.show', $product->slug) }}"
                            style="display:block;height:100%;text-decoration:none;color:inherit;">
                            <div class="product"
                                style="cursor:pointer;border-radius:18px;box-shadow:0 2px 16px #e3e3e3;transition:box-shadow .2s,transform .2s;background:#fff;overflow:hidden;position:relative;min-height:420px;display:flex;flex-direction:column;justify-content:space-between;height:100%;">
                                <div class="product-img" style="padding:24px 24px 0 24px;text-align:center;">
                                    @php
                                        $imagePath = $product->image_path && file_exists(public_path('storage/' . $product->image_path))
                                            ? asset('storage/' . $product->image_path)
                                            : asset('img/default-product.png');
                                    @endphp
                                    <img src="{{ $imagePath }}" alt="{{ $product->name }}"
                                        style="max-width:100%;max-height:180px;border-radius:12px;box-shadow:0 2px 8px #f0f0f0;object-fit:contain;background:#f8fafc;">
                                    @if($product->is_new)
                                    <div class="product-label"
                                        style="position:absolute;top:18px;left:18px;background:#43a047;color:#fff;font-weight:700;border-radius:8px 0 8px 0;padding:3px 14px;font-size:13px;">
                                        MỚI</div>
                                    @endif
                                    @if($product->discount_percentage > 0)
                                    <div class="product-label"
                                        style="position:absolute;top:18px;right:18px;background:#d10024;color:#fff;font-weight:700;border-radius:0 8px 0 8px;padding:3px 14px;font-size:13px;">
                                        -{{ $product->discount_percentage }}%</div>
                                    @endif
                                </div>
                                <div class="product-body" style="padding:18px 24px 0 24px;">
                                    <p class="product-category"
                                        style="font-size:13px;color:#888;font-weight:500;margin-bottom:4px;">
                                        {{ $product->category->name ?? 'N/A' }}
                                    </p>
                                    <h3 class="product-name"
                                        style="font-size:1.1rem;font-weight:700;line-height:1.3;margin-bottom:8px;">
                                        {{ $product->name }}
                                    </h3>
                                    <h4 class="product-price"
                                        style="font-size:1.2rem;color:#d10024;font-weight:800;margin-bottom:6px;">
                                        {{ number_format($product->price) }} VNĐ @if($product->old_price) <del
                                            class="product-old-price"
                                            style="color:#aaa;font-size:1rem;font-weight:400;">{{ number_format($product->old_price) }}
                                            VNĐ</del>@endif
                                    </h4>
                                    <div class="product-rating" style="margin-bottom:8px;">
                                        @php $avgRating = $product->averageRating(); @endphp
                                        @for($i = 1; $i <= 5; $i++) <i
                                            class="fa fa-star{{ $i <= $avgRating ? '' : '-o' }}" style="color:#ffc107;">
                                            </i>
                                            @endfor
                                            <span
                                                style="color:#888;font-size:13px;margin-left:4px;">({{ number_format($product->averageRating(), 1) }})</span>
                                    </div>
                                    <div class="product-btns mb-2" style="display:flex;gap:8px;">
                                        <button class="add-to-wishlist" style="background:transparent;border:none;"><i
                                                class="fa fa-heart-o" style="color:#d10024;"></i></button>
                                        <button class="add-to-compare" style="background:transparent;border:none;"><i
                                                class="fa fa-exchange" style="color:#1976d2;"></i></button>
                                        <button class="quick-view" style="background:transparent;border:none;"><i
                                                class="fa fa-eye" style="color:#222;"></i></button>
                                    </div>
                                </div>
                                <div class="add-to-cart" style="padding:0 24px 18px 24px;">
                                    <form class="add-to-cart-form" action="{{ route('cart.add') }}" method="POST"
                                        style="display:flex;align-items:center;gap:10px;">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="add-to-cart-btn"
                                            style="background:#d10024;color:#fff;border-radius:24px;padding:10px 24px;font-size:15px;font-weight:600;box-shadow:0 2px 8px #f8bbd0;transition:background 0.2s;">
                                            <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </a>
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
                    <a class="primary-btn cta-btn" href="{{ route('store.index') }}">Mua ngay</a>
                    {{-- Hoặc link đến một danh mục deal hot cụ thể --}}
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
                            <a href="{{ route('products.show', $product->slug) }}" class="stretched-link"
                                style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:2;"></a>
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p>
                                {{-- Sửa: Sử dụng route 'products.show' --}}
                                <h3 class="product-name"><a
                                        href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <h4 class="product-price">{{ number_format($product->price) }} VNĐ <del
                                        class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del>
                                </h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div>
                        @foreach($widgetProducts2 as $product)
                        <div class="product-widget" style="position:relative">
                            <a href="{{ route('products.show', $product->slug) }}" class="stretched-link"
                                style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:2;"></a>
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p>
                                {{-- Sửa: Sử dụng route 'products.show' --}}
                                <h3 class="product-name"><a
                                        href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <h4 class="product-price">{{ number_format($product->price) }} VNĐ <del
                                        class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del>
                                </h4>
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
                            <a href="{{ route('products.show', $product->slug) }}" class="stretched-link"
                                style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:2;"></a>
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p>
                                {{-- Sửa: Sử dụng route 'products.show' --}}
                                <h3 class="product-name"><a
                                        href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <h4 class="product-price">{{ number_format($product->price) }} VNĐ <del
                                        class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del>
                                </h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div>
                        @foreach($widgetProducts4 as $product)
                        <div class="product-widget" style="position:relative">
                            <a href="{{ route('products.show', $product->slug) }}" class="stretched-link"
                                style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:2;"></a>
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p>
                                {{-- Sửa: Sử dụng route 'products.show' --}}
                                <h3 class="product-name"><a
                                        href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <h4 class="product-price">{{ number_format($product->price) }} VNĐ <del
                                        class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del>
                                </h4>
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
                            <a href="{{ route('products.show', $product->slug) }}" class="stretched-link"
                                style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:2;"></a>
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p>
                                {{-- Sửa: Sử dụng route 'products.show' --}}
                                <h3 class="product-name"><a
                                        href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <h4 class="product-price">{{ number_format($product->price) }} VNĐ <del
                                        class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del>
                                </h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div>
                        {{-- Vòng lặp thứ hai cho topSellingProducts, đảm bảo biến $product được dùng đúng --}}
                        @foreach($topSellingProducts->take(3) as $product)
                        {{-- Lấy 3 sản phẩm đầu tiên từ topSellingProducts --}}
                        <div class="product-widget" style="position:relative">
                            <a href="{{ route('products.show', $product->slug) }}" class="stretched-link"
                                style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:2;"></a>
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p>
                                {{-- Sửa: Sử dụng route 'products.show' --}}
                                <h3 class="product-name"><a
                                        href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <h4 class="product-price">{{ number_format($product->price) }} VNĐ <del
                                        class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del>
                                </h4>
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
