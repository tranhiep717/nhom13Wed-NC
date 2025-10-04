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

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
								<a href="#" class="logo">
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
						<li class="active"><a href="index.html">Trang chủ</a></li>
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
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="Bộ sưu tập máy tính xách tay">
							</div>
							<div class="shop-body">
								<h3>Bộ sưu tập<br>Máy tính xách tay</h3>
								<a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="Bộ sưu tập phụ kiện">
							</div>
							<div class="shop-body">
								<h3>Bộ sưu tập<br>Phụ kiện</h3>
								<a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="Bộ sưu tập máy ảnh">
							</div>
							<div class="shop-body">
								<h3>Bộ sưu tập<br>Máy ảnh</h3>
								<a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		<div class="section">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sản phẩm mới</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Máy tính xách tay</a></li>
									<li><a data-toggle="tab" href="#tab1">Điện thoại thông minh</a></li>
									<li><a data-toggle="tab" href="#tab1">Máy ảnh</a></li>
									<li><a data-toggle="tab" href="#tab1">Phụ kiện</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<div class="product">
											<div class="product-img">
												<img src="./img/product01.png" alt="Tên sản phẩm">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">MỚI</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
											</div>
										</div>
										<div class="product">
											<div class="product-img">
												<img src="./img/product02.png" alt="Tên sản phẩm">
												<div class="product-label">
													<span class="new">MỚI</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
											</div>
										</div>
										<div class="product">
											<div class="product-img">
												<img src="./img/product03.png" alt="Tên sản phẩm">
												<div class="product-label">
													<span class="sale">-30%</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
											</div>
										</div>
										<div class="product">
											<div class="product-img">
												<img src="./img/product04.png" alt="Tên sản phẩm">
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
											</div>
										</div>
										<div class="product">
											<div class="product-img">
												<img src="./img/product05.png" alt="Tên sản phẩm">
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
											</div>
										</div>
										</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		<div id="hot-deal" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Ngày</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Giờ</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Phút</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Giây</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">ưu đãi hấp dẫn tuần này</h2>
							<p>Bộ sưu tập mới Giảm giá đến 50%</p>
							<a class="primary-btn cta-btn" href="#">Mua ngay</a>
						</div>
					</div>
				</div>
				</div>
			</div>
		<div class="section">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sản phẩm bán chạy</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Máy tính xách tay</a></li>
									<li><a data-toggle="tab" href="#tab2">Điện thoại thông minh</a></li>
									<li><a data-toggle="tab" href="#tab2">Máy ảnh</a></li>
									<li><a data-toggle="tab" href="#tab2">Phụ kiện</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<div class="product">
											<div class="product-img">
												<img src="./img/product06.png" alt="Tên sản phẩm">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">MỚI</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
											</div>
										</div>
										<div class="product">
											<div class="product-img">
												<img src="./img/product07.png" alt="Tên sản phẩm">
												<div class="product-label">
													<span class="new">MỚI</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
											</div>
										</div>
										<div class="product">
											<div class="product-img">
												<img src="./img/product08.png" alt="Tên sản phẩm">
												<div class="product-label">
													<span class="sale">-30%</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
											</div>
										</div>
										<div class="product">
											<div class="product-img">
												<img src="./img/product09.png" alt="Tên sản phẩm">
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
											</div>
										</div>
										<div class="product">
											<div class="product-img">
												<img src="./img/product01.png" alt="Tên sản phẩm">
											</div>
											<div class="product-body">
												<p class="product-category">Danh mục</p>
												<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
												<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
											</div>
										</div>
										</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Sản phẩm bán chạy</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-3">
							<div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product07.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product08.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product09.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								</div>

							<div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product01.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product02.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product03.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Sản phẩm bán chạy</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product04.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product05.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product06.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								</div>

							<div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product07.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product08.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product09.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Sản phẩm bán chạy</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product01.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product02.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh mục</p>
										<h3 class="product-name"><a href="product.html">tên sản phẩm ở đây</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product03.png" alt="Tên sản phẩm">
									</div>
									<div class="product-body">
										<p class="product-category">Danh 