

<?php $__env->startSection('title', __('Manage Register Link')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <label for="link-generate">
                            All Agents
                        </label>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Agent Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Request</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php if(is_object($agents) && count($agents) > 0): ?>
                                <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $each): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($each?->id); ?></td>
                                        <td><?php echo e($each?->name); ?></td>
                                        <td><?php echo e($each?->email); ?></td>
                                        <td><?php echo e($each?->phone); ?></td>

                                        <td>
                                            <?php if($each->status == 1): ?>
                                                <span class="btn btn-success">
                                                    Approved
                                                </span>
                                            <?php else: ?>
                                                <span class="btn btn-danger">
                                                    Pending
                                                </span>
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <form method="POST"
                                                action="<?php echo e(route('admin.agent.update', ['agent' => $each->id])); ?>">
                                                <input type="hidden" name="status" value="<?php echo e($each->status); ?>">
                                                <?php echo method_field('put'); ?>
                                                <?php echo csrf_field(); ?>
                                                <?php if($each->status == 1): ?>
                                                    <button type="submit" class="btn btn-danger">Make Pending</button>
                                                <?php else: ?>
                                                    <button type="submit" class="btn btn-success">Make Approved</button>
                                                <?php endif; ?>

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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\udcbd\resources\views/agents/index.blade.php ENDPATH**/ ?>