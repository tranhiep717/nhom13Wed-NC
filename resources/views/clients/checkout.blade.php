@extends('layouts.main')

@section('title', 'checkout')
@section('content')
<div id="breadcrumb" class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Thanh toán</h3>
				<ul class="breadcrumb-tree">
					<li><a href="{{route('home')}}">Trang chủ</a></li>
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
				<div class="login-section">
					<h4>Khách hàng cũ? <a href="#">Nhấn vào đây để đăng nhập</a></h4>
				</div>
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">Địa chỉ thanh toán</h3>
					</div>
					<div class="form-group">
						<input class="input" type="text" name="first-name" placeholder="Tên" required>
					</div>
					<div class="form-group">
						<input class="input" type="text" name="last-name" placeholder="Họ" required>
					</div>
					<div class="form-group">
						<input class="input" type="email" name="email" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input class="input" type="tel" name="tel" placeholder="Điện thoại (ví dụ: 09xxxxxxxx)" required
							pattern="[0-9]{10,11}">
					</div>
					<div class="form-group address-select-group">
						<select class="input-select" name="province" id="province" required>
							<option value="">Chọn Tỉnh/Thành phố</option>
							<option value="hanoi">Hà Nội</option>
							<option value="hcm">TP. Hồ Chí Minh</option>
						</select>
					</div>
					<div class="form-group address-select-group">
						<select class="input-select" name="district" id="district" required>
							<option value="">Chọn Quận/Huyện</option>
						</select>
					</div>
					<div class="form-group address-select-group">
						<select class="input-select" name="ward" id="ward" required>
							<option value="">Chọn Phường/Xã</option>
						</select>
					</div>
					<div class="form-group">
						<input class="input" type="text" name="address"
							placeholder="Địa chỉ chi tiết (Số nhà, tên đường, tòa nhà...)" required>
					</div>

					<div class="form-group">
						<div class="input-checkbox">
							<input type="checkbox" id="create-account">
							<label for="create-account">
								<span></span>
								Tạo tài khoản mới?
							</label>
							<div class="caption">
								<p>Tạo tài khoản để thanh toán nhanh hơn và theo dõi đơn hàng dễ dàng. Nếu bạn là khách
									hàng cũ, vui lòng <a href="#">đăng nhập ở đầu trang</a>.</p>
								<input class="input" type="password" name="password"
									placeholder="Nhập mật khẩu của bạn">
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
								<input class="input" type="text" name="shipping-first-name" placeholder="Tên">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="shipping-last-name" placeholder="Họ">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="shipping-tel"
									placeholder="Điện thoại (ví dụ: 09xxxxxxxx)" pattern="[0-9]{10,11}">
							</div>
							<div class="form-group address-select-group">
								<select class="input-select" name="shipping-province" id="shipping-province">
									<option value="">Chọn Tỉnh/Thành phố</option>
									<option value="hanoi">Hà Nội</option>
									<option value="hcm">TP. Hồ Chí Minh</option>
								</select>
							</div>
							<div class="form-group address-select-group">
								<select class="input-select" name="shipping-district" id="shipping-district">
									<option value="">Chọn Quận/Huyện</option>
								</select>
							</div>
							<div class="form-group address-select-group">
								<select class="input-select" name="shipping-ward" id="shipping-ward">
									<option value="">Chọn Phường/Xã</option>
								</select>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="shipping-address"
									placeholder="Địa chỉ chi tiết (Số nhà, tên đường, tòa nhà...)">
							</div>
						</div>
					</div>
				</div>
				<div class="order-notes">
					<textarea class="input"
						placeholder="Ghi chú đơn hàng (ví dụ: thời gian giao hàng mong muốn, v.v.)"></textarea>
				</div>
			</div>

			<div class="col-md-5 order-details">
				<div class="section-title text-center">
					<h3 class="title">Đơn hàng của bạn</h3>
				</div>
				<div class="order-summary">
					<div class="order-col">
						<div><strong>SẢN PHẨM</strong></div>
						<div><strong>TẠM TÍNH</strong></div>
					</div>
					<div class="order-products">
						<div class="order-col product-widget-checkout">
							<div class="product-img-checkout">
								<img src="./img/product01.png" alt="Laptop UltraBook ZenMax">
							</div>
							<div class="product-body-checkout">
								<div class="product-name">1x Laptop UltraBook ZenMax</div>
								<div class="product-price-checkout">24.500.000 VNĐ</div>
							</div>
						</div>
						<div class="order-col product-widget-checkout">
							<div class="product-img-checkout">
								<img src="./img/product02.png" alt="Smartphone Galaxy Pro">
							</div>
							<div class="product-body-checkout">
								<div class="product-name">2x Smartphone Galaxy Pro</div>
								<div class="product-price-checkout">43.500.000 VNĐ</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<input class="input" type="text" name="discount-code" placeholder="Nhập mã giảm giá">
						<button class="primary-btn" style="margin-top:10px; width:100%;" id="apply-discount-btn">Áp
							dụng</button>
					</div>
					<div class="order-col">
						<div>Phí vận chuyển</div>
						<div><strong>MIỄN PHÍ</strong></div>
					</div>
					<div class="order-col">
						<div><strong>TỔNG CỘNG</strong></div>
						<div><strong class="order-total">68.000.000 VNĐ</strong></div>
					</div>
				</div>
				<div class="payment-method">
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-1" checked>
						<label for="payment-1">
							<span></span>
							Chuyển khoản ngân hàng trực tiếp
						</label>
						<div class="caption">
							<p>Thực hiện thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID
								Đơn hàng của bạn làm tham chiếu thanh toán. Đơn hàng của bạn sẽ không được giao cho đến
								khi tiền đã được xác nhận trong tài khoản của chúng tôi.</p>
							<div id="bank-details"
								style="display:none; margin-top:10px; padding:10px; background-color:#f0f0f0;">
								<p><strong>Chủ tài khoản:</strong> [TÊN CHỦ TÀI KHOẢN]</p>
								<p><strong>Số tài khoản:</strong> [SỐ TÀI KHOẢN]</p>
								<p><strong>Ngân hàng:</strong> [TÊN NGÂN HÀNG]</p>
								<p><strong>Chi nhánh:</strong> [CHI NHÁNH]</p>
								<p><strong>Nội dung chuyển khoản:</strong> Thanh toán đơn hàng [ID ĐƠN HÀNG]</p>
							</div>
						</div>
					</div>
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-2">
						<label for="payment-2">
							<span></span>
							Thanh toán khi nhận hàng (COD)
						</label>
						<div class="caption">
							<p>Thanh toán bằng tiền mặt khi nhận hàng. Vui lòng chuẩn bị đủ số tiền.</p>
						</div>
					</div>
					<div class="input-radio">
						<input type="radio" name="payment" id="payment-3">
						<label for="payment-3">
							<span></span>
							Ví điện tử MoMo/ZaloPay
						</label>
						<div class="caption">
							<p>Thanh toán qua cổng ví điện tử MoMo hoặc ZaloPay. Bạn sẽ được chuyển hướng đến cổng thanh
								toán sau khi đặt hàng.</p>
						</div>
					</div>
				</div>
				<div class="input-checkbox">
					<input type="checkbox" id="terms" required>
					<label for="terms">
						<span></span>
						Tôi đã đọc và đồng ý với <a href="terms.html" target="_blank">điều khoản & điều kiện</a> của cửa
						hàng.
					</label>
				</div>
				<a href="#" class="primary-btn order-submit">Hoàn tất đặt hàng</a>
				<div style="text-align:center; margin-top:15px;">
					<small>Cần hỗ trợ? <a href="contact.html">Liên hệ chúng tôi</a> hoặc gọi <a
							href="tel:+021955184">021-95-51-84</a></small>
				</div>
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

@endsection
		