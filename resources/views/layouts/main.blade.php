<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Electro - Mẫu Giao Diện Thương Mại Điện Tử HTML</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    {{-- Đã loại bỏ các dấu hiệu xung đột Git và chỉ giữ lại một header --}}
    @include('partials.header')

    @yield('fullwidth')
    <div class="container">
        @yield('content')
    </div>

    {{-- Tương tự, chỉ giữ lại một footer. Tôi giả định 'partials.footer' là đúng --}}
    @include('partials.footer')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/checkout.js') }}"></script>
    <script src="{{ asset('js/wishlist.js') }}"></script>
    <script src="{{ asset('js/wishlist-badge.js') }}"></script>
</body>

</html>
<li>
    <a href="{{ route('cart.index') }}" style="position:relative;">
        <i class="fa fa-shopping-cart"></i>
        Giỏ hàng của bạn
        @if(isset($cartCount) && $cartCount > 0)
        <span class="cart-qty-badge" style="position:absolute;top:-8px;right:-18px;background:#d10024;color:#fff;border-radius:50%;padding:2px 7px;font-size:13px;">{{ $cartCount }}</span>
        @endif
    </a>
</li>