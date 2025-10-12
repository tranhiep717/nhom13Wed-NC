@extends('admin.layout')

@section('title', 'Chi tiết danh mục')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0 text-gray-800">Chi tiết danh mục</h1>
            <p class="text-muted">Thông tin chi tiết về danh mục sản phẩm.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <strong>{{ $category->name }}</strong>
                </div>
                <div class="card-body">
                    <p><strong>Mô tả:</strong> {{ $category->description }}</p>
                    <p><strong>Ngày tạo:</strong> {{ $category->created_at ? $category->created_at->format('d/m/Y H:i') : '' }}</p>
                    <p><strong>Ngày cập nhật:</strong> {{ $category->updated_at ? $category->updated_at->format('d/m/Y H:i') : '' }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Sửa</a>
            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Xóa danh mục này?')">Xóa</button>
            </form>
        </div>
    </div>
</div>
@endsection
