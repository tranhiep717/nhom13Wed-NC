@extends('admin.layout')

@section('title', 'Chi tiết sản phẩm')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0 text-gray-800">Chi tiết sản phẩm</h1>
            <p class="text-muted">Thông tin chi tiết về sản phẩm.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <strong>{{ $product->name }}</strong>
                </div>
                <div class="card-body">
                    <p><strong>Danh mục:</strong> {{ $product->category->name ?? '-' }}</p>
                    <p><strong>Giá:</strong> {{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
                    <p><strong>Số lượng:</strong> {{ $product->stock }}</p>
                    <p><strong>Mô tả:</strong> {{ $product->description }}</p>
                    <p><strong>Ngày tạo:</strong> {{ $product->created_at ? $product->created_at->format('d/m/Y H:i') : '' }}</p>
                    <p><strong>Ngày cập nhật:</strong> {{ $product->updated_at ? $product->updated_at->format('d/m/Y H:i') : '' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Ảnh sản phẩm</strong>
                </div>
                <div class="card-body text-center">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded" style="max-height:300px;">
                    @else
                        <img src="/img/product01.png" alt="No image" class="img-fluid rounded" style="max-height:300px;">
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Sửa</a>
            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Xóa sản phẩm này?')">Xóa</button>
            </form>
        </div>
    </div>
</div>
@endsection
