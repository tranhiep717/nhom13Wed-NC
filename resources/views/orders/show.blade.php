@extends('layouts.main')

@section('title', 'Chi tiết đơn hàng #' . $order->id)

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #ffffff 0%, #b090d0 100%);
        min-height: 100vh;
        font-family: 'Montserrat', sans-serif;
    }

    .order-detail-container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 40px;
        margin: 40px auto;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        max-width: 1200px;
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
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, #D10024, #ff6b6b);
        border-radius: 2px;
    }

    .page-header h1 {
        color: #fff;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .page-header .order-id {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.1rem;
    }

    .detail-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .detail-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #D10024, #ff6b6b, #667eea);
        transition: left 0.5s ease;
    }

    .detail-card:hover::before {
        left: 0;
    }

    .detail-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f8f9fa;
    }

    .card-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #D10024, #ff6b6b);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        box-shadow: 0 5px 15px rgba(209, 0, 36, 0.3);
    }

    .card-icon i {
        color: white;
        font-size: 1.5rem;
    }

    .card-title {
        color: #2c3e50;
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
    }

    .order-status-card {
        background: linear-gradient(135deg, #D10024, #ff6b6b);
        color: white;
        text-align: center;
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 15px 35px rgba(209, 0, 36, 0.3);
    }

    .status-badge {
        font-size: 1.2rem;
        font-weight: 700;
        padding: 15px 30px;
        border-radius: 25px;
        display: inline-block;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
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

    .order-summary {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .summary-item {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 15px;
        text-align: center;
        border-left: 4px solid #D10024;
    }

    .summary-label {
        font-size: 0.9rem;
        color: #6c757d;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .summary-value {
        font-size: 1.3rem;
        font-weight: 700;
        color: #2c3e50;
    }

    .summary-value.price {
        color: #D10024;
        font-size: 1.5rem;
    }

    .customer-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .info-group {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 15px;
        border-left: 4px solid #667eea;
    }

    .info-label {
        font-size: 0.9rem;
        color: #6c757d;
        margin-bottom: 5px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-value {
        font-size: 1.1rem;
        color: #2c3e50;
        font-weight: 500;
    }

    .products-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .products-table thead {
        background: linear-gradient(135deg, #2c3e50, #34495e);
        color: white;
    }

    .products-table th {
        padding: 20px 15px;
        text-align: left;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.9rem;
    }

    .products-table td {
        padding: 20px 15px;
        border-bottom: 1px solid #dee2e6;
        vertical-align: middle;
    }

    .products-table tbody tr {
        background: white;
        transition: all 0.3s ease;
    }

    .products-table tbody tr:hover {
        background: #f8f9fa;
        transform: scale(1.01);
    }

    .product-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
    }

    .product-name {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 5px;
    }

    .product-code {
        font-size: 0.8rem;
        color: #6c757d;
    }

    .quantity-badge {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 600;
        display: inline-block;
    }

    .price {
        font-weight: 700;
        color: #D10024;
        font-size: 1.1rem;
    }

    .total-price {
        font-weight: 700;
        color: #D10024;
        font-size: 1.2rem;
        background: #fff2f2;
        padding: 5px 10px;
        border-radius: 10px;
    }

    .action-buttons {
        text-align: center;
        margin-top: 40px;
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-action {
        padding: 15px 30px;
        border: none;
        border-radius: 25px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 1rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-back {
        background: linear-gradient(135deg, #6c757d, #495057);
        color: white;
    }

    .btn-back:hover {
        color: white;
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
    }

    .btn-print {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
    }

    .btn-print:hover {
        color: white;
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }

    .btn-download {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
    }

    .btn-download:hover {
        color: white;
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
    }

    .timeline {
        position: relative;
        padding-left: 30px;
        margin-top: 20px;
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

    @media (max-width: 768px) {
        .order-detail-container {
            margin: 20px;
            padding: 20px;
        }

        .page-header h1 {
            font-size: 2rem;
        }

        .detail-card {
            padding: 20px;
        }

        .order-summary {
            grid-template-columns: 1fr;
        }

        .customer-info {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            flex-direction: column;
            align-items: center;
        }

        .products-table {
            font-size: 0.9rem;
        }

        .products-table th,
        .products-table td {
            padding: 10px 8px;
        }
    }

    /* Print styles */
    @media print {
        body {
            background: white !important;
        }

        .order-detail-container {
            background: white !important;
            box-shadow: none !important;
            border: none !important;
        }

        .action-buttons {
            display: none !important;
        }
    }
</style>

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
