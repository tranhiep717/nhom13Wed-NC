{{-- filepath: resources/views/orders/index.blade.php --}}
@extends('layouts.main')

@section('title', 'Đơn hàng của tôi')

@section('content')
<style>
    body {
        background: linear-gradient(135deg,
        #ffffff 0%,
        #b090d0 100%);
        min-height: 100vh;
        font-family: 'Montserrat', sans-serif;
    }

    .orders-container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 40px;
        margin: 40px auto;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .page-header {
        text-align: center;
        margin-bottom: 40px;
        position: relative;
    }

    .page-header::before {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #D10024, #ff6b6b);
        border-radius: 2px;
    }

    .page-header h1 {
        color: #f05a5a;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .order-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .order-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #D10024, #ff6b6b, #667eea);
        transition: left 0.5s ease;
    }

    .order-card:hover::before {
        left: 0;
    }

    .order-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f8f9fa;
    }

    .order-id {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .order-id i {
        color: #D10024;
    }

    .order-status {
        padding: 10px 20px;
        border-radius: 25px;
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .status-pending {
        background: linear-gradient(135deg, #ffd93d, #ff9800);
    }

    .status-confirmed {
        background: linear-gradient(135deg, #2196f3, #03a9f4);
    }

    .status-processing {
        background: linear-gradient(135deg, #9c27b0, #e91e63);
    }

    .status-shipping {
        background: linear-gradient(135deg, #ff5722, #ff9800);
    }

    .status-delivered {
        background: linear-gradient(135deg, #4caf50, #8bc34a);
    }

    .status-cancelled {
        background: linear-gradient(135deg, #f44336, #e57373);
    }

    .order-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 25px;
    }

    .info-section {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 15px;
        border-left: 4px solid #D10024;
    }

    .info-title {
        font-size: 1rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .info-title i {
        color: #D10024;
    }

    .info-detail {
        margin-bottom: 8px;
        color: #495057;
    }

    .info-label {
        font-weight: 600;
        color: #6c757d;
        min-width: 100px;
        display: inline-block;
    }

    .order-total {
        background: linear-gradient(135deg, #D10024, #ff6b6b);
        color: white;
        padding: 20px;
        border-radius: 15px;
        text-align: center;
        margin-bottom: 20px;
    }

    .total-label {
        font-size: 1rem;
        margin-bottom: 5px;
        opacity: 0.9;
    }

    .total-amount {
        font-size: 2rem;
        font-weight: 700;
    }

    .timeline {
        position: relative;
        padding-left: 30px;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #dee2e6;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 20px;
        padding-left: 25px;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -8px;
        top: 8px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #dee2e6;
    }

    .timeline-item.active::before {
        background: #D10024;
        box-shadow: 0 0 0 4px rgba(209, 0, 36, 0.2);
    }

    .timeline-content {
        background: white;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .timeline-title {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 5px;
    }

    .timeline-time {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .action-buttons {
        display: flex;
        gap: 15px;
        margin-top: 20px;
    }

    .btn-action {
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-view {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
    }

    .btn-view:hover {
        color: white;
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    .btn-cancel {
        background: linear-gradient(135deg, #f44336, #e57373);
        color: white;
    }

    .btn-cancel:hover {
        color: white;
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(244, 67, 54, 0.4);
    }

    .empty-state {
        text-align: center;
        padding: 80px 20px;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
    }

    .empty-icon {
        font-size: 5rem;
        color: #dee2e6;
        margin-bottom: 30px;
    }

    .empty-title {
        font-size: 2rem;
        color: #6c757d;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .empty-subtitle {
        color: #adb5bd;
        margin-bottom: 40px;
        font-size: 1.1rem;
    }

    .btn-start-shopping {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border: none;
        padding: 15px 30px;
        border-radius: 25px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
    }

    .btn-start-shopping:hover {
        color: white;
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }

    @media (max-width: 768px) {
        .orders-container {
            margin: 20px;
            padding: 20px;
        }

        .order-header {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }

        .order-info {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>

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
