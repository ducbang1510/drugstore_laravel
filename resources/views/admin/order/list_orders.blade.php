<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Danh Sách Đơn Hàng') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <form method="post" action="{{ route('search-order') }}">
                        @csrf
                        <div class="input-group" style="width: 300px">
                            <input name="orderId" type="text" class="form-control" placeholder="Nhập mã đơn hàng">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">Tìm</button>
                            </div>
                        </div>
                    </form>
                    @isset($orders)
                        @if(!isset($order))
                            <h4 style="text-align: center">Danh Sách Tất Cả Đơn Hàng</h4>
                            <div>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $item)
                                        <tr>
                                            <td><a href="{{ route('order-details', ['order_id'=>$item->order_id]) }}">{{ $item -> order_id }}</a></td>
                                            <td>{{ $item -> order_date }}</td>
                                            <td>{{ number_format($item -> total_price, 0) }}đ</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $orders->links() }}
                        @endif
                    @endisset
                    @isset($order)
                        <h4 style="text-align: center">Kết quả cho mã đơn hàng {{ $order->order_id }}</h4>
                        <div>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Tổng tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="{{ route('order-details', ['order_id'=>$order->order_id]) }}">{{ $order -> order_id }}</a></td>
                                        <td>{{ $order -> order_date }}</td>
                                        <td>{{ number_format($order -> total_price, 0) }}đ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
