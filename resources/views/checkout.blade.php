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
</head>

	<body>
		<header>
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Đường Stonecoal</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
						<li><a href="#"><i class="fa fa-user-o"></i> Tài khoản của tôi</a></li>
					</ul>
				</div>
			</div>
			<div id="header">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.html" class="logo">
									<img src="./img/logo.png" alt="Logo">
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">Tất cả danh mục</option>
										<option value="1">Danh mục 01</option>
										<option value="1">Danh mục 02</option>
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
													<img src="./img/product01.png" alt="Tên sản phẩm">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">tên sản phẩm ở đây</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product02.png" alt="Tên sản phẩm">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">tên sản phẩm ở đây</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small>3 sản phẩm đã chọn</small>
											<h5>TỔNG PHỤ: $2940.00</h5>
										</div>
										<div class="cart-btns">
											<a href="#">Xem giỏ hàng</a>
											<a href="checkout.html">Thanh toán <i class="fa fa-arrow-circle-right"></i></a>
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
						<li><a href="index.html">Trang chủ</a></li>
						<li><a href="#">Ưu đãi hấp dẫn</a></li>
						<li><a href="#">Danh mục</a></li>
						<li><a href="#">Máy tính xách tay</a></li>
						<li><a href="#">Điện thoại thông minh</a></li>
						<li><a href="#">Máy ảnh</a></li>
						<li><a href="#">Phụ kiện</a></li>
					</ul>
					</div>
				</div>
			</nav>
		<div id="breadcrumb" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Thanh toán</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.html">Trang chủ</a></li>
							<li class="active">Thanh toán</li>
						</ul>
					</div>
				</div>
				</div>
			</div>
		<div class="section">
			<div class="container">
				<div class="row">

					<div class="col-md-7">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Địa chỉ thanh toán</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="first-name" placeholder="Tên">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last-name" placeholder="Họ">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Địa chỉ">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="Thành phố">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Quốc gia">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip-code" placeholder="Mã ZIP">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Điện thoại">
							</div>
							<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="create-account">
									<label for="create-account">
										<span></span>
										Tạo tài khoản?
									</label>
									<div class="caption">
										<p>Mô tả về việc tạo tài khoản. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
										<input class="input" type="password" name="password" placeholder="Nhập mật khẩu của bạn">
									</div>
								</div>
							</div>
						</div>
						<div class="shiping-details">
							<div class="section-title">
								<h3 class="title">Địa chỉ giao hàng</h3>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="shiping-address">
								<label for="shiping-address">
									<span></span>
									Giao hàng đến địa chỉ khác?
								</label>
								<div class="caption">
									<div class="form-group">
										<input class="input" type="text" name="first-name" placeholder="Tên">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="last-name" placeholder="Họ">
									</div>
									<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="address" placeholder="Địa chỉ">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="city" placeholder="Thành phố">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="country" placeholder="Quốc gia">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="zip-code" placeholder="Mã ZIP">
									</div>
									<div class="form-group">
										<input class="input" type="tel" name="tel" placeholder="Điện thoại">
									</div>
								</div>
							</div>
						</div>
						<div class="order-notes">
							<textarea class="input" placeholder="Ghi chú đơn hàng"></textarea>
						</div>
						</div>

					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Đơn hàng của bạn</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>SẢN PHẨM</strong></div>
								<div><strong>TỔNG CỘNG</strong></div>
							</div>
							<div class="order-products">
								<div class="order-col">
									<div>1x Tên sản phẩm ở đây</div>
									<div>$980.00</div>
								</div>
								<div class="order-col">
									<div>2x Tên sản phẩm ở đây</div>
									<div>$980.00</div>
								</div>
							</div>
							<div class="order-col">
								<div>Vận chuyển</div>
								<div><strong>MIỄN PHÍ</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TỔNG CỘNG</strong></div>
								<div><strong class="order-total">$2940.00</strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1">
								<label for="payment-1">
									<span></span>
									Chuyển khoản ngân hàng trực tiếp
								</label>
								<div class="caption">
									<p>Mô tả phương thức thanh toán. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2">
								<label for="payment-2">
									<span></span>
									Thanh toán bằng séc
								</label>
								<div class="caption">
									<p>Mô tả phương thức thanh toán. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3">
								<label for="payment-3">
									<span></span>
									Hệ thống Paypal
								</label>
								<div class="caption">
									<p>Mô tả phương thức thanh toán. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								Tôi đã đọc và chấp nhận <a href="#">điều khoản & điều kiện</a>
							</label>
						</div>
						<a href="#" class="primary-btn order-submit">Đặt hàng</a>
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
		<footer id="footer">
			<div class="section">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Về chúng tôi</h3>
								<p>Đây là một đoạn văn bản mô tả mẫu, thường được sử dụng để trình bày bố cục.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Đường Stonecoal</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Danh mục</h3>
								<ul class="footer-links">
									<li><a href="#">Ưu đãi hấp dẫn</a></li>
									<li><a href="#">Máy tính xách tay</a></li>
									<li><a href="#">Điện thoại thông minh</a></li>
									<li><a href="#">Máy ảnh</a></li>
									<li><a href="#">Phụ kiện</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Thông tin</h3>
								<ul class="footer-links">
									<li><a href="#">Về chúng tôi</a></li>
									<li><a href="#">Liên hệ chúng tôi</a></li>
									<li><a href="#">Chính sách bảo mật</a></li>
									<li><a href="#">Đơn hàng và Trả hàng</a></li>
									<li><a href="#">Điều khoản & Điều kiện</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Dịch vụ</h3>
								<ul class="footer-links">
									<li><a href="#">Tài khoản của tôi</a></li>
									<li><a href="#">Xem giỏ hàng</a></li>
									<li><a href="#">Danh sách yêu thích</a></li>
									<li><a href="#">Theo dõi đơn hàng</a></li>
									<li><a href="#">Trợ giúp</a></li>
								</ul>
							</div>
						</div>
					</div>
					</div>
				</div>
			<div id="bottom-footer" class="section">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								Bản quyền &copy;<script>document.write(new Date().getFullYear());</script> Mọi quyền được bảo lưu | Mẫu này được tạo bởi <i class="fa fa-heart-o" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank">Colorlib</a>
							</span>
						</div>
					</div>
						</div>
				</div>
			</footer>
		<script src="{{ asset('js/jquery.min.js"></script>
		<script src="{{ asset('js/bootstrap.min.js"></script>
		<script src="{{ asset('js/slick.min.js"></script>
		<script src="{{ asset('js/nouislider.min.js"></script>
		<script src="{{ asset('js/jquery.zoom.min.js"></script>
		<script src="{{ asset('js/main.js"></script>

	</body>
</html>
