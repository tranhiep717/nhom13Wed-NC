@extends('layouts.main')
@section('title', 'Danh sách yêu thích')
@section('content')
<div class="container" style="min-height:400px;">
    <h2 class="my-4" style="font-weight:800;font-size:2.2rem;text-align:center;letter-spacing:-1px;">Danh sách sản phẩm
        yêu thích</h2>
    @if($products->isEmpty())
    <div class="alert alert-info"
        style="max-width:480px;margin:40px auto 0 auto;text-align:center;font-size:1.1rem;border-radius:16px;box-shadow:0 2px 12px #f3f3f3;">
        Bạn chưa có sản phẩm nào trong danh sách yêu thích.</div>
    @else
    <form id="wishlist-form" method="POST" action="{{ route('wishlist.remove-multi') }}">
        @csrf
        <div class="row" style="gap:32px;justify-content:center;">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-10 mb-4 wishlist-item"
                style="max-width:320px;min-width:260px;flex:1 1 260px;">
                <div class="product"
                    style="position:relative;border-radius:20px;box-shadow:0 4px 24px #e3e3e3;background:#fff;overflow:hidden;min-height:410px;display:flex;flex-direction:column;justify-content:space-between;height:100%;transition:box-shadow .2s;">
                    <div style="display:flex;align-items:flex-start;gap:0.5rem;position:relative;z-index:3;">
                        <label
                            style="margin:18px 0 0 18px;cursor:pointer;background:#fff;border-radius:8px;padding:2px 6px 2px 2px;box-shadow:0 2px 8px #eee;display:flex;align-items:center;">
                            <input type="checkbox" class="wishlist-checkbox" name="ids[]" value="{{ $product->id }}"
                                style="width:22px;height:22px;accent-color:#d10024;" onclick="event.stopPropagation();">
                        </label>
                    </div>
                    <div class="wishlist-product-link-area" style="display:block;cursor:pointer;" tabindex="0"
                        data-href="{{ route('products.show', $product->slug) }}">
                        <div class="product-img"
                            style="padding:28px 28px 0 28px;text-align:center;background:#f8fafc;min-height:180px;display:flex;align-items:center;justify-content:center;">
                            <img src="{{ $product->image_path ? asset('storage/'.$product->image_path) : asset('img/default-product.png') }}"
                                alt="{{ $product->name }}"
                                style="max-width:100%;max-height:170px;border-radius:14px;box-shadow:0 2px 8px #f0f0f0;object-fit:contain;background:#f8fafc;">
                        </div>
                        <div class="product-body" style="padding:20px 28px 0 28px;">
                            <p class="product-category"
                                style="font-size:14px;color:#888;font-weight:600;margin-bottom:6px;text-transform:uppercase;letter-spacing:1px;">
                                {{ $product->category->name ?? 'N/A' }}
                            </p>
                            <h3 class="product-name"
                                style="font-size:1.15rem;font-weight:800;line-height:1.3;margin-bottom:10px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                                {{ $product->name }}
                            </h3>
                            <h4 class="product-price"
                                style="font-size:1.25rem;color:#d10024;font-weight:900;margin-bottom:8px;">
                                {{ number_format($product->price) }} VNĐ
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-danger px-4 py-2 fw-bold" id="remove-selected-btn"
                style="font-size:1.15rem;min-width:240px;background:linear-gradient(90deg,#ff416c,#ff4b2b);color:#fff;letter-spacing:1px;box-shadow:0 8px 32px #ffb3b3;transition:background .2s,box-shadow .2s;">
                <i class="fa fa-trash me-2"></i>Xoá các sản phẩm đã chọn
            </button>
        </div>
    </form>
    @endif
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // Click vào vùng sản phẩm (trừ checkbox) sẽ chuyển trang chi tiết
        $('.wishlist-product-link-area').on('click', function(e) {
            if ($(e.target).is('input[type="checkbox"]')) return;
            const href = $(this).data('href');
            if (href) {
                window.location.href = href;
            }
        });
        // Ngăn submit nếu không chọn sản phẩm nào
        $('#wishlist-form').on('submit', function(e) {
            if ($('input.wishlist-checkbox:checked').length === 0) {
                alert('Vui lòng chọn ít nhất một sản phẩm để xoá!');
                e.preventDefault();
            }
        });
    });
</script>
@endsection