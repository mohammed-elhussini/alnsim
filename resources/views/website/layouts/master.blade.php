<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>El-Nasseem</title>

    <link rel="stylesheet" type="text/css" href="{{asset(url('website/css/bootstrap.min.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{asset(url('website/css/bootstrap-rtl.min.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{asset(url('website/css/offcanvas.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{asset(url('website/css/owl.carousel.min.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{asset(url('website/css/lightgallery.css'))}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="{{asset(url('website/css/style.css'))}}"/>

</head>

<body>
<main class="warp">
    <header>
        <div class="topHead">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="dataContact list-unstyled list-inline">
                            <li>
                                <a href="#">
                                    <i class="fa fa-phone fa-rotate-180"></i>
                                    0022556633995
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i>
                                    admin25@mail.com
                                </a>
                            </li>

                            @if (Auth::check())
                                <li>
                                <a class="nav-link" href="{{url('/profile')}}">
                                    Welcome Back {{Auth::user()->name}}
                                    Welcome Back {{Auth::user()->name}}
                                </a>
                                </li>
                                <li>
                                    <a href="{{route('logout')}}">
                                        خروج
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{route('login')}}">
                                        تسجيل دخول
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('sign')}}">
                                        تسجيل جديد
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                    <div class="col-md-6">
                        fsdfsd
                    </div>
                </div>
            </div>
        </div>
        <div class="mainHead">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo_area">
                            <a href="/">
                                <img class="img-responsive"
                                     src="{{asset('website/images/logo.png')}}">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-7">
                        <div class="callUs">
                            <i class="fa fa-phone"></i>
                            <h5>اتصل بنا</h5>
                            <p>(801) 2345 - 6789</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('website.partials.nav')

    </header>

    @yield('slider-home')

    <section class="productsArea">
        <div class="container">
            @yield('content')
        </div>
    </section>

    <section class="contactUs">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item"
                    src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3626.6038053430098!2d46.6945904!3d24.6373366!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1427327522631"></iframe>
        </div>
        <div class="contactForm col-md-4">
            <div class="theForm">
                <h3 class="formTit">تواصل معنا</h3>
                <form>
                    <input type="text" placeholder="الاسم">
                    <input type="email" placeholder="البريد الالكترونى">
                    <textarea placeholder="رسالتك"></textarea>
                    <input type="submit" value="أرسل">
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="footLogo">
                        <a href="/">
                            <img class="img-responsive"
                                 src="{{asset('website/images/logo.png')}}">
                        </a>
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-5">
                    <div class="footCont">
                        <ul class="socialLinks socialLinksFoot list-unstyled list-inline ">
                            <li><a class="" href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a class="" href="#"><i class="fa fa-snapchat"></i></a></li>
                            <li><a class="" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="" href="#"> <i class="fa fa-facebook"></i></a></li>
                        </ul>
                        <div class="siteCopyRight">
                            جميع الحقوق محفوظة
                            <a class="copySite"
                               href="#">
                                لمتجر مصنع النسيم للبلاستيك
                            </a> - تصميم <a
                                class="copySite" href="#">إفادة</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</main>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{asset(url('website/js/bootstrap.min.js'))}}"></script>
<script src="{{asset(url('website/js/offcanvas.js'))}}"></script>
<script src="{{asset(url('website/js/owl.carousel.min.js'))}}"></script>
<script src="{{asset(url('website/js/jquery.mousewheel.min.js'))}}"></script>
<script src="{{asset(url('website/js/lightgallery.js'))}}"></script>
<script src="{{asset(url('website/js/picturefill.min.js'))}}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script src="{{asset(url('website/js/plugin.js'))}}"></script>

</body>
</html>
