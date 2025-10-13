$(document).ready(function() {
    // ...existing code...
    // Sau khi thêm/xoá wishlist thành công, cập nhật badge wishlist ở header
    function updateWishlistBadge(change) {
        var $badge = $('.header-ctn a[href$="wishlist"] .qty');
        var count = parseInt($badge.text()) || 0;
        count += change;
        if(count > 0) {
            if($badge.length) {
                $badge.text(count);
            } else {
                // Nếu chưa có badge (vì count=0 trước đó), tạo mới
                $('.header-ctn a[href$="wishlist"]').append('<div class="qty" style="background:#d10024;color:#fff;position:absolute;top:-8px;right:-8px;border-radius:50%;min-width:22px;height:22px;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;z-index:2;">'+count+'</div>');
            }
        } else {
            $badge.remove();
        }
    }

    // Gắn vào sự kiện thêm/xoá wishlist
    $(document).on('click', '.add-to-wishlist', function(e) {
        var $btn = $(this);
        setTimeout(function() {
            // Nếu vừa thêm
            if($btn.hasClass('added')) {
                updateWishlistBadge(1);
            } else {
                updateWishlistBadge(-1);
            }
        }, 300); // delay nhỏ để chờ ajax xử lý xong
    });
    // ...existing code...
});
