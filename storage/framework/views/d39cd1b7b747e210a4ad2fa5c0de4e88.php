<?php $__env->startSection('title'); ?> Müşteri Hizmetleri <?php $__env->stopSection(); ?>
<?php $__env->startSection('govde'); ?>


<section class="costumer-page">
    <div class="single-page-head">
        <div class="single-page-head-sub text-uppercase">
            Müşteri Hizmetleri
        </div>
        <div class="single-page-head-title">
            Yasal Bilgiler
        </div>
        <div class="single-page-head-content text-center">
            Kullanım şartları, gizlilik politikası, kargo ve iade, çerez<br> politikası, kupon ve promosyon servisleri
        </div>
    </div>

<div class="container">
    <div class="costumer-main">
        <div class="row">


            <div class="col-lg-3">
                <!---Navs-->
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php if($customer): ?>
                        <button class="nav-link active" id="v-pills-<?php echo e($customer[0]->url); ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo e($customer[0]->url); ?>" type="button" role="tab" aria-controls="v-pills-<?php echo e($customer[0]->url); ?>" aria-selected="true"><?php echo e($customer[0]->title); ?></button>
                        <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($custom->id > 1): ?>
                                <button class="nav-link" id="v-pills-<?php echo e($custom->url); ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo e($custom->url); ?>" type="button" role="tab" aria-controls="v-pills-<?php echo e($custom->url); ?>" aria-selected="false"><?php echo e($custom->title); ?></button>
                            <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <!--navs-->
            </div>



            <div class="col-lg-9">
                <!---Content-->
                <div class="tab-content" id="v-pills-tabContent">
                    <?php if($customer): ?>
                        <div class="tab-pane fade show active" id="v-pills-<?php echo e($customer[0]->url); ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo e($customer[0]->url); ?>-tab" tabindex="0"><?php echo $customer[0]->content; ?></div>
                        <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($custom->id > 1): ?>
                            <div class="tab-pane fade" id="v-pills-<?php echo e($custom->url); ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo e($custom->url); ?>-tab" tabindex="0"><?php echo $custom->content; ?></div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </div>
                <!---Conetnt-->
            </div>


        </div>
    </div>
</div>



</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/pages/costumer.blade.php ENDPATH**/ ?>