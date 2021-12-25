@extends('pages.layout')
@section('content')
    <div class="breadcrumb bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{route('home')}}">Trang chủ</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="breadcrumb-sub-title text-black">Thông báo</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if($isSuccess === '1')
                    <span class="icon-check_circle display-3 text-success"></span>
                    <h2 class="thanks-title display-3 text-black">Cảm ơn!</h2>
                    <p class="thanks-des lead mb-5">Yêu cầu đặt hàng của bạn đã được hoàn tất thành công.</p>
                    <p>
                        <a href="{{ route('home') }}"
                           class="thanks-btn btn btn-md height-auto px-4 py-3 btn-primary">Về trang chủ
                        </a>
                    </p>
                    @else
                        <span class="icon-cross_circle display-3 text-success"></span>
                        <h2 class="thanks-title display-3 text-black">Lỗi!</h2>
                        <p class="thanks-des lead mb-5 text-danger">Yêu cầu đặt hàng của bạn thất bại. Vui lòng thử lại</p>
                        <p>
                            <a href="{{ route('home') }}"
                               class="thanks-btn btn btn-md height-auto px-4 py-3 btn-primary">Về trang chủ
                            </a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
