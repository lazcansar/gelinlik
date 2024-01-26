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
            <a href="<?php echo e(route('admin-home')); ?>">Admin Paneli</a>
            <i class="bi bi-arrow-right-short"></i>
            <span>İletişim Bilgileri</span>
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
                            <a class="nav-link" href=""><i class="bi bi-house-fill"></i> İletişim Bilgisi Güncelle</a>
                        </li>

                    </ul>
                </div>


                <div class="col-lg-9">

                        <div class="admin-sss-page-form">
                            <form action="<?php echo e(route('company-update', $companyInfo->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>GSM No</label>
                                        <input type="text" class="form-control mb-3" name="phone" value="<?php echo e($companyInfo->phone); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mail</label>
                                        <input type="text" class="form-control mb-3" name="mail" value="<?php echo e($companyInfo->mail); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Facebook</label>
                                        <input type="text" class="form-control mb-3" name="facebook" value="<?php echo e($companyInfo->facebook); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Instagram</label>
                                        <input type="text" class="form-control mb-3" name="instagram" value="<?php echo e($companyInfo->instagram); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Twitter</label>
                                        <input type="text" class="form-control mb-3" name="twitter" value="<?php echo e($companyInfo->twitter); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>LinkedIn</label>
                                        <input type="text" class="form-control mb-3" name="linkedin" value="<?php echo e($companyInfo->linkedin); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tiktok</label>
                                        <input type="text" class="form-control mb-3" name="tiktok" value="<?php echo e($companyInfo->tiktok); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Youtube</label>
                                        <input type="text" class="form-control mb-3" name="youtube" value="<?php echo e($companyInfo->youtube); ?>">
                                    </div>
                                </div>



                                <label>Adres</label>
                                <input type="text" class="form-control mb-3" name="adres" value="<?php echo e($companyInfo->adress); ?>">

                                <label>Google Haritalar</label>
                                <textarea type="text" class="form-control mb-3" rows="5" name="google_maps"><?php echo e($companyInfo->google_maps); ?></textarea>


                                <button type="submit" class="btn btn-success btn-contact w-100">Güncelle</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/admin-panel/admin-contact.blade.php ENDPATH**/ ?>