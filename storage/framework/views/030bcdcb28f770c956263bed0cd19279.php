<?php $__env->startSection('title'); ?> Kayıt Ol <?php $__env->stopSection(); ?>
<?php $__env->startSection('govde'); ?>


    <?php if(session('register')): ?>
        <div class="container mt-5">
            <div class="alert alert-success"><?php echo e(session('register')); ?></div>
        </div>
    <?php endif; ?>
    <?php if(session('access')): ?>
        <div class="container mt-5">
            <div class="alert alert-success"><?php echo e(session('access')); ?></div>
        </div>
    <?php endif; ?>
    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="container mt-5">
            <div class="alert alert-success rounded-0"><?php echo e($message); ?></div>
        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <section class="login-page">
        <div class="container">
            <div class="login-title">
                Kayıt Ol
            </div>
            <div class="login-sub-info">
                Hesabın var mı? <a href="<?php echo e(route('login-page')); ?>">Giriş Yap.</a>
            </div>

            <div class="login-form">

                <form action="<?php echo e(route('register-insert')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <label for="ad">Ad*</label>
                    <input type="text" class="form-control mb-3" name="name" required>

                    <label for="soyad">Soyad*</label>
                    <input type="text" class="form-control mb-3" name="surname" required>

                    <label for="email">E-Posta*</label>
                    <input type="email" class="form-control mb-3" name="email" required>

                    <label for="password">Şifre*</label>
                    <input type="password" class="form-control mb-3" name="password" required>
                    <input class="d-inline-block" type="checkbox" id="onay" name="onay"> <label for="onay" class="d-inline-block">Onaylıyorum <a href="">Şartlar</a> ve <a href="">Gizlilik</a> </label>

                    <button type="submit" class="d-block btn btn-success mt-3">Kayıt Ol</button>
                </form>
            </div>


        </div>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/gelinlik/resources/views/auth/register.blade.php ENDPATH**/ ?>