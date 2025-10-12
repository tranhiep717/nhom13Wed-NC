<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my_style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
            <div class="text-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#007bff" class="mb-3" viewBox="0 0 16 16">
                  <path d="M8 0a5 5 0 0 0-5 5v2.278A2.5 2.5 0 0 0 1 9.5v2A2.5 2.5 0 0 0 3.5 14h9A2.5 2.5 0 0 0 15 11.5v-2a2.5 2.5 0 0 0-2-2.222V5a5 5 0 0 0-5-5zm0 1a4 4 0 0 1 4 4v2.278c0 .12.043.236.12.326A1.5 1.5 0 0 1 14 9.5v2a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 11.5v-2a1.5 1.5 0 0 1 1.88-1.396.5.5 0 0 0 .12-.326V5A4 4 0 0 1 8 1z"/>
                </svg>
                <h2>Chào mừng đến trang quản trị</h2>
            </div>
            <a href="{{ route('admin.login') }}" class="btn btn-primary btn-block">Đăng nhập ngay với tư cách Admin</a>
        </div>
    </div>
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
