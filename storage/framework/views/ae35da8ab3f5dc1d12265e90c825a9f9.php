<?php $__env->startSection('title'); ?> Sıkça Sorulan Sorular <?php $__env->stopSection(); ?>
<?php $__env->startSection('govde'); ?>


<section class="sss-page">

<div class="single-page-head">
    <div class="single-page-head-sub text-uppercase">
        Sıkça Sorulan Sorular
    </div>
    <div class="single-page-head-title">
        Soru & Cevap
    </div>
    <div class="single-page-head-content text-center">
        En çok merak edilen konular hakkında sorulan soruları ve<br> cevaplarını bulabilirisiniz.
    </div>
</div>


    <div class="container">
        <div class="d-flex align-items-center flex-column" style="padding: 50px 0;">
            <div class="sss-accordion-title">
                Sıkça Sorulan Sorular
            </div>
        <!---Accordion-->
        <div class="w-50">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php if($sss): ?>
                <?php $__currentLoopData = $sss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo e($ss->id); ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo e($ss->id); ?>">
                                <?php echo e($ss->title); ?>

                            </button>
                        </h2>
                        <div id="flush-collapse<?php echo e($ss->id); ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"><?php echo $ss->content; ?></div>
                        </div>
                    </div>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </div>

            <div class="other-ask text-center">
                <p class="mt-5">Farklı bir sorunuz mu var?</p>
                <a href="<?php echo e(route('contact-page')); ?>" class="btn btn-dark btn-contact mt-4">İletişim</a>
            </div>

        </div>

        <!---Accordion-->
        </div>
    </div>



</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/pages/sss.blade.php ENDPATH**/ ?>