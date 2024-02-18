

<?php $__env->startSection('title', __('Manage Register Link')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 m-auto text-center">
            <h3 class="text-danger m-4">সর্বনিন্ম ১০ জন ক্লায়েন্ট এবং ১০০০ টাকা জমা হলে টাকা উত্তলন করতে পারবেন।</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <label for="link-generate">
                        Link Generate for Client Register
                    </label>
                </div>

                <div class="card-body">
                    <a style="font-size: 20px" href="#">Link for client Register: </a> <h5> <?php echo e($link); ?></h5>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\udcbd\resources\views/agents/links/link-generate.blade.php ENDPATH**/ ?>