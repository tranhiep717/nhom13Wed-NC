
$(document).ready(function(){

	// 1. Hiển thị/ẩn thông tin tài khoản ngân hàng
	$('input[name="payment"]').on('change', function() {
		if ($(this).val() === 'bank') {
			$('#bank-details').show();
		} else {
			$('#bank-details').hide();
		}
	});

	// 2. Xử lý địa chỉ tỉnh/quận/xã (demo dữ liệu)
	$('#province').on('change', function(){
		var selectedProvince = $(this).val();
		$('#district').empty().append('<option value="">Chọn Quận/Huyện</option>');
		$('#ward').empty().append('<option value="">Chọn Phường/Xã</option>');

		if (selectedProvince === 'hanoi') {
			$('#district').append('<option value="badinh">Ba Đình</option><option value="hoankiem">Hoàn Kiếm</option>');
		} else if (selectedProvince === 'hcm') {
			$('#district').append('<option value="q1">Quận 1</option><option value="q3">Quận 3</option>');
		}
	});

	$('#district').on('change', function(){
		var selectedDistrict = $(this).val();
		$('#ward').empty().append('<option value="">Chọn Phường/Xã</option>');

		if (selectedDistrict === 'badinh') {
			$('#ward').append('<option value="phucxa">Phúc Xá</option><option value="trucbach">Trúc Bạch</option>');
		} else if (selectedDistrict === 'q1') {
			$('#ward').append('<option value="tandinh">Tân Định</option><option value="dakao">Đa Kao</option>');
		}
	});

	// Địa chỉ giao hàng (tùy bạn có checkbox đồng bộ hay không)
	$('#shipping-province').on('change', function(){
		var selectedProvince = $(this).val();
		$('#shipping-district').empty().append('<option value="">Chọn Quận/Huyện</option>');
		$('#shipping-ward').empty().append('<option value="">Chọn Phường/Xã</option>');
		// Tùy chọn thêm quận huyện tương tự
	});

	$('#shipping-district').on('change', function(){
		$('#shipping-ward').empty().append('<option value="">Chọn Phường/Xã</option>');
		// Tùy chọn thêm phường xã tương ứng
	});

	// 3. Áp dụng mã giảm giá
	$('#apply-discount-btn').on('click', function(e){
		e.preventDefault();
		var discountCode = $('input[name="discount-code"]').val().toLowerCase();

		if(discountCode === 'giamgia10'){
			alert('Áp dụng mã giảm giá 10% thành công!');
			let total = parseFloat($('#total-amount').data('original')); // Đặt sẵn total gốc ở data-original
			if (!total || isNaN(total)) total = parseFloat($('#total-amount').text());
			let discounted = total * 0.9;
			$('#total-amount').text(discounted.toFixed(0) + 'đ');
		} else if(discountCode === '') {
			alert('Vui lòng nhập mã giảm giá.');
		}
		else {
			alert('Mã giảm giá không hợp lệ hoặc đã hết hạn.');
		}
	});

	// 4. Xác thực client-side
	$('.order-submit').on('click', function(e){
		var formValid = true;

		// Kiểm tra input required
		$('.billing-details input[required]').each(function(){
			if($(this).val() === ''){
				$(this).css('border-color', 'red');
				formValid = false;
			} else {
				$(this).css('border-color', '#E4E7ED');
			}
		});

		// Kiểm tra select required
		$('.billing-details select[required]').each(function(){
			if($(this).val() === ''){
				$(this).css('border-color', 'red');
				formValid = false;
			} else {
				$(this).css('border-color', '#E4E7ED');
			}
		});

		// Kiểm tra email định dạng
		var email = $('input[name="email"]').val();
		if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
			alert('Email không hợp lệ.');
			formValid = false;
		}

		// Kiểm tra số điện thoại (có thể điều chỉnh pattern theo ý bạn)
		var phone = $('input[name="phone"]').val();
		if (phone && !/^\d{9,11}$/.test(phone)) {
			alert('Số điện thoại không hợp lệ.');
			formValid = false;
		}

		// Đồng ý điều khoản
		if (!$('#terms').is(':checked')) {
			alert('Bạn cần đồng ý với điều khoản và điều kiện.');
			formValid = false;
		}

		if(!formValid){
			e.preventDefault();
			alert('Vui lòng điền đầy đủ thông tin hợp lệ.');
		} else {
			alert('Đơn hàng của bạn đang được xử lý!');
			// $(this).closest('form').submit(); // mở nếu muốn submit thực
		}
	});
});

