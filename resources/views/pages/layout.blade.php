<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pharma Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="frontend_plugin/images/icon.ico">
    <base href="{{asset('')}}">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="frontend_plugin/fonts/icomoon/style.css">

    <link rel="stylesheet" href="frontend_plugin/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend_plugin/css/magnific-popup.css">
    <link rel="stylesheet" href="frontend_plugin/css/jquery-ui.css">
    <link rel="stylesheet" href="frontend_plugin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="frontend_plugin/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="frontend_plugin/css/aos.css">
    <link rel="stylesheet" href="frontend_plugin/css/style.css">
</head>

<body>
<div class="site-wrap">
    <div class="site-navbar py-2">

        <div class="search-wrap">
            <div class="container">
                <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                <form action="#" method="post">
                    <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
                </form>
            </div>
        </div>

        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="logo">
                    <div class="site-logo">
                        <a href="{{route('home')}}" class="js-logo-clone">Pharma Group</a>
                    </div>
                </div>
                <div class="main-nav d-none d-lg-block">
                    <nav class="site-navigation text-right text-md-center" role="navigation">
                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class="active"><a href="{{ route('home') }}">Trang Chủ</a></li>
                            <li><a href="{{ route('shop') }}">Sản Phẩm</a></li>
                            <li class="has-children">
                                <a href="#">Phân Loại</a>
                                <ul class="dropdown">
                                    @foreach($categories as $c)
                                        <li><a href="#">{{$c -> category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ route('about') }}">Thông Tin</a></li>
                            <li><a href="{{ route('contact') }}">Liên Lạc</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="icons">
                    <a href="#" class="icons-btn d-inline-block js-search-open">
                        <span class="icon-search-btn icon-search"></span>
                    </a>
                    <a href="{{ route('showCart') }}" class="icons-btn d-inline-block bag">
                        <span class="icon-bag-btn icon-shopping-bag"></span>
                        <span class="icon-number-bag number">{{ Cart::count() ?? '0' }}</span>
                    </a>
                    <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none">
                        <span class="icon-menu"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

                    <div class="block-7">
                        <h3 class="footer-heading mb-4">Pharma Group</h3>
                        <p class="footer-content">Không phải tất cả các anh hùng đều mặc áo choàng.
                            Giữa đại dịch covid toàn cầu này thì những anh hùng thực sự là những người
                            mặc áo bác sĩ.</p>
                    </div>

                </div>
                <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                    <h3 class="footer-heading mb-4">Phân Loại</h3>
                    <ul class="list-unstyled">
                        @foreach($categories as $c)
                            <li><a href="#">{{$c -> category_name}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="block-5 mb-5">
                        <h3 class="footer-heading mb-4">Liên Lạc</h3>
                        <ul class="list-unstyled">
                            <li class="address">371 Nguyễn Kiệm, phường 3, quận Gò Vấp, Thành phố Hồ Chí Minh</li>
                            <li class="phone"><a href="tel://0123456789">0123456789</a></li>
                            <li class="email">pharmagroup@ou.edu.vn</li>
                        </ul>
                    </div>


                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <p>
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> | All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="frontend_plugin/js/jquery-3.3.1.min.js"></script>
<script src="frontend_plugin/js/jquery-ui.js"></script>
<script src="frontend_plugin/js/popper.min.js"></script>
<script src="frontend_plugin/js/bootstrap.min.js"></script>
<script src="frontend_plugin/js/owl.carousel.min.js"></script>
<script src="frontend_plugin/js/jquery.magnific-popup.min.js"></script>
<script src="frontend_plugin/js/aos.js"></script>

<script src="frontend_plugin/js/main.js"></script>

</body>

</html>
