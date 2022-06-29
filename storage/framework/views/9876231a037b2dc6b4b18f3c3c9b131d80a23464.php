<html>
  <head>
  <title>Particolari <?php echo $__env->yieldContent('title'); ?></title>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Source+Serif+Pro&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Source+Serif+Pro:wght@200&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script> 
        const BASE_URL="<?php echo e(url('/')); ?>";
    </script>
    <?php echo $__env->yieldContent('script'); ?>
  </head>
  <body>
       <header>
            <?php echo $__env->yieldContent('form'); ?>
        </header>
  </body>
</html><?php /**PATH C:\xamppn\htdocs\HW2\resources\views/layout/accesso.blade.php ENDPATH**/ ?>