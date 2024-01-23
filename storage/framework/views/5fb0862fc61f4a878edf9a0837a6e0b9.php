<?php if(auth()->guard()->check()): ?>

<?php $__env->startSection('title'); ?> Hesabım <?php $__env->stopSection(); ?>
<?php $__env->startSection('stilAlani'); ?>
    .category-page-title .container {
    font-weight: 500;
    font-size: 46px;
    }
    .category-page-bread .container a {
    color: #111;
    }
    .category-page-bread .container span {
    font-weight: 300;
    }

<?php $__env->stopSection(); ?>
<?php $__env->startSection('govde'); ?>

    <div class="bread-line">
        <div class="container">
            <a href="">Anasayfa</a>
            <i class="bi bi-arrow-right-short"></i>
            <span>Hesabım</span>
        </div>
    </div>


    <section class="my-account">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="account-menu">
                        <ul>
                            <li><a href="">Pano <span><i class="bi bi-person-check"></i></span></a></li>
                            <li><a href="">Siparişler <span><i class="bi bi-bag"></i></span></a></li>
                            <li><a href="">Adresler <span><i class="bi bi-pin-map"></i></span></a></li>
                            <li><a href="">Hesap Detayları <span><i class="bi bi-person-lines-fill"></i> </span></a></li>
                            <li><a href="<?php echo e(route('logout')); ?>">Oturumu Kapat <span><i class="bi bi-escape"></i></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="account-info">
                        <p class="mb-3">Merhaba, <span class="user-name"><?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->surname); ?></span></p>
                        <p class="mb-3">Hesap panosundan <a href="">Son Siparişlerinizi</a> görüntüleyebilir, <a href="">Gönderim ve Fatura Adreslerinizi</a> yönetebilir ve <a href="">Şifreniz ile Hesap Ayrıntılarınızı</a> düzenleyebilirsiniz. </p>
                        <p>Siparişiniz hakkında bilgi almak için veya destek talebiniz için <a href=""> bilgi@beyazdusler.com</a> adresine E-Posta gönderebilirsiniz.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php if(auth()->guard()->guest()): ?>
<?php echo redirect()->route('login-page'); ?>

<?php endif; ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/users/account.blade.php ENDPATH**/ ?>