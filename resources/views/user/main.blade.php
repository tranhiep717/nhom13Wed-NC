<!DOCTYPE html>
<html lang="vi">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Electro - Mẫu Giao Diện Thương Mại Điện Tử HTML</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
        {{-- Trong <head> của user/main.blade.php --}}
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/custom-user-profile.css') }}"> {{-- Tệp CSS tùy chỉnh --}}

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    @include('partials.headerlogin')

    <div class="section">
        <div class="container">
            <!-- Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center" style="margin-bottom: 50px;">
                        <h2 class="title">User Dashboard</h2>
                        <p style="color: #8D99AE;">Manage your profile and account settings</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Profile Information -->
                <div class="col-md-6 col-lg-6">
                    <div class="card-custom">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Update Password -->
                <div class="col-md-6 col-lg-6">
                    <div class="card-custom">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 30px;">
                <!-- My Orders -->
                <div class="col-md-8">
                    <div class="card-custom">
                        <div class="section-title text-center">
                            <h3 class="title">My Orders</h3>
                        </div>
                        @if($orders && $orders->count() > 0)
                            <div class="orders-list">
                                @foreach($orders as $order)
                                    <div class="order-item">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong style="color: #2B2D42;">Order #{{ $order->id }}</strong>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="order-total">{{ number_format($order->total_amount, 0, ',', '.') }}₫</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="order-status">{{ ucfirst($order->status ?? 'pending') }}</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="order-date">{{ $order->created_at->format('d/m/Y') }}</span>
                                            </div>
                                            <div class="col-md-2">Add commentMore actions
                                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center" style="padding: 30px;">
                                <i class="fa fa-shopping-cart" style="font-size: 48px; color: #E4E7ED; margin-bottom: 15px;"></i>
                                <p style="color: #8D99AE; margin: 0;">{{ __('You have no orders yet.') }}</p>
                                <a href="{{ url('/') }}" class="primary-btn" style="margin-top: 15px;">Start Shopping</a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Delete Account -->
                {{-- <div class="col-md-4">
                    <div class="card-custom danger-zone">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <style>
    .card-custom {
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }

    .card-custom:hover {
        box-shadow: 0 4px 25px rgba(0,0,0,0.12);
        transform: translateY(-2px);
    }

    .danger-zone {
        border-left: 4px solid #D10024;
    }

    .orders-list {
        max-height: 400px;
        overflow-y: auto;
    }

    .order-item {
        padding: 15px;
        border-bottom: 1px solid #E4E7ED;
        transition: background-color 0.3s ease;
    }

    .order-item:hover {
        background-color: #FBFBFC;
    }

    .order-item:last-child {
        border-bottom: none;
    }

    .order-total {
        color: #D10024;
        font-weight: 600;
    }

    .order-status {
        background-color: #E4E7ED;
        color: #2B2D42;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 12px;
        text-transform: uppercase;
    }

    .order-date {
        color: #8D99AE;
        font-size: 14px;
    }

    .alert {
        border-radius: 8px;
        padding: 15px;
        margin-top: 15px;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    @media (max-width: 768px) {
        .card-custom {
            padding: 20px;
        }

        .order-item .col-md-3 {
            margin-bottom: 5px;
        }
    }
    </style>

    @include('partials.footerlogin')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/checkout.js') }}"></script>
</body>

</html>
