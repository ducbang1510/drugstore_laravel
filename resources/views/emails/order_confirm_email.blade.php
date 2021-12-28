<div style="width: 600px; margin: 0 auto">
    <h2>Xác Nhận Đơn Hàng</h2>
    <p>Tên Khách hàng:</p><span>{{ $customer->name }}</span>
    <p>Số điện thoại:</p><span>{{ $customer->phone }}</span>
    <p>Địa chỉ:</p><span>{{ $customer->address }}</span>
    <table border="1" cellpadding="0" cellpadding="10" style="width: 100%">
        <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        </thead>
        <tbody>
        @foreach($content as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->subtotal }}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="3"></th>
            <th>{{ Cart::priceTotal() }}</th>
        </tr>
        </tbody>
    </table>
</div>
