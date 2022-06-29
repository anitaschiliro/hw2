<!DOCTYPE html>
<html>
  <head>
    <title> Particolari <?php echo $__env->yieldContent('title'); ?> </title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Source+Serif+Pro&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Source+Serif+Pro:wght@200&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script> 
        const BASE_URL="<?php echo e(url('/')); ?>";
        const WEATHER_ROUTE="<?php echo e(route('weather')); ?>";
        const HOME_ROUTE="<?php echo e(route('home')); ?>"
    </script>
    <link rel="stylesheet" href="<?php echo e(asset('css/base.css')); ?>"/> 
    <script src='<?php echo e(asset('js/base.js')); ?>' defer></script>
    <?php echo $__env->yieldContent('script'); ?>
  </head>
  <body>
      <header>
        <nav>
        <?php echo $__env->yieldContent('nav_bar'); ?>
        <div id="menu">
                  <div></div>
                  <div></div>
                  <div></div>
            </div>
        </nav>
      <?php echo $__env->yieldContent('header'); ?>
      </header>

      <section>
      <?php echo $__env->yieldContent('content'); ?>
      </section>
      <footer>
        <p><strong>Particolari's Shop - Clothing and more</strong><br/>
        Anita Schilirò - 1000001476</p>
        <div id="weather"></div>
      </footer>
  </body>
</html><?php /**PATH C:\xamppn\htdocs\HW2\resources\views/layout/app.blade.php ENDPATH**/ ?>