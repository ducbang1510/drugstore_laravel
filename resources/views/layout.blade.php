<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pharma Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{asset('')}}">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="web_design/fonts/icomoon/style.css">

    <link rel="stylesheet" href="web_design/css/bootstrap.min.css">
    <link rel="stylesheet" href="web_design/css/magnific-popup.css">
    <link rel="stylesheet" href="web_design/css/jquery-ui.css">
    <link rel="stylesheet" href="web_design/css/owl.carousel.min.css">
    <link rel="stylesheet" href="web_design/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="web_design/css/aos.css">
    <link rel="stylesheet" href="web_design/css/style.css">
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
                        <a href="index.html" class="js-logo-clone">Pharma</a>
                    </div>
                </div>
                <div class="main-nav d-none d-lg-block">
                    <nav class="site-navigation text-right text-md-center" role="navigation">
                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class="active"><a href="index.html">Trang Chủ</a></li>
                            <li><a href="shop.html">Sản Phẩm</a></li>
                            <li class="has-children">
                                <a href="#">Categories</a>
                                <ul class="dropdown">
                                    @foreach($categories as $c)
                                        <li><a href="#">{{$c -> category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="about.html">Thông Tin</a></li>
                            <li><a href="contact.html">Liên Lạc</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="icons">
                    <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
                    <a href="cart.html" class="icons-btn d-inline-block bag">
                        <span class="icon-shopping-bag"></span>
                        <span class="number">2</span>
                    </a>
                    <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                            class="icon-menu"></span></a>
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
                        <h3 class="footer-heading mb-4">About Us</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis distinctio voluptates
                            sed dolorum excepturi iure eaque, aut unde.</p>
                    </div>

                </div>
                <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                    <h3 class="footer-heading mb-4">Quick Links</h3>
                    <ul class="list-unstyled">
                        @foreach($categories as $c)
                            <li><a href="#">{{$c -> category_name}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="block-5 mb-5">
                        <h3 class="footer-heading mb-4">Contact Info</h3>
                        <ul class="list-unstyled">
                            <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                            <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                            <li class="email">emailaddress@domain.com</li>
                        </ul>
                    </div>


                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made
                        with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank"
                                                                                 class="text-primary">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div>
        </div>
    </footer>
</div>

<script src="web_design/js/jquery-3.3.1.min.js"></script>
<script src="web_design/js/jquery-ui.js"></script>
<script src="web_design/js/popper.min.js"></script>
<script src="web_design/js/bootstrap.min.js"></script>
<script src="web_design/js/owl.carousel.min.js"></script>
<script src="web_design/js/jquery.magnific-popup.min.js"></script>
<script src="web_design/js/aos.js"></script>

<script src="web_design/js/main.js"></script>

</body>

</html>
