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
            <?php if($customerAll): ?>
                <a href="<?php echo e(route('admin-home')); ?>">Admin Paneli</a>
                <i class="bi bi-arrow-right-short"></i>
                <span>Müşteri Hizmetleri</span>
            <?php elseif($customerInsert): ?>
                <a href="<?php echo e(route('admin-home')); ?>">Admin Paneli</a>
                <i class="bi bi-arrow-right-short"></i>
                <a href="<?php echo e(route('customer-view')); ?>">Müşteri Hizmetleri</a>
                <i class="bi bi-arrow-right-short"></i>
                <span>Sayfa Ekle</span>
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
                            <a class="nav-link" href="<?php echo e(route('customer-view')); ?>"><i class="bi bi-file-fill"></i> Kayıtlı Sayfalar</a>
                        </li>
                        <li class="nav-item border-bottom">
                            <a class="nav-link" href="<?php echo e(route('customer-insert')); ?>"><i class="bi bi-upload"></i> Sayfa Ekle</a>
                        </li>
                    </ul>
                </div>


                <div class="col-lg-9">


                    <!----------->

                    <?php if($customerDetail): ?>
                        <div class="admin-sss-page-form">
                            <div class="alert text-center bg-secondary text-white">
                                - <?php echo e($customerDetail->title); ?> - isimli kaydı güncelliyorsunuz...
                            </div>
                            <form action="<?php echo e(route('customer-update', $customerDetail->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <label for="sss-title">Müşteri Hizmetleri Sayfa Başlığı *</label>
                                <input type="text" name="customTitle" value="<?php echo e($customerDetail->title); ?>" class="form-control mb-4">

                                <label for="sss-title">URL *</label>
                                <input type="text" name="customUrl" value="<?php echo e($customerDetail->url); ?>" class="form-control mb-4">

                                <label for="sss-content">İçerik...</label>
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
                                <textarea id="sss-content" name="customContent"><?php echo e($customerDetail->content); ?></textarea>
                                <button type="submit" class="btn btn-success mt-3 w-100" style="background-color: #C8815F; border-color: #C8815F; padding: 10px 0;">Güncelle</button>
                            </form>
                        </div>
                    <?php endif; ?>




                    <!---------->

                    <?php if($customerAll): ?>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Sayfa Başlık</th>
                            <th>Eylem</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($customerAll): ?>
                            <?php $__currentLoopData = $customerAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listPage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($listPage->title); ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="<?php echo e(route('customer-detail', $listPage->id)); ?>">Güncelle</a>
                                        <a class="btn btn-danger" onclick="return confirm('Silmek istediğinize emin misiniz?')" href="<?php echo e(route('customer-delete', $listPage->id)); ?>">Sil</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>

                    </table>
                    <?php endif; ?>


                    <!---------->
                    <?php if($customerInsert): ?>
                        <div class="admin-sss-page-form">
                            <form action="<?php echo e(route('customer-insert-db')); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <label for="sss-title">Müşteri Hizmetleri Sayfa Başlığı *</label>
                                <input type="text" name="customTitle" placeholder="Örn. Gizlilik Politikası" class="form-control mb-4">

                                <label for="sss-title">URL *</label>
                                <input type="text" name="customUrl" placeholder="gizlilik-politikasi" class="form-control mb-4">

                                <label for="sss-content">İçerik...</label>
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
                                <textarea id="sss-content" name="customContent" placeholder="Gizlilik ve güvenlik politikası..."></textarea>
                                <button type="submit" class="btn btn-success mt-3 w-100" style="background-color: #C8815F; border-color: #C8815F; padding: 10px 0;">Kayıt Ekle</button>
                            </form>
                        </div>
                    <?php endif; ?>


                    <!---------->

                </div>
            </div>
        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/admin-panel/admin-musteri-hizmetleri.blade.php ENDPATH**/ ?>