@extends('layouts.main')
@section('title', 'Chi tiết đơn hàng #' . $order->id)

@section('content')


<div class="section">
    <div class="container">
        <div class="order-detail-container">
            <!-- Page Header -->
            <div class="page-header">
                <h1><i class="fa fa-file-text-o"></i> Chi tiết đơn hàng</h1>
                <div class="order-id">Mã đơn hàng: #{{ $order->id }}</div>
            </div>

            <!-- Order Status -->
            <div class="order-status-card">
                <div class="status-badge status-{{ $order->status ?? 'pending' }}">
                    {{ $order->status_text ?? 'Chờ xác nhận' }}
                </div>
                <p style="margin: 0; font-size: 1.1rem; opacity: 0.9;">
                    Đặt hàng ngày {{ $order->created_at ? $order->created_at->format('d/m/Y H:i') : 'N/A' }}
                </p>
            </div>

            <!-- Order Summary -->
            <div class="detail-card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fa fa-chart-bar"></i>
                    </div>
                    <h3 class="card-title">Tổng quan đơn hàng</h3>
                </div>

                <div class="order-summary">
                    <div class="summary-item">
                        <div class="summary-label">Tổng tiền</div>
                        <div class="summary-value price">{{ number_format($order->total_amount ?? 0, 0, ',', '.') }}₫</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-label">Số sản phẩm</div>
                        <div class="summary-value">{{ $order->items ? $order->items->count() : 0 }} sản phẩm</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-label">Phương thức TT</div>
                        <div class="summary-value">{{ $order->payment_method ?? 'COD' }}</div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-label">Trạng thái</div>
                        <div class="summary-value">{{ $order->status_text ?? 'Chờ xác nhận' }}</div>
                    </div>
                </div>
            </div>

            <!-- Customer Information -->
            <div class="detail-card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <h3 class="card-title">Thông tin khách hàng</h3>
                </div>

                <div class="customer-info">
                    <div class="info-group">
                        <div class="info-label">Họ và tên</div>
                        <div class="info-value">{{ $order->customer_name ?? ($order->user ? $order->user->name : 'N/A') }}</div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ $order->customer_email ?? ($order->user ? $order->user->email : 'N/A') }}</div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Số điện thoại</div>
                        <div class="info-value">{{ $order->customer_phone ?? ($order->user ? $order->user->phone : 'N/A') }}</div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Địa chỉ giao hàng</div>
                        <div class="info-value">{{ $order->shipping_address ?? ($order->user ? $order->user->address : 'N/A') }}</div>
                    </div>
                </div>

                @if($order->notes)
                <div class="info-group" style="margin-top: 20px;">
                    <div class="info-label">Ghi chú</div>
                    <div class="info-value">{{ $order->notes }}</div>
                </div>
                @endif
            </div>

            <!-- Order Timeline -->
            <div class="detail-card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <h3 class="card-title">Lịch sử đơn hàng</h3>
                </div>

                <div class="timeline">
                    <div class="timeline-item {{ ($order->status ?? 'pending') == 'pending' ? 'active' : '' }}">
                        <div class="timeline-content">
                            <div class="timeline-title">Đơn hàng được tạo</div>
                            <div class="timeline-time">{{ $order->created_at ? $order->created_at->format('d/m/Y H:i') : 'N/A' }}</div>
                        </div>
                    </div>

                    @if(in_array($order->status ?? 'pending', ['confirmed', 'processing', 'shipping', 'delivered']))
                    <div class="timeline-item active">
                        <div class="timeline-content">
                            <div class="timeline-title">Đơn hàng được xác nhận</div>
                            <div class="timeline-time">{{ isset($order->confirmed_at) && $order->confirmed_at ? $order->confirmed_at->format('d/m/Y H:i') : 'Đang cập nhật' }}</div>
                        </div>
                    </div>
                    @endif

                    @if(in_array($order->status ?? 'pending', ['processing', 'shipping', 'delivered']))
                    <div class="timeline-item active">
                        <div class="timeline-content">
                            <div class="timeline-title">Đang chuẩn bị hàng</div>
                            <div class="timeline-time">{{ isset($order->processing_at) && $order->processing_at ? $order->processing_at->format('d/m/Y H:i') : 'Đang cập nhật' }}</div>
                        </div>
                    </div>
                    @endif

                    @if(in_array($order->status ?? 'pending', ['shipping', 'delivered']))
                    <div class="timeline-item active">
                        <div class="timeline-content">
                            <div class="timeline-title">Đang giao hàng</div>
                            <div class="timeline-time">{{ isset($order->shipping_at) && $order->shipping_at ? $order->shipping_at->format('d/m/Y H:i') : 'Đang cập nhật' }}</div>
                        </div>
                    </div>
                    @endif

                    @if(($order->status ?? 'pending') == 'delivered')
                    <div class="timeline-item active">
                        <div class="timeline-content">
                            <div class="timeline-title">Đã giao hàng thành công</div>
                            <div class="timeline-time">{{ isset($order->delivered_at) && $order->delivered_at ? $order->delivered_at->format('d/m/Y H:i') : 'Đang cập nhật' }}</div>
                        </div>
                    </div>
                    @endif

                    @if(($order->status ?? 'pending') == 'cancelled')
                    <div class="timeline-item active">
                        <div class="timeline-content">
                            <div class="timeline-title">Đơn hàng đã bị hủy</div>
                            <div class="timeline-time">{{ isset($order->cancelled_at) && $order->cancelled_at ? $order->cancelled_at->format('d/m/Y H:i') : 'Đang cập nhật' }}</div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Products List -->
            <div class="detail-card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fa fa-shopping-bag"></i>
                    </div>
                    <h3 class="card-title">Sản phẩm trong đơn hàng</h3>
                </div>

                <table class="products-table">
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($order->items && $order->items->count() > 0)
                            @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <img src="{{ $item->product_image ? asset('storage/' . $item->product_image) : asset('images/default.png') }}"
                                         alt="{{ $item->product_name }}"
                                         class="product-image">
                                </td>
                                <td>
                                    <div class="product-name">{{ $item->product_name }}</div>
                                    @if(isset($item->product_code))
                                        <div class="product-code">Mã: {{ $item->product_code }}</div>
                                    @endif
                                </td>
                                <td>
                                    <span class="quantity-badge">{{ $item->quantity }}</span>
                                </td>
                                <td>
                                    <span class="price">{{ number_format($item->price ?? 0, 0, ',', '.') }}₫</span>
                                </td>
                                <td>
                                    <span class="total-price">{{ number_format(($item->quantity ?? 0) * ($item->price ?? 0), 0, ',', '.') }}₫</span>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center" style="padding: 40px;">
                                    <i class="fa fa-inbox" style="font-size: 3rem; color: #dee2e6; margin-bottom: 15px;"></i>
                                    <p style="color: #6c757d; margin: 0;">Không có sản phẩm trong đơn hàng</p>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr style="background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
                            <td colspan="4" style="text-align: right; font-weight: 700; font-size: 1.2rem; padding: 20px;">
                                <strong>Tổng cộng:</strong>
                            </td>
                            <td style="padding: 20px;">
                                <span class="total-price" style="font-size: 1.5rem;">
                                    {{ number_format($order->total_amount ?? 0, 0, ',', '.') }}₫
                                </span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="{{ route('orders.index') }}" class="btn-action btn-back">
                    <i class="fa fa-arrow-left"></i>
                    Quay lại danh sách
                </a>
                <button onclick="window.print()" class="btn-action btn-print">
                    <i class="fa fa-print"></i>
                    In đơn hàng
                </button>
                <a href="#" class="btn-action btn-download" onclick="downloadPDF()">
                    <i class="fa fa-download"></i>
                    Tải PDF
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function downloadPDF() {
    // Implement PDF download functionality
    alert('Tính năng tải PDF đang được phát triển!');
}

// Print optimization
window.addEventListener('beforeprint', function() {
    document.body.classList.add('printing');
});

window.addEventListener('afterprint', function() {
    document.body.classList.remove('printing');
});
</script>


@endsection
