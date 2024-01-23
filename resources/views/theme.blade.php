<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/stil.css') }}">
    <title>@yield('title') - BeyazDüşler Gelinlik</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.tiny.cloud/1/cuy0hm7xaz5tpscwbjjlx6k9s3r3bgzp45a47uvwmj9vz0bx/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <style type="text/css"> @yield('stilAlani') </style>
</head>
<body>

<section class="nav-head">
    <div class="side-menu" id="menuList">
        <div class="text-end">
            <button class="btn" onclick="toggleMenu()"><i class="bi bi-x-lg"></i></button>
        </div>
        <ul>
            @auth
                @if(Auth::user()->rol == 1)
                    <li><a href="{{ route('product-view') }}">Yönetim Paneli</a></li>
                @endif
            @endauth
            <li><a href="{{ route('home-page') }}">Anasayfa</a></li>
            <li><a href="{{ route('about-page') }}">Hakkımızda</a></li>
            <li><a href="{{ route('category-page') }}">Tüm Ürünler</a> </li>
            <li><a href="{{ route('showroom-page') }}">Showroom</a></li>
            <li><a href="{{ route('wedding-create') }}">Online Gelinlik Dikimi</a></li>
            <li><a href="{{ route('sss-page') }}">Sıkça Sorulan Sorular</a></li>
            <li><a href="{{ route('customer-page') }}">Müşteri Hizmetleri</a></li>
            <li><a href="{{ route('contact-page') }}">İletişim</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="nav-head-main">
            <div class="navhead-menu-toogle">
                <button class="btn" onclick="toggleMenu();"><i class="bi bi-list"></i></button>
            </div>
            <div class="nav-menu-logo">
                <a href="{{ route('home-page') }}"><img src="{{ URL::asset('images/logo/gelinlik-beyazdusler-logo.png') }}" height="72"></a>
            </div>
            <div class="nav-menu-action">

                @auth
                    <a href="{{ route('logout')  }}"><i class="bi bi-box-arrow-right"></i></a>
                    <a href="{{ route('my-account') }}" class="me-2"><i class="bi bi-person-circle"></i> {{ Auth::user()->name }}</a>
                @endauth
                @guest
                        <a href="{{ route('login-page') }}"><i class="bi bi-person"></i></a>
                @endguest
                <a href="#" class="translate-link" onclick="dropDown();"><i class="bi bi-translate"></i></a>
                <div class="translate" id="translate-menu">
                    <ul>
                        <li><a href="">Türkçe</a></li>
                        <li><a href="">English</a></li>
                        <li><a href="">Arabic</a></li>
                        <li><a href="">Deutsch</a></li>
                    </ul>
                </div>
                <a href=""><i class="bi bi-cart"></i></a>
            </div>
        </div>
    </div>
</section>
<script>
    function dropDown() {
        var dropDown = document.getElementById("translate-menu");
        dropDown.classList.toggle("show-translate");
    }

    function toggleMenu() {
        var sideMenu = document.getElementById("menuList");
        sideMenu.classList.toggle("showSideMenu");
    }
</script>
<div class="container-fluid bg-dark p-3 d-none">
    <a class="btn btn-primary" href="{{ route('checkout-page') }}">Ödeme</a>
    <a class="btn btn-primary" href="{{ route('checkout-success') }}">Ödeme Onay</a>
    <a class="btn btn-danger" href="{{ route('sss-yonetim') }}">SSS Yönet</a>
    <a class="btn btn-danger" href="{{ route('customer-view') }}">Müşteri Hizmetleri Yönet</a>
    <a class="btn btn-danger" href="{{ route('category-view') }}">Kategoriler</a>
    <a class="btn btn-danger" href="{{ route('product-view') }}">Ürünler</a>
    <a class="btn btn-danger" href="{{ route('company-info', $id=1) }}">İletişim Bilgileri</a>
</div>

@yield('govde')




<section class="footer">
    <div class="container">
        <div class="footerHead">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footerLinks">
                        <h6>Beyazdusler.com</h6>
                        <p>Güzelliğiniz bizimle parlıyor. Özel anlarınıza özel gelinlik çeşitleri beyazdusler.com adresinde…</p>
                        <a class="linkMailPhone" href="mailto:{{ $listContact[0]->mail }}">E-Posta: bilgi@beyazdusler.com</a>
                        <a class="linkMailPhone" href="tel:{{ $listContact[0]->phone }}">Telefon: {{ $listContact[0]->phone }}</a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footerLinks">
                        <h6>Hakkımızda</h6>
                        <ul>
                            <li><a href="{{ route('about-page') }}">Hakkımızda</a> </li>
                            <li><a href="{{ route('customer-page') }}">Müşteri Hizmetleri</a></li>
                            <li><a href="{{ route('sss-page') }}">Sıkça Sorulan Sorular</a></li>
                            <li><a href="{{ route('contact-page') }}">İletişim</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footerLinks">
                        <h6>Yardım Masası</h6>
                        <ul>
                            <li><a href="{{ route('customer-page') }}">Beden Kılavuzu</a></li>
                            <li><a href="{{ route('sss-page') }}">Soru & Cevap</a></li>
                            <li><a href="{{ route('customer-page') }}">Ödeme İadesi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footerLinks">
                        <h6>Hızlı Bağlantılar</h6>
                        <ul>
                            <li><a href="{{ route('customer-page') }}">Ödeme Yöntemleri</a></li>
                            <li><a href="{{ route('customer-page') }}">Kargo Bilgileri</a></li>
                            <li><a href="{{ route('customer-page') }}">Gizlilik Politikası</a></li>
                            <li><a href="{{ route('customer-page') }}">Kullanım Şartları</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footerLinks">
                        <h6>Bizi Takip Edin</h6>
                        <ul>
                            @foreach($listContact as $socialMedia)
                                    @if($socialMedia->facebook !=Null)
                                        <li><a href="{{$listContact[0]->facebook}}"><i class="bi bi-facebook"></i> Facebook</a></li>
                                    @endif
                                    @if($socialMedia->instagram !=Null)
                                        <li><a href="{{$listContact[0]->instagram}}"><i class="bi bi-instagram"></i> Instagram</a></li>
                                    @endif
                                    @if($socialMedia->twitter !=Null)
                                        <li><a href="{{$listContact[0]->twitter}}"><i class="bi bi-twitter"></i> Twitter</a></li>
                                    @endif
                                    @if($socialMedia->linkedin !=Null)
                                        <li><a href="{{$listContact[0]->linkedin}}"><i class="bi bi-linkedin"></i> LinkedIn</a></li>
                                    @endif
                                    @if($socialMedia->tiktok !=Null)
                                        <li><a href="{{$listContact[0]->tiktok}}"><i class="bi bi-tiktok"></i> Tiktok</a></li>
                                    @endif
                                    @if($socialMedia->youtube !=Null)
                                        <li><a href="{{$listContact[0]->youtube}}"><i class="bi bi-youtube"></i> Youtube</a></li>
                                    @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <hr style="margin: 50px 0;">


    <div class="container">
        <div class="footerBottom">
            <p>Copyright © 2023 Beyazdusler.com – Tüm hakları saklıdır. </p>
            <div class="reg-social d-flex justify-content-between flex-wrap align-items-center">
                <div class="reg"><a href="https://afyazilim.com" class="text-warning" target="_blank"><i class="bi bi-code-slash"></i> afyazilim.com</a></div>
                <div class="social">
                    <a style="color: #fff" href="{{ $listContact[0]->instagram }}" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a style="color: #fff" href="tel:{{ $listContact[0]->phone }}"><i class="bi bi-telephone"></i></a>
                    <a style="color: #fff" href="mailto:{{ $listContact[0]->mail }}"><i class="bi bi-envelope"></i></a>
                    <a style="color: #fff;" href="{{ route('contact-page') }}"><i class="bi bi-geo-alt-fill"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
