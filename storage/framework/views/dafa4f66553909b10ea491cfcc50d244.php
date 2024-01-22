<?php $__env->startSection('title'); ?> Giriş Yap <?php $__env->stopSection(); ?>
<?php $__env->startSection('govde'); ?>



    <section class="login-page">
        <div class="container">
            <div class="login-title">
                Giriş Yap
            </div>
            <div class="login-sub-info">
                Hesabın yok mu? <a href="<?php echo e(route('register-page')); ?>">Hemen hesap oluştur.</a>
            </div>

            <div class="login-form">
                <form action="<?php echo e(route('login-insert')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <label for="email">E-Posta*</label>
                    <input type="email" class="form-control mb-3" name="email" required>

                    <label for="password">Şifre*</label>
                    <input type="password" class="form-control mb-3" name="password" required>
                    <a class="d-block mb-3" href="">Şifreni mi unuttun?</a>

                    <button type="submit" class="d-block btn btn-success">Giriş Yap</button>
                </form>
            </div>


        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/auth/login.blade.php ENDPATH**/ ?>