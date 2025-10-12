{{-- resources/views/admin/orders/index.blade.php --}}
@extends('admin.layout')

@section('title', 'Quản lý Đơn Hàng')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="bi bi-bag-check-fill text-success" style="font-size:2rem;"></i>
                </div>
                <div>Quản lý Đơn Hàng
                    <div class="page-title-subheading">Danh sách tất cả đơn hàng trong hệ thống.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header"><i class="bi bi-list-ul me-1"></i>Danh sách Đơn Hàng</div>
                <div class="card-body">
                    <table class="mb-0 table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><i class="bi bi-receipt"></i> Mã Đơn Hàng</th>
                            <th><i class="bi bi-person"></i> Khách Hàng</th>
                            <th><i class="bi bi-cash"></i> Tổng Tiền</th>
                            <th><i class="bi bi-truck"></i> Trạng Thái</th>
                            <th><i class="bi bi-calendar"></i> Ngày Đặt</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                            {{-- Dữ liệu đơn hàng sẽ được đổ vào đây từ Controller --}}
                            <tr>
                                <th scope="row">1</th>
                                <td>#ORD001</td>
                                <td>Test User</td>
                                <td>1.500.000 VNĐ</td>
                                <td>Đang xử lý</td>
                                <td>2025-06-07</td>
                                <td>
                                    <button class="btn btn-info btn-sm" title="Chi tiết"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-warning btn-sm" title="Cập nhật"><i class="bi bi-pencil-square"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>#ORD002</td>
                                <td>Nguyễn Văn Sáng</td>
                                <td>2.800.000 VNĐ</td>
                                <td>Đã giao</td>
                                <td>2025-06-06</td>
                                <td>
                                    <button class="btn btn-info btn-sm" title="Chi tiết"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-warning btn-sm" title="Cập nhật"><i class="bi bi-pencil-square"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
