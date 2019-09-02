Chào ban,
Bạn vừa nhận được một yêu cầu đặt hàng từ website<br/>
THÔNG TIN CHI TIẾT<br>
Mã đơn hàng:#BOOK{{$id}}<br>
Người đặt: {{ $name }}<br>
Số điện thoại: {{ $phone }}<br>
Email: {{ $email }}<br>
Địa chỉ: {{ $district }} / {{ $province }}<br>
Tổng giá tiền đơn hàng: {{ $total }} đ<br>
Ghi chú: {{ $content }}<br/>
Xem chi tiết đơn hàng <a href="{{ route('order.edit', $id ) }}">tại đây </a>