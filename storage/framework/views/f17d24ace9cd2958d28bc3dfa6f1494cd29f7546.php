

<?php $__env->startSection('title', __('Manage Register Link')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-11 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <label for="link-generate">
                            Withdraw Requests
                        </label>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Client Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Method</th>
                            <th>Comments</th>
                            <th>Balance</th>
                            <th>Request</th>
                            <th>Action</th>
                            <th>Prove</th>
                            <th>Prove Detail</th>
                            <th>Requested Time</th>
                            <th>Approval Time</th>
                        </thead>

                        <tbody>
                            <?php if(is_object($withdrawRequest) && count($withdrawRequest) > 0): ?>
                                <?php $__currentLoopData = $withdrawRequest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $each): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($each?->user->id); ?></td>
                                        <td><?php echo e($each?->user->name); ?></td>
                                        <td><?php echo e($each?->user->email); ?></td>
                                        <td><?php echo e($each?->withdrawRequest?->phone); ?></td>
                                        <td><?php echo e($each?->withdrawRequest?->method); ?></td>
                                        <td title="<?php echo e($each?->withdrawRequest?->comments); ?>">
                                            <?php echo e(Str::limit($each?->withdrawRequest?->comments, 15, '...')); ?></td>
                                        <td><?php echo e($each?->requested_amount); ?></td>
                                        <td>
                                            <?php if($each?->status == 'pending'): ?>
                                                <span class="btn btn-danger">Pending
                                                </span>
                                            <?php else: ?>
                                                <span class="btn btn-success">Approved
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <form method="POST"
                                                action="<?php echo e(route('admin.agent.withDrawRequestExecute', ['id' => $each->id])); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php if($each?->status == 'pending'): ?>
                                                    <button type="submit" class="btn btn-success">Make Approve</button>
                                                <?php elseif($each?->status == 'rejected'): ?>
                                                    <button type="button" class="btn btn-danger">Rejected</button>
                                                <?php else: ?>
                                                    <button type="button" disabled
                                                        class="btn btn-primary">Approved</button>
                                                <?php endif; ?>
                                            </form>

                                        <td>
                                            <a href="<?php echo e(route('admin.agent.withdrawProve', ['id' => $each?->id])); ?>"
                                                class="btn btn-primary">Withdraw Prove</a>
                                        </td>
                                        <td>
                                            <p title="<?php echo e($each?->withdrawProve?->prove); ?>"><?php echo e(Str::limit($each?->withdrawProve?->prove, 20, '...')); ?></p>
                                        </td>
                                        </td>
                                        <td><?php echo e($each?->created_at->diffForHumans()); ?></td>
                                        <?php if($each?->status == 'approved'): ?>
                                            <td><?php echo e($each?->updated_at->diffForHumans()); ?></td>
                                        <?php else: ?>
                                            <td>--</td>
                                        <?php endif; ?>

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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\udcbd\resources\views/agents/links/withdraw-request.blade.php ENDPATH**/ ?>