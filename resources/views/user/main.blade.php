<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Dashboard - Electro</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/custom-user-profile.css') }}">

    <style>
        body {
            background: linear-gradient(135deg, hsl(0, 0%, 100%) 0%, #b090d0 100%);
            min-height: 100vh;
            font-family: 'Montserrat', sans-serif;
        }

        .dashboard-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 50px;
            margin: 40px auto;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            max-width: 900px; /* Tăng từ 700px lên 900px */
        }

        .page-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .page-header::before {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #D10024, #ff6b6b);
            border-radius: 2px;
        }

        .page-header h1 {
            color: #fff;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .page-header p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.2rem;
            margin: 0;
        }

        .dashboard-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px; /* Tăng từ 30px lên 40px */
            margin-bottom: 40px; /* Tăng từ 30px lên 40px */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }

        .dashboard-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #D10024, #ff6b6b, #667eea);
            transition: left 0.5s ease;
        }

        .dashboard-card:hover::before {
            left: 0;
        }

        .dashboard-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 35px; /* Tăng từ 25px lên 35px */
            padding-bottom: 20px; /* Tăng từ 15px lên 20px */
            border-bottom: 2px solid #f8f9fa;
        }

        .card-icon {
            width: 60px; /* Tăng từ 50px lên 60px */
            height: 60px; /* Tăng từ 50px lên 60px */
            background: linear-gradient(135deg, #D10024, #ff6b6b);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px; /* Tăng từ 15px lên 20px */
            box-shadow: 0 5px 15px rgba(209, 0, 36, 0.3);
        }

        .card-icon i {
            color: white;
            font-size: 1.8rem; /* Tăng từ 1.5rem lên 1.8rem */
        }

        .card-title {
            color: #2c3e50;
            font-size: 1.8rem; /* Tăng từ 1.5rem lên 1.8rem */
            font-weight: 600;
            margin: 0;
        }

        .form-group {
            margin-bottom: 35px; /* Tăng từ 25px lên 35px */
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px; /* Tăng từ 10px lên 12px */
            padding: 18px 20px; /* Tăng từ 12px 15px lên 18px 20px */
            font-size: 1.1rem; /* Tăng từ 1rem lên 1.1rem */
            transition: all 0.3s ease;
            width: 100%;
            line-height: 1.5;
        }

        .form-control:focus {
            border-color: #D10024;
            box-shadow: 0 0 0 0.3rem rgba(209, 0, 36, 0.25); /* Tăng shadow */
            outline: none;
        }

        .form-label {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 12px; /* Tăng từ 8px lên 12px */
            display: block;
            font-size: 1.1rem; /* Tăng kích thước label */
        }

        .btn-primary {
            background: linear-gradient(135deg, #D10024, #ff6b6b);
            border: none;
            padding: 16px 40px; /* Tăng từ 12px 30px lên 16px 40px */
            border-radius: 30px; /* Tăng từ 25px lên 30px */
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
            font-size: 1.1rem; /* Tăng kích thước font */
            min-width: 200px; /* Thêm min-width */
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(209, 0, 36, 0.3);
            color: white;
        }

        .quick-links {
            display: flex;
            justify-content: center;
            gap: 25px; /* Tăng từ 20px lên 25px */
            margin-bottom: 40px; /* Tăng từ 30px lên 40px */
            flex-wrap: wrap;
        }

        .quick-link {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 18px 30px; /* Tăng từ 15px 25px lên 18px 30px */
            border-radius: 18px; /* Tăng từ 15px lên 18px */
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px; /* Tăng từ 8px lên 10px */
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
            font-size: 1.05rem; /* Thêm kích thước font */
        }

        .quick-link:hover {
            color: white;
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            text-decoration: none;
        }

        .alert {
            border-radius: 12px; /* Tăng từ 10px lên 12px */
            border: none;
            padding: 18px 25px; /* Tăng từ 15px 20px lên 18px 25px */
            margin-bottom: 25px; /* Tăng từ 20px lên 25px */
            font-size: 1.05rem; /* Thêm kích thước font */
        }

        .alert-success {
            background: linear-gradient(135deg, #4caf50, #8bc34a);
            color: white;
        }

        .alert-danger {
            background: linear-gradient(135deg, #f44336, #e57373);
            color: white;
        }

        /* Style cho textarea */
        textarea.form-control {
            min-height: 120px; /* Tăng chiều cao tối thiểu */
            resize: vertical; /* Cho phép resize theo chiều dọc */
        }

        /* Style cho error messages */
        .text-danger {
            font-size: 0.95rem;
            margin-top: 8px;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .dashboard-container {
                margin: 20px;
                padding: 30px; /* Tăng padding cho mobile */
                max-width: none;
            }

            .page-header h1 {
                font-size: 2.2rem; /* Tăng font size cho mobile */
            }

            .dashboard-card {
                padding: 25px; /* Tăng padding cho mobile */
            }

            .form-control {
                padding: 15px 18px; /* Điều chỉnh padding cho mobile */
                font-size: 1.05rem;
            }

            .btn-primary {
                padding: 14px 35px;
                width: 100%; /* Full width trên mobile */
            }

            .quick-links {
                flex-direction: column;
                align-items: center;
            }

            .quick-link {
                width: 100%;
                justify-content: center;
                padding: 16px 25px;
            }

            .card-icon {
                width: 55px;
                height: 55px;
            }

            .card-title {
                font-size: 1.6rem;
            }
        }

        /* Animation cho loading */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Hover effects cho các icon */
        .card-icon {
            position: relative;
            overflow: hidden;
        }

        .card-icon::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.6s ease;
        }

        .dashboard-card:hover .card-icon::before {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    @include('partials.header')

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

    @include('partials.footer')

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
</body>
</html>
