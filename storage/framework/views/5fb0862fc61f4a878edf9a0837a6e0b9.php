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
                            <li><a href="<?php echo e(route('my-account')); ?>">Pano <span><i class="bi bi-person-check"></i></span></a></li>
                            <li><a href="<?php echo e(route('my-orders')); ?>">Siparişler <span><i class="bi bi-bag"></i></span></a></li>
                            <li><a href="">Adresler <span><i class="bi bi-pin-map"></i></span></a></li>
                            <li><a href="">Hesap Detayları <span><i class="bi bi-person-lines-fill"></i> </span></a></li>
                            <li><a href="<?php echo e(route('logout')); ?>">Oturumu Kapat <span><i class="bi bi-escape"></i></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="account-info">
                        <?php if($myOrders): ?>
                            <table class="table table-striped table-striped">
                                <thead>
                                <tr>
                                    <th>Sipariş No</th>
                                    <th>Ödeme Yöntemi</th>
                                    <th>Gönderim Şekli</th>
                                    <th>Fiyat</th>
                                    <th>Ürün Bilgisi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $myOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($order->userId == Auth::user()->id): ?>
                                        <?php $__currentLoopData = $allProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($order->productId == $myProduct->productId): ?>
                                                <tr>
                                                    <td><?php echo e($order->order_number); ?></td>
                                                    <td><?php echo e($orderMethod = str_replace(['havale-eft', 'kapida-odeme', 'revolut-pay', 'bitcoin-pay'],['Havale/EFT', 'Kapıda Ödeme', 'Revolut', 'Bitcoin'],$order->order_method)); ?></td>
                                                    <td><?php echo e($shipMethod = str_replace(['sabit-fiyat', 'magaza-teslim', 'ucretsiz-gonder'], ['Ücretli Gönderi', 'Mağazadan Teslim', 'Ücretsiz Gönderi'], $order->ship_method )); ?></td>
                                                    <td><?php echo e($order->total_price); ?></td>
                                                    <td><?php echo e($myProduct->productTitle); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>


                        <?php else: ?>
                            <p class="mb-3">Merhaba, <span class="user-name"><?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->surname); ?></span></p>
                            <p class="mb-3">Hesap panosundan <a href="">Son Siparişlerinizi</a> görüntüleyebilir, <a href="">Gönderim ve Fatura Adreslerinizi</a> yönetebilir ve <a href="">Şifreniz ile Hesap Ayrıntılarınızı</a> düzenleyebilirsiniz. </p>
                            <p>Siparişiniz hakkında bilgi almak için veya destek talebiniz için <a href=""> bilgi@beyazdusler.com</a> adresine E-Posta gönderebilirsiniz.</p>
                        <?php endif; ?>

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