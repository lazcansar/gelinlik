<?php $__env->startSection('title'); ?> Ürün Detay <?php $__env->stopSection(); ?>
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
    <section class="category-page">
        <div class="category-page-bread">
            <div class="category-page-title">
                <div class="container">
                    Ödeme Sayfası
                </div>
            </div>
            <div class="container">
                <a href="">Anasayfa</a>
                <i class="bi bi-arrow-right-short"></i>
                <span>Ödeme</span>
            </div>
        </div>
    </section>

        <div class="checkout-page">
            <div class="container">
                <?php if(session('error')): ?>
                    <div class="alert alert-warning">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>
                <div class="row">

<?php if(auth()->guard()->check()): ?>
<?php if(session('cart') == Null): ?>
    <?php echo redirect()->route('category-page')->with('empty', 'Sepet boş! Lütfen sepetinize ürün ekleyin.'); ?>

<?php endif; ?>
                    <div class="col-lg-6">
                        <div class="checkout-form">
                            <span>Fatura Detayları</span>
                            <form action="<?php echo e(route('buy-submit')); ?>" method="post">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-4" name="name" placeholder="Ad *">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-4" name="surname" placeholder="Soyad *">
                                    </div>
                                </div>
                                <input type="email" class="form-control mb-4" name="email" placeholder="E-Posta Adresi *">
                                <input type="tel" class="form-control mb-4" name="phone" placeholder="Telefon No *">
                                <select class="form-select mb-4" name="country">
                                    <option value="TR">Türkiye</option>
                                    <option value="USA">USA</option>
                                </select>
                                <input type="text" class="form-control mb-4" name="city" placeholder="İl *">
                                <input type="text" class="form-control mb-4" name="adress" placeholder="Adres *">
                                <input type="text" class="form-control mb-4" name="postal_code" placeholder="Posta Kodu">
                                <textarea class="form-control mb-4" name="message" placeholder="Sipariş ile ilgili notlar" rows="5"></textarea>
                                <input type="hidden" name="userId" value="<?php echo e(Auth::user()->id); ?>">
                                <input type="hidden" name="productId" value="<?php if(session('cart')): ?><?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($details['productId'] .','); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>">
                                <input type="hidden" name="order_number" value="<?php echo rand(); ?>">


                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="checkout-view">
                            <span>Siparişiniz</span>
                            <div class="checkout-summary">
                                <span class="text-uppercase" style="font-size: 18px; font-weight: 400">Ürün</span>
                                <div class="row align-items-center">
                                    <?php if(session('cart')): ?>
                                        <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-4 mb-2">
                                                    <?php
                                                    $productImage = $details['productImage'];
                                                    $productUrl = $details['productUrl'];
                                                    $baseImage = pathinfo($details['productImage']);
                                                    $baseImage = $baseImage['basename'];
                                                    $coverImage = "images/product/".$productUrl."/".$baseImage;
                                                    ?>
                                                <a href="<?php echo e(route('delete-cart', $details['productId'])); ?>"><i class="bi bi-x"></i> Sil</a> <img src="../<?php echo e($coverImage); ?>" class="img-fluid">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <?php echo e($details['productTitle']); ?>

                                            </div>
                                            <div class="col-md-4 mb-2">
                                                &#8378; <?php echo e($details['productPrice']); ?>

                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </div>
                                <hr>
                                <div class="shipping-method">
                                    <span class="text-uppercase" style="font-size: 18px; font-weight: 400">Gönderim</span>
                                    <div class="shipping-method-list">
                                        <input type="radio" name="ship_method" value="ucretsiz-gonderi" id="free-shipping">
                                        <label for="free-shipping">Ücretsiz Gönderim</label>
                                    </div>
                                    <div class="shipping-method-list">
                                        <input type="radio" name="ship_method" value="sabit-fiyat" id="fixed-price">
                                        <label for="fixed-price">Sabit Fiyat: ₺45,00</label>
                                    </div>
                                    <div class="shipping-method-list">
                                        <input type="radio" name="ship_method" value="magaza-teslim" id="shop-buy">
                                        <label for="shop-buy">Mağazadan Teslim</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="total-price">
                                    <div class="row">
                                        <div class="col-md-6">Toplam Tutar</div>
                                        <div class="col-md-6 text-end">₺
                                            <?php
                                                $sum = 0;
                                            if(session('cart')) {
                                                foreach (session('cart') as $id => $details) {
                                                   $sum += $details['productPrice'];
                                                }
                                                echo $sum;
                                            }
                                            ?>


                                            <input type="hidden" name="productTotalPrice" value="<?php echo e($sum); ?>">

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="buy-method">
                                    <span class="text-uppercase" style="font-size: 18px; font-weight: 400">Ödeme Yöntemi</span>
                                    <div class="shipping-method-list">
                                        <input type="radio" name="order_method" value="havale-eft" id="havale-eft">
                                        <label for="havale-eft">Banka havelesi/EFT</label>
                                        <p style="font-weight: 300; text-align: justify; text-indent: 30px; margin-top: 5px; font-size: 16px;">Ödemenizi doğrudan banka hesabımıza yapınız. Lütfen ilgili Sipariş Numarasını ödemenizin açıklama kısmına yazınız. Ödemeniz onaylanmadıkça siparişiniz gönderilmeyecektir.</p>
                                    </div>
                                    <div class="shipping-method-list">
                                        <input type="radio" name="order_method" value="revolut-pay" id="revolut-pay">
                                        <label for="revolut-pay">Revolut Pay</label>
                                    </div>
                                    <div class="shipping-method-list">
                                        <input type="radio" name="order_method" value="bitcoin-pay" id="shop-buy">
                                        <label for="shop-buy">Bitcoin Pay</label>
                                    </div>
                                    <p style="font-weight: 300; text-align: justify; text-indent: 30px; margin-top: 5px;">Kişisel verileriniz siparişinizi işleme koymak, bu web sitesindeki deneyiminizi desteklemek ve belgemizde açıklanan diğer amaçlar için kullanılacaktır.
                                        Detaylı bilgi için <a href="">gizlilik ilkesi.</a></p>
                                    <div class="shipping-method-list mt-3">
                                        <input type="checkbox" id="sartlar-kosullar" name="sart_kosul">
                                        <label for="sartlar-kosullar">Şartları ve Koşulları okudum kabul ediyorum. <a href="">Şartlar ve Koşullar</a> *</label>
                                    </div>
                                    <button type="submit" class="btn btn-dark w-100" style="padding: 10px;">Siparişi Onayla</button>
                                </div>




                            </div>


                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(auth()->guard()->guest()): ?>
        <div class="p-5">
            <div class="alert alert-warning text-center shadow">
                <h5>Sipariş oluşturabilmek için lütfen kullanıcı girişi yapın!</h5>
                <h4 class="mt-4 mb-4">Hesabınız yoksa <a href="<?php echo e(route('register-page')); ?>">buraya tıklayarak hemen hesap oluşturabilirsiniz.</a></h4>
                <p>Beyazdusler.com</p>
            </div>
        </div>
        </div></div></div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/pages/checkout-test.blade.php ENDPATH**/ ?>