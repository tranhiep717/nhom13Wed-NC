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
                                {{-- Sửa: Đảm bảo onchange trỏ đúng route --}}
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
                            {{-- Bạn cần thêm logic để lấy và hiển thị các thương hiệu ở đây --}}
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-1">
                                <label for="brand-1">
                                    <span></span>
                                    SAMSUNG
                                    <small>(578)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-2">
                                <label for="brand-2">
                                    <span></span>
                                    LG
                                    <small>(125)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-3">
                                <label for="brand-3">
                                    <span></span>
                                    SONY
                                    <small>(755)</small>
                                </label>
                            </div>
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
                                <select class="input-select" onchange="sortProducts(this.value)">
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
                                <select class="input-select" onchange="changePerPage(this.value)">
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

                    <div class="row">
                        @forelse ($products as $product)
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
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
                                        <p class="product-category">{{ $product->category->name ?? 'N/A' }}</p>
                                        {{-- Sửa: Sử dụng route 'products.show' --}}
                                        <h3 class="product-name"><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                        <h4 class="product-price">{{ number_format($product->price) }} VNĐ <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del></h4>
                                        <div class="product-rating">
                                            @for ($i = 0; $i < $product->rating; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                            @for ($i = $product->rating; $i < 5; $i++)
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
@endsection

@push('scripts')
<script>
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

    // Hàm sắp xếp sản phẩm
    function sortProducts(value) {
        let currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('sort', value);
        window.location.href = currentUrl.toString();
    }

    // Hàm thay đổi số lượng sản phẩm trên mỗi trang
    function changePerPage(value) {
        let currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('per_page', value);
        window.location.href = currentUrl.toString();
    }

    // Khởi tạo slider giá (chắc chắn bạn đã có JS cho nouislider)
    var priceSlider = document.getElementById('price-slider');
    if (priceSlider) {
        noUiSlider.create(priceSlider, {
            start: [{{ request('price_min', 1) }}, {{ request('price_max', 99999999) }}],
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
</script>
@endpush