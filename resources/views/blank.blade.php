@extends('layouts.main')

@section('title', 'Trang Trống') {{-- Đã đổi title rõ ràng hơn --}}
@section('content')
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Trang Thông Thường</h3>
                <ul class="breadcrumb-tree">
                    {{-- Đã sửa: index.html thành route('home') --}}
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Trang Trống</li>
                </ul>
            </div>
        </div>
        </div>
    </div>
<div class="section">
    <div class="container">
        <div class="row">
            {{-- Nội dung trang trống của bạn có thể đặt ở đây --}}
            <div class="col-md-12">
                <h2>Đây là trang trống.</h2>
                <p>Bạn có thể thêm nội dung tùy chỉnh của mình vào đây.</p>
            </div>
        </div>
        </div>
    </div>
<div id="newsletter" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Đăng ký nhận <strong>BẢN TIN</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Nhập Email của bạn">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Đăng ký</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection