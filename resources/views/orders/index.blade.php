{{-- filepath: resources/views/orders/index.blade.php --}}
@extends('layouts.main')

@section('title', 'Đơn hàng của tôi')

@section('content')


<div class="section">
    <div class="container">
        <div class="orders-container">
            <!-- Page Header -->
            <div class="page-header">
                <h1><i class="fa fa-shopping-bag"></i> Đơn hàng của tôi</h1>
            </div>

            @if($orders && $orders->count() > 0)
                @foreach($orders as $order)
                    <div class="order-card">
                        <!-- Order Header -->
                        <div class="order-header">
                            <div class="order-id">
                                <i class="fa fa-receipt"></i>
                                Đơn hàng #{{ $order->id }}
                            </div>
                            <div class="order-status status-{{ $order->status ?? 'pending' }}">
                                {{ $order->status_text }}
                            </div>
                        </div>

                        <!-- Order Total -->
                        <div class="order-total">
                            <div class="total-label">Tổng tiền đơn hàng</div>
                            <div class="total-amount">{{ number_format($order->total_amount ?? 0, 0, ',', '.') }}₫</div>
                        </div>

                        <!-- Order Information -->
                        <div class="order-info">
                            <!-- Customer Info -->
                            <div class="info-section">
                                <div class="info-title">
                                    <i class="fa fa-user"></i>
                                    Thông tin khách hàng
                                </div>
                                <div class="info-detail">
                                    <span class="info-label">Họ tên:</span>
                                    {{ $order->customer_name ?? $order->user->name ?? 'N/A' }}
                                </div>
                                <div class="info-detail">
                                    <span class="info-label">Email:</span>
                                    {{ $order->customer_email ?? $order->user->email ?? 'N/A' }}
                                </div>
                                <div class="info-detail">
                                    <span class="info-label">SĐT:</span>
                                    {{ $order->customer_phone ?? $order->user->phone ?? 'N/A' }}
                                </div>
                                <div class="info-detail">
                                    <span class="info-label">Địa chỉ:</span>
                                    {{ $order->shipping_address ?? $order->user->address ?? 'N/A' }}
                                </div>
                            </div>

                            <!-- Order Details -->
                            <div class="info-section">
                                <div class="info-title">
                                    <i class="fa fa-info-circle"></i>
                                    Chi tiết đơn hàng
                                </div>
                                <div class="info-detail">
                                    <span class="info-label">Ngày đặt:</span>
                                    {{ $order->created_at->format('d/m/Y H:i') }}
                                </div>
                                <div class="info-detail">
                                    <span class="info-label">Phương thức TT:</span>
                                    {{ $order->payment_method ?? 'COD' }}
                                </div>
                                <div class="info-detail">
                                    <span class="info-label">Ghi chú:</span>
                                    {{ $order->notes ?? 'Không có ghi chú' }}
                                </div>
                                <div class="info-detail">
                                    <span class="info-label">Số sản phẩm:</span>
                                    {{ $order->order_items ? $order_items->count() : 0 }} sản phẩm
                                </div>
                            </div>
                        </div>

                        <!-- Order Timeline -->
                        <div class="info-section">
                            <div class="info-title">
                                <i class="fa fa-clock-o"></i>
                                Trạng thái đơn hàng
                            </div>
                            <div class="timeline">
                                <div class="timeline-item {{ ($order->status ?? 'pending') == 'pending' ? 'active' : '' }}">
                                    <div class="timeline-content">
                                        <div class="timeline-title">Chờ xác nhận</div>
                                        <div class="timeline-time">{{ $order->created_at->format('d/m/Y H:i') }}</div>
                                    </div>
                                </div>

                                @if(in_array($order->status ?? 'pending', ['confirmed', 'processing', 'shipping', 'delivered']))
                                <div class="timeline-item active">
                                    <div class="timeline-content">
                                        <div class="timeline-title">Đã xác nhận</div>
                                        <div class="timeline-time">{{ $order->confirmed_at ? $order->confirmed_at->format('d/m/Y H:i') : 'Đang cập nhật' }}</div>
                                    </div>
                                </div>
                                @endif

                                @if(in_array($order->status ?? 'pending', ['processing', 'shipping', 'delivered']))
                                <div class="timeline-item active">
                                    <div class="timeline-content">
                                        <div class="timeline-title">Đang xử lý</div>
                                        <div class="timeline-time">{{ $order->processing_at ? $order->processing_at->format('d/m/Y H:i') : 'Đang cập nhật' }}</div>
                                    </div>
                                </div>
                                @endif

                                @if(in_array($order->status ?? 'pending', ['shipping', 'delivered']))
                                <div class="timeline-item active">
                                    <div class="timeline-content">
                                        <div class="timeline-title">Đang giao hàng</div>
                                        <div class="timeline-time">{{ $order->shipping_at ? $order->shipping_at->format('d/m/Y H:i') : 'Đang cập nhật' }}</div>
                                    </div>
                                </div>
                                @endif

                                @if(($order->status ?? 'pending') == 'delivered')
                                <div class="timeline-item active">
                                    <div class="timeline-content">
                                        <div class="timeline-title">Đã giao hàng</div>
                                        <div class="timeline-time">{{ $order->delivered_at ? $order->delivered_at->format('d/m/Y H:i') : 'Đang cập nhật' }}</div>
                                    </div>
                                </div>
                                @endif

                                @if(($order->status ?? 'pending') == 'cancelled')
                                <div class="timeline-item active">
                                    <div class="timeline-content">
                                        <div class="timeline-title">Đã hủy</div>
                                        <div class="timeline-time">{{ $order->cancelled_at ? $order->cancelled_at->format('d/m/Y H:i') : 'Đang cập nhật' }}</div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <a href="{{ route('orders.show', $order->id) }}" class="btn-action btn-view">
                                <i class="fa fa-eye"></i>
                                Xem chi tiết
                            </a>

                            @if(in_array($order->status ?? 'pending', ['pending', 'confirmed']))
                            <button class="btn-action btn-cancel" onclick="cancelOrder({{ $order->id }})">
                                <i class="fa fa-times"></i>
                                Hủy đơn hàng
                            </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <h3 class="empty-title">Chưa có đơn hàng nào</h3>
                    <p class="empty-subtitle">Bạn chưa có đơn hàng nào. Hãy bắt đầu mua sắm ngay!</p>
                    <a href="{{ url('/') }}" class="btn-start-shopping">
                        <i class="fa fa-shopping-bag"></i>
                        Bắt đầu mua sắm
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

@php
function getStatusText($status) {
    $statusTexts = [
        'pending' => 'Chờ xác nhận',
        'confirmed' => 'Đã xác nhận',
        'processing' => 'Đang xử lý',
        'shipping' => 'Đang giao hàng',
        'delivered' => 'Đã giao hàng',
        'cancelled' => 'Đã hủy'
    ];

    return $statusTexts[$status] ?? 'Không xác định';
}
@endphp

<script>
function cancelOrder(orderId) {
    if (confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')) {
        // Gửi request hủy đơn hàng
        fetch(`/orders/${orderId}/cancel`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Đơn hàng đã được hủy thành công!');
                location.reload();
            } else {
                alert('Có lỗi xảy ra khi hủy đơn hàng!');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra!');
        });
    }
}
</script>
@endsection
