<?php if(auth()->guard()->check()): ?>
    <?php if(Auth::user()->rol == 1): ?>

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
            <span>Sipariş Bilgileri</span>
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
                            <a class="nav-link" href="<?php echo e(route('order-search')); ?>"><i class="bi bi-search"></i> Sipariş Arama </a>
                        </li>

                    </ul>
                </div>


                <div class="col-lg-9">
                    <div class="order-search mb-5">
                        <h3 class="mb-3">Sipariş Ara</h3>
                        <form action="<?php echo e(route('order-search-execute')); ?>" method="GET">
                            <input type="text" class="form-control mb-3" name="searchOrder" placeholder="Sipariş numarası, E-Posta veya Telefon No ile ara">
                            <button type="submit" class="btn btn-outline-success">Sipariş Kaydı Ara</button>
                        </form>
                    </div>

                    <?php if($resultSearch): ?>
                        <h4 class="mb-3">Arama Sonuçları</h4>
                        <div class="row">
                        <?php $__currentLoopData = $resultSearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 mb-3 ">
                                <div class="card shadow" style="font-size: 14px;">
                                    <div class="card-header">
                                        #<?php echo e($result->order_number); ?> - <?php echo e($result->name); ?> <?php echo e($result->surname); ?>

                                    </div>
                                    <div class="card-body">
                                        <p class="text-capitalize mb-2">Adres: <?php echo e($result->adress); ?> <?php echo e($result->city); ?> <?php echo e($result->country); ?></p>
                                        <p class="mb-2">Telefon: <?php echo e($result->phone); ?></p>
                                        <p>E-Posta: <?php echo e($result->email); ?></p>
                                        <a class="d-block mt-3 btn btn-sm btn-outline-success" href="<?php echo e(route('admin-siparis-detay', $result->order_number)); ?>">Detay Görüntüle</a>

                                    </div>
                                    <div class="card-footer">
                                        Sipariş Tarihi: <?php echo e($cDate = substr($result->created_at, 0, 16)); ?>

                                    </div>
                                </div>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>



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

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/admin-panel/admin-order-search.blade.php ENDPATH**/ ?>