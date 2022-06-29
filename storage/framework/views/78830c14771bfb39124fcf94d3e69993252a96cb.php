

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset('js/home.js')); ?>' defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title','- Home'); ?>

<?php $__env->startSection('nav_bar'); ?>
<div id="logo">Particolari - Clothing shop</div>
    <div id="link">
        <a href="<?php echo e(route('home')); ?>">Home</a>
        <a id="shop" href="<?php echo e(route('shop')); ?>">Shop Online</a>
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
        <a id="shop" href="<?php echo e(route('shop')); ?>">Shop Online</a>
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
<h1><strong>
            <?php if(session('userid')!=NULL): ?>
                Benvenuto, <?php echo e($user['username']); ?>!
            <?php else: ?>
                La moda a casa tua!
            <?php endif; ?>
        </strong></br>
          <em>Scopri l'abbigliamento adatto al tuo bambino.</em><br/>
          <a class="button" href="<?php echo e(route('shop')); ?>">Scopri di più</a>

        </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="main">
    <h1>Tutto di cui hai bisogno lo trovi da noi.</h1>
    <p >
      10 anni di esperienza nel settore dell'abbigliamento. <br>
      Marchi 100% designed and made in Italy.
    </p>
</div>
<div id="dettagli">

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppn\htdocs\HW2\resources\views/home.blade.php ENDPATH**/ ?>