@extends('pages.layout')
@section('content')
    <div class="breadcrumb bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{route('home')}}">Trang chủ</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="breadcrumb-sub-title text-black">Cảm ơn</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="icon-check_circle display-3 text-success"></span>
                    <h2 class="thanks-title display-3 text-black">Thank you!</h2>
                    <p class="thanks-des lead mb-5">Đơn đặt hàng của bạn đã được hoàn tất thành công.</p>
                    <p>
                        <a href="{{route('home')}}"
                           class="thanks-btn btn btn-md height-auto px-4 py-3 btn-primary"
                        >
                            Về trang chủ
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop
