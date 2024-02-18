

<?php $__env->startSection('title', 'Balance Top Up'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <label>Bkash Recharge by Super Admin</label>
                </div>

                <div class="card-body">
                    <form action="<?php echo e(route('admin.setting.rechargeBalanceStore')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mt">
                            <input type="hidden" name="user_id" value="<?php echo e($id); ?>">
                            <input type="number" name="amount" placeholder="enter amount" class="form-control">
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\udcbd\resources\views/backend/content/recharge-balance/index.blade.php ENDPATH**/ ?>