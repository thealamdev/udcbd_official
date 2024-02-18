

<?php $__env->startSection('title', __('Manage Register Link')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <label for="link-generate">
                            Clients of <span class="text-danger"><?php echo e(auth()->user()->name); ?></span>
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
                            <th>Balance</th>
                            <th>Request</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php if(is_object($withdrawRequest) && count($withdrawRequest) > 0): ?>
                                <?php $__currentLoopData = $withdrawRequest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $each): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($each?->user->id); ?></td>
                                        <td><?php echo e($each?->user->name); ?></td>
                                        <td><?php echo e($each?->user->email); ?></td>
                                        <td><?php echo e($each?->user->phone); ?></td>
                                        <td><?php echo e($each?->requested_amount); ?></td>
                                        <td>
                                            <span
                                                class="btn btn-success"><?php echo e($each?->status == 'pending' ? 'Pending' : 'Approved'); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <form method="POST"
                                                action="<?php echo e(route('admin.agent.withDrawRequestExecute', ['id' => $each->id])); ?>">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-success">Approved</button>
                                            </form>
                                        </td>
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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jafor Computer\Downloads\main_site\resources\views/agents/links/withdraw-request.blade.php ENDPATH**/ ?>