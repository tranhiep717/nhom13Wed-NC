@extends('admin.layout')

@section('title', 'Xóa sản phẩm')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header bg-danger text-white">
                    <strong>Xác nhận xóa sản phẩm</strong>
                </div>
                <div class="card-body">
                    <h4>Bạn có chắc chắn muốn xóa sản phẩm sau?</h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item"><strong>Tên sản phẩm:</strong> {{ $product->name }}</li>
                        <li class="list-group-item"><strong>Danh mục:</strong> {{ $product->category->name ?? '-' }}</li>
                        <li class="list-group-item"><strong>Giá:</strong> {{ number_format($product->price, 0, ',', '.') }} VNĐ</li>
                        <li class="list-group-item"><strong>Số lượng:</strong> {{ $product->stock }}</li>
                        <li class="list-group-item"><strong>Mô tả:</strong> {{ $product->description }}</li>
                    </ul>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xác nhận xóa</button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
