<header>
	<div id="top-header">
		<div class="container">
			<ul class="header-links pull-left">
				<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
				<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
				<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Đường Stonecoal</a></li>
			</ul>
			<ul class="header-links pull-right">
				@guest
				<li><a href="{{ route('login') }}"><i class="fa fa-user-o"></i> Đăng nhập</a></li>
				<li><a href="{{ route('register') }}"><i class="fa fa-user-plus"></i> Đăng ký</a></li>
				@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
						<li><a href="{{ route('cart.index') }}">Xem giỏ hàng</a></li>
						<li>
							<form method="POST" action="{{ route('logout') }}" style="display:inline;">
								@csrf
								<button type="submit" style="background:none; border:none; padding:0; color:#337ab7; cursor:pointer;">Đăng xuất</button>
							</form>
						</li>
					</ul>
				</li>
				@endguest
			</ul>

		</div>
	</div>
	<div id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="header-logo">
						<a href="#" class="logo">
							<img src="./img/logo.png" alt="Logo Electro">
						</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="header-search">
						<form action="{{ route('products.search') }}" method="GET" class="header-search-form">
							<input class="input" name="keyword" placeholder="Nhập từ khóa..." />
							<button class="search-btn">Tìm kiếm</button>
						</form>
					</div>
				</div>
				<div class="col-md-3 clearfix">
					<div class="header-ctn">
						<div>
							<a href="{{ route('wishlist.index') }}">
								<i class="fa fa-heart-o"></i>
								<span>Danh sách yêu thích</span>
								@php
								$wishlistCount = auth()->check() ? auth()->user()->wishlist()->count() : 0;
								@endphp
								@if($wishlistCount > 0)
								<div class="qty" style="background:#d10024;color:#fff;position:absolute;top:-8px;right:-8px;border-radius:50%;min-width:22px;height:22px;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;z-index:2;">{{ $wishlistCount }}</div>
								@endif
							</a>
						</div>
						<div class="dropdown">
							<a href="{{ route('cart.index') }}" id="minicart-toggle" style="cursor:pointer;align-items:center;gap:6px;">
								<i class="fa fa-shopping-cart"></i>
								<span>Giỏ hàng của bạn</span>
								<div class="qty" id="minicart-badge">{{ isset($cartCount) ? $cartCount : 0 }}</div>
							</a>
							<div class="cart-dropdown" id="minicart-content" style="display:none;">
								@php
								// Lấy dữ liệu cart cho partial (nếu chưa có thì truyền mảng rỗng)
								$cart = isset($cart) ? $cart : [];
								$cartTotal = isset($cartTotal) ? $cartTotal : 0;
								@endphp
								@include('partials.minicart', ['cart' => $cart, 'cartTotal' => $cartTotal])
							</div>
						</div>
						<div class="menu-toggle">
							<a href="#">
								<i class="fa fa-bars"></i>
								<span>Menu</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<nav id="navigation">
	<div class="container">
		<div id="responsive-nav">
			<ul class="main-nav nav navbar-nav">
				<li><a href="{{route('home')}}">Trang chủ</a></li>
				<li><a href="{{route('laptop')}}">Máy tính xách tay</a></li>
				<li><a href="{{route('telephone')}}">Điện thoại thông minh</a></li>
				<li><a href="{{route('camera')}}">Máy ảnh</a></li>
				<li><a href="{{ route('accessories') }}">Phụ kiện</a></li>
			</ul>
		</div>
	</div>
</nav>
