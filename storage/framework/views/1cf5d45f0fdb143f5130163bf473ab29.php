<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('assets/css/stil.css')); ?>">
    <title><?php echo $__env->yieldContent('title'); ?> - BeyazDüşler Gelinlik</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.tiny.cloud/1/cuy0hm7xaz5tpscwbjjlx6k9s3r3bgzp45a47uvwmj9vz0bx/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <style type="text/css"> <?php echo $__env->yieldContent('stilAlani'); ?> </style>
</head>
<body>

<section class="nav-head">
    <div class="side-menu" id="menuList">
        <div class="text-end">
            <button class="btn" onclick="toggleMenu()"><i class="bi bi-x-lg"></i></button>
        </div>
        <ul>
            <?php if(auth()->guard()->check()): ?>
                <?php if(Auth::user()->rol == 1): ?>
                    <li><a href="<?php echo e(route('admin-home')); ?>">Yönetim Paneli</a></li>
                <?php endif; ?>
            <?php endif; ?>
            <li><a href="<?php echo e(route('home-page')); ?>">Anasayfa</a></li>
            <li><a href="<?php echo e(route('about-page')); ?>">Hakkımızda</a></li>
            <li><a href="<?php echo e(route('category-page')); ?>">Tüm Ürünler</a> </li>
            <li><a href="<?php echo e(route('showroom-page')); ?>">Showroom</a></li>
            <li><a href="<?php echo e(route('wedding-create')); ?>">Online Gelinlik Dikimi</a></li>
            <li><a href="<?php echo e(route('sss-page')); ?>">Sıkça Sorulan Sorular</a></li>
            <li><a href="<?php echo e(route('customer-page')); ?>">Müşteri Hizmetleri</a></li>
            <li><a href="<?php echo e(route('contact-page')); ?>">İletişim</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="nav-head-main">
            <div class="navhead-menu-toogle">
                <button class="btn" onclick="toggleMenu();"><i class="bi bi-list"></i></button>
            </div>
            <div class="nav-menu-logo">
                <a href="<?php echo e(route('home-page')); ?>"><img src="<?php echo e(URL::asset('images/logo/gelinlik-beyazdusler-logo.png')); ?>" height="72"></a>
            </div>
            <div class="nav-menu-action">

                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('logout')); ?>"><i class="bi bi-box-arrow-right"></i></a>
                    <a href="<?php echo e(route('my-account')); ?>" class="me-2"><i class="bi bi-person-circle"></i> <?php echo e(Auth::user()->name); ?></a>
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                        <a href="<?php echo e(route('login-page')); ?>"><i class="bi bi-person"></i></a>
                <?php endif; ?>
                <a href="#" class="translate-link" onclick="dropDown();"><i class="bi bi-translate"></i></a>
                <div class="translate" id="translate-menu">
                    <ul>
                        <li><a href="">Türkçe</a></li>
                        <li><a href="">English</a></li>
                        <li><a href="">Arabic</a></li>
                        <li><a href="">Deutsch</a></li>
                    </ul>
                </div>
                    <a href="<?php echo e(route('search-page')); ?>"><i class="bi bi-search-heart"></i> </a>
                <a href="<?php echo e(route('test-checkout')); ?>"><i class="bi bi-cart"></i> <?php echo e(count((array) session('cart'))); ?></a>
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

<?php echo $__env->yieldContent('govde'); ?>




<section class="footer">
    <div class="container">
        <div class="footerHead">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footerLinks">
                        <h6>Beyazdusler.com</h6>
                        <p>Güzelliğiniz bizimle parlıyor. Özel anlarınıza özel gelinlik çeşitleri beyazdusler.com adresinde…</p>
                        <a class="linkMailPhone" href="mailto:<?php echo e($listContact[0]->mail); ?>">E-Posta: bilgi@beyazdusler.com</a>
                        <a class="linkMailPhone" href="tel:<?php echo e($listContact[0]->phone); ?>">Telefon: <?php echo e($listContact[0]->phone); ?></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footerLinks">
                        <h6>Hakkımızda</h6>
                        <ul>
                            <li><a href="<?php echo e(route('about-page')); ?>">Hakkımızda</a> </li>
                            <li><a href="<?php echo e(route('customer-page')); ?>">Müşteri Hizmetleri</a></li>
                            <li><a href="<?php echo e(route('sss-page')); ?>">Sıkça Sorulan Sorular</a></li>
                            <li><a href="<?php echo e(route('contact-page')); ?>">İletişim</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footerLinks">
                        <h6>Yardım Masası</h6>
                        <ul>
                            <li><a href="<?php echo e(route('customer-page')); ?>">Beden Kılavuzu</a></li>
                            <li><a href="<?php echo e(route('sss-page')); ?>">Soru & Cevap</a></li>
                            <li><a href="<?php echo e(route('customer-page')); ?>">Ödeme İadesi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footerLinks">
                        <h6>Hızlı Bağlantılar</h6>
                        <ul>
                            <li><a href="<?php echo e(route('customer-page')); ?>">Ödeme Yöntemleri</a></li>
                            <li><a href="<?php echo e(route('customer-page')); ?>">Kargo Bilgileri</a></li>
                            <li><a href="<?php echo e(route('customer-page')); ?>">Gizlilik Politikası</a></li>
                            <li><a href="<?php echo e(route('customer-page')); ?>">Kullanım Şartları</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footerLinks">
                        <h6>Bizi Takip Edin</h6>
                        <ul>
                            <?php $__currentLoopData = $listContact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialMedia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($socialMedia->facebook !=Null): ?>
                                        <li><a href="<?php echo e($listContact[0]->facebook); ?>"><i class="bi bi-facebook"></i> Facebook</a></li>
                                    <?php endif; ?>
                                    <?php if($socialMedia->instagram !=Null): ?>
                                        <li><a href="<?php echo e($listContact[0]->instagram); ?>"><i class="bi bi-instagram"></i> Instagram</a></li>
                                    <?php endif; ?>
                                    <?php if($socialMedia->twitter !=Null): ?>
                                        <li><a href="<?php echo e($listContact[0]->twitter); ?>"><i class="bi bi-twitter"></i> Twitter</a></li>
                                    <?php endif; ?>
                                    <?php if($socialMedia->linkedin !=Null): ?>
                                        <li><a href="<?php echo e($listContact[0]->linkedin); ?>"><i class="bi bi-linkedin"></i> LinkedIn</a></li>
                                    <?php endif; ?>
                                    <?php if($socialMedia->tiktok !=Null): ?>
                                        <li><a href="<?php echo e($listContact[0]->tiktok); ?>"><i class="bi bi-tiktok"></i> Tiktok</a></li>
                                    <?php endif; ?>
                                    <?php if($socialMedia->youtube !=Null): ?>
                                        <li><a href="<?php echo e($listContact[0]->youtube); ?>"><i class="bi bi-youtube"></i> Youtube</a></li>
                                    <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <hr style="margin: 50px 0;">


    <div class="container">
        <div class="footerBottom">
            <div class="d-flex justify-content-between flex-wrap align-items-center">
                <p>Copyright © 2023 Beyazdusler.com – Tüm hakları saklıdır. </p>
                <img src="<?php echo e(asset('images/logo_band_white.svg')); ?>">
            </div>
            <div class="reg-social d-flex justify-content-between flex-wrap align-items-center">
                <div class="reg"><a href="https://afyazilim.com" class="text-warning" target="_blank"><i class="bi bi-code-slash"></i> afyazilim.com</a></div>
                <div class="social">
                    <a style="color: #fff" href="<?php echo e($listContact[0]->instagram); ?>" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a style="color: #fff" href="tel:<?php echo e($listContact[0]->phone); ?>"><i class="bi bi-telephone"></i></a>
                    <a style="color: #fff" href="mailto:<?php echo e($listContact[0]->mail); ?>"><i class="bi bi-envelope"></i></a>
                    <a style="color: #fff;" href="<?php echo e(route('contact-page')); ?>"><i class="bi bi-geo-alt-fill"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/theme.blade.php ENDPATH**/ ?>