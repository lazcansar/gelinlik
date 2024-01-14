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

<div class="container-fluid bg-dark p-3">
    <a class="btn btn-primary" href="/">Anasayfa</a>
    <a class="btn btn-primary" href="iletisim">İletişim</a>
    <a class="btn btn-primary" href="sikca-sorulan-sorular">SSS</a>
    <a class="btn btn-primary" href="hakkimizda">Hakkımızda</a>
    <a class="btn btn-primary" href="{{ route('customer-page') }}">Müşteri hizmetleri</a>
    <a class="btn btn-primary" href="{{ route('wedding-create') }}">Online Gelinlik Dikimi</a>
    <a class="btn btn-primary" href="{{ route('showroom-page') }}">Showroom</a>
    <a class="btn btn-primary" href="{{ route('login-page') }}">Giriş Yap</a>
    <a class="btn btn-primary" href="{{ route('register-page') }}">Kayıt Ol</a>
    <a class="btn btn-primary" href="{{ route('product-detail') }}">Ürün Detay</a>
    <a class="btn btn-primary" href="{{ route('category-page') }}">Kategori</a>
    <a class="btn btn-primary" href="{{ route('checkout-page') }}">Ödeme</a>
    <a class="btn btn-primary" href="{{ route('checkout-success') }}">Ödeme Onay</a>
    <a class="btn btn-danger" href="{{ route('sss-yonetim') }}">SSS Yönet</a>
    <a class="btn btn-danger" href="{{ route('customer-view') }}">Müşteri Hizmetleri Yönet</a>
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
                        <a class="linkMailPhone" href="">E-Posta: bilgi@beyazdusler.com</a>
                        <a class="linkMailPhone" href="">Telefon: 0531 354 20 84</a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footerLinks">
                        <h6>Hakkımızda</h6>
                        <ul>
                            <li><a href="">Hakkımızda</a> </li>
                            <li><a href="">Müşteri Hizmetleri</a></li>
                            <li><a href="">Sıkça Sorulan Sorular</a></li>
                            <li><a href="">İletişim</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footerLinks">
                        <h6>Yardım Masası</h6>
                        <ul>
                            <li><a href="">Beden Kılavuzu</a></li>
                            <li><a href="">Soru & Cevap</a></li>
                            <li><a href="">Ödeme İadesi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footerLinks">
                        <h6>Hızlı Bağlantılar</h6>
                        <ul>
                            <li><a href="">Ödeme Yöntemleri</a></li>
                            <li><a href="">Kargo Bilgileri</a></li>
                            <li><a href="">Gizlilik Politikası</a></li>
                            <li><a href="">Kullanım Şartları</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footerLinks">
                        <h6>Bizi Takip Edin</h6>
                        <ul>
                            <li>Instagram</li>
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
                <div class="reg"><i class="bi bi-code-slash"></i> afyazilim.com</div>
                <div class="social">
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-telephone"></i>
                    <i class="bi bi-envelope"></i>
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
