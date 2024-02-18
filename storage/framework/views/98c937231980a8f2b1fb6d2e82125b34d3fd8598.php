

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

                        <div>
                            <span class="text-success fs-3">Balance :
                                <?php echo e($total_debit * ($setting->discount_percentage * 0.01)); ?> tk</span>
                            <form action="<?php echo e(route('frontend.user.agent.withdraw')); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" value="<?php echo e($total_debit * ($setting->discount_percentage * 0.01)); ?>"
                                    name="amount">
                                <?php if(is_object($requested_client)): ?>
                                    <?php $__currentLoopData = $requested_client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $each): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input type="hidden" name="debit_id[]" value="<?php echo e($each->id); ?>">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if($total_debit * ($setting->discount_percentage * 0.01) >= $setting?->min_amount): ?>
                                    <button type="submit" class="btn btn-sm btn-success">WithDraw</button>
                                <?php endif; ?>
                                <?php if(is_object($processing) && count($processing) > 0): ?>
                                    <span class="btn btn-danger">Processing amount
                                        <?php echo e(collect($processing)->sum('amount') * ($setting->discount_percentage * 0.01)); ?>tk</span>
                                    <br>
                                <?php endif; ?>
                            </form>

                        </div>
                    </div>
                    <label for="link-generate">

                    </label>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Client Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Balance</th>
                            <th>Debit</th>
                        </thead>

                        <tbody>
                            <?php
                                $total = 0;
                            ?>
                            <?php if(is_object($clients?->agent_client) && count($clients?->agent_client) > 0): ?>
                                <?php $__currentLoopData = $clients?->agent_client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $each): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $total += $each?->user?->balance?->balance;
                                    ?>
                                    <tr>
                                        <td><?php echo e($each?->id); ?></td>
                                        <td><?php echo e($each?->user?->name); ?></td>
                                        <td><?php echo e($each?->user?->email); ?></td>
                                        <td><?php echo e($each?->user?->phone); ?></td>
                                        <td><?php echo e($each?->user?->balance?->balance ?? 0); ?> tK</td>
                                        <td><?php echo e(collect($each?->user?->balance?->debit)->sum('amount') ?? 0); ?> tK</td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td>Total amount</td>
                                <td><?php echo e($total); ?> tK</td>
                                <td><?php echo e($total_debit); ?> tK</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jafor Computer\Downloads\main_site\resources\views/agents/links/clients.blade.php ENDPATH**/ ?>