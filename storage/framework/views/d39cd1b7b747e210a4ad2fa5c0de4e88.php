<?php if($customerDetail): ?>

    <?php $__env->startSection('title'); ?> <?php echo e($customerDetail->title); ?> <?php $__env->stopSection(); ?>
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
                    <?php echo e($customerDetail->title); ?>

                </div>
            </div>

            <div class="container">
                <div class="costumer-main">
                    <div class="row">


                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12">
                            <!---Navs-->
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <?php $__currentLoopData = $customerLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customLink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a class="nav-link" href="<?php echo e(route('customer-page-detail', $customLink->url)); ?>"><?php echo e($customLink->title); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <!--navs-->
                        </div>



                        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-12">
                            <!---Content-->
                            <div class="tab-content">
                                <?php echo $customerDetail->content; ?>

                            </div>
                            <!---Conetnt-->
                        </div>


                    </div>
                </div>
            </div>



        </section>

    <?php $__env->stopSection(); ?>

<?php else: ?>


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
                    <div class="single-page-head-content text-center text-capitalize">
                        Gizlilik politikası, üyelik sözleşmesi, mesafeli satış sözleşmesi ve daha fazlası...
                    </div>
                </div>

                <div class="container">
                    <div class="costumer-main">
                        <div class="row">


                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12">
                                <!---Navs-->
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customLink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="nav-link" href="<?php echo e(route('customer-page-detail', $customLink->url)); ?>"><?php echo e($customLink->title); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <!--navs-->
                            </div>



                            <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-12">
                                <!---Content-->
                                <div class="tab-content">
                                    <div class="alert alert-warning"> Lütfen sol alanda yer alan başlıklardan birini seçin.</div>
                                </div>
                                <!---Conetnt-->
                            </div>


                        </div>
                    </div>
                </div>



            </section>

        <?php $__env->stopSection(); ?>


<?php endif; ?>


<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/pages/costumer.blade.php ENDPATH**/ ?>