@extends('layouts.main')

@section('content')
<div class="container">Add commentMore actions
    <div class="section-title text-center">
        <h2>Chi tiết đơn hàng #{{ $order->id }}</h2>
    </div>

    <div class="card-custom">
        <h4>Thông tin đơn hàng</h4>
        <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 0, ',', '.') }}₫</p>
        <p><strong>Trạng thái:</strong>
            <span class="badge badge-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : 'danger') }}">
                {{ ucfirst($order->status) }}
            </span>
        </p>
        <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
    </div>

    <div class="card-custom">
        <h4>Sản phẩm trong đơn hàng</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
 <td>
    <img src="{{ $item->product_image ? asset('storage/' . $item->product_image) : asset('images/default.png') }}"
         alt="{{ $item->product_name }}"
         style="width: 80px; height: 80px; object-fit: cover;">
</td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 0, ',', '.') }}₫</td>
                    <td>{{ number_format($item->quantity * $item->price, 0, ',', '.') }}₫</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Quay lại</a>
</div>

@endsection
