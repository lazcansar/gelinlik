<?php $__env->startSection('title'); ?> Ürünler <?php $__env->stopSection(); ?>
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
                Ürünler Sayfası
            </div>
        </div>
        <div class="container">
            <a href="">Anasayfa</a>
            <i class="bi bi-arrow-right-short"></i>
            <span>Ürünler</span>
        </div>
    </div>


    <!---Show Page--->

    <div class="container" style="max-width: 80%; padding: 50px 0;">
        <div class="row">


            <div class="col-lg-4">
                <div class="filter-category">
                    <div class="filter-category-title">
                        Filtre
                    </div>
                    <hr>
                    <div class="filter-category-cat">
                        <span>Kategoriler</span>
                        <form action="<?php echo e(route('category-filter')); ?>" method="get">

                            <?php $__currentLoopData = $listCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filterCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="category-list">
                                    <input type="checkbox" name="category[]" value="<?php echo e($filterCategory->categoryId); ?>" id="<?php echo e($filterCategory->categoryUrl); ?>">
                                    <label for="<?php echo e($filterCategory->categoryUrl); ?>"><?php echo e($filterCategory->categoryTitle); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <hr>

                            <span>Beden Tablosu</span>

                            <div class="category-list">
                                <input type="checkbox" name="beden[]" value="xl" id="xl">
                                <label for="xl">XL</label>
                            </div>

                            <div class="category-list">
                                <input type="checkbox" name="beden[]" value="l" id="l">
                                <label for="l">L</label>
                            </div>

                            <div class="category-list">
                                <input type="checkbox" name="beden[]" value="m" id="m">
                                <label for="m">M</label>
                            </div>

                            <div class="category-list">
                                <input type="checkbox" name="beden[]" value="s" id="s">
                                <label for="s">S</label>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success" style="padding:10px 30px; background-color: #C8815F;">Uygula</button>


                        </form>
                    </div>
                </div>

            </div>



            <div class="col-lg-8">
                <div class="total-item-count">
                </div>
                    <div class="row">
                        <?php if($products): ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $productUrl = $product->productUrl;
                                    $productImage = $product->productCoverImage;
                                    $baseImage = pathinfo($productImage);
                                    $baseImage = $baseImage['basename'];
                                    $coverImage = "images/product/".$productUrl."/".$baseImage;
                                    ?>
                                <div class="col-lg-4 mb-5 ">
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php elseif($listProduct): ?>


                        <?php $__currentLoopData = $listProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $productUrl = $product->productUrl;
                                $productImage = $product->productCoverImage;
                                $baseImage = pathinfo($productImage);
                                $baseImage = $baseImage['basename'];
                                $coverImage = "images/product/".$productUrl."/".$baseImage;
                                ?>
                            <div class="col-lg-4 mb-5 ">
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                <div class="container">
                    <div class="d-flex justify-content-center">
                        <?php echo e($listProduct->links()); ?>

                    </div>
                </div>
                <!--More Product-->

            </div>




        </div>
    </div>


    <!---Show Page--->


</section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/pages/category.blade.php ENDPATH**/ ?>