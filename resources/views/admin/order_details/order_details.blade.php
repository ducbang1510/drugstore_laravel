<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chi Tiết Đơn Hàng') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    @isset($orderDetails)
                        <h4 style="text-align: center">Chi Tiết Đơn Hàng</h4>
                        <div>
                            <p>Mã đơn hàng: {{ $order -> order_id }}</p>
                            <p>Ngày đặt: {{ $order -> order_date }}</p>
                            <p>Tổng tiền: {{ $order -> total_price }}</p>
                            <p>Tên khách hàng:
                                <a href="{{ route('edit-customer-page', ['customer_id'=>$order -> customer -> customer_id]) }}">
                                    {{ $order -> customer -> name }}
                                </a>
                            </p>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá bán</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderDetails as $item)
                                    <tr>
                                        @foreach($arr_products as $p)
                                            @if($p -> product_id === $item -> product_id)
                                                <td>
                                                    <a href="{{ route('edit-product-page', ['product_id'=>$p->product_id]) }}">
                                                        {{ $p -> product_name }}
                                                    </a>
                                                </td>
                                            @endif
                                        @endforeach
                                        <td>{{ $item -> quantity }}</td>
                                        <td>{{ number_format($item -> unit_price, 0) }}đ</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
