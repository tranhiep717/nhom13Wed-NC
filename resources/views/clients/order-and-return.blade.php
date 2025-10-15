@extends('layouts.main') {{-- Hoặc 'layouts.app' nếu bạn đang sử dụng app.blade.php làm layout chính --}}

@section('title', 'Chính Sách Bảo Hành - Đổi Trả Hàng - Viettablet.com')

@section('content')
<div class="container">
    <div class="section-title">
        <h3 class="title">CHÍNH SÁCH BẢO HÀNH - ĐỔI TRẢ HÀNG</h3>
    </div>
    <div class="warranty-return-content">
        <h5>1. Chính sách thu cũ đổi mới</h5>
        <ul class="custom-list">
            <li>Cam kết thu lại với giá cao nhất thị trường tại mọi thời điểm.</li>
        </ul>

        <h5>2. Chính sách dùng thử</h5>
        <ul class="custom-list">
            <li>Tất cả điện thoại cũ mua tại Viettablet khách hàng được trải nghiệm 7 ngày đổi trả miễn phí, hoàn tiền 100% giá trị máy (không bao gồm phụ kiện và các dịch vụ kèm theo, KHÔNG hoàn tiền trong trường hợp khách mua trả góp).</li>
            <li>Toàn bộ sản phẩm khác: Máy mới, apple watch, tai nghe, phụ kiện khác, các sản phẩm giảm giá, khuyến mãi đều KHÔNG ÁP DỤNG CHÍNH SÁCH DÙNG THỬ.</li>
        </ul>

        <h5>3. Chính sách bảo hành</h5>
        <h6>- Đối với máy chính hãng công ty:</h6>
        <ul class="custom-list">
            <li>Quy định đổi trả, bảo hành máy và phụ kiện được thực hiện theo chính sách và điều kiện bảo hành của hãng (Sony, SamSung, HTC, Oppo, Nokia…). Viettablet có trách nhiệm tiếp nhận máy và hỗ trợ khách hàng đem đến các Trung tâm bảo hành chính hãng để được bảo hành hoặc đổi mới theo đúng quy định của hãng.</li>
        </ul>
        <h6>- Đối với máy nội địa do Viettablet phân phối:</h6>
        <ul class="custom-list">
            <li>Tất cả máy mua tại Viettablet trong thời gian 07 ngày đều được hỗ trợ ĐỔI máy mới nếu có bất kỳ lỗi PHẦN CỨNG nào của nhà sản xuất (với điều kiện máy không trầy xước). Trường hợp sau khi tiếp nhận tối đa 7 ngày nếu không có máy đổi, quý khách sẽ được HOÀN TRẢ 100% giá trị máy.</li>
            <li>Trong thời gian bảo hành, nếu máy trục trặc do lỗi nhà sản xuất, công ty nhận lại và thay thế sửa chữa hoàn toàn miễn phí cho khách.</li>
        </ul>

        <h5 class="mt-4">Đặc biệt lưu ý, Viettablet không bảo hành trong các trường hợp sau:</h5>
        <ul class="custom-list">
            <li>Một số sản phẩm thanh lý, hoặc giảm giá, khuyến mãi sẽ có thời hạn bảo hành riêng, Viettablet sẽ có ghi chú rõ ràng vào hoá đơn.</li>
            <li>Sản phẩm hư hại do tác động của ngoại lực, hao mòn linh kiện trong quá trình sử dụng như:
                <ul class="custom-sub-list"> {{-- Thêm class mới cho danh sách con --}}
                    <li>Rơi, rớt, nứt vỡ, các vết xước, vết lõm, bong tróc.</li>
                    <li>Các nút bấm vật lý, lỏng jack tai nghe, gãy chân sạc.</li>
                    <li>Màn hình bị ám màu hoặc có điểm chết.</li>
                </ul>
            </li>
            <li>Tem bảo hành bị rách, không nguyên vẹn hoặc có dấu hiệu khách hàng tự ý bung máy can thiệp phần cứng.</li>
            <li>Sản phẩm bị mất bootloader, bị mất DRM key, mất số imei, mất số Serial, treo logo, treo ở chế độ Energy Mode, Download Mode, Recovery Mode, không giao tiếp với máy tính qua cổng USB do khách hàng tự ý can thiệp vào phần mềm của máy.</li>
            <li>Sản phẩm bị chất lỏng xâm nhập như nước hay hóa chất làm cho sản phẩm bị ẩm, mốc, gỉ, sét, hoặc làm giấy quì tím bên trong máy bị đổi màu.</li>
            <li>Sản phẩm, để gần nhiệt độ cao làm cho sản phẩm bị nóng chảy, biến dạng, màn hình bị ám vàng.</li>
            <li>Sản phẩm bị thay đổi Firmware và phần cứng bởi sự tự ý của khách hàng hoặc các nơi khác.</li>
            <li>Sản phẩm bị khóa iCloud, Samsung Account, MiCloud, Knox, PassCode, Vân tay, Pattern lock, Security Lock.</li>
            <li>Với các sản phẩm có tính năng chống nước, chịu va đập, Công ty sẽ không bảo hành lỗi do việc thử tính năng này trong quá trình sử dụng.</li>
        </ul>

        <h5 class="mt-4">5. Thời gian và địa điểm bảo hành</h5>
        <ul class="custom-list">
            <li>Trung tâm bảo hành Viettablet: 174 Cao Thắng, P.11, Q.10, TPHCM</li>
            <li>Thời gian tiếp nhận bảo hành từ 9h00 – 18h các ngày trong tuần.</li>
            <li>Thời gian xử lý sản phẩm bảo hành từ 01 đến 30 ngày làm việc.</li>
        </ul>

        <h5 class="mt-4">6. Dữ liệu cá nhân, phụ kiện, sim card, thẻ nhớ...</h5>
        <ul class="custom-list">
            <li>Viettablet không chịu trách nhiệm với tất cả các loại dữ liệu được lưu trên sản phẩm của của quý khách trước và sau khi bảo hành.</li>
            <li>Viettablet tuyệt đối không nhận phụ kiện, sim card và thẻ nhớ của quý khách khi tiếp nhận sản phẩm bảo hành và cũng không chịu trách nhiệm với các khiếu nại của quý khách về vấn đề phụ kiện, sim card và thẻ nhớ.</li>
            <li>Quý khách có nhu cầu về việc sao lưu dữ liệu vui lòng báo trước để nhân viên thực hiện giúp quý khách trong điều kiện có thể.</li>
        </ul>

        <h5 class="mt-4">7. Giải quyết khiếu nại, tranh chấp</h5>
        <ul class="custom-list">
            <li>Viettablet luôn mong muốn được phục vụ và hỗ trợ khách hàng tốt nhất trong mọi trường hợp. Nên bất cứ khi nào quý khách cảm thấy không hài lòng về chính sách bảo hành hoặc thái độ của nhân viên tiếp nhận bảo hành, vui lòng liên hệ SĐT 09195.09193 để được hỗ trợ tốt nhất.</li>
            <li>Trường hợp quý khách không hợp tác hoặc có hành vi gây rối công cộng, chúng tôi buộc lòng nhờ đến sự can thiệp của pháp luật.</li>
        </ul>
        <p>Trân trọng!</p>
        {{-- Thông tin liên hệ Viettablet --}}
        <p>Để biết thêm chi tiết hoặc cần hỗ trợ, vui lòng liên hệ Viettablet:</p>
        <ul class="custom-list">
            <li><strong>Địa chỉ:</strong> 174 Cao Thắng, Phường 11, Quận 10, TP.HCM</li>
            <li><strong>Hotline:</strong> 0938.060.080</li>
            <li><strong>Email:</strong> viettablet@gmail.com</li>
        </ul>
    </div>
</div>
@endsection