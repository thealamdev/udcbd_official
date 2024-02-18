

<?php $__env->startSection('title', __('Manage Register Link')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <label for="link-generate">
                        Link Generate for Client Register
                    </label>
                </div>

                <div class="card-body">
                    <a href="<?php echo e($link); ?>">Link for Register</a> <?php echo e($link); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jafor Computer\Downloads\main_site\resources\views/agents/links/link-generate.blade.php ENDPATH**/ ?>