

<?php $__env->startSection('title', __('Manage Register Link')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <label for="link-generate">
                            Agent Setting
                        </label>
                    </div>
                </div>

                <div class="card-body">
                    <form action="<?php echo e(route('admin.agentSetting.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mt-3">
                            <input type="hidden" name="id" value="<?php echo e($setting?->id); ?>">
                            <label for="min_amount">Minimum Amount</label>
                            <input type="number" name="min_amount" value="<?php echo e($setting?->min_amount); ?>" class="form-control"
                                placeholder="enter minimum amount">
                        </div>

                        <div class="mt-3">
                            <label for="min_amount">Minimum Client</label>
                            <input type="number" name="min_client" value="<?php echo e($setting?->min_client); ?>" class="form-control"
                                placeholder="enter minimum client">
                        </div>

                        <div class="mt-3">
                            <label for="min_amount">Referal Percentage</label>
                            <input type="number" name="discount_percentage" value="<?php echo e($setting?->discount_percentage); ?>"
                                class="form-control" placeholder="Referal Percentage">
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MSI_gaming\Downloads\project_final\project_final\main_site\resources\views/agents/settings/index.blade.php ENDPATH**/ ?>