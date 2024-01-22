<?php $__env->startSection('title'); ?> Anasayfa <?php $__env->stopSection(); ?>
<?php $__env->startSection('stilAlani'); ?>
.admin-sss-page {
margin-bottom: 3rem;
}
.nav-item {
padding: 15px 0;
margin-bottom: 0
}
.form-control, .form-select {
padding: 10px 20px;
}
label {
margin-bottom: 1rem;
}

<?php $__env->stopSection(); ?>
<?php $__env->startSection('govde'); ?>


    <div class="bread-line">
        <div class="container">
                <a href="">Admin Paneli</a>
                <i class="bi bi-arrow-right-short"></i>
                <span>Ürünler</span>
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
                            <a class="nav-link" href="<?php echo e(route('product-view')); ?>"><i class="bi bi-house-fill"></i> Kayıtlı Ürünler</a>
                        </li>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="<?php echo e(route('product-insert-page')); ?>"><i class="bi bi-upload"></i> Ürün Ekle</a>
                        </li>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="<?php echo e(route('product-gallery')); ?>"><i class="bi bi-images"></i> Ürün Fotoğrafları Ekle</a>
                        </li>
                    </ul>
                </div>


                <div class="col-lg-9">
                    <!---Gallery Image Delete-->
                    <?php if($imageDelete): ?>
                        <div class="row">
                            <?php
                                $images = "images/product/$imageDelete->productUrl";
                                $allImages = glob("$images/*", GLOB_BRACE);
                                $dizin = $imageDelete->productUrl;
                                ?>
                            <?php $__currentLoopData = $allImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $newImage = pathinfo($image);
                                    $newImage = $newImage['basename'];
                                    ?>
                                <div class="col-md-3">
                                    <img src="http://localhost:8000/<?php echo e($image); ?>" class="img-fluid">
                                    <a href="<?php echo e(route('delete-image', [$dizin, $newImage])); ?>" class="btn btn-danger w-100 rounded-0">Resim Sil</a>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>


                    <?php endif; ?>



                    <!-- Gallery Image Insert--->
                    <?php if($allGalleryProduct): ?>

                        <div class="admin-sss-page-form">
                            <form action="<?php echo e(route('product-gallery-insert')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>


                                <label>Ürüne ait resimleri seçin!</label>
                                <input type="file" name="images[]" class="form-control mb-3" multiple>

                                <label>Resimlerin yükleneceği ürünü seçin</label>
                                <select class="form-select mb-3" name="product">
                                    <?php $__currentLoopData = $allGalleryProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($gallery->productUrl); ?>"><?php echo e($gallery->productTitle); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-upload"></i> Yükle</button>
                            </form>
                        </div>
                    <?php endif; ?>
                    <!-- Gallery Image Insert--->
                    <?php if($listProduct): ?>
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Ürün Adı</th>
                                <th>Ürün Fiyatı</th>
                                <th>Ürün Stock</th>
                                <th>Ürün Bedeni</th>
                                <th>İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($listProduct): ?>
                            <?php $__currentLoopData = $listProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($product->productTitle); ?></td>
                                    <td><?php echo e($product->productPrice); ?></td>
                                    <td><?php echo e($product->productStock); ?></td>
                                    <td><?php echo e($product->productInfo); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('product-update-detail', $product->productId)); ?>" class="btn btn-primary">Güncelle</a>
                                        <a onclick="return confirm('Silmek istediğinize emin misiniz?')"  href="<?php echo e(route('product-delete', $product->productId)); ?>" class="btn btn-danger">Sil</a>
                                        <a href="<?php echo e(route('image-delete', $product->productId)); ?>" class="btn btn-warning">Resim Sil</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            <?php echo e($listProduct->links()); ?>

                        </div>
                    </div>
                    <?php endif; ?>

                    <!---->
                    <?php if($insertCategory): ?>
                        <div class="admin-sss-page-form">
                            <form action="<?php echo e(route('product-insert')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <label>Ürün Adı</label>
                                <input type="text" class="form-control mb-3" name="title" placeholder="Gelinlik Model 1">

                                <label>Ürün URL Adresi</label>
                                <input type="text" class="form-control mb-3" name="url" placeholder="gelinlik-model-1">

                                <label>Ürün Fiyatı</label>
                                <input type="text" class="form-control mb-3" name="price" placeholder="21.500,00">

                                <label>Ürün Stok Miktarı</label>
                                <input type="text" class="form-control mb-3" name="stock" placeholder="3">

                                <label>Ürün Açıklama Yazısı</label>
                                <!-- Place the first <script> tag in your HTML's <head> -->
                                <script src="https://cdn.tiny.cloud/1/ekyyppga37880rl12p326haultygdx1veo5av63hnd5qna1l/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

                                <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
                                <script>
                                    tinymce.init({
                                        selector: 'textarea',
                                        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                                        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                                        tinycomments_mode: 'embedded',
                                        tinycomments_author: 'Author name',
                                        mergetags_list: [
                                            { value: 'First.Name', title: 'First Name' },
                                            { value: 'Email', title: 'Email' },
                                        ],
                                        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
                                    });
                                </script>
                                <textarea name="productContent" placeholder="Ürün açıklama, tanıtım yazısı..."></textarea>

                                <label class="mt-3">Ürün Teknik Bilgileri
                                    <span class="d-block" style="font-size: 12px; font-weight: 300;">Stokta olan beden ebatlarını arasına "," (virgül) işareti koyarak sıralayın. Örneği aşağıda yer almaktadır.</span></label>
                                <input type="text" class="form-control mb-3" name="info" placeholder="XL, L, M, S, Xs">

                                <label>Kategori Seçimi</label>
                                <select name="category" class="form-select mb-3">
                                    <?php if($categorySelect): ?>
                                        <?php $__currentLoopData = $categorySelect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->categoryId); ?>"><?php echo e($category->categoryTitle); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>

                                <label>Ürün Kapak Resmi - 1080x1350px</label>
                                <input type="file" name="image" class="form-control">

                                <button type="submit" class="btn btn-success mt-3 w-100" style="background-color: #C8815F; border-color: #C8815F; padding: 10px 0;">Kayıt Ekle</button>
                            </form>
                        </div>
                    <?php endif; ?>

                    <!---->

                    <!--Update--->

                    <?php if($productDetail): ?>
                        <div class="admin-sss-page-form">
                            <form action="<?php echo e(route('product-update', $productDetail->productId)); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <label>Ürün Adı</label>
                                <input type="text" class="form-control mb-3" name="title" value="<?php echo e($productDetail->productTitle); ?>">

                                <label>Ürün URL Adresi</label>
                                <input type="text" class="form-control mb-3" name="url" value="<?php echo e($productDetail->productUrl); ?>">

                                <label>Ürün Fiyatı</label>
                                <input type="text" class="form-control mb-3" name="price" value="<?php echo e($productDetail->productPrice); ?>">

                                <label>Ürün Stok Miktarı</label>
                                <input type="text" class="form-control mb-3" name="stock" value="<?php echo e($productDetail->productStock); ?>">

                                <label>Ürün Açıklama Yazısı</label>
                                <!-- Place the first <script> tag in your HTML's <head> -->
                                <script src="https://cdn.tiny.cloud/1/ekyyppga37880rl12p326haultygdx1veo5av63hnd5qna1l/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

                                <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
                                <script>
                                    tinymce.init({
                                        selector: 'textarea',
                                        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                                        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                                        tinycomments_mode: 'embedded',
                                        tinycomments_author: 'Author name',
                                        mergetags_list: [
                                            { value: 'First.Name', title: 'First Name' },
                                            { value: 'Email', title: 'Email' },
                                        ],
                                        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
                                    });
                                </script>
                                <textarea name="productContent"><?php echo e($productDetail->productContent); ?></textarea>

                                <label class="mt-3">Ürün Teknik Bilgileri
                                    <span class="d-block" style="font-size: 12px; font-weight: 300;">Stokta olan beden ebatlarını arasına "," (virgül) işareti koyarak sıralayın. Örneği aşağıda yer almaktadır.</span></label>
                                <input type="text" class="form-control mb-3" name="info" value="<?php echo e($productDetail->productInfo); ?>">



                                <button type="submit" class="btn btn-success mt-3 w-100" style="background-color: #C8815F; border-color: #C8815F; padding: 10px 0;">Ürün Güncelle</button>
                            </form>
                        </div>
                    <?php endif; ?>

                    <!---Update--->

                </div>
            </div>
        </div>
    </section>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/admin-panel/admin-product.blade.php ENDPATH**/ ?>