$(document).ready(function() {
    // Lấy CSRF token từ meta
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Xử lý cho mọi giao diện có nút wishlist
    $(document).on('click', '.add-to-wishlist', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var $btn = $(this);
        var productId = $btn.data('product-id');
        var $icon = $btn.find('.wishlist-icon');
        if (!productId) {
            // Nếu không có data-product-id thì tìm input ẩn trong form (trang chi tiết)
            var $input = $btn.closest('.product, form').find('input[name="product_id"]');
            if ($input.length) productId = $input.val();
        }
        if (!productId) return;
        if ($btn.hasClass('loading')) return;
        $btn.addClass('loading');
        // Nếu đã có class 'added' thì là trạng thái đã yêu thích, sẽ gửi xoá
        if ($btn.hasClass('added')) {
            $.ajax({
                url: '/wishlist/remove',
                type: 'POST',
                data: { product_id: productId },
                headers: { 'X-CSRF-TOKEN': csrfToken },
                success: function(res) {
                    if(res.success) {
                        $icon.removeClass('fa-heart').addClass('fa-heart-o').css('color', '#d10024');
                        $btn.removeClass('added');
                        showToast('Đã xoá khỏi danh sách yêu thích!');
                    } else {
                        showToast(res.message || 'Có lỗi xảy ra!');
                    }
                },
                error: function(xhr) {
                    if(xhr.status === 401) {
                        showToast('Bạn cần đăng nhập để sử dụng chức năng này!');
                    } else {
                        showToast('Có lỗi xảy ra, vui lòng thử lại!');
                    }
                },
                complete: function() {
                    $btn.removeClass('loading');
                }
            });
        } else {
            // Thêm vào wishlist
            $.ajax({
                url: '/wishlist/add',
                type: 'POST',
                data: { product_id: productId },
                headers: { 'X-CSRF-TOKEN': csrfToken },
                success: function(res) {
                    if(res.success) {
                        $icon.removeClass('fa-heart-o').addClass('fa-heart').css('color', '#d10024');
                        $btn.addClass('added');
                        if(res.added) {
                            showToast('Đã thêm vào danh sách yêu thích!');
                        } else {
                            showToast('Sản phẩm đã có trong danh sách yêu thích!');
                        }
                    } else {
                        showToast(res.message || 'Có lỗi xảy ra!');
                    }
                },
                error: function(xhr) {
                    if(xhr.status === 401) {
                        showToast('Bạn cần đăng nhập để sử dụng chức năng này!');
                    } else {
                        showToast('Có lỗi xảy ra, vui lòng thử lại!');
                    }
                },
                complete: function() {
                    $btn.removeClass('loading');
                }
            });
        }
    });

    // Hàm toast đơn giản
    window.showToast = function(msg) {
        if($('#wishlist-toast').length) $('#wishlist-toast').remove();
        var toast = $('<div id="wishlist-toast"></div>').text(msg).css({
            position: 'fixed', bottom: '40px', left: '50%', transform: 'translateX(-50%)',
            background: '#d10024', color: '#fff', padding: '12px 28px', borderRadius: '24px', fontSize: '16px', zIndex: 9999,
            boxShadow: '0 2px 16px #e3e3e3', opacity: 0, transition: 'opacity 0.3s'
        });
        $('body').append(toast);
        setTimeout(function(){ toast.css('opacity', 1); }, 10);
        setTimeout(function(){ toast.css('opacity', 0); setTimeout(function(){ toast.remove(); }, 400); }, 1800);
    }
});
