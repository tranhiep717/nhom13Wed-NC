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
								<form>
									<select class="input-select">
										<option value="0">Tất cả danh mục</option>
										<option value="1">Máy tính xách tay</option>
										<option value="2">Điện thoại thông minh</option>
										<option value="3">Máy ảnh</option>
										<option value="4">Phụ kiện</option>
									</select>
									<input class="input" placeholder="Tìm kiếm tại đây">
									<button class="search-btn">Tìm kiếm</button>
								</form>
							</div>
						</div>
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Danh sách yêu thích</span>
										<div class="qty">2</div>
									</a>
								</div>
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ hàng của bạn</span>
										<div class="qty">3</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product01.png" alt="Laptop UltraBook ZenMax">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="product.html">Laptop UltraBook ZenMax</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>24.500.000 VNĐ</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product02.png" alt="Smartphone Galaxy Pro">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="product.html">Smartphone Galaxy Pro</a></h3>
													<h4 class="product-price"><span class="qty">2x</span>21.750.000 VNĐ</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small>3 sản phẩm đã chọn</small>
											<h5>TỔNG PHỤ: 68.000.000 VNĐ</h5> </div>
										<div class="cart-btns">
											<a href="#">Xem giỏ hàng</a>
											<a href="{{route('checkout')}}">Thanh toán <i class="fa fa-arrow-circle-right"></i></a>
										</div>
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
						<li><a href="{{route('store')}}">Danh mục</a></li>
						<li><a href="{{route('laptop')}}">Máy tính xách tay</a></li>
						<li><a href="{{route('telephone')}}">Điện thoại thông minh</a></li>
						<li><a href="{{route('camera')}}">Máy ảnh</a></li>
						<li><a href="{{ route('accessories') }}">Phụ kiện</a></li>
					</ul>
					</div>
				</div>
			</nav>