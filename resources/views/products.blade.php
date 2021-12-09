@extends('layout')
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.html">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Sản phẩm</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                    <div id="slider-range" class="border-primary"></div>
                    <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Reference</h3>
                    <button type="button" class="btn btn-secondary btn-md dropdown-toggle px-4" id="dropdownMenuReference"
                            data-toggle="dropdown">Reference</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                        <a class="dropdown-item" href="#">Relevance</a>
                        <a class="dropdown-item" href="#">Name, A to Z</a>
                        <a class="dropdown-item" href="#">Name, Z to A</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Price, low to high</a>
                        <a class="dropdown-item" href="#">Price, high to low</a>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($products as $p)
                <div class="col-sm-6 col-lg-4 text-center item mb-4">
{{--                    <span class="tag">Sale</span>--}}
                    <a href="shop-single.html"> <img src="web_design/images/product_06.png" alt="Image"></a>
                    <h3 class="text-dark"><a href="shop-single.html">{{ $p->product_name }}</a></h3>
{{--                    <p class="price"><del>$89</del> &mdash; $38.00</p>--}}
                    <p class="price">@php if(isset($p->price)){ echo number_format($p->price, 0); } @endphp</p>
                </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <div class="site-block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            @foreach($products as $p)
                <div class="product col-md-3">
                    <a href=''>{{$p->product_name}}</a><br>
                    <br>@php if(isset($p->price)){ echo number_format($p->price, 0); } @endphp
                </div>
            @endforeach
        </div>
    </div>
@stop
