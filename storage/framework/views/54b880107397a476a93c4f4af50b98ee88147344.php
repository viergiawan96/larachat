<?php $__env->startSection('meta'); ?>
<meta name="user-id" content="<?php echo e(Auth::user()->id); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('app'); ?>
<script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Laravel Messager</div>
                <div id="app" class="card-body">
                    <app-chat><app-chat/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\angga\larachat\resources\views/home.blade.php ENDPATH**/ ?>