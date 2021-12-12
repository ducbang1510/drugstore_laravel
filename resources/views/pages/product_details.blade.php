<?php
    $bg1 = 'frontend_plugin/images/bg_1.jpg';
    $bg2 = 'frontend_plugin/images/bg_2.jpg';
?>
@extends('pages.layout')
@section('content')

    <div class="product-detail site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mr-auto">
                    <div class="border text-center">
                        <img class="product-image" src="images/{{ $productImage->path }}" alt="Image" height="400"
                             width="400"/>
                    </div>
                </div>
                <div class="col-md-7">
                    <h2 class="text-black"><span>Tên sản phẩm:</span> {{ $prod->product_name }}<br></h2>
                    <p class="text-des">{{ $prod->description }}<br></p>
                    <p>
                        <strong class="text-primary h4" style="font-size: 30px">
                            <span>Giá:</span> @php if(isset($prod->price)) { echo number_format($prod->price); } @endphp VND<br>
                        </strong>
                    </p>

                    <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 220px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="text" class="form-control text-center" value="1" placeholder=""
                                   aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>
                    </div>
                    <p>
                        <a href="cart.html" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Thêm vào giỏ hàng</a>
                    </p>

                    <div class="mt-6">
                        <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="product-specifications-btn nav-link active" id="pills-home-tab"
                                   data-toggle="pill" href="#pills-home"
                                   role="tab" aria-controls="pills-home" aria-selected="true"
                                >
                                    Thông tin đặt hàng
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="product-specifications-btn nav-link" id="pills-profile-tab"
                                   data-toggle="pill" href="#pills-profile"
                                   role="tab" aria-controls="pills-profile" aria-selected="false"
                                >
                                    Thông số kỹ thuật
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                 aria-labelledby="pills-home-tab">
                                <table class="table custom-table">
                                    <thead>
                                    <th>Danh mục</th>
                                    <th>Chi tiết</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">Số lượng</th>
                                        <td>{{ $prod->quantity }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dạng bào chế</th>
                                        <td>{{ $prod->dosage_forms }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Thành phần</th>
                                        <td>{{ $prod->product_Ingredient }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tác dụng</th>
                                        <td>{{ $prod->effect }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Liều dùng</th>
                                        <td>{{ $prod->dosage }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Thuốc dùng theo toa</th>
                                        <td>
                                            @php if(isset($prod->is_prescription_drugs)) {
                                                $check = $prod->is_prescription_drugs;
                                                if($check == 1)
                                                    echo 'Có';
                                                else
                                                    echo  'Không';
                                            }
                                            @endphp
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cảnh báo</th>
                                        <td>{{ $prod->warning }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phân loại</th>
                                        <td>{{ $prod->category->category_name }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pills-profile"
                                 role="tabpanel" aria-labelledby="pills-profile-tab"
                            >
                                <table class="product-specifications table custom-table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Nhà sản xuất</th>
                                        <td>{{ $prod->manufacturer->company_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Quốc gia</th>
                                        <td>{{ $prod->Country->country_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mô tả</th>
                                        <td>{{ $prod->description }}</td>
                                    </tr>
                                    </tbody>
                                </table>
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
@endsection
