<?php if(auth()->guard()->check()): ?>
    <?php if(Auth::user()->rol == 1): ?>

<?php $__env->startSection('title'); ?> Anasayfa <?php $__env->stopSection(); ?>
<?php $__env->startSection('stilAlani'); ?>
    .admin-page-home {
    font-family: 'Jost', sans-serif;
    padding: 50px 0;
    }
    .admin-page-home-title p {
    font-size: 36px;
    text-align: center;
    font-weight: 600;
    letter-spacing: 2px;
    }
    .admin-page-home-title span {
    display:block;
    text-align:center;
    }
    .admin-page-home-link {
    background-color:#85a85a;
    padding: 20px 30px;
    border-radius: 5px;
    text-transform:uppercase;
    text-align: center;
    }
    .admin-page-home-link a {
    color:#fff;
    display: block;
    transition: .3s all;
    font-weight: 500;
    }
    .admin-page-home-link a:hover {
    color: #424242;
    }
<?php $__env->stopSection(); ?>
<?php $__env->startSection('govde'); ?>

    <section class="admin-page-home">
        <div class="container">
            <div class="admin-page-home-title mb-4">
                <p>Yönetim Paneli</p>
                <span>İşlem yapmak için alan seçimi yapın!</span>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="admin-page-home-link">
                        <a href="<?php echo e(route('sss-yonetim')); ?>"><i class="bi bi-lightbulb-fill"></i> Sıkça Sorulan Sorular</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="admin-page-home-link">
                        <a href="<?php echo e(route('customer-view')); ?>"><i class="bi bi-file-earmark-fill"></i> Müşteri Hizmetleri Sayfası</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="admin-page-home-link">
                        <a href="<?php echo e(route('category-view')); ?>"><i class="bi bi-list"></i> Kategoriler</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="admin-page-home-link">
                        <a href="<?php echo e(route('product-view')); ?>"><i class="bi bi-boxes"></i> Ürünler</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="admin-page-home-link">
                        <a href="<?php echo e(route('company-info', 1)); ?>"><i class="bi bi-info-circle-fill"></i> Firma İletişim Bilgileri</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="admin-page-home-link">
                        <a href="<?php echo e(route('admin-siparisler')); ?>"><i class="bi bi-cart-fill"></i> Siparişler</a>
                    </div>
                </div>


            </div>

        </div>

    </section>


<?php $__env->stopSection(); ?>
    <?php else: ?>
        <?php echo redirect()->route('home-page'); ?>

    <?php endif; ?>
<?php endif; ?>
<?php if(auth()->guard()->guest()): ?>
    <?php echo redirect()->route('home-page'); ?>

<?php endif; ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/admin-panel/admin-home.blade.php ENDPATH**/ ?>