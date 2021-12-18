@extends('pages.layout')
@section('content')
    <div class="breadcrumb bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('home') }}">Trang chủ</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="breadcrumb-sub-title text-black">Liên lạc</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="contact-title h3 mb-5 text-black">Thông tin liên lạc</h2>
                </div>
                <div class="col-md-12">
                    <form action="#" method="post">
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="contact-label text-black">Họ và tên đệm <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_fname" name="c_fname">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="contact-label text-black">Tên <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_lname" name="c_lname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_email" class="contact-label text-black">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="c_email" name="c_email" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_message" class="contact-label text-black">Nội dung</label>
                                    <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="submit" class="contact-send-btn btn btn-primary btn-lg btn-block" value="Gửi">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-branch text-white mb-4">Chi nhánh cửa hàng</h2>
                </div>
                <div class="col-lg-4">
                    <div class="contact-branch-content p-4 bg-white mb-3 rounded">
                        <span class="contact-branch-title d-block text-black h6 text-uppercase">Thành phố Hồ Chí Minh</span>
                        <p class="contact-branch-des mb-0">371 Nguyễn Kiệm, phường 3, quận Gò Vấp</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-branch-content p-4 bg-white mb-3 rounded">
                        <span class="contact-branch-title d-block text-black h6 text-uppercase">Đồng Tháp</span>
                        <p class="contact-branch-des mb-0">371 Nguyễn Kiệm, ấp Tràm Chim, huyện Tràm Chim</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-branch-content p-4 bg-white mb-3 rounded">
                        <span class="contact-branch-title d-block text-black h6 text-uppercase">Đồng Nai</span>
                        <p class="contact-branch-des mb-0">56 đường Đông Hòa 11, ấp Hòa Bình, huyện Trảng Bom</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
