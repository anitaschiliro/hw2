

<?php $__env->startSection('title','- Ordina ora'); ?>

<?php $__env->startSection('script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/ordine.css')); ?>"/> 
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
<h1>Compila i campi per procedere all'ordine</h1>
          <form name="ordine" method="post" action="<?php echo e(route('orderNow')); ?>">
            <?php echo csrf_field(); ?>
            <p>Inserisci indirizzo di spedizione</p>
            <p>
              <label>Via <input type="text" name="via"></label>
            </p>
            <p>
              <label>Numero<input type=text name="numciv"></label>
            </p>
            <p>
              <label>Città<input type="text" name="citta"></label>
            </p>
            <p>
              <label> CAP<input type="text" name="cap"></label>
            </p>
            <p>
              <input type="submit" name="ordina" value="Ordina ora">
            </p>
            </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppn\htdocs\HW2\resources\views/order.blade.php ENDPATH**/ ?>