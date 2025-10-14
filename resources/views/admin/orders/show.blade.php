@extends('admin.layout')

@section('title', 'Chi tiết Đơn hàng')

@section('content')
<div class="container py-5">
    <h3>Chi tiết Đơn hàng #{{ $order->id }}</h3>
    <p><strong>Trạng thái:</strong> 
        @if($order->status === 'pending')
            <span class="badge badge-warning">Chờ xác nhận</span>
        @elseif($order->status === 'confirmed')
            <span class="badge badge-success">Đã xác nhận</span>
        @endif
    </p>

    <p><strong>Họ tên:</strong> {{ $order->customer_name }}</p>
    <p><strong>Số điện thoại:</strong> {{ $order->customer_phone }}</p>
    <p><strong>Địa chỉ:</strong> {{ $order->shipping_address }}, {{ $order->shipping_ward }}, {{ $order->shipping_district }}, {{ $order->shipping_province }}</p>
    <p><strong>Phương thức thanh toán:</strong> {{ strtoupper($order->payment_method) }}</p>
    <p><strong>Ghi chú:</strong> {{ $order->notes ?? '-' }}</p>

    <h5 class="mt-4">Danh sách sản phẩm:</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Màu</th>
                <th>Cấu hình</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                    <td>{{ $item->color ?? '-' }}</td>
                    <td>{{ $item->configuration ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="text-end"><strong>Tổng tiền: {{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</strong></p>
</div>
@endsection
