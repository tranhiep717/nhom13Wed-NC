
@extends('layouts.main')

@section('title', 'dashboard user')
@section('content')

    <div class="section">
        <div class="container">
            <div class="dashboard-container">
                <!-- Page Header -->
                <div class="page-header">
                    <h1>Quản lí thông tin cá nhân</h1>
                </div>

                <!-- Profile Information -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <h3 class="card-title">Thông tin cá nhân</h3>
                    </div>

                    @if(session('status') === 'profile-updated')
                        <div class="alert alert-success">
                            <i class="fa fa-check-circle"></i> Thông tin đã được cập nhật thành công!
                        </div>
                    @endif

                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name', $user->name) }}"
                                   required>
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email', $user->email) }}"
                                   required>
                            @error('email')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="tel"
                                   id="phone"
                                   name="phone"
                                   class="form-control"
                                   value="{{ old('phone', $user->phone) }}">
                            @error('phone')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <textarea id="address"
                                      name="address"
                                      class="form-control"
                                      rows="4">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Cập nhật thông tin
                        </button>
                    </form>
                </div>

                <!-- Update Password -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fa fa-lock"></i>
                        </div>
                        <h3 class="card-title">Đổi mật khẩu</h3>
                    </div>

                    @if(session('status') === 'password-updated')
                        <div class="alert alert-success">
                            <i class="fa fa-check-circle"></i> Mật khẩu đã được thay đổi thành công!
                        </div>
                    @endif

                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                            <input type="password"
                                   id="current_password"
                                   name="current_password"
                                   class="form-control"
                                   required>
                            @error('current_password')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Mật khẩu mới</label>
                            <input type="password"
                                   id="password"
                                   name="password"
                                   class="form-control"
                                   required>
                            @error('password')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                            <input type="password"
                                   id="password_confirmation"
                                   name="password_confirmation"
                                   class="form-control"
                                   required>
                            @error('password_confirmation')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-key"></i> Đổi mật khẩu
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/checkout.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Thêm hiệu ứng xuất hiện cho các card
            $('.dashboard-card').each(function(index) {
                $(this).css({
                    'opacity': '0',
                    'transform': 'translateY(30px)'
                });

                setTimeout(() => {
                    $(this).animate({
                        'opacity': '1'
                    }, 500).css('transform', 'translateY(0)');
                }, index * 100);
            });

            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);

            // Form validation feedback
            $('form').on('submit', function() {
                $(this).find('button[type="submit"]').html('<span class="loading-spinner"></span> Đang xử lý...');
            });
        });
    </script>
@endsection


