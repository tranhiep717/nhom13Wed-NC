@extends('admin.layout')

@section('title', 'Dashboard')



@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <p class="text-muted">Tổng quan hệ thống quản trị cửa hàng.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6 mb-4">
            <a href="{{ route('admin.products.index') }}" class="text-decoration-none">
                <div class="small-box bg-info shadow rounded-3 position-relative overflow-hidden dashboard-box">
                    <div class="inner text-center">
                        <h3 class="fw-bold mb-1">{{ isset($productCount) ? $productCount : 0 }}</h3>
                        <p class="mb-0">Sản phẩm</p>
                        <div class="icon mt-2">
                            <i class="bi bi-box-seam"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-6 mb-4">
            <a href="{{ route('admin.orders.index') }}" class="text-decoration-none">
                <div class="small-box bg-success shadow rounded-3 position-relative overflow-hidden dashboard-box">
                    <div class="inner text-center">
                        <h3 class="fw-bold mb-1">{{ isset($orderCount) ? $orderCount : 0 }}</h3>
                        <p class="mb-0">Đơn hàng</p>
                        <div class="icon mt-2">
                            <i class="bi bi-cart-check"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-6 mb-4">
            <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
                <div class="small-box bg-warning shadow rounded-3 position-relative overflow-hidden dashboard-box">
                    <div class="inner text-center">
                        <h3 class="fw-bold mb-1">{{ isset($userCount) ? $userCount : 0 }}</h3>
                        <p class="mb-0">Khách hàng</p>
                        <div class="icon mt-2">
                            <i class="bi bi-people"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-6 mb-4">
            <div class="small-box bg-danger shadow rounded-3 position-relative overflow-hidden dashboard-box">
                <div class="inner text-center">
                    <h3 class="fw-bold mb-1">{{ isset($contactCount) ? $contactCount : 0 }}</h3>
                    <p class="mb-0">Liên hệ mới</p>
                    <div class="icon mt-2">
                        <i class="bi bi-envelope-paper"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chào mừng bạn đến với trang quản trị!</h3>
                </div>
                <div class="card-body">
                    <p>Đây là trang tổng quan, bạn có thể theo dõi các số liệu thống kê nhanh về sản phẩm, đơn hàng, khách hàng và liên hệ mới. Sử dụng menu bên trái để truy cập các chức năng quản lý chi tiết.</p>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .dashboard-box {
            min-height: 120px;
            transition: transform 0.15s, box-shadow 0.15s;
        }
        .dashboard-box:hover {
            transform: translateY(-4px) scale(1.03);
            box-shadow: 0 8px 32px rgba(0,0,0,0.12);
            z-index: 2;
        }
        .dashboard-box .icon {
            position: static;
            top: unset;
            right: unset;
            font-size: 2.2rem;
            opacity: 1;
            margin-top: 0.2rem;
        }
        .dashboard-box.bg-info .icon i { color: #0d6efd; }
        .dashboard-box.bg-success .icon i { color: #198754; }
        .dashboard-box.bg-warning .icon i { color: #ffc107; }
        .dashboard-box.bg-danger .icon i { color: #dc3545; }
        .dashboard-box .inner {
            z-index: 1;
            position: relative;
        }
        .dashboard-box h3, .dashboard-box p {
            color: #222;
            text-shadow: none;
        }
        .dashboard-box.bg-warning h3, .dashboard-box.bg-warning p {
            color: #333;
        }
        .dashboard-box {
            background-color:rgb(196, 232, 212) !important;
        }
        .dashboard-box.bg-info {
            background-color:rgb(219, 220, 243) !important;
        }
        .dashboard-box.bg-success {
            background-color:rgb(215, 243, 229) !important;
        }
        .dashboard-box.bg-warning {
            background-color:rgb(247, 242, 214) !important;
        }
        .dashboard-box.bg-danger {
            background-color:rgb(242, 222, 222) !important;
        }
    </style>
</div>
@endsection
