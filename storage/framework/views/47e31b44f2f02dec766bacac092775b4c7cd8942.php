

<?php $__env->startSection('title', __('All transactions')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <label for="link-generate">
                            Add prove of withdraw
                        </label>
                    </div>

                </div>

                <div class="card-body">
                    <form action="<?php echo e(route('admin.agent.withdrawProveStore')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mt-3">
                            <input type="hidden" name="withdraw_id" value="<?php echo e($id); ?>">
                            <textarea name="prove" class="form-control" cols="30" rows="10"
                                placeholder="enter the prove of transaction"><?php echo e($withdraw_prove?->prove); ?></textarea>
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\udcbd\resources\views/agents/withdraw/prove.blade.php ENDPATH**/ ?>