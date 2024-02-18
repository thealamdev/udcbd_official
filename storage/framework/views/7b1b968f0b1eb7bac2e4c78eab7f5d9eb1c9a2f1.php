

<?php $__env->startSection('title', __('All transactions')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <label for="link-generate">
                            All transactions
                        </label>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Transaction ID</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Date</th>
                        </thead>

                        <tbody>
                            <?php if(is_object($transactions) && count($transactions) > 0): ?>
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $each): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($each?->id); ?></td>
                                        <td><?php echo e($each?->user?->name); ?></td>
                                        <td><?php echo e($each?->user?->phone); ?></td>
                                        <td><?php echo e($each?->transaction_id); ?></td>
                                        <td><?php echo e($each?->amount); ?></td>
                                        <td><?php echo e($each?->method); ?></td>
                                        <td><?php echo e($each?->created_at->diffForHumans()); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>

                        <tfoot>
                            <tr>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\udcbd\resources\views/agents/transaction/index.blade.php ENDPATH**/ ?>