<?php if(auth()->guard()->check()): ?>
    <?php if(Auth::user()->rol == 1): ?>

<?php $__env->startSection('title'); ?> Anasayfa <?php $__env->stopSection(); ?>
<?php $__env->startSection('stilAlani'); ?>
    .admin-sss-page {
    margin-bottom: 3rem;
    }
    .nav-item {
    padding: 15px 0;
    margin-bottom: 0
    }
    .form-control {
    padding: 10px 20px;
    }
    label {
    margin-bottom: 1rem;
    }

<?php $__env->stopSection(); ?>
<?php $__env->startSection('govde'); ?>
    <div class="bread-line">
        <div class="container">
            <?php if($categoryFake): ?>
                <a href="<?php echo e(route('admin-home')); ?>">Admin Paneli</a>
                <i class="bi bi-arrow-right-short"></i>
                <a href="<?php echo e(route('category-view')); ?>">Kategoriler</a>
                <i class="bi bi-arrow-right-short"></i>
                <span>Kategori Ekle</span>
            <?php elseif($category): ?>
                <a href="<?php echo e(route('admin-home')); ?>">Admin Paneli</a>
                <i class="bi bi-arrow-right-short"></i>
                <span>Kategoriler</span>
            <?php endif; ?>
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
                            <a class="nav-link" href="<?php echo e(route('category-view')); ?>"><i class="bi bi-house-fill"></i> Kategoriler</a>
                        </li>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="<?php echo e(route('category-insert')); ?>"><i class="bi bi-upload"></i> Kateogri Ekle</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-9">
                    <div class="admin-sss-page-form">

                        <!------->
                        <?php if($category): ?>
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Kategori Adı</th>
                                        <th>Eylem</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($category): ?>
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($cat->categoryTitle); ?></td>
                                                <td>
                                                    <a class="btn btn-primary" href="<?php echo e(route('category-detail', $cat->categoryId)); ?>">Güncelle</a>
                                                    <a class="btn btn-danger" onclick="return confirm('Silmek istediğinize emin misiniz?')" href="<?php echo e(route('category-delete', $cat->categoryId)); ?>">Sil</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </tbody>

                                </table>
                        <?php endif; ?>
                        <?php if($categoryDetail): ?>
                            <div class="admin-sss-page-form">
                                <div class="alert text-center bg-secondary text-white">
                                    - <?php echo e($categoryDetail->categoryTitle); ?> - Kategorisini güncelliyorsunuz...
                                </div>
                            <form action="<?php echo e(route('category-update', $categoryDetail->categoryId)); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <label>Kategori Başlığı</label>
                                <input type="text" name="categoryTitle" class="form-control mb-3" value="<?php echo e($categoryDetail->categoryTitle); ?>">

                                <label>Kategori URL</label>
                                <input type="text" name="categoryUrl" class="form-control mb-3" value="<?php echo e($categoryDetail->categoryUrl); ?>">

                                <label>Kategori Açıklama</label>
                                <textarea class="form-control mb-3" rows="5" name="categoryContent"><?php echo e($categoryDetail->categoryContent); ?></textarea>

                                <button type="submit" class="btn btn-success w-100" style="background-color: #C8815F; border-color: #C8815F; padding: 10px 0;">Güncelle</button>
                            </form>
                            </div>
                        <?php endif; ?>

                        <?php if($categoryFake): ?>
                            <form action="<?php echo e(route('category-insert')); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <label>Kategori Başlığı</label>
                                <input type="text" name="categoryTitle" class="form-control mb-3">

                                <label>Kategori URL</label>
                                <input type="text" name="categoryUrl" class="form-control mb-3">

                                <label>Kategori Açıklama</label>
                                <textarea class="form-control mb-3" rows="5" name="categoryContent"></textarea>

                                <button type="submit" class="btn btn-success w-100" style="background-color: #C8815F; border-color: #C8815F; padding: 10px 0;">Oluştur</button>
                            </form>
                        <?php endif; ?>


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

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/admin-panel/category.blade.php ENDPATH**/ ?>