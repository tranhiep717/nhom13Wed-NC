{{-- resources/views/admin/categories/index.blade.php --}}
@extends('admin.layout')

@section('title', 'Quản lý Danh Mục')

@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="bi bi-tags-fill text-primary" style="font-size:2rem;"></i>
                </div>
                <div>Quản lý Danh Mục
                    <div class="page-title-subheading">Danh sách tất cả danh mục sản phẩm.</div>
                </div>
            </div>
            <div class="page-title-actions">
                {{-- Nút thêm danh mục mới --}}
                <a href="{{ route('admin.categories.create') }}" class="btn-shadow mr-3 btn btn-dark">
                    <i class="bi bi-plus-circle-fill me-1"></i> Thêm Danh Mục Mới
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Danh sách Danh Mục</div>
                <div class="card-body">
                    <table class="mb-0 table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên Danh Mục</th>
                            <th>Mô tả</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-info btn-sm" title="Xem chi tiết"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm" title="Sửa"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa danh mục này?')" title="Xóa"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Không có danh mục nào.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
