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
                    <a href="{{route('home')}}">Trang chủ</a>
                    <span class="mx-2 mb-0">/</span>
                    <a href="{{route('shop')}}">Sản phẩm</a>
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
                    <h2 class="h3 mb-3 text-black">Chi tiết thanh toán</h2>
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group">
                            <label for="c_country" class="checkout-title text-black">Quốc gia<span class="text-danger">*</span></label>
                            <select id="c_country" class="form-control">
                                <option value="1">Chọn quốc gia</option>
                                <option value="2">Việt Nam</option>
                                <option value="3">Anh</option>
                                <option value="4">Mỹ</option>
                                <option value="5">Pháp</option>
                                <option value="6">Đức</option>
                                <option value="7">Thái Lan</option>
                                <option value="8">Campuchia</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="c_fname" class="checkout-title text-black">Họ<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_fname" name="c_fname">
                            </div>
                            <div class="col-md-6">
                                <label for="c_lname" class="checkout-title text-black">Tên<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_lname" name="c_lname">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="checkout-title text-black">Địa chỉ<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_address" name="c_address" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-6">
                                <label for="c_email_address" class="checkout-title text-black">Email<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_email_address" name="c_email_address">
                            </div>
                            <div class="col-md-6">
                                <label for="c_phone" class="checkout-title text-black">Số điện thoại<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="c_order_notes" class="checkout-title text-black">Ghi chú</label>
                            <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                                      placeholder="Nhập ghi chú của bạn tại đây ..."></textarea>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Mã giảm giá</h2>
                            <div class="p-3 p-lg-5 border">

                                <label for="c_code" class="checkout-title text-black mb-3">Nhập mã phiếu giảm giá</label>
                                <div class="input-group w-75">
                                    <input type="text" class="form-control" id="c_code" placeholder="" aria-label="Coupon Code"
                                           aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="checkout-code-discount btn btn-primary btn-sm px-4" type="button" id="button-addon2">Áp dụng</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Đơn hàng</h2>
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                    <th>Sản phẩm</th>
                                    <th>Tổng</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Thuốc xịt điều trị viêm mũi dị ứng cho người lớn & trẻ em trên 2 tuổi Nasonex 0.05% <strong class="mx-2">x</strong> 1</td>
                                        <td>145.000</td>
                                    </tr>
                                    <tr>
                                        <td>Thuốc xịt điều trị viêm mũi  <strong class="mx-2">x</strong> 1</td>
                                        <td>35.000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Tổng hóa đơn</strong></td>
                                        <td class="text-black font-weight-bold"><strong>180.000</strong></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="checkout-payment border mb-3">
                                    <h3 class="h6 mb-0">
                                        <a class="d-block" data-toggle="collapse"
                                           href="#collapsebank" role="button"
                                           aria-expanded="false" aria-controls="collapsebank"
                                        >
                                            Thanh toán qua ngân hàng
                                        </a>
                                    </h3>

                                    <div class="collapse" id="collapsebank">
                                        <div class="py-2 px-4">
                                            <p class="checkout-payment-des mb-0">Thực hiện thanh toán của bạn trực tiếp vào tài khoản
                                                ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn
                                                làm tham chiếu thanh toán. Đơn đặt hàng của bạn sẽ không được giao cho
                                                đến khi tiền đã hết trong tài khoản của chúng tôi.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout-payment border mb-3">
                                    <h3 class="h6 mb-0">
                                        <a class="d-block" data-toggle="collapse"
                                           href="#collapsecheque" role="button"
                                           aria-expanded="false" aria-controls="collapsecheque"
                                        >
                                            Thanh toán qua ví Momo
                                        </a>
                                    </h3>

                                    <div class="collapse" id="collapsecheque">
                                        <div class="py-2 px-4">
                                            <p class="checkout-payment-des mb-0">Thực hiện thanh toán bằng cách mở ví điện tử Momo
                                                dùng chức nawnng quét mã QR Code quét lên mã hiển thị để thực hiện
                                                thanh toán.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout-payment border mb-5">
                                    <h3 class="h6 mb-0">
                                        <a class="d-block" data-toggle="collapse"
                                           href="#collapsepaypal" role="button"
                                           aria-expanded="false" aria-controls="collapsepaypal"
                                        >
                                            Thanh toán khi nhận hàng
                                        </a>
                                    </h3>

                                    <div class="collapse" id="collapsepaypal">
                                        <div class="py-2 px-4">
                                            <p class="checkout-payment-des mb-0">Khi người giao hàng đến, khách hàng thực hiện
                                                thanh toán với người giao hàng.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='thankyou.html'">
                                        Đặt hàng</button>
                                </div>

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
