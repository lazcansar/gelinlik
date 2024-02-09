<?php $__env->startSection('title'); ?> Ara <?php $__env->stopSection(); ?>
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
    .search-bar {
    padding:20px 0;
    }

<?php $__env->stopSection(); ?>
<?php $__env->startSection('govde'); ?>

    <section class="category-page">
        <div class="category-page-bread">
            <div class="category-page-title">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <h2 class="text-center bg-secondary text-white border border-3 p-3 rounded-1 bg-opacity-75 fw-bold">Ne Aramıştınız?</h2>
                            <div class="search-bar">
                                <form action="<?php echo e(route('search-execute')); ?>" method="GET">
                                    <input type="text" class="form-control p-3" name="search" placeholder="Arama yap..">
                                    <button type="submit" class="btn btn-light btn-contact w-100">Ara</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php if($resultSearch): ?>
        <div class="container mt-5 mb-5" style="max-width: 80%;">

            <p style="font-size: 28px; text-align: center; margin-bottom: 20px;">Arama sonuçları gösteriliyor</p>
            <div class="row">
                <?php endif; ?>
                <?php if($resultSearch): ?>
                    <?php $__currentLoopData = $resultSearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                        <img src="../<?php echo e($coverImage); ?>" class="img-fluid image-one">
                                            <?php
                                            $images = "images/product/".$productUrl;
                                            $allImages = glob("$images/*", GLOB_BRACE);
                                            echo '
                            <img src="../'.$allImages[0].'" class="img-fluid image-two">';
                                            ?>
                                        <form action="<?php echo e(route('add-cart')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="productId" value="<?php echo e($product->productId); ?>">
                                            <button type="submit" class="w-100 p-2 rounded-0 btn btn-dark text-white d-block text-center insert-card">Sepete Ekle</button>
                                        </form>
                                    </div></a>
                                <div class="model-title">
                                    <a href="<?php echo e(route('product-detail', $product->productUrl)); ?>"><?php echo e($product->productTitle); ?></a>
                                </div>
                                <div class="model-price">
                                    ₺<?php echo e($product->productPrice); ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/pages/search.blade.php ENDPATH**/ ?>