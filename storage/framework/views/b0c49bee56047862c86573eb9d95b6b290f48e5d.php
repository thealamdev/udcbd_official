
<?php $__env->startSection('title', __('Dashboard')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container" style="padding-top: 2%;">
        <div class="row">
            <div class="col-lg-12 m-auto text-center">
                <?php if($logged_in_user->register_for == 'এজেন্ট'): ?>
                    <h3 class="text-danger m-4">
                        সর্বনিন্ম ১০ জন ক্লায়েন্ট এবং ১০০০ টাকা জমা হলে টাকা উত্তলন করতে পারবেন।
                    </h3>
                <?php else: ?>
                    <h3 class="text-danger m-4">Welcome to your dashboard <?php echo e(auth()->user()->name); ?></h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\udcbd\resources\views/frontend/user/dashboard.blade.php ENDPATH**/ ?>