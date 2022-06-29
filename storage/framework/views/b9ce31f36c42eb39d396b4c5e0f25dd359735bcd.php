

<?php $__env->startSection('title','- Il tuo profilo'); ?>

<?php $__env->startSection('script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/profilo.css')); ?>"/> 
<script src='<?php echo e(asset('js/profilo.js')); ?>' defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav_bar'); ?>
<div id="logo">Particolari - Clothing shop</div>
            <div id="link">
                <a href="<?php echo e(route('home')); ?>">Home</a>
                <a id="shop" href="<?php echo e(route('shop')); ?>">Shop Online</a>
                <a id='carrello' href="<?php echo e(route('cart')); ?>">Carrello</a>
                <a id='logout' href="<?php echo e(route('logout')); ?>">Logout</a>
            </div>
            <div class="hidden" id="menu_ext">
                <a href="<?php echo e(route('home')); ?>">Home</a>
                <a id="shop" href="<?php echo e(route('shop')); ?>">Shop Online</a>
                <a id='carrello' href="<?php echo e(route('cart')); ?>">Carrello</a>
                <a id='logout' href="<?php echo e(route('logout')); ?>">Logout</a>
            </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
        <img src='css/immagini/user.png'>
        <h1><?php echo e($user['nome']); ?> <?php echo e($user['cognome']); ?></h1>
        <p> <?php echo e($user['username']); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppn\htdocs\HW2\resources\views/profile.blade.php ENDPATH**/ ?>