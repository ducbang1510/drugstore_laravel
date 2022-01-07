<?php
    $hr1 = 'frontend_plugin/images/hero_1.jpg'
?>
@extends('pages.layout')
@section('content')
    <div class="site-blocks-cover inner-page" style="background-image: url(<?php echo $hr1; ?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto align-self-center">
                    <div class=" text-center">
                        <h1>Pharma Group</h1>
                        <p>Một trong những chuỗi nhà thuốc bán lẻ hiện đại đầu tiên tại thị trường
                            Việt Nam, luôn luôn hướng đến mục tiêu nâng cao chất lượng chăm sóc sức khỏe cho từng
                            khách hàng.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light custom-border-bottom" data-aos="fade">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="block-16">
                        <figure>
                            <img src="frontend_plugin/images/bg_1.jpg" alt="Image placeholder" class="img-fluid rounded">
                            <a href="https://www.youtube.com/watch?v=4x179orFTIc" class="play-button popup-vimeo">
                                <span class="icon-play"></span>
                            </a>
                        </figure>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="about-content col-md-5">
                    <div class="site-section-heading pt-3 mb-4">
                        <h2 class="about-title text-black">Cách thức bắt đầu</h2>
                    </div>
                    <p class="about-des">Được thành lập vào tháng 11/2011, PharmaGroup là một trong những chuỗi nhà thuốc bán lẻ hiện đại
                        đầu tiên tại thị trường Việt Nam, luôn luôn hướng đến mục tiêu nâng cao chất lượng chăm sóc
                        sức khỏe cho từng khách hàng.</p>
                    <p class="about-des">Điều này, trước đây vốn chỉ nằm trong ý tưởng của ông Chris Blank – nhà sáng lập công ty,
                        một dược sỹ người Mỹ làm việc nhiều năm tại Việt Nam. Với niềm đam mê và sự sáng tạo của mình,
                        ông Chris Blank đã thành lập nên PharmaGroup và mang đến những trải nghiệm tốt nhất cho khách hàng.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light custom-border-bottom" data-aos="fade">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6 order-md-2">
                    <div class="block-16">
                        <figure>
                            <img src="frontend_plugin/images/hero_1.jpg" alt="Image placeholder" class="img-fluid rounded">
                            <a href="https://www.youtube.com/watch?v=4x179orFTIc" class="play-button popup-vimeo"><span
                                    class="icon-play"></span></a>

                        </figure>
                    </div>
                </div>
                <div class="about-content col-md-5 mr-auto">
                    <div class="site-section-heading pt-3 mb-4">
                        <h2 class="about-title text-black">Một công ty đáng tin cậy</h2>
                    </div>
                    <p class="about-des">Hiện nay PharmaGroup đã có hệ thống nhà thuốc rải khắp các quận tại TP.HCM
                        và nhiều tỉnh. Chúng tôi hướng mục tiêu đến 2021 đạt được 1.000 cửa hàng bán lẻ thuốc và
                        thực phẩm chức năng tại Việt Nam.</p>
                    <p class="about-des">Ở PharmaGroup, mỗi dược sỹ không chỉ có năng lực chuyên môn cao, luôn tận
                        tâm với nghề mà còn được đào tạo và huấn luyện để hoàn thành xuất sắc những sứ mệnh được giao,
                        giúp PharmaGroup luôn xứng đáng với niềm tin của khách hàng, xứng đáng với niềm tự hào của Việt Nam.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
        <div class="container">
            <div class="row">
                <div class="about-service col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-truck text-primary"></span>
                    </div>
                    <div class="text">
                        <h2>Miễn phí giao hàng</h2>
                        <p>Chương trình giao hàng miễn phí trên toàn quốc được thực hiện trong tất cả ngày trong năm.</p>
                    </div>
                </div>
                <div class="about-service col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-refresh2 text-primary"></span>
                    </div>
                    <div class="text">
                        <h2>Hoàn trả miễn phí</h2>
                        <p>Khi khách hàng nhận thấy sản phẩm kém chất lượng, cửa hàng sẽ hoàn tiền 100% cho khách hàng.</p>
                    </div>
                </div>
                <div class="about-service col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-help text-primary"></span>
                    </div>
                    <div class="text">
                        <h2>Hỗ trợ khách hàng</h2>
                        <p>Hệ thống nhân viên chăm sóc khách hàng tận tình, chu đáo, giải đáp mọi thắc mắc của khách hàng.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
