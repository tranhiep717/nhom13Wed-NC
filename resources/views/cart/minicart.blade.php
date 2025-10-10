{{-- Mini Cart Partial: Render động danh sách sản phẩm trong giỏ hàng --}}
@if(isset($cart) && count($cart) > 0)
<div class="cart-list">
    @foreach($cart as $item)
    <div class="product-widget">
        <div class="product-img">
            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}">
        </div>
        <div class="product-body">
            <h3 class="product-name"><a href="{{ route('products.show', $item['id']) }}">{{ $item['name'] }}</a></h3>
            <h4 class="product-price"><span class="qty">{{ $item['qty'] }}x</span>{{ number_format($item['price'],0,',','.') }} VNĐ</h4>
        </div>
        <button class="delete minicart-remove" data-id="{{ $item['id'] }}"><i class="fa fa-close"></i></button>
    </div>
    @endforeach
</div>
<div class="cart-summary">
    <small>{{ count($cart) }} sản phẩm đã chọn</small>
    <h5>TỔNG PHỤ: {{ number_format($cartTotal,0,',','.') }} VNĐ</h5>
</div>
<div class="cart-btns">
    <a href="{{ route('cart.index') }}">Xem giỏ hàng</a>
    <a href="{{ route('checkout') }}">Thanh toán <i class="fa fa-arrow-circle-right"></i></a>
</div>
@else
<div class="cart-list">
    <p style="padding:10px;">Giỏ hàng trống.</p>
</div>
@endif