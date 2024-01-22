<?php $__env->startSection('title'); ?> Ürün Detay <?php $__env->stopSection(); ?>
<?php $__env->startSection('govde'); ?>

    <div class="bread-line">
        <div class="container">
            <a href="">Anasayfa</a>
            <i class="bi bi-arrow-right-short"></i>
            <a href="<?php echo e(route('category-page')); ?>">Ürünler</a>
            <i class="bi bi-arrow-right-short"></i>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($category->categoryId == $productDetail->categoryId): ?>
                    <a href="<?php echo e(route('category-page')); ?>"><?php echo e($category->categoryTitle); ?></a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <i class="bi bi-arrow-right-short"></i>
            <span><?php echo e($productDetail->productTitle); ?></span>
        </div>
    </div>


    <!---Product Head--->
    <section class="product-detail-head">
        <div class="container" style=" font-family: 'Jost', sans-serif;">
            <div class="row">

                <div class="col-lg-6">
<!--Slider--->
                    <div class="gallery-container">
                        <div class="swiper-container gallery-main">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <?php
                                    $productImage = $productDetail->productCoverImage;
                                    $productUrl = $productDetail->productUrl;
                                    $baseImage = pathinfo($productImage);
                                    $baseImage = $baseImage['basename'];
                                    $coverImage = "images/product/".$productUrl."/".$baseImage;
                                    ?>
                                    <img src="../<?php echo e($coverImage); ?>" >
                                </div>
                                <?php
                                $images = "images/product/".$productUrl;
                                $allImages = glob("$images/*", GLOB_BRACE);
                                ?>
                                <?php $__currentLoopData = $allImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imageSlider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <img src="../<?php echo e($imageSlider); ?>">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="../<?php echo e($coverImage); ?>"></div>
                                <?php
                                $images = "images/product/".$productUrl;
                                $allImages = glob("$images/*", GLOB_BRACE);
                                ?>

                                <?php $__currentLoopData = $allImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imageSlider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <img src="../<?php echo e($imageSlider); ?>"></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                            </div>
                        </div>
                    </div><script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
                    <script>
                        var galleryThumbs = new Swiper(".gallery-thumbs", {
                            centeredSlides: true,
                            centeredSlidesBounds: true,
                            slidesPerView: 3,
                            watchOverflow: true,
                            watchSlidesVisibility: true,
                            watchSlidesProgress: true,
                            direction: 'vertical'
                        });

                        var galleryMain = new Swiper(".gallery-main", {
                            watchOverflow: true,
                            watchSlidesVisibility: true,
                            watchSlidesProgress: true,
                            preventInteractionOnTransition: true,
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                            effect: 'fade',
                            fadeEffect: {
                                crossFade: true
                            },
                            thumbs: {
                                swiper: galleryThumbs
                            }
                        });

                        galleryMain.on('slideChangeTransitionStart', function() {
                            galleryThumbs.slideTo(galleryMain.activeIndex);
                        });

                        galleryThumbs.on('transitionStart', function(){
                            galleryMain.slideTo(galleryThumbs.activeIndex);
                        });
                    </script>

                    <!---Slider--->

                </div>




                <div class="col-lg-6">
                    <div class="product-detail-head-right">
                        <div class="product-detail-title">
                           <?php echo e($productDetail->productTitle); ?>

                        </div>
                        <div class="product-detail-price">
                            ₺<?php echo e($productDetail->productPrice); ?>

                        </div>
                        <div class="product-detail-beden-tablo">
                            <img src="https://beyazdusler.com/wp-content/uploads/2023/12/beyaz-dusler-beden-tablosu-300x288.jpeg" class="img-fluid">
                        </div>
                        <div class="product-detail-buy">
                            <a href="" class="btn btn-dark">Sepete Ekle</a>
                            <a href="" class="btn btn-success">Satın Al</a>
                        </div>
                        <div class="product-detail-secure">
                            <span>Güvenli Ödeme</span>
                            <img src="https://beyazdusler.com/wp-content/uploads/2023/12/Varlik-1.png" class="img-fluid">
                        </div>
                        <hr>
                        <div class="product-detail-info">
                            <p><span>Stok Kodu:</span> 15</p>
                            <p><span>Kategori:</span> <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <?php if($category->categoryId == $productDetail->categoryId): ?>
                                                           <?php echo e($category->categoryTitle); ?>

                                                       <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p>
                            <p><span>Paylaş:</span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($socialUrl = url()->full()); ?>" target="_blank">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text=<?php echo e($productDetail->productTitle); ?>&url=<?php echo e($socialUrl = url()->full()); ?>" target="_blank">
                                    <i class="bi bi-twitter"></i>
                                </a>
                                <a href="https://wa.me/?text=<?php echo e($productDetail->productTitle); ?>%20<?php echo e($socialUrl = url()->full()); ?>" target="_blank">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                                  </p>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </section>
    <!---Product Head--->





    <div class="container w-75">
        <hr>
    </div>

    <!---Navs--->
    <div class="container" style="max-width: 80%; font-family: 'Jost', sans-serif;">
    <div class="model-nav">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Açıklama</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Ek Bilgi</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Değerlendirmeler</button>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <?php echo $productDetail->productContent; ?>

        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <p class="mb-2">Modellerimizi canlı görmek için Fatih / İstanbul adresinde bulunan mağazımızı ziyaret edebilirsiniz. Online ödeme seçeneği, online ölçü alma seçeneği, canlı ürün gösterim seçeneği ile hizmetinizdeyiz.</p>
            <p class="mb-2">Gelinlik, Nişanlık, Kınalık ve Abiye modellerimizde Türkiye başta olmak üzere, dünyanın tüm ülkelerine kargo ile gönderim mevcuttur.</p>
            <p class="mb-2">Aksesuar seçeneklerine göz atmak için lütfen bizimle iletişime geçin! Stokta olan ürünlerimiz aynı gün mesai saatleri içerisinde kargoya teslim edilir.</p>
            <p class="mb-2">Sipariş verilen ürünlerin aşamalarını hesap profilinizden görüntüleyebilirsiniz. Ayrıca sipariş numaranız ile web sayfamız üzerinden ürününüzün hangi aşamada olduğunu kolaylıkla kontrol edebilirsiniz.</p>
            <p>Web sitemizde yer alan modellerimizi mağazamızda görmek isterseniz, mağaza personeline Stock Kod Numarası'nı iletin.</p>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
        <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
    </div>
    </div>
    <!---Navs--->



    <!--More Product-->
    <div class="container" style="max-width: 80%; padding: 50px 0; font-family: 'Jost', sans-serif;">
        <h2 class="text-center mb-3">Bunlarda Hoşunuza Gidebilir</h2>
        <div class="row">
            <?php $__currentLoopData = $likeProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $likeImage = $like->productCoverImage;
                    $likeUrl = $like->productUrl;
                    $likeBaseImage = pathinfo($likeImage);
                    $likeBaseImage = $likeBaseImage['basename'];
                    $likeCoverImage = "images/product/".$likeUrl."/".$likeBaseImage;
                    ?>
                <div class="col-lg-3">
                    <div class="model-main">
                        <a href="<?php echo e($likeUrl); ?>">
                        <div class="model-image">
                            <img src="../<?php echo e($likeCoverImage); ?>" class="img-fluid image-one">
                            <img src="https://beyazdusler.com/wp-content/uploads/2023/12/abiy-1.jpg" class="img-fluid image-two">
                            <a href="#" class="w-100 p-2 bg-dark text-white d-block text-center insert-card">Sepete Ekle</a>
                        </div>
                        </a>
                        <div class="model-title">
                            <a href="<?php echo e($likeUrl); ?>"><?php echo e($like->productTitle); ?></a>
                        </div>
                        <div class="model-price">
                            ₺<?php echo e($like->productPrice); ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




        </div>
    </div>


    <!--More Product-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/pages/product.blade.php ENDPATH**/ ?>