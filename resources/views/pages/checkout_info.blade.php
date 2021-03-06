<?php
    $bg1 = 'frontend_plugin/images/bg_1.jpg';
    $bg2 = 'frontend_plugin/images/bg_2.jpg';
?>
@extends('pages.layout')
@section('content')
    <div class="breadcrumb bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('home') }}">Trang chủ</a>
                    <span class="mx-2 mb-0">/</span>
                    <a href="{{ route('shop') }}">Sản phẩm</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="breadcrumb-sub-title text-black">Thanh toán</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Thông Tin Khách Hàng</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Chi Tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tên Khách Hàng : {{ $cus->name }}</td>
                            </tr>
                            <tr>
                                <td> Địa Chỉ: {{ $cus->address }}</td>
                            </tr>
                            <tr>
                                <td> Số điện thoại: {{ $cus->phone }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Đơn hàng</h2>
                            <div class="p-3 p-lg-5 border">
                                <form method="get" action="{{ route('complete-order') }}">
                                    @csrf
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Cart::content() as $item)
                                                <tr>
                                                    <td>{{$item->name}}<strong class="mx-2">x</strong> 1</td>
                                                    <td>{{$item->subtotal}}</td>
                                                </tr>
                                            @endforeach
                                            <input name="customer_id_hidden" type="hidden"
                                                   value="{{ $cus->customer_id }}"/>
                                            <input name="total_price" type="hidden" value="{{ Cart::priceTotal() }}" />

                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Tổng hóa đơn</strong></td>
                                                <td class="text-black font-weight-bold">
                                                    <strong>{{ Cart::priceTotal() }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="checkout-payment border mb-3">
                                        <h3 class="h6 mb-0">
                                            <a class="d-block" data-toggle="collapse"
                                               href="#collapsecheque" role="button"
                                               aria-expanded="false" aria-controls="collapsecheque">Thanh toán qua ví Momo
                                            </a>
                                        </h3>

                                        <div class="collapse" id="collapsecheque">
                                            <div class="py-2 px-4">
                                                <p class="checkout-payment-des mb-0">Thực hiện thanh toán bằng cách mở ví
                                                    điện tử Momo dùng chức nawnng quét mã QR Code quét lên mã hiển thị
                                                    để thực hiện thanh toán.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="checkout-payment border mb-5">
                                        <h3 class="h6 mb-0">
                                            <a class="d-block" data-toggle="collapse"
                                               href="#collapsepaypal" role="button"
                                               aria-expanded="false" aria-controls="collapsepaypal">Thanh toán khi nhận hàng
                                            </a>
                                        </h3>

                                        <div class="collapse" id="collapsepaypal">
                                            <div class="py-2 px-4">
                                                <p class="checkout-payment-des mb-0">Khi người giao hàng đến, khách hàng
                                                    thực hiện thanh toán với người giao hàng.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Đặt Hàng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>


    <div class="site-section bg-secondary bg-image" style="background-image: url(<?php echo $bg2; ?>);">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <a href="#" class="banner-1 h-100 d-flex" style="background-image: url(<?php echo $bg1; ?>);">
                        <div class="banner-1-inner align-self-center">
                            <h2>Sản phẩm Pharma Group</h2>
                            <p>Các sản phẩm được Pharma Group cung cấp ra thị trường được mang tiêu chuẩn quốc tế
                                đảm bảo an toàn cho người tiêu dùng.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <a href="#" class="banner-1 h-100 d-flex" style="background-image: url(<?php echo $bg2; ?>);">
                        <div class="banner-1-inner ml-auto  align-self-center">
                            <h2>Chuyên gia đánh giá</h2>
                            <p>Quy trình kiếm tra, khảo sát chất lượng sản phẩm được các chuyên gia hàng đầu thế giới
                                thực hiện nhằm đem lại sự tin tưởng cho khách hàng.
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

