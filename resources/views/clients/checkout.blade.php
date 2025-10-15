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

            <form action="{{ route('checkout.placeOrder') }}" method="POST">
                @csrf

                <div class="col-md-7">
                    <div class="login-section">
                         <a href="{{route('login')}}">Nhấn vào đây để đăng nhập</a>
                    </div>
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Địa chỉ thanh toán</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="first_name" placeholder="Tên" required>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="last_name" placeholder="Họ" required>
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="tel" placeholder="Điện thoại (ví dụ: 09xxxxxxxx)" required pattern="[0-9]{10,11}">
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
                            <input class="input" type="text" name="address" placeholder="Địa chỉ chi tiết (Số nhà, tên đường, tòa nhà...)" required>
                        </div>
                        <div class="form-group">
                            <div class="input-checkbox">
                                <input type="checkbox" id="create-account" name="create_account">
                                
                                <div class="caption">
                                    <p>Tạo tài khoản để thanh toán nhanh hơn và theo dõi đơn hàng dễ dàng. Nếu bạn là khách hàng cũ, vui lòng <a href="{{route('login')}}">đăng nhập ở đầu trang</a>.</p>
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
                            <input type="checkbox" id="shiping-address" name="shiping_address">
                            <label for="shiping-address">
                                <span></span>
                                Giao hàng đến địa chỉ khác?
                            </label>
                            <div class="caption">
                                <div class="form-group">
                                    <input class="input" type="text" name="shipping_first_name" placeholder="Tên">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="shipping_last_name" placeholder="Họ">
                                </div>
                                <div class="form-group">
                                    <input class="input" type="tel" name="shipping_tel" placeholder="Điện thoại (ví dụ: 09xxxxxxxx)" pattern="[0-9]{10,11}">
                                </div>
                                <div class="form-group address-select-group">
                                    <select class="input-select" name="shipping_province" id="shipping-province">
                                        <option value="">Chọn Tỉnh/Thành phố</option>
                                        <option value="hanoi">Hà Nội</option>
                                        <option value="hcm">TP. Hồ Chí Minh</option>
                                    </select>
                                </div>
                                <div class="form-group address-select-group">
                                    <select class="input-select" name="shipping_district" id="shipping-district">
                                        <option value="">Chọn Quận/Huyện</option>
                                    </select>
                                </div>
                                <div class="form-group address-select-group">
                                    <select class="input-select" name="shipping_ward" id="shipping-ward">
                                        <option value="">Chọn Phường/Xã</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="shipping_address" placeholder="Địa chỉ chi tiết (Số nhà, tên đường, tòa nhà...)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-notes">
                        <textarea class="input" name="order_notes" placeholder="Ghi chú đơn hàng (ví dụ: thời gian giao hàng mong muốn, v.v.)"></textarea>
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
                            @if(isset($selectedCartItems) && count($selectedCartItems) > 0)
                                @foreach($selectedCartItems as $item)
                                <div class="order-col product-widget-checkout">
                                    <div class="product-img-checkout">
                                        <img src="{{ asset('storage/' . $item->product->image_path) }}" alt="{{ $item->product->name }}" style="max-width:60px;">
                                    </div>
                                    <div class="product-body-checkout">
                                        <div class="product-name">{{ $item->quantity }}x {{ $item->product->name }}</div>
                                        <div class="product-price-checkout">{{ number_format($item->product->price * $item->quantity) }} VNĐ</div>
                                        @if($item->product->color)
                                            <div style="font-size:13px;">Màu sắc: <span style="font-weight:600">{{ $item->product->color }}</span></div>
                                        @endif
                                        @if($item->product->configuration)
                                            <div style="font-size:13px;">Cấu hình: <span style="font-weight:600">{{ $item->product->configuration }}</span></div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div>Không có sản phẩm nào được chọn.</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="discount-code" placeholder="Nhập mã giảm giá">
                            <button class="primary-btn" style="margin-top:10px; width:100%" id="apply-discount-btn">Áp dụng</button>
                        </div>
                        <div class="order-col">
                            <div>Phí vận chuyển</div>
                            <div><strong>MIỄN PHÍ</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>TỔNG CỘNG</strong></div>
                            <div><strong class="order-total" id="checkout-total">{{ number_format($selectedTotal) }} VNĐ</strong></div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" name="payment_method" id="payment-1" value="bank_transfer" checked>
                            <label for="payment-1">
                                <span></span>
                                Chuyển khoản ngân hàng trực tiếp
                            </label>
                            <div class="caption">
                                <div style="text-align: center; padding: 20px;">
                                    <img id="qr-image" src="" alt="Mã QR thanh toán" style="max-width: 250px; display: none;">
                                </div>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment_method" id="payment-2" value="cod">
                            <label for="payment-2">
                                <span></span>
                                Thanh toán khi nhận hàng (COD)
                            </label>
                            <div class="caption">
                                <p>Thanh toán bằng tiền mặt khi nhận hàng. Vui lòng chuẩn bị đủ số tiền.</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">
                            <span></span>
                            Tôi đã đọc và đồng ý với <a href="terms.html" target="_blank">điều khoản & điều kiện</a> của cửa hàng.
                        </label>
                    </div>
                    <input type="hidden" name="selected_cart_items_ids" id="selected_cart_items_ids_checkout">
                    <input type="hidden" name="total_amount" id="total_amount_checkout">
                    <button type="submit" class="primary-btn order-submit">Hoàn tất đặt hàng</button>
                    <div style="text-align:center; margin-top:15px;">
                        <small>Cần hỗ trợ? <a href="contact.html">Liên hệ chúng tôi</a> hoặc gọi <a href="tel:+021955184">021-95-51-84</a></small>
                    </div>
                </div>
            </form>
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
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {

        function generateQRCode() {
            const YOUR_ACCOUNT_NUMBER = "0363489746";
            const BANK_SHORT_NAME = "MB";
            const TEMPLATE_NAME = "compact";
            const apiUrl = `https://img.vietqr.io/image/${BANK_SHORT_NAME}-${YOUR_ACCOUNT_NUMBER}-${TEMPLATE_NAME}.jpg`;
            const qrImageElement = $('#qr-image');

            if (qrImageElement.length) {
                qrImageElement.closest('.caption').show();
                qrImageElement.attr('src', apiUrl).css({
                    'display': 'inline-block',
                    'visibility': 'visible',
                    'opacity': '1'
                });
            }
        }

        function initializePaymentMethod() {
            $('.payment-method .caption').hide();
            const checkedInput = $('input[name="payment_method"]:checked');
            if (checkedInput.length > 0) {
                const activeCaption = checkedInput.closest('.input-radio').find('.caption');
                activeCaption.show();
                if (checkedInput.val() === 'bank_transfer') {
                    generateQRCode();
                }
            }
        }

        $('input[name="payment_method"]').on('change', function() {
            $('.payment-method .caption').slideUp();
            const currentCaption = $(this).closest('.input-radio').find('.caption');
            currentCaption.slideDown();
            if ($(this).val() === 'bank_transfer') {
                generateQRCode();
            }
        });

        $('#shiping-address').on('change', function(){
            if ($(this).is(':checked')) {
                $(this).closest('.input-checkbox').find('.caption').slideDown();
            } else {
                $(this).closest('.input-checkbox').find('.caption').slideUp();
            }
        }).trigger('change');

        $('#create-account').on('change', function(){
            if ($(this).is(':checked')) {
                $(this).closest('.input-checkbox').find('.caption').slideDown();
            } else {
                $(this).closest('.input-checkbox').find('.caption').slideUp();
            }
        }).trigger('change');

        // --- Gán dữ liệu ẩn để tránh lỗi reload trang ---
        const cartItemIds = @json($selectedCartItems->pluck('id'));
        const totalAmount = {{ $selectedTotal }};
        $('#selected_cart_items_ids_checkout').val(cartItemIds.join(','));
        $('#total_amount_checkout').val(totalAmount);

        // --- Khởi tạo QR và hiển thị mặc định ---
        initializePaymentMethod();
    });
</script>
@endpush
