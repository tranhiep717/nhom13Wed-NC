@extends('layouts.main')

@section('title', 'store')
@section('content')
<div id="breadcrumb" class="section">
    <div class="section">
        <div class="container">
            <div class="row">
                <div id="aside" class="col-md-3">
                    <div class="aside">
                        <h3 class="aside-title">Danh mục</h3>
                        <div class="checkbox-filter">
                            @foreach ($categories as $category)
                            <div class="input-checkbox">
                                <input type="checkbox" id="category-{{ $category->id }}"
                                    onchange="window.location.href = '{{ route('store.index', ['category' => $category->slug]) }}'"
                                    {{ request('category') == $category->slug ? 'checked' : '' }}>
                                <label for="category-{{ $category->id }}">
                                    <span></span>
                                    {{ $category->name }}
                                    <small>({{ $category->products_count }})</small>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="aside">
                        <h3 class="aside-title">Giá</h3>
                        <div class="price-filter">
                            <div id="price-slider"></div>
                            <div class="input-number price-min">
                                <input id="price-min" type="number" value="{{ request('price_min', 1) }}" onchange="applyPriceFilter()">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input id="price-max" type="number" value="{{ request('price_max', 99999999) }}" onchange="applyPriceFilter()">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                    </div>

                    <div class="aside">
                        <h3 class="aside-title">Thương hiệu</h3>
                        <div class="checkbox-filter">
                            @foreach ($brands as $brand)
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-{{ $brand->id }}"
                                    onchange="applyBrandFilter('{{ $brand->slug }}')"
                                    {{ optional($currentBrand)->id === $brand->id ? 'checked' : '' }}>
                                <label for="brand-{{ $brand->id }}">
                                    <span></span>
                                    {{ $brand->name }}
                                    <small>({{ $brand->products()->count() }})</small>
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="aside">
                        <h3 class="aside-title">Sản phẩm bán chạy</h3>
                        @foreach ($bestSellingProducts as $bestSellingProduct)
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $bestSellingProduct->image_path) }}" alt="{{ $bestSellingProduct->name }}">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{ $bestSellingProduct->category->name ?? 'Không có danh mục' }}</p>
                                {{-- Sửa: Sử dụng route 'products.show' --}}
                                <h3 class="product-name"><a href="{{ route('products.show', $bestSellingProduct->slug) }}">{{ $bestSellingProduct->name }}</a></h3>
                                <h4 class="product-price">{{ number_format($bestSellingProduct->price) }} VNĐ <del class="product-old-price">{{ number_format($bestSellingProduct->old_price) }} VNĐ</del></h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div id="store" class="col-md-9">
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sắp xếp theo:
                                <select class="input-select" id="sort-select">
                                    <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>Mới nhất</option>
                                    <option value="popularity" {{ request('sort') == 'popularity' ? 'selected' : '' }}>Phổ biến</option>
                                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Tên (A-Z)</option>
                                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Tên (Z-A)</option>
                                </select>
                            </label>

                            <label>
                                Hiển thị:
                                <select class="input-select" id="perpage-select">
                                    <option value="9" {{ request('per_page') == '9' ? 'selected' : '' }}>9</option>
                                    <option value="18" {{ request('per_page') == '18' ? 'selected' : '' }}>18</option>
                                    <option value="27" {{ request('per_page') == '27' ? 'selected' : '' }}>27</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>

                    <div class="row" id="ajax-products-list">
                        @forelse ($products as $product)
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
                        @empty
                        <div class="col-md-12 text-center">
                            <p>Không tìm thấy sản phẩm nào.</p>
                        </div>
                        @endforelse
                    </div>

                    <div class="store-filter clearfix">
                        <span class="store-qty">Hiển thị {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} / {{ $products->total() }} sản phẩm</span>
                        {{ $products->links('vendor.pagination.default') }} {{-- Sử dụng phân trang mặc định của Laravel hoặc custom --}}
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

@if(session('success'))
<div id="cart-success-modal" style="position:fixed;z-index:9999;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.4);display:flex;align-items:center;justify-content:center;">
    <div style="background:#222;padding:32px 40px;border-radius:16px;text-align:center;color:#fff;min-width:320px;box-shadow:0 8px 32px #0008;">
        <div style="font-size:48px;color:#4caf50;margin-bottom:12px;">
            <i class="fa fa-shopping-cart"></i> <i class="fa fa-check" style="color:#4caf50;"></i>
        </div>
        <div style="font-size:20px;font-weight:500;margin-bottom:16px;">{{ session('success') }}</div>
        <a href="{{ route('cart.index') }}" style="background:#fff;color:#222;padding:8px 24px;border-radius:24px;font-weight:600;text-decoration:none;">Xem giỏ hàng</a>
    </div>
</div>
<script>
    setTimeout(function() {
        document.getElementById('cart-success-modal').style.display = 'none';
    }, 2000);
</script>
@endif
@endsection

@push('scripts')
<script>
    function applyBrandFilter(brandSlug) {
        let currentUrl = new URL(window.location.href);
        if (currentUrl.searchParams.get('brand') === brandSlug) {
            currentUrl.searchParams.delete('brand');
        } else {
            currentUrl.searchParams.set('brand', brandSlug);
        }
        window.location.href = currentUrl.toString();
    }

    // Hàm áp dụng bộ lọc giá
    function applyPriceFilter() {
        let minPrice = document.getElementById('price-min').value;
        let maxPrice = document.getElementById('price-max').value;
        let currentUrl = new URL(window.location.href);

        if (minPrice) {
            currentUrl.searchParams.set('price_min', minPrice);
        } else {
            currentUrl.searchParams.delete('price_min');
        }
        if (maxPrice) {
            currentUrl.searchParams.set('price_max', maxPrice);
        } else {
            currentUrl.searchParams.delete('price_max');
        }
        window.location.href = currentUrl.toString();
    }

    // Khởi tạo slider giá (chắc chắn bạn đã có JS cho nouislider)
    var priceSlider = document.getElementById('price-slider');
    var priceMin = {{ json_encode(request('price_min', 1)) }};
    var priceMax = {{ json_encode(request('price_max', 99999999)) }};
    if (priceSlider) {
        noUiSlider.create(priceSlider, {
            start: [priceMin, priceMax],
            connect: true,
            step: 1,
            range: {
                'min': 1,
                'max': 99999999
            }
        });
        priceSlider.noUiSlider.on('update', function(values, handle) {
            var value = values[handle];
            if (handle) {
                document.getElementById('price-max').value = Math.round(value);
            } else {
                document.getElementById('price-min').value = Math.round(value);
            }
        });
    }

    $(document).ready(function() {
        $('.add-to-cart-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    showCartSuccessModal('Sản phẩm đã được thêm vào giỏ hàng');
                },
                error: function(xhr) {
                    if (xhr.status === 401) {
                        window.location.href = '/login';
                    } else {
                        alert('Có lỗi xảy ra, vui lòng thử lại!');
                    }
                }
            });
        });

        // AJAX filter for sort and per page
        $('#sort-select, #perpage-select').on('change', function() {
            let sort = $('#sort-select').val();
            let perPage = $('#perpage-select').val();
            let url = new URL(window.location.href);
            url.searchParams.set('sort', sort);
            url.searchParams.set('per_page', perPage);
            $.get(url.toString(), {ajax: 1}, function(html) {
                $('#ajax-products-list').html($(html).find('#ajax-products-list').html());
                $('html,body').animate({scrollTop: $('#ajax-products-list').offset().top - 80}, 300);
            });
        });
    });

    function showCartSuccessModal(msg) {
        if ($('#cart-success-modal').length) $('#cart-success-modal').remove();
        var html = `<div id="cart-success-modal" style="position:fixed;z-index:9999;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.4);display:flex;align-items:center;justify-content:center;">
            <div style="background:#222;padding:32px 40px;border-radius:16px;text-align:center;color:#fff;min-width:320px;box-shadow:0 8px 32px #0008;">
                <div style="font-size:48px;color:#4caf50;margin-bottom:12px;">
                    <i class='fa fa-shopping-cart'></i> <i class='fa fa-check' style='color:#4caf50;'></i>
                </div>
                <div style="font-size:20px;font-weight:500;margin-bottom:16px;">${msg}</div>
                <a href="/cart" style="background:#fff;color:#222;padding:8px 24px;border-radius:24px;font-weight:600;text-decoration:none;">Xem giỏ hàng</a>
            </div>
        </div>`;
        $('body').append(html);
        setTimeout(function() {
            $('#cart-success-modal').fadeOut(300, function() {
                $(this).remove();
            });
        }, 2000);
    }
</script>
@endpush

@if(request()->ajax())
    @section('content')
        <div class="row" id="ajax-products-list">
            @forelse ($products as $product)
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
            @empty
            <div class="col-md-12 text-center">
                <p>Không tìm thấy sản phẩm nào.</p>
            </div>
            @endforelse
        </div>
    @endsection
@endif