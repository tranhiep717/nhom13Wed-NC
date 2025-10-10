@extends('layouts.main')

@section('title', $product->name ?? 'Chi tiết sản phẩm') {{-- Hiển thị tên sản phẩm trên tiêu đề trang --}}

@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                {{-- Hiển thị hình ảnh sản phẩm --}}
                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="img-responsive">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p> {{-- Giả định category là mối quan hệ --}}
                <h3 class="product-price">{{ number_format($product->price) }} VNĐ
                    @if($product->old_price)
                        <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del>
                    @endif
                </h3>
                <p>{{ $product->description }}</p>

                <div class="product-rating">
                    {{-- Ví dụ hiển thị rating --}}
                    @for ($i = 0; $i < $product->rating; $i++)
                        <i class="fa fa-star"></i>
                    @endfor
                    @for ($i = $product->rating; $i < 5; $i++)
                        <i class="fa fa-star-o"></i>
                    @endfor
                </div>

                <div class="product-options">
                    {{-- Các tùy chọn sản phẩm --}}
                    {{-- Ví dụ:
                    <label>
                        Color
                        <select class="input-select">
                            <option value="0">Red</option>
                        </select>
                    </label>
                    --}}
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

        <div class="row">
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
                                <div class="col-md-6">
                                    <div id="review-form">
                                        <form class="review-form">
                                            <input class="input" type="text" placeholder="Your Name">
                                            <input class="input" type="email" placeholder="Your Email">
                                            <textarea class="input" placeholder="Your Review"></textarea>
                                            <div class="input-rating">
                                                <span>Your Rating: </span>
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <button class="primary-btn">Submit</button>
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
                                @if($relatedProduct->is_new)
                                    <div class="product-label">
                                        <span class="new">MỚI</span>
                                    </div>
                                @endif
                                @if($relatedProduct->discount_percentage > 0)
                                    <div class="product-label">
                                        <span class="sale">-{{ $relatedProduct->discount_percentage }}%</span>
                                    </div>
                                @endif
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
@endsection