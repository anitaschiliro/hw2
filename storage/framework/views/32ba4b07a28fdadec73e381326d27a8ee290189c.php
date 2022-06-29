

<?php $__env->startSection('title', '- Registrati'); ?>

<?php $__env->startSection('script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/signin.css')); ?>"/> 
<script src='<?php echo e(asset('js/signin.js')); ?>' defer></script>
<script type="text/javascript">
    const SIGNIN_ROUTE = "<?php echo e(route('signin')); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
<div id="logo">Particolari</div>
        <form name="signin" method="post" enctype="multipart/form-data" autocomplete="off" action="<?php echo e(route('newUser')); ?>">
            <?php echo csrf_field(); ?>
                <h1>Registrati</h1>
                <p id="nome">
                    <label>Nome</label>
                    <input type="text" name="nome" value='<?php echo e(old('nome')); ?>'>
                    <span></span>
                </p>
                <p id="cognome">
                    <label>Cognome</label>
                    <input type="text" name="cognome" value='<?php echo e(old('cognome')); ?>'>
                    <span></span>
                </p>
                <p id="email">
                    <label>E-Mail</label>
                    <input type="text" name="email" value='<?php echo e(old('email')); ?>'>
                    <span></span>
                </p>
                <p id="username">
                    <label>Username</label>
                    <input type="text" name="username" value='<?php echo e(old('username')); ?>'>
                    <span></span> 
                </p>
                <p id="password">
                    <label>Password</label>
                    <input type="password" name="password">
                    <span></span>
                </p>
                <p id="conferma">
                    <label>Conferma Password</label>
                    <input type="password" name="confpassword">
                    <span></span>
                </p>
                <p id="consenti"> 
                    <label>
                        <input type='checkbox' name='allow' value="1"<?php echo e((! empty(old('allow')) ? 'checked' : '')); ?>>
                        <label for='allow'>Acconsento al trattamento dei dati personali</label>
                    </label>
                </p>
                <p id="registrati">
                    <input id="accesso" type='submit' value="Registrati">
                </p>
                <p>
                    Hai già un account?<a href="<?php echo e(route('login')); ?>">Accedi</a>
                </p>
         </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.accesso', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppn\htdocs\HW2\resources\views/signin.blade.php ENDPATH**/ ?>