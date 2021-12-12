<?php
    $bg1 = 'frontend_plugin/images/bg_1.jpg';
    $bg2 = 'frontend_plugin/images/bg_2.jpg';
    $hr1 = 'frontend_plugin/images/hero_1.jpg'
?>
@extends('pages.layout')
@section('content')
    <div class="site-blocks-cover" style="background-image: url(<?php echo $hr1; ?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                    <div class="site-block-cover-content text-center">
                        <h2 class="sub-title">Bài thuốc hiệu quả, bài thuốc mỗi ngày</h2>
                        <h1>Welcome To Pharma Group</h1>
                        <p>
                            <a  href="#"  class="btn btn-primary px-5 py-3">Mua Ngay</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row align-items-stretch section-overlap">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="banner-wrap bg-primary h-100">
                        <div class="banner-wrap-content h-100">
                            <h5 class="banner-wrap-title">Miễn phí <br> Giao hàng</h5>
                            <img class="banner-wrap-img" src="frontend_plugin/images/fast-delivery.png" alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="banner-wrap h-100">
                        <div class="banner-wrap-content h-100">
                            <h5 class="banner-wrap-title">Khuyến mãi <br> đặc biệt 50%</h5>
                            <img class="banner-wrap-img" src="frontend_plugin/images/50-percent.png" alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="banner-wrap bg-warning h-100">
                        <div class="banner-wrap-content h-100">
                            <h5 class="banner-wrap-title">Thanh toán <br> Tích điểm</h5>
                            <img class="banner-wrap-img" src="frontend_plugin/images/operation.png" alt="Image">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2 class="text-uppercase">Sản phẩm nổi bật</h2>
                </div>
            </div>

            <div class="row">
                @foreach($productpopular as $p)
                    <div class="product col-sm-6 col-lg-4 text-center item mb-4">
                        <a href="{{route('prodDetail', ['product_id'=>$p->product_id])}}">
                            <img class="product-img"
                                 src="<?php
                                 if(isset($productImages)) {
                                     if(isset($p)){
                                         foreach ($productImages as $i) {
                                             if($i->product_id == $p->product_id) {
                                                 echo 'images/'.$i->path;
                                                 break;
                                             }
                                         }
                                     }
                                 }
                                 ?>"
                                 alt="Image" width="270" height="370"
                            >
                        </a>
                        <h3 class="text-dark product-name">
                            <a
                                data-toggle="tooltip"
                                title="{{ $p->product_name }}"
                                href="{{route('prodDetail', ['product_id'=>$p->product_id])}}"
                            >
                                {{ $p->product_name }}
                            </a>
                        </h3>
                        <p class="product-price">@php if(isset($p->price)){ echo number_format($p->price, 0); }@endphp VNĐ</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2 class="text-uppercase">Sản phẩm mới</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 block-3 products-wrap">
                    <div class="nonloop-block-3 owl-carousel">
                        @foreach($productpopular as $p)
                            <div class="product text-center item mb-4">
                                <a href="{{route('prodDetail', ['product_id'=>$p->product_id])}}">
                                    <img class="product-img"
                                         src="<?php
                                         if(isset($productImages)) {
                                             if(isset($p)){
                                                 foreach ($productImages as $i) {
                                                     if($i->product_id == $p->product_id) {
                                                         echo 'images/'.$i->path;
                                                         break;
                                                     }
                                                 }
                                             }
                                         }
                                         ?>"
                                         alt="Image" width="346.66" height="475.05"
                                    >
                                </a>
                                <h3 class="text-dark product-name">
                                    <a
                                        data-toggle="tooltip"
                                        title="{{ $p->product_name }}"
                                        href="{{route('prodDetail', ['product_id'=>$p->product_id])}}"
                                    >
                                        {{ $p->product_name }}
                                    </a>
                                </h3>
                                <p class="product-price">@php if(isset($p->price)){ echo number_format($p->price, 0); }@endphp VNĐ</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2 class="text-uppercase">Đánh giá</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 block-3 products-wrap">
                    <div class="nonloop-block-3 no-direction owl-carousel">
                        <div class="testimony">
                            <blockquote>
                                <img src="frontend_plugin/images/person_1.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                                <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis
                                    voluptatem consectetur quam tempore obcaecati maiores voluptate aspernatur iusto
                                    eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat unde.&rdquo;</p>
                            </blockquote>

                            <p>&mdash; Bằng Trần &mdash;</p>
                        </div>

                        <div class="testimony">
                            <blockquote>
                                <img src="frontend_plugin/images/person_2.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                                <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis
                                    voluptatem consectetur quam tempore
                                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur
                                    ducimus. Minus ratione sit quaerat
                                    unde.&rdquo;</p>
                            </blockquote>

                            <p>&mdash; Tín Trần &mdash;</p>
                        </div>

                        <div class="testimony">
                            <blockquote>
                                <img src="frontend_plugin/images/person_3.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                                <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis
                                    voluptatem consectetur quam tempore
                                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur
                                    ducimus. Minus ratione sit quaerat
                                    unde.&rdquo;</p>
                            </blockquote>

                            <p>&mdash; Anh Khoa &mdash;</p>
                        </div>

                        <div class="testimony">
                            <blockquote>
                                <img src="frontend_plugin/images/person_4.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                                <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis
                                    voluptatem consectetur quam tempore
                                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur
                                    ducimus. Minus ratione sit quaerat
                                    unde.&rdquo;</p>
                            </blockquote>

                            <p>&mdash; Ẩn Danh &mdash;</p>
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
