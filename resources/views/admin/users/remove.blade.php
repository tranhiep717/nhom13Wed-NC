@extends('admin.layout')

@section('title', 'Xóa người dùng')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header bg-danger text-white">
                    <strong>Xác nhận xóa người dùng</strong>
                </div>
                <div class="card-body">
                    <h4>Bạn có chắc chắn muốn xóa người dùng sau?</h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item"><strong>Tên:</strong> {{ $user->name }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                        <li class="list-group-item"><strong>Ngày đăng ký:</strong> {{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : '' }}</li>
                    </ul>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xác nhận xóa</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
