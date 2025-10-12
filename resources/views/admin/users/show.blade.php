@extends('admin.layout')

@section('title', 'Chi tiết người dùng')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0 text-gray-800">Chi tiết người dùng</h1>
            <p class="text-muted">Thông tin chi tiết về người dùng.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <strong>{{ $user->name }}</strong>
                </div>
                <div class="card-body">
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Ngày đăng ký:</strong> {{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : '' }}</p>
                    <p><strong>Ngày cập nhật:</strong> {{ $user->updated_at ? $user->updated_at->format('d/m/Y H:i') : '' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Ảnh đại diện</strong>
                </div>
                <div class="card-body text-center">
                    <img src="/img/user.png" alt="Avatar" class="img-fluid rounded-circle" style="max-height:180px;">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Sửa</a>
            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Xóa người dùng này?')">Xóa</button>
            </form>
        </div>
    </div>
</div>
@endsection
