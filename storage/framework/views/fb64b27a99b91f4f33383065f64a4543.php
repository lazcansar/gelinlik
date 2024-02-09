<?php $__env->startSection('title'); ?> İletişim <?php $__env->stopSection(); ?>
<?php $__env->startSection('govde'); ?>


<section class="contact-page">

<div class="single-page-head">
    <div class="single-page-head-sub text-uppercase">
        Bize Ulaşın!
    </div>
    <div class="single-page-head-title">
        İletişim
    </div>
    <div class="single-page-head-content text-center">
        Beyazdusler.com web sayfamız üzerinden gelinlik<br> modellerine dair bize ulaşabilirsiniz.
    </div>
</div>

    <!--Maps-->
<div class="contact-google-maps mw-100">
    <?php echo $listContact[0]->google_maps; ?>

</div>


    <!--Maps-->


    <div class="container contact-bottom overflow-hidden">
        <div class="row">
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="contact-adress-title">
                    Adres
                </div>
                <div class="contact-adress-content">
                    <?php echo e($listContact[0]->adress); ?>

                </div>
                <div class="contact-adress-title">
                    İletişim
                </div>
                <div class="contact-adress-content">
                    <div class="contact-adress-line">
                        <span>Telefon:</span>
                        <?php echo e($listContact[0]->phone); ?>

                    </div>
                    <div class="contact-adress-line">
                        <span>E-Posta:</span>
                        <?php echo e($listContact[0]->mail); ?>

                    </div>
                </div>
                <div class="contact-adress-title">
                    Çalışma Saatlerimiz
                </div>
                <div class="contact-adress-content">
                    <p>Pazartesi – Cuma : 08:30 – 20:00</p>
                    <p>Cumartesi: 10:00 – 16:00</p>
                </div>
            </div>

            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6 col-sm-12">
                <div class="contact-form">
                    <div class="contact-form-title">
                        Bize Yazın
                    </div>
                    <div class="contact-form-sub">
                        Kişisel bilgileriniz 3. kişiler ile paylaşılmamaktadır. Lütfen zorunlu alanları doldurun.
                    </div>
                    <div class="contact-form-inputs">
                        <form action="" method="post">
                            <?php echo csrf_field(); ?>

                        <label for="adsoyad">Ad Soyad</label>
                        <input type="text" id="adsoyad" class="form-control mb-3" name="adsoyad">

                        <label for="eposta">E-Posta</label>
                        <input type="email" id="eposta" class="form-control mb-3" name="eposta">

                        <label for="konu">Konu</label>
                        <input type="text" id="konu" class="form-control mb-3" name="konu">

                        <label for="mesaj">Mesaj</label>
                        <textarea class="form-control mb-3" name="mesaj" rows="5"></textarea>
                        <button type="submit" class="btn btn-dark btn-contact rounded-0">Gönder</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/pages/contact.blade.php ENDPATH**/ ?>