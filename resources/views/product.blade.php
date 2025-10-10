@extends('layouts.main')

@section('title', $product->name ?? 'Chi tiết sản phẩm') {{-- Cập nhật tiêu đề trang --}}

@section('content')
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    @if($product->category)
                        <li><a href="{{ route('store.index', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a></li>
                    @endif
                    <li class="active">{{ $product->name ?? 'Tên sản phẩm' }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                    </div>
                    {{-- Nếu bạn có nhiều hình ảnh cho sản phẩm --}}
                    {{-- @foreach($product->images as $image)
                    <div class="product-preview">
                        <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->name }}">
                    </div>
                    @endforeach --}}
                </div>
            </div>
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                    </div>
                    {{-- Nếu bạn có nhiều hình ảnh cho sản phẩm --}}
                    {{-- @foreach($product->images as $image)
                    <div class="product-preview">
                        <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->name }}">
                    </div>
                    @endforeach --}}
                </div>
            </div>

            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{{ $product->name }}</h2>
                    <div>
                        <div class="product-rating">
                            @for ($i = 0; $i < $product->rating; $i++)
                                <i class="fa fa-star"></i>
                            @endfor
                            @for ($i = $product->rating; $i < 5; $i++)
                                <i class="fa fa-star-o"></i>
                            @endfor
                        </div>
                        <a class="review-link" href="#">{{ $product->views_count ?? 0 }} Lượt xem | {{ $product->sold_count ?? 0 }} Đã bán</a>
                    </div>
                    <div>
                        <h3 class="product-price">{{ number_format($product->price) }} VNĐ
                            @if($product->old_price)
                                <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del>
                            @endif
                        </h3>
                        <span class="product-available">{{ $product->stock > 0 ? 'Còn hàng' : 'Hết hàng' }}</span>
                    </div>
                    <p>{{ $product->description }}</p>

                    <div class="product-options">
                        {{-- Ví dụ về tùy chọn màu sắc --}}
                        {{-- <label>
                            Color
                            <select class="input-select">
                                <option value="0">Black</option>
                            </select>
                        </label> --}}
                        {{-- Ví dụ về tùy chọn kích thước --}}
                        {{-- <label>
                            Size
                            <select class="input-select">
                                <option value="0">X</option>
                            </select>
                        </label> --}}
                    </div>

                    <div class="add-to-cart">
                        <div class="qty-label">
                            Số lượng
                            <div class="input-number">
                                <input type="number" value="1">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                    </div>

                    <ul class="product-btns">
                        <li><a href="#"><i class="fa fa-heart-o"></i> Thêm vào yêu thích</a></li>
                        <li><a href="#"><i class="fa fa-exchange"></i> Thêm vào so sánh</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Danh mục:</li>
                        <li><a href="{{ route('store.index', ['category' => $product->category->slug ?? '']) }}">{{ $product->category->name ?? 'Không có danh mục' }}</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Chia sẻ:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12">
                <div id="product-tab">
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
                        <li><a data-toggle="tab" href="#tab2">Chi tiết</a></li>
                        <li><a data-toggle="tab" href="#tab3">Đánh giá (3)</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! $product->long_description !!}
                                </div>
                            </div>
                        </div>
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! $product->details !!}
                                </div>
                            </div>
                        </div>
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                {{-- Các đánh giá --}}
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name">John</h5>
                                                    <p class="date">27 DEC 2018, 8:0 PM</p>
                                                    <div class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                </div>
                                            </li>
                                            {{-- Thêm các đánh giá khác ở đây --}}
                                        </ul>
                                        <ul class="reviews-pagination">
                                            <li class="active">1</li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                {{-- Form đánh giá --}}
                                <div class="col-md-6">
                                    <div id="review-form">
                                        <form class="review-form">
                                            <input class="input" type="text" placeholder="Tên của bạn">
                                            <input class="input" type="email" placeholder="Email của bạn">
                                            <textarea class="input" placeholder="Đánh giá của bạn"></textarea>
                                            <div class="input-rating">
                                                <span>Đánh giá của bạn: </span>
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <button class="primary-btn">Gửi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <div class="section-title text-center">
                    <h3 class="title">Sản phẩm liên quan</h3>
                </div>
            </div>

            @if($relatedProducts->isNotEmpty())
                @foreach($relatedProducts as $relatedProduct)
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{ asset('storage/' . $relatedProduct->image_path) }}" alt="{{ $relatedProduct->name }}">
                            <div class="product-label">
                                @if($relatedProduct->is_new)
                                    <span class="new">MỚI</span>
                                @endif
                                @if($relatedProduct->discount_percentage > 0)
                                    <span class="sale">-{{ $relatedProduct->discount_percentage }}%</span>
                                @endif
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{ $relatedProduct->category->name ?? 'Không có danh mục' }}</p>
                            <h3 class="product-name"><a href="{{ route('products.show', $relatedProduct->slug) }}">{{ $relatedProduct->name }}</a></h3>
                            <h4 class="product-price">{{ number_format($relatedProduct->price) }} VNĐ
                                @if($relatedProduct->old_price)
                                    <del class="product-old-price">{{ number_format($relatedProduct->old_price) }} VNĐ</del>
                                @endif
                            </h4>
                            <div class="product-rating">
                                @for ($i = 0; $i < $relatedProduct->rating; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                                @for ($i = $relatedProduct->rating; $i < 5; $i++)
                                    <i class="fa fa-star-o"></i>
                                @endfor
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-md-12 text-center">
                    <p>Không có sản phẩm liên quan.</p>
                </div>
            @endif
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
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection