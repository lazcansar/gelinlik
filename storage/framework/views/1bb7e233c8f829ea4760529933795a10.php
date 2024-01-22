<?php $__env->startSection('title'); ?> Anasayfa <?php $__env->stopSection(); ?>
<?php $__env->startSection('govde'); ?>

<div class="home-slider">
    <div class="swiper homeSlider">
        <div class="swiper-wrapper">

            <div class="swiper-slide m-0 p-0">

                <div class="sliderItem">
                    <div class="sliderArea">
                        <div class="sliderTitle">
                            Özel Tasarım Gelinlik Modelleri
                        </div>
                        <div class="sliderButton">
                            <a href="#" class="btn btn-outline-success">Hemen İncele</a>
                        </div>
                    </div>
                </div>


            </div>




            <div class="swiper-slide p-0 m-0">

                <div class="sliderItem sliderItemTwo">
                    <div class="sliderArea">
                        <div class="sliderTitle">
                            En Yeni Gelinlik Modelleri
                        </div>
                        <div class="sliderButton">
                            <a href="#" class="btn btn-outline-success">Hemen İncele</a>
                        </div>
                    </div>
                </div>


            </div>


        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".homeSlider", {
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>


<div class="home-feature">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="home-feature-item">
                    <i class="bi bi-truck"></i> Tüm Ülkelere Gönderim
                </div>
            </div>
            <div class="col-lg-3">
                <div class="home-feature-item">
                    <i class="bi bi-headphones"></i> Canlı Destek
                </div>
            </div>
            <div class="col-lg-3">
                <div class="home-feature-item">
                    <i class="bi bi-shield-lock-fill"></i> Güvenli Ödeme
                </div>
            </div>
            <div class="col-lg-3">
                <div class="home-feature-item">
                    <i class="bi bi-eye"></i> Sipariş İzleme
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="wedding-models">
        <div class="wedding-models-title">
            Gelinlik Modellerimiz
        </div>
        <div class="wedding-models-sub">
            En son eklenen modeller gösteriliyor
        </div>
    </div>
</div>

    <!--Wedding Models--->
<div class="container model-container">

    <!---Navs--->
    <div class="model-nav">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <?php if($listCategory): ?>

            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-<?php echo e($listCategory[0]->categoryUrl); ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo e($listCategory[0]->categoryUrl); ?>" type="button" role="tab" aria-controls="pills-<?php echo e($listCategory[0]->categoryUrl); ?>" aria-selected="true"><?php echo e($listCategory[0]->categoryTitle); ?></button>
            </li>
            <?php $__currentLoopData = $listCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($category->categoryId > 1): ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-<?php echo e($category->categoryUrl); ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo e($category->categoryUrl); ?>" type="button" role="tab" aria-controls="pills-<?php echo e($category->categoryUrl); ?>" aria-selected="false"><?php echo e($category->categoryTitle); ?></button>
                    </li>
                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <?php if($listCategory): ?>
            <div class="tab-pane fade show active" id="pills-<?php echo e($listCategory[0]->categoryUrl); ?>" role="tabpanel" aria-labelledby="pills-<?php echo e($listCategory[0]->categoryUrl); ?>-tab" tabindex="0">
                <!---->
                <div class="row">
                    <?php if($listProduct): ?>
                        <?php $__currentLoopData = $listProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($product->categoryId == $listCategory[0]->categoryId): ?>
                                    <?php
                                    $productUrl = $product->productUrl;
                                    $productImage = $product->productCoverImage;
                                    $baseImage = pathinfo($productImage);
                                    $baseImage = $baseImage['basename'];
                                    $coverImage = "images/product/".$productUrl."/".$baseImage;
                                    ?>
                                <div class="col-lg-3 mb-5 ">
                                    <div class="model-main">
                                        <a href="<?php echo e(route('product-detail', $product->productUrl)); ?>">
                                            <div class="model-image">
                                                <img src="<?php echo e($coverImage); ?>" class="img-fluid image-one">
                                                    <?php
                                                    $images = "images/product/".$productUrl;
                                                    $allImages = glob("$images/*", GLOB_BRACE);
                                                    echo '
                            <img src="'.$allImages[0].'" class="img-fluid image-two">';
                                                    ?>
                                                <a href="#" class="w-100 p-2 bg-dark text-white d-block text-center insert-card">Sepete Ekle</a>
                                            </div></a>
                                        <div class="model-title">
                                            <a href="<?php echo e(route('product-detail', $product->productUrl)); ?>"><?php echo e($product->productTitle); ?></a>
                                        </div>
                                        <div class="model-price">
                                            ₺<?php echo e($product->productPrice); ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </div>
                <!---->
            </div>
            <?php $__currentLoopData = $listCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($category->categoryId > 1): ?>
                    <div class="tab-pane fade" id="pills-<?php echo e($category->categoryUrl); ?>" role="tabpanel" aria-labelledby="pills-<?php echo e($category->categoryUrl); ?>-tab" tabindex="0">
                        <!------>
                        <div class="row">
                            <?php if($listProduct): ?>
                                <?php $__currentLoopData = $listProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($product->categoryId == $category->categoryId): ?>
                                            <?php
                                            $productUrl = $product->productUrl;
                                            $productImage = $product->productCoverImage;
                                            $baseImage = pathinfo($productImage);
                                            $baseImage = $baseImage['basename'];
                                            $coverImage = "images/product/".$productUrl."/".$baseImage;
                                            ?>
                                        <div class="col-lg-3 mb-5 ">
                                            <div class="model-main">
                                                <a href="<?php echo e(route('product-detail', $product->productUrl)); ?>">
                                                    <div class="model-image">
                                                        <img src="<?php echo e($coverImage); ?>" class="img-fluid image-one">
                                                            <?php
                                                            $images = "images/product/".$productUrl;
                                                            $allImages = glob("$images/*", GLOB_BRACE);
                                                            echo '
                            <img src="'.$allImages[0].'" class="img-fluid image-two">';
                                                            ?>
                                                        <a href="#" class="w-100 p-2 bg-dark text-white d-block text-center insert-card">Sepete Ekle</a>
                                                    </div></a>
                                                <div class="model-title">
                                                    <a href="<?php echo e(route('product-detail', $product->productUrl)); ?>"><?php echo e($product->productTitle); ?></a>
                                                </div>
                                                <div class="model-price">
                                                    ₺<?php echo e($product->productPrice); ?>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </div>

                        <!------>
                    </div>
                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>


    </div>

    <!---Navs--->


</div>
    <!--Wedding Models--->



    <div class="container promotion" style="max-width: 80%; padding: 50px 0;">
        <div class="row align-items-center">
            <div class="col-lg-6 m-0 p-0 h-100">
                <img src="/images/promotion/1.png">
            </div>
            <div class="col-lg-6 m-0 p-0 h-100">
                <img src="/images/promotion/2.png">
            </div>
            <div class="col-lg-8 m-0 p-0 h-100">
                <img src="/images/promotion/3.jpeg">
            </div>
            <div class="col-lg-4 m-0 p-0 h-100">
                <img src="/images/promotion/4.jpeg">
            </div>
        </div>
    </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/pages/home.blade.php ENDPATH**/ ?>