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
    <form id="wishlist-bulk-form">
        <div class="row" style="gap:32px;justify-content:center;">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-10 mb-4 wishlist-item"
                style="max-width:320px;min-width:260px;flex:1 1 260px;">
                <div class="product"
                    style="position:relative;border-radius:20px;box-shadow:0 4px 24px #e3e3e3;background:#fff;overflow:hidden;min-height:410px;display:flex;flex-direction:column;justify-content:space-between;height:100%;transition:box-shadow .2s;">
                    <div style="display:flex;align-items:flex-start;gap:0.5rem;position:relative;z-index:3;">
                        <label
                            style="margin:18px 0 0 18px;cursor:pointer;background:#fff;border-radius:8px;padding:2px 6px 2px 2px;box-shadow:0 2px 8px #eee;display:flex;align-items:center;">
                            <input type="checkbox" class="wishlist-checkbox" name="wishlist_ids[]"
                                value="{{ $product->id }}" style="width:22px;height:22px;accent-color:#d10024;"
                                onclick="event.stopPropagation();">
                        </label>
                    </div>
                    <div class="wishlist-product-link-area" style="display:block;cursor:pointer;"
                        onclick="if(event.target.type!=='checkbox'){window.location='{{ route('products.show', $product->slug) }}'}">
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
                    <div
                        style="padding:0 18px 18px 18px;display:flex;gap:10px;justify-content:space-between;align-items:center;">
                        <button class="remove-from-wishlist" data-product-id="{{ $product->id }}"
                            title="Xoá khỏi yêu thích" style="display:none;"></button>
                        <button class="add-to-cart-wishlist" data-product-id="{{ $product->id }}"
                            style="display:none;"></button>
                        <a href="{{ route('checkout') }}?product_id={{ $product->id }}" class="buy-now-wishlist"
                            style="display:none;"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div style="display:flex;gap:32px;justify-content:center;margin:40px 0 0 0;">
            <button type="button" id="bulk-add-to-cart" class="btn"
                style="font-weight:700;padding:18px 44px;border-radius:32px;font-size:1.15rem;background:#c82333;color:#fff;border:none;box-shadow:0 8px 24px #e3e3e3;min-width:320px;transition:background .2s;">Thêm
                các sản phẩm đã chọn vào giỏ</button>
            <button type="button" id="bulk-remove" class="btn"
                style="font-weight:700;padding:18px 44px;border-radius:32px;font-size:1.15rem;background:#fff;color:#c82333;border:3px solid #c82333;box-shadow:0 8px 24px #e3e3e3;min-width:320px;transition:background .2s, color .2s, border .2s;">Xoá
                các sản phẩm đã chọn</button>
        </div>
    </form>
    @endif
</div>
<script>
    $(document).ready(function() {
        // Xoá khỏi wishlist
        $(document).on('click', '.remove-from-wishlist', function(e) {
            e.preventDefault();
            var $btn = $(this);
            var productId = $btn.data('product-id');
            if (!productId) return;
            $btn.prop('disabled', true);
            $.ajax({
                url: '/wishlist/remove',
                type: 'POST',
                data: {
                    product_id: productId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    if (res.success) {
                        $btn.closest('.col-lg-3, .col-md-4, .col-10').fadeOut(300, function() {
                            $(this).remove();
                        });
                        // Cập nhật badge wishlist
                        var $badge = $('.header-ctn a[href$="wishlist"] .qty');
                        var count = parseInt($badge.text()) || 0;
                        if (count > 1) $badge.text(count - 1);
                        else $badge.remove();
                    }
                },
                complete: function() {
                    $btn.prop('disabled', false);
                }
            });
        });
        // Thêm vào giỏ hàng
        $(document).on('click', '.add-to-cart-wishlist', function(e) {
            e.preventDefault();
            var $btn = $(this);
            var productId = $btn.data('product-id');
            if (!productId) return;
            $btn.prop('disabled', true);
            $.ajax({
                url: '/cart/add',
                type: 'POST',
                data: {
                    product_id: productId,
                    quantity: 1
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    if (res.success) {
                        window.updateMiniCart && window.updateMiniCart();
                        $btn.text('Đã thêm!').css({
                            background: '#28a745',
                            color: '#fff'
                        });
                    }
                },
                complete: function() {
                    setTimeout(function() {
                        $btn.prop('disabled', false).text('Thêm vào giỏ').css({
                            background: '#d10024',
                            color: '#fff'
                        });
                    }, 1200);
                }
            });
        });
        // Thêm vào giỏ hàng hàng loạt
        $('#bulk-add-to-cart').on('click', function() {
            var ids = $('.wishlist-checkbox:checked').map(function() {
                return $(this).val();
            }).get();
            if (ids.length === 0) return alert('Vui lòng chọn sản phẩm!');
            $(this).prop('disabled', true);
            let added = 0;
            let done = 0;
            $.each(ids, function(i, id) {
                $.ajax({
                    url: '/cart/add',
                    type: 'POST',
                    data: {
                        product_id: id,
                        quantity: 1
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        if (res.success || res.message === 'Đã thêm vào giỏ hàng') {
                            window.updateMiniCart && window.updateMiniCart();
                            added++;
                        }
                    },
                    complete: function() {
                        done++;
                        if (done === ids.length) {
                            setTimeout(() => {
                                $('#bulk-add-to-cart').prop('disabled', false);
                                alert('Đã thêm ' + added + ' sản phẩm vào giỏ hàng thành công!');
                            }, 300);
                        }
                    }
                });
            });
        });
        // Xoá hàng loạt
        $('#bulk-remove').on('click', function() {
            var ids = $('.wishlist-checkbox:checked').map(function() {
                return $(this).val();
            }).get();
            if (ids.length === 0) return alert('Vui lòng chọn sản phẩm!');
            $(this).prop('disabled', true);
            let removed = 0;
            $.each(ids, function(i, id) {
                $.ajax({
                    url: '/wishlist/remove',
                    type: 'POST',
                    data: {
                        product_id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        if (res.success) {
                            $('.wishlist-checkbox[value="' + id + '"]').closest('.wishlist-item').fadeOut(300, function() {
                                $(this).remove();
                            });
                            var $badge = $('.header-ctn a[href$="wishlist"] .qty');
                            var count = parseInt($badge.text()) || 0;
                            if (count > 1) $badge.text(count - 1);
                            else $badge.remove();
                            removed++;
                        }
                    },
                    complete: function() {
                        if (i === ids.length - 1) {
                            setTimeout(() => {
                                $('#bulk-remove').prop('disabled', false);
                                alert('Đã xoá ' + removed + ' sản phẩm!');
                            }, 500);
                        }
                    }
                });
            });
        });
    });
</script>
@endsection