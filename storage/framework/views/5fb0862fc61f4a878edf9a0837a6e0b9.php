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
    .orderNumber {
    color: #ff6600;
    font-weight: 500;
    }
    .orderInfo span {
    font-weight: 500;
    }
    .myProfileForm label {
    margin-bottom: 10px;
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
                            <li><a href="<?php echo e(route('my-adress')); ?>">Adresler <span><i class="bi bi-pin-map"></i></span></a></li>
                            <li><a href="<?php echo e(route('my-profile', Auth::user()->id)); ?>">Hesap Detayları <span><i class="bi bi-person-lines-fill"></i> </span></a></li>
                            <li><a href="<?php echo e(route('logout')); ?>">Oturumu Kapat <span><i class="bi bi-escape"></i></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="account-info">
                        <?php if(session('error')): ?>
                            <div class="alert alert-warning">
                                <p><?php echo e(session('error')); ?></p>
                            </div>
                        <?php endif; ?>
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <p><?php echo e(session('success')); ?></p>
                            </div>
                        <?php endif; ?>
                            <?php if(session('updated')): ?>
                                <div class="alert alert-success">
                                    <p><?php echo e(session('updated')); ?></p>
                                </div>
                            <?php endif; ?>

                        <?php if($myAdress[0]): ?>
                                    <?php if($myAdress[0]->user_id == auth()->user()->id): ?>
                                        <div class="myProfileForm">
                                            <form action="<?php echo e(route('my-adress-updated', $myAdress[0]->id)); ?>" method="POST">

                                                <?php echo csrf_field(); ?>
                                                <label>Adres Tipi</label>
                                                <input type="text" class="form-control mb-3" name="adres_type" value="<?php echo e($myAdress[0]->adress_type); ?>">

                                                <label>Telefon No</label>
                                                <input type="text" class="form-control mb-3" name="phone" value="<?php echo e($myAdress[0]->adress_phone); ?>">
                                                <label>Açık Adres</label>
                                                <textarea class="form-control mb-3" rows="5" name="open_adres"><?php echo e($myAdress[0]->adress_long); ?></textarea>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>İlçe</label>
                                                        <input type="text" class="form-control mb-3" name="city_in" value="<?php echo e($myAdress[0]->adress_in_city); ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>İl</label>
                                                        <input type="text" class="form-control mb-3" name="city" value="<?php echo e($myAdress[0]->adress_city); ?>">
                                                    </div>
                                                </div>
                                                <label>Ülke</label>
                                                <input type="text" class="form-control mb-3" name="country" value="<?php echo e($myAdress[0]->adress_country); ?>">

                                                <button type="submit" class="btn btn-outline-success">Güncelle</button>
                                            </form>
                                        </div>
                                <?php endif; ?>
                        <?php elseif($myAdress[1]): ?>
                                        <div class="myProfileForm">
                                            <form action="<?php echo e(route('my-adress-update')); ?>" method="POST">

                                                <?php echo csrf_field(); ?>
                                                <label>Adres Tipi</label>
                                                <input type="text" class="form-control mb-3" name="adres_type" placeholder="Ev veya İş vb.">

                                                <label>Telefon No</label>
                                                <input type="text" class="form-control mb-3" name="phone" placeholder="0(530) 123 45 67">
                                                <label>Açık Adres</label>
                                                <textarea class="form-control mb-3" rows="5" name="open_adres" placeholder="Örnek Mah. Örnek Cad. No:123 D:18 Fatih / İstanbul"></textarea>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>İlçe</label>
                                                        <input type="text" class="form-control mb-3" name="city_in" placeholder="İlçe">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>İl</label>
                                                        <input type="text" class="form-control mb-3" name="city" placeholder="Şehir">
                                                    </div>
                                                </div>
                                                <label>Ülke</label>
                                                <input type="text" class="form-control mb-3" name="country" placeholder="Ülke">

                                                <button type="submit" class="btn btn-outline-success">Ekle</button>
                                            </form>
                                        </div>


                        <?php elseif($userProfile): ?>
                            <?php if($userProfile->id == Auth::user()->id): ?>
                                <div class="myProfileForm">
                                    <form action="<?php echo e(route('my-profile-update')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Ad</label>
                                                <input type="text" name="ad" class="form-control" value="<?php echo e($userProfile->name); ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Soyad</label>
                                                <input type="text" name="soyad" class="form-control" value="<?php echo e($userProfile->surname); ?>">
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>T.C. Kimlik No</label>
                                                <input type="number" class="form-control" name="kimlikno" value="<?php echo e($userProfile->identification); ?>">
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Şifreniz</label>
                                                <input type="password" name="password" class="form-control" placeholder="*****">
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Yeni Şifreniz</label>
                                                <input type="password" name="newpassword" class="form-control" placeholder="*****">
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Tekrar Yeni Şifreniz</label>
                                                <input type="password" name="newpassword2" class="form-control" placeholder="*****">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-success mt-3">Bilgilerimi Güncelle</button>
                                    </form>
                                </div>
                            <?php else: ?>
                                <p>Lütfen kendi profil sayfanızı düzenleyin!</p>
                                <p class="fw-bold text-danger">Tekrar edilen denemeler halinde hesabınız kalıcı olarak kapatılacaktır!</p>
                            <?php endif; ?>



                        <?php elseif($orderDetail): ?>
                            <div class="orderNumber">
                                Sipariş Numarası: <?php echo e($orderDetail->order_number); ?>

                                <hr>
                                <p class="text-black ">Sipariş Durumu: <span class="fw-normal"><?php if($orderDetail->order_status == 'siparis-alindi'): ?> Sipariş alındı <?php elseif($orderDetail->order_status == 'siparis-kargoya-verildi'): ?> Sipariş kargoya verildi <?php elseif($orderDetail->order_status == 'odeme-alindi'): ?> Ödeme alındı <?php elseif($orderDetail->order_status == 'siparis-hazirlaniyor'): ?> Sipariş hazırlanıyor <?php endif; ?></span></p>
                            </div>
                            <hr>
                            <p><span style="font-weight: 500;">Kargo Takip Numarası:</span> <?php if($orderDetail->tracking_number !=Null): ?> <?php echo e($orderDetail->tracking_number); ?> <?php else: ?> Kargo takip numarası henüz sistemi girilmedi <?php endif; ?></p>
                            <hr>
                            <div class="orderInfo">
                                <p><span>Ad Soyad:</span> <?php echo e($orderDetail->name); ?> <?php echo e($orderDetail->surname); ?></p>
                                <hr>
                                <p><span>E-Mail:</span> <?php echo e($orderDetail->email); ?></p>
                                <hr>
                                <p><span>GSM No:</span> <?php echo e($orderDetail->phone); ?></p>
                                <hr>
                                <p class="text-capitalize"><span>Adres:</span> <?php echo e($orderDetail->adress); ?> <?php echo e($orderDetail->city); ?> <?php echo e($orderDetail->country); ?></p>
                                <hr>
                                <p><span>Ödeme Yönetemi:</span> <?php echo e($orderMethod = str_replace(['havale-eft', 'kapida-odeme', 'revolut-pay', 'bitcoin-pay'],['Havale/EFT', 'Kapıda Ödeme', 'Revolut', 'Bitcoin'],$orderDetail->order_method)); ?></p>
                                <hr>
                                <p><span>Teslimat Şekli:</span> <?php echo e($shipMethod = str_replace(['ucretsiz-gonderi', 'sabit-fiyat', 'magaza-teslim'],['Ücretsiz Gönderi', 'Ücretli Gönderi', 'Mağazadan Teslim'], $orderDetail->ship_method)); ?></p>
                                <hr>
                                <p><span>Sipariş Tarihi:</span> <?php echo e($orderDetail->created_at); ?></p>
                                <hr>
                                <p><span>Sipariş Verilen Ürün:</span>
                                    <?php if($orderDetail->userId == Auth::user()->id): ?>
                                        <?php $__currentLoopData = $allProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($orderDetail->productId == $myProduct->productId): ?>
                                                <?php
                                                $productUrl = $myProduct->productUrl;
                                                $productImage = $myProduct->productCoverImage;
                                                $baseImage = pathinfo($productImage);
                                                $baseImage = $baseImage['basename'];
                                                $coverImage = "images/product/".$productUrl."/".$baseImage;
                                                ?>
                                            <a href="<?php echo e(route('product-detail', $myProduct->productUrl)); ?>">
                                                <?php echo e($myProduct->productTitle); ?>

                                                <img src="/<?php echo e($coverImage); ?>" class="border border-3 p-1" height="150">
                                            </a>
                                            <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?></p>
                            </div>




                        <?php elseif($myOrders): ?>
                            <table class="table table-striped table-striped">
                                <thead>
                                <tr>
                                    <th>Sipariş No</th>
                                        <th>Ödeme Şekli</th>
                                    <th>Fiyat</th>
                                    <th>Ürün Bilgisi</th>
                                    <th>Sipariş Tarihi</th>
                                    <th>Detay</th>
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
                                                    <td><?php echo e($order->total_price); ?> TL</td>
                                                    <td><?php echo e($myProduct->productTitle); ?></td>
                                                    <td><?php echo e($myProduct->created_at); ?></td>
                                                    <td><a href="<?php echo e(route('my-orders-detail', $order->order_number)); ?>" class="btn btn-outline-primary btn-sm">Sipariş Detayı</a> </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>


                        <?php else: ?>
                            <p class="mb-3">Merhaba, <span class="user-name"><?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->surname); ?></span></p>
                            <p class="mb-3">Hesap panosundan <a href="<?php echo e(route('my-orders')); ?>">Son Siparişlerinizi</a> görüntüleyebilir, <a href="<?php echo e(route('my-adress')); ?>">Gönderim ve Fatura Adreslerinizi</a> yönetebilir ve <a href="<?php echo e(route('my-profile', Auth::user()->id)); ?>">Şifreniz ile Hesap Ayrıntılarınızı</a> düzenleyebilirsiniz. </p>
                            <p>Siparişiniz hakkında bilgi almak için veya destek talebiniz için <a href="mailto:<?php echo e($listContact[0]->mail); ?>"> <?php echo e($listContact[0]->mail); ?></a> adresine E-Posta gönderebilirsiniz.</p>
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