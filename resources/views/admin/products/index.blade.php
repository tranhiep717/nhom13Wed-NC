<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quản lý Sản Phẩm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/public/eProject_Sem2_Template_Admin/main.css">
  <link rel="stylesheet" href="/public/eProject_Sem2_Template_Admin/my_style.css">
  <link rel="stylesheet" href="/public/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/public/adminlte/dist/css/adminlte.min.css">
</head>
<body>
@extends('admin.layout')

@section('title', 'Quản lý Sản phẩm')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0 text-gray-800">Quản lý Sản phẩm</h1>
            <p class="text-muted">Danh sách tất cả sản phẩm trong cửa hàng.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong><i class="bi bi-box-seam-fill text-warning me-1"></i>Danh sách Sản phẩm</strong>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-dark btn-sm">
                        <i class="bi bi-plus-circle-fill me-1"></i> Thêm Sản Phẩm Mới
                    </a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><i class="bi bi-box"></i> Tên Sản phẩm</th>
                            <th><i class="bi bi-tags"></i> Danh mục</th>
                            <th><i class="bi bi-cash"></i> Giá</th>
                            <th><i class="bi bi-stack"></i> Số lượng</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name ?? '-' }}</td>
                                <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm" title="Xem chi tiết"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm" title="Sửa"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa sản phẩm này?')" title="Xóa"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Không có sản phẩm nào.</td>
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
</body>
</html>
