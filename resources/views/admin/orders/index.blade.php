@extends('admin.layout')

@section('title', 'Quản lý Đơn hàng')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0 text-gray-800">Quản lý Đơn hàng</h1>
            <p class="text-muted">Xem và xác nhận các đơn hàng.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong><i class="bi bi-card-checklist"></i> Danh sách Đơn hàng</strong>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Khách hàng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Ngày đặt</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->user->name ?? 'Khách vãng lai' }}</td>
                                <td>{{ number_format($order->total_amount ?? 0, 0, ',', '.') }} VNĐ</td>

                                <td>
                                    @if($order->status == 'pending')
                                        <span class="badge bg-warning">Chờ xác nhận</span>
                                    @elseif($order->status == 'confirmed')
                                        <span class="badge bg-success">Đã xác nhận</span>
                                    @else
                                        <span class="badge bg-secondary">Khác</span>
                                    @endif
                                </td>
                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    @if($order->status === 'pending')
                                        {{-- Nút xác nhận --}}
                                        <form action="{{ route('admin.orders.confirm', $order->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Xác nhận đơn hàng này?')">
                                                <i class="bi bi-check-circle"></i>
                                            </button>
                                        </form>

                                        {{-- Nút hủy --}}
                                        <form action="{{ route('admin.orders.cancel', $order->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        </form>
                                    @endif

                                    {{-- Xem chi tiết --}}
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Chưa có đơn hàng nào.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
