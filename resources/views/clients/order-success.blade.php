@extends('layouts.main')

@section('title', 'Đặt hàng thành công')
@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="text-success" style="margin-top:40px;">🎉 Đặt hàng thành công!</h2>
                <p>Cảm ơn bạn đã mua hàng tại Electro.<br>Chúng tôi sẽ liên hệ xác nhận và giao hàng trong thời gian sớm nhất.</p>
                <a href="{{ route('home') }}" class="primary-btn">Về trang chủ</a>
                <a href="{{ route('store.index') }}" class="primary-btn" style="margin-left:10px;">Tiếp tục mua sắm</a>
            </div>
        </div>
    </div>
</div>
@endsection
