@extends('admin.layout')

@section('title', 'Xóa danh mục')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header bg-danger text-white">
                    <strong>Xác nhận xóa danh mục</strong>
                </div>
                <div class="card-body">
                    <h4>Bạn có chắc chắn muốn xóa danh mục sau?</h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item"><strong>Tên danh mục:</strong> {{ $category->name }}</li>
                        <li class="list-group-item"><strong>Mô tả:</strong> {{ $category->description }}</li>
                    </ul>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xác nhận xóa</button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
