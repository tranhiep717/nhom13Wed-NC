$(document).ready(function() {

    // =================================================================
    // PHẦN XỬ LÝ MÃ QR CODE
    // =================================================================
    function generateQRCode() {
        // --- Phần thông tin của bạn giữ nguyên ---
        const YOUR_BANK_BIN = "970436";
        const YOUR_ACCOUNT_NUMBER = "123456789";
        const amount = "25000000";
        const description = "Thanh toan don hang";
        // --- Kết thúc phần thông tin ---
    
        const apiUrl = `https://api.vietqr.io/v2/generate?acqId=${YOUR_BANK_BIN}&accountNo=${YOUR_ACCOUNT_NUMBER}&amount=${amount}&addInfo=${encodeURIComponent(description)}&template=compact2`;
        const qrImageElement = $('#qr-image');
    
        if (qrImageElement.length) {
            // BƯỚC SỬA CUỐI CÙNG: Tìm thẻ div.caption gần nhất và cho nó hiện ra
            qrImageElement.closest('.caption').show();
    
            // Giữ nguyên lệnh hiển thị chính ảnh QR
            qrImageElement.attr('src', apiUrl).css({
                'display': 'block',
                'visibility': 'visible',
                'opacity': '1'
            });
        }
    }

    // =================================================================
    // CÁC CHỨC NĂNG KHÁC CỦA FORM
    // =================================================================

    // 1. Hiển thị/ẩn thông tin tài khoản ngân hàng (ĐÃ SỬA HOÀN CHỈNH)
    $('input[name="payment_method"]').on('change', function() {
        if ($(this).val() === 'bank_transfer') {
            generateQRCode();
        }
    });
    
    // Tự động kiểm tra khi tải trang (ĐÃ SỬA HOÀN CHỈNH)
    if ($('input[name="payment_method"][value="bank_transfer"]').is(':checked')) {
        generateQRCode();
    }


    // 2. Xử lý địa chỉ tỉnh/quận/xã (giữ nguyên code của bạn)
    $('#province').on('change', function() {
        var selectedProvince = $(this).val();
        $('#district').empty().append('<option value="">Chọn Quận/Huyện</option>');
        $('#ward').empty().append('<option value="">Chọn Phường/Xã</option>');

        if (selectedProvince === 'hanoi') {
            $('#district').append('<option value="badinh">Ba Đình</option><option value="hoankiem">Hoàn Kiếm</option>');
        } else if (selectedProvince === 'hcm') {
            $('#district').append('<option value="q1">Quận 1</option><option value="q3">Quận 3</option>');
        }
    });

    $('#district').on('change', function() {
        var selectedDistrict = $(this).val();
        $('#ward').empty().append('<option value="">Chọn Phường/Xã</option>');

        if (selectedDistrict === 'badinh') {
            $('#ward').append('<option value="phucxa">Phúc Xá</option><option value="trucbach">Trúc Bạch</option>');
        } else if (selectedDistrict === 'q1') {
            $('#ward').append('<option value="tandinh">Tân Định</option><option value="dakao">Đa Kao</option>');
        }
    });

    // Địa chỉ giao hàng (giữ nguyên)
    $('#shipping-province').on('change', function(){
        // ... code xử lý địa chỉ giao hàng của bạn
    });

    $('#shipping-district').on('change', function(){
        // ... code xử lý địa chỉ giao hàng của bạn
    });

    // 3. Áp dụng mã giảm giá (giữ nguyên)
    $('#apply-discount-btn').on('click', function(e) {
        e.preventDefault();
        var discountCode = $('input[name="discount-code"]').val().toLowerCase();

        if (discountCode === 'giamgia10') {
            alert('Áp dụng mã giảm giá 10% thành công!');
            // ... logic giảm giá của bạn
        } else if (discountCode === '') {
            alert('Vui lòng nhập mã giảm giá.');
        } else {
            alert('Mã giảm giá không hợp lệ hoặc đã hết hạn.');
        }
    });

    // 4. Xác thực client-side (giữ nguyên)
    $('.order-submit').on('click', function(e) {
        var formValid = true;

        // ... toàn bộ code xác thực form của bạn ...

        if (!formValid) {
            e.preventDefault();
            alert('Vui lòng điền đầy đủ thông tin hợp lệ.');
        } else {
            // ...
        }
    });
});