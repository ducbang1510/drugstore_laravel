@extends('pages.layout')
@section('content')
    <div class="breadcrumb bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="index.html">Trang chủ</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Sản phẩm</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="filter-product row">
                <div class="col-lg-6">
                    <h3 class="mb-3 h6 filter-title text-black d-block">Lọc theo giá</h3>
                    <div id="slider-range" class="border-primary"></div>
                    <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-3 h6 filter-title text-black d-block">Lọc theo tham khảo</h3>
                    <button type="button"
                            class="filter-btn btn btn-secondary btn-md dropdown-toggle px-4"
                            id="dropdownMenuReference"
                            data-toggle="dropdown"
                    >Mặc định </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                        <a class="dropdown-item" href="#">Mặc định</a>
                        <a class="dropdown-item" href="#">Tên A - Z</a>
                        <a class="dropdown-item" href="#">Tên Z- A</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Giá tăng dần</a>
                        <a class="dropdown-item" href="#">Giá giảm dần</a>
                    </div>
                </div>
            </div>

            <div class="product-list row">
                @foreach($products as $p)
                    <div class="product col-sm-6 col-lg-4 text-center item mb-4">
                        <a href="{{ route('prodDetail', ['product_id'=>$p->product_id]) }}">
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
                                 alt="Image">
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
@stop
