

<?php $__env->startSection('title','- Shop online'); ?>

<?php $__env->startSection('script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/shop.css')); ?>"/> 
<script src='<?php echo e(asset('js/shop.js')); ?>' defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav_bar'); ?>
<div id="logo">Particolari - Clothing shop</div>
    <div id="link">
        <a href="<?php echo e(route('home')); ?>">Home</a>
        <?php if(session('userid')==NULL): ?>
            <a id='login' href="<?php echo e(route('login')); ?>">Login</a>
        <?php else: ?>
            <a id='user' href="<?php echo e(route('profile')); ?>"><img src='css/immagini/user.png'>
            <?php echo e($user['username']); ?> </a>
            <a id='carrello' href="<?php echo e(route('cart')); ?>">Carrello</a>
            <a id='logout' href="<?php echo e(route('logout')); ?>">Logout</a>
        <?php endif; ?>
    </div>
    <div class="hidden" id="menu_ext">
        <?php if(session('userid')==NULL): ?>
            <a id='login' href="<?php echo e(route('login')); ?>">Login</a>
        <?php else: ?>
            <a id='user' href="<?php echo e(route('profile')); ?>"><img src='css/immagini/user.png'>
            <?php echo e($user['username']); ?> </a>
            <a id='carrello' href="<?php echo e(route('cart')); ?>">Carrello</a>
            <a id='logout' href="<?php echo e(route('logout')); ?>">Logout</a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <h1><strong>Shop Online</strong><br/>
        <em>Spedizioni in tutta Italia in 48 ore!</em><br/>
    </h1>
    <form method="get" name="search">
        <label>
            <input type="text" id="testo" name="ricerca" >
            <input type="submit" value="Cerca">
        </label>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppn\htdocs\HW2\resources\views/shop.blade.php ENDPATH**/ ?>