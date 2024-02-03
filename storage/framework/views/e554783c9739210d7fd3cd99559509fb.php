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
    .admin-sss-page {
    margin-bottom: 3rem;

    }
    .nav-item {
    padding: 15px 0;
    margin-bottom: 0
    }
    .admin-order-table * {
    font-size: 14px;
    }
<?php $__env->stopSection(); ?>
<?php $__env->startSection('govde'); ?>

    <div class="bread-line">
        <div class="container">
            <a href="<?php echo e(route('admin-home')); ?>">Admin Paneli</a>
            <i class="bi bi-arrow-right-short"></i>
            <span>Sipariş Detay</span>
        </div>
    </div>


    <?php if(session('success')): ?>
        <div class="container">
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        </div>
    <?php endif; ?>
    <?php if(session('delete')): ?>
        <div class="container">
            <div class="alert alert-warning"><?php echo e(session('delete')); ?></div>
        </div>
    <?php endif; ?>
    <?php if(session('update')): ?>
        <div class="container">
            <div class="alert alert-warning"><?php echo e(session('update')); ?></div>
        </div>
    <?php endif; ?>

    <section class="admin-sss-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav flex-column bg-light">
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="<?php echo e(route('admin-siparisler')); ?>"><i class="bi bi-house-fill"></i> Sipariş Bilgileri Görüntüle</a>
                        </li>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href=""><i class="bi bi-search"></i> Sipariş Arama </a>
                        </li>

                    </ul>
                </div>


                <div class="col-lg-9">
                    <div class="order-detail">
                        <div class="card shadow rounded-0" style="padding: 25px;">
                            <div class="order-title">
                                <p style="font-size: 20px;">#<?php echo e($orderDetail->order_number); ?> numaralı sipariş detayları</p>
                                <p style="font-size:18px; margin-top: 10px; color: #5c636a"><?php echo e($orderMethod = str_replace(['havale-eft', 'kapida-odeme', 'revolut-pay', 'bitcoin-pay'],['Havale/EFT', 'Kapıda Ödeme', 'Revolut', 'Bitcoin'],$orderDetail->order_method)); ?> ile ödeme</p>
                            </div>
                            <div class="order-content" style="margin-top: 30px;">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="order-content-left">
                                            <p class="fw-bold mb-2">Genel</p>
                                            <p style="font-weight: 500">Sipariş Tarihi:</p>
                                            <p><?php echo e($orderDetail->created_at); ?></p>
                                            <hr>
                                            <p class="mb-2" style="font-weight: 500">Sipariş Durum:</p>
                                            <form action="<?php echo e(route('order-status-update', $orderDetail->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <select class="form-select form-select-sm" name="orderStatus">
                                                    <option <?php if($orderDetail->order_status == 'siparis-alindi'): ?> selected <?php endif; ?> value="siparis-alindi">Sipariş alındı</option>
                                                    <option <?php if($orderDetail->order_status == 'odeme-alindi'): ?> selected <?php endif; ?> value="odeme-alindi">Ödeme alındı</option>
                                                    <option <?php if($orderDetail->order_status == 'siparis-hazirlaniyor'): ?> selected <?php endif; ?> value="siparis-hazirlaniyor">Sipariş hazırlanıyor</option>
                                                    <option <?php if($orderDetail->order_status == 'siparis-kargoya-verildi'): ?> selected <?php endif; ?> value="siparis-kargoya-verildi">Sipariş kargoya verildi</option>
                                                </select>
                                                <button type="submit" class="btn btn-sm btn-outline-primary mt-2 w-100">Güncelle</button>
                                            </form>
                                            <hr>
                                            <p style="font-weight: 500">Müşteri:</p>
                                            <p>
                                                <?php $__currentLoopData = $userAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($orderDetail->userId == $user->id): ?>
                                                        <?php echo e($user->name); ?> <?php echo e($user->surname); ?> <br>Kimlik No: <?php echo e($user->identification); ?>

                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="order-content-center">
                                            <p class="fw-bold mb-2">Gönderim Adresi - İletişim Bilgileri</p>
                                            <p>Adres:</p>
                                            <p class="text-capitalize"><?php echo e($orderDetail->adress); ?> <?php echo e($orderDetail->city); ?> <?php echo e($orderDetail->country); ?></p>
                                            <hr>
                                            <p class="mb-2" style="font-weight: 500">Kargo Takip No:</p>
                                            <form action="<?php echo e(route('order-tracking-update', $orderDetail->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="text" class="form-control form-control-sm" name="trackingNumber" <?php if($orderDetail->tracking_number !=Null): ?> value="<?php echo e($orderDetail->tracking_number); ?>" <?php else: ?> placeholder="Kargo Takip No" <?php endif; ?>>
                                                <button type="submit" class="btn btn-sm btn-outline-primary mt-2 w-100">Güncelle</button>
                                            </form>
                                            <hr>
                                            <p style="font-weight: 500">E-Posta adresi:</p>
                                            <p><?php echo e($orderDetail->email); ?></p>
                                            <hr>
                                            <p style="font-weight: 500">Telefon:</p>
                                            <p><?php echo e($orderDetail->phone); ?></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow rounded-0 mt-4">
                            <div class="card-header">
                                Ürün
                            </div>
                            <div class="card-body" style="padding: 25px;">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Ürün</th>
                                        <th>Maliyet</th>
                                        <th>Miktar</th>
                                        <th>Toplam</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $productAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($orderDetail->productId == $product->productId): ?>
                                            <tr>
                                                <td>
                                                        <?php
                                                        $productUrl = $product->productUrl;
                                                        $productImage = $product->productCoverImage;
                                                        $baseImage = pathinfo($productImage);
                                                        $baseImage = $baseImage['basename'];
                                                        $coverImage = "images/product/".$productUrl."/".$baseImage;
                                                        ?>
                                                    <img src="/<?php echo e($coverImage); ?>" height="50">&nbsp

                                                    <a class="text-decoration-underline" href="<?php echo e(route('product-detail', $product->productUrl)); ?>"> <?php echo e($product->productTitle); ?>

                                                    </a>
                                                </td>
                                                <td>₺<?php echo e($product->productPrice); ?></td>
                                                <td>x 1</td>
                                                <td>₺<?php echo e($product->productPrice); ?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><i class="bi bi-truck" style="font-size: 28px; margin-right: 10px;"></i> Ücretsiz Gönderim</p>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>₺ 0,00</td>
                                            </tr>
                                            <tr>
                                                <td>Toplam Fiyat:</td>
                                                <td></td>
                                                <td></td>
                                                <td>₺10.750,00</td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>

                            </div>

                        </div>


                    </div>





                </div>
            </div>
        </div>
    </section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/admin-panel/admin-order-detail.blade.php ENDPATH**/ ?>