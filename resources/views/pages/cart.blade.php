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
                    <a href="{{ route('home') }}">Sản phẩm</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="breadcrumb-sub-title text-black">Giỏ hàng</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="POST" action="{{ route('update-cart') }}">
                    @csrf
                    <div class="site-blocks-table">
                        @if(session('message'))
                            <div class="alert alert-success">
                                <strong>Thành công!</strong> {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">Ảnh</th>
                                <th class="product-names">Tên sản phẩm</th>
                                <th class="product-price">Giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-total">Tổng tiền</th>
                                <th class="product-remove">Xóa</th>
                            </tr>
                            </thead>
                            @foreach(Cart::content() as $item)
                                <tbody>
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="images/{{ $item->options->image }}" alt="{{ $item->id }}" class="product-thumbnail-img img-fluid">
                                    </td>
                                    <td class="product-names">
                                        <h2 class="h5 text-black">{{ $item->name }}</h2>
                                    </td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        <div class="input-group mb-3" style="max-width: 120px;">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-outline-primary js-btn-minus">&minus;</button>
                                            </div>
                                            <input type="number"
                                                   class="form-control text-center"
                                                   name="quantity{{ $item->rowId }}"
                                                   value="{{ $item->qty }}"
                                                   aria-label="Example text with button addon" aria-describedby="button-addon1">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-primary js-btn-plus">&plus;</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->subtotal }}</td>
                                    <td><a href="{{ route('remove-item', ['itemId'=>$item->rowId]) }}" class="btn btn-primary height-auto btn-sm">X</a></td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <button class="cart-btn btn btn-primary form-control" type="submit">Cập nhật giỏ hàng</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <button onclick="location.href='{{ route('shop') }}'" type="button"
                                    class="cart-btn btn btn-outline-primary btn-md btn-block">Tiếp tục mua sắm</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <button onclick="location.href='{{ route('destroy-cart') }}'" type="button"
                                class="cart-btn btn btn-primary btn-md btn-block">Xoá toàn bộ giỏ hàng</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Tổng tiền</h3>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-4">
                                    <span class="cart-total text-black">Tổng: </span>
                                </div>
                                <div class="col-md-8 text-right">
                                    <strong class="cart-total text-black">{{ Cart::total() }}</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-lg btn-block" onclick="location.href='{{ route('checkout') }}'">
                                        Thanh toán</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
