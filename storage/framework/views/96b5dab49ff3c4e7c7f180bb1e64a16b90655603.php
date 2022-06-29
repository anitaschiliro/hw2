

<?php $__env->startSection('title', '- Accedi'); ?>

<?php $__env->startSection('script'); ?>
<link rel="stylesheet" href="<?php echo e(url('css/login.css')); ?>"/> 
<script src='<?php echo e(url('js/login.js')); ?>' defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
<div id="logo">Particolari</div>
<form name="login" method="post" action="<?php echo e(route('login')); ?>">
    <?php echo csrf_field(); ?>
    <h1> Effettua il Login</h1>
    <p>
        <label>Username<input type="text" name="username"></label>
    </p>
    <p>
        <label>Password<input type="password" name="password"></label>
    </p>
    <p>
        <label><input id="accesso" type='submit' value="Accedi"></label>
    </p>
    <p>Non hai un account? <a href="<?php echo e(route('signin')); ?>">Registrati</a></p>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.accesso', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppn\htdocs\HW2\resources\views/login.blade.php ENDPATH**/ ?>