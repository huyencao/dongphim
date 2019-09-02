Chào bạn,<br/>
Đây là email tự động gửi từ website Sigma Book (http://developer5.gco.vn/book/)<br/>
Thông tin khách hàng liên hệ:<br>
Họ tên:{{ $name }}<br/>
Số điện thoại: {{ $phone }}<br/>
Email:<a>{{ $email }}</a><br/>
Nội dung liên hệ:{{ empty($content) ? '' :  $content}}<br/>
Xem chi tiết liên hệ <a href="{{ route('contact-admin.edit', $id ) }}">tại đây </a><br/>
Thanks,