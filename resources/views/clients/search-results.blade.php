@extends('layouts.main')

@section('title', 'Kết quả tìm kiếm')

@section('content')
    <div class="container">
        @if(isset($keyword))
            <h2 class="text-2xl font-bold mb-6">Kết quả tìm kiếm cho: "{{ $keyword }}"</h2>
        @endif
        @if($products->isEmpty())
            <p>Không tìm thấy sản phẩm nào.</p>
        @else
        <div class="row" id="ajax-products-list">
            @foreach($products as $product)
            <div class="col-md-4 col-xs-6 mb-4">
                <a href="{{ route('products.show', $product->slug) }}" style="text-decoration:none;color:inherit">
                    <div class="product" style="cursor:pointer;border-radius:18px;box-shadow:0 2px 16px #e3e3e3;transition:box-shadow .2s,transform .2s;background:#fff;overflow:hidden;position:relative;min-height:420px;display:flex;flex-direction:column;justify-content:space-between;">
                        <div class="product-img" style="padding:24px 24px 0 24px;text-align:center;">
                            @php
                                $imagePath = $product->image_path && file_exists(public_path('storage/' . $product->image_path))
                                    ? asset('storage/' . $product->image_path)
                                    : asset('img/default-product.png');
                            @endphp
                            <img src="{{ $imagePath }}" alt="{{ $product->name }}" style="max-width:100%;max-height:180px;border-radius:12px;box-shadow:0 2px 8px #f0f0f0;object-fit:contain;background:#f8fafc;">
                            @if($product->is_new)
                            <div class="product-label" style="position:absolute;top:18px;left:18px;background:#43a047;color:#fff;font-weight:700;border-radius:8px 0 8px 0;padding:3px 14px;font-size:13px;">MỚI</div>
                            @endif
                            @if($product->discount_percentage > 0)
                            <div class="product-label" style="position:absolute;top:18px;right:18px;background:#d10024;color:#fff;font-weight:700;border-radius:0 8px 0 8px;padding:3px 14px;font-size:13px;">-{{ $product->discount_percentage }}%</div>
                            @endif
                        </div>
                        <div class="product-body" style="padding:18px 24px 0 24px;">
                            <p class="product-category" style="font-size:13px;color:#888;font-weight:500;margin-bottom:4px;">{{ $product->category->name ?? 'N/A' }}</p>
                            <h3 class="product-name" style="font-size:1.1rem;font-weight:700;line-height:1.3;margin-bottom:8px;"><a href="{{ route('products.show', $product->slug) }}" style="color:#222;text-decoration:none;">{{ $product->name }}</a></h3>
                            <h4 class="product-price" style="font-size:1.2rem;color:#d10024;font-weight:800;margin-bottom:6px;">{{ number_format($product->price) }} VNĐ @if($product->old_price) <del class="product-old-price" style="color:#aaa;font-size:1rem;font-weight:400;">{{ number_format($product->old_price) }} VNĐ</del>@endif</h4>
                            <div class="product-rating" style="margin-bottom:8px;">
                                @for ($i = 0; $i < $product->rating; $i++)
                                    <i class="fa fa-star" style="color:#ffc107;"></i>
                                @endfor
                                @for ($i = $product->rating; $i < 5; $i++)
                                    <i class="fa fa-star-o" style="color:#ffc107;"></i>
                                @endfor
                            </div>
                            <div class="product-btns mb-2" style="display:flex;gap:8px;">
                                <button class="add-to-wishlist" style="background:transparent;border:none;"><i class="fa fa-heart-o" style="color:#d10024;"></i></button>
                                <button class="add-to-compare" style="background:transparent;border:none;"><i class="fa fa-exchange" style="color:#1976d2;"></i></button>
                                <button class="quick-view" style="background:transparent;border:none;"><i class="fa fa-eye" style="color:#222;"></i></button>
                            </div>
                        </div>
                        <div class="add-to-cart" style="padding:0 24px 18px 24px;">
                            <form class="add-to-cart-form" action="{{ route('cart.add') }}" method="POST" style="display:flex;align-items:center;gap:10px;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="add-to-cart-btn" style="background:#d10024;color:#fff;border-radius:24px;padding:10px 24px;font-size:15px;font-weight:600;box-shadow:0 2px 8px #f8bbd0;transition:background 0.2s;">
                                    <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                </button>
                            </form>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection