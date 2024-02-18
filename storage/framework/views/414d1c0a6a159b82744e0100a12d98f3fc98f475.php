<?php $__env->startSection('title', 'Applications'); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <?php
        $users = DB::table('users')->get();
    ?>

    <div class="card application-form">
        <div class="card-header">
            <div class="d-flex">
                <h3 class="xs-title">Applications for Sanad</h3>
                <span class="ml-5">
                    <a href="<?php echo e(route('admin.applications')); ?>" class="btn btn-primary">
                        <i class="fa fa-refresh"></i> Refresh</a></span>
            </div>
            <hr>
            <form action="<?php echo e(route('admin.applications')); ?>" method="get">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tracking_no">Tracking Number</label>
                            <input type="text" name="tracking_no" class="form-control" placeholder="Tracking Number"
                                value="<?php echo e(request('tracking_no', null)); ?>">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control"
                                value="<?php echo e(request('start_date', null)); ?>">
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" class="form-control"
                                value="<?php echo e(request('end_date', null)); ?>">
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select</option>
                                        <option <?php if(request('status') == 'approved'): ?> selected <?php endif; ?> value="approved">approved
                                        </option>
                                        <option <?php if(request('status') == 'pending'): ?> selected <?php endif; ?> value="pending">pending
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-outline-primary" style="margin-top:30px;"
                                    id="filter" name="filter"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <div class="card-body">
            <span class="badge badge-dark p-2 mb-2" style="font-size: 100%;">
                Total: <?php echo e($application_count ?? null); ?></span>

            <table class="table table-hover table-bordered table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">Applicant</th>
                        <th class="text-center">Union</th>
                        <th class="text-center">Sanad Type</th>
                        <th class="text-center">Sanad Tracking No.</th>
                        <th class="text-center">Transaction Phone</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Payment Method</th>
                        <th class="text-center">Transaction No.</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $sanad = App\Models\Blog::find($application->sanad_id);
                            $union = App\Models\Union::find($application->union_id);

                        ?>
                        <tr>
                            <td class="text-center"> <?php echo e($application->applicant ?? 'N/A'); ?></td>
                            <td class="text-center"> <?php echo e($union->bn_name ?? 'N/A'); ?></td>
                            <td class="text-center"> <?php echo e($sanad->description ?? null); ?></td>
                            <td class="text-center"> <?php echo e($application->tracking_no ?? null); ?></td>
                            <td class="text-center"> <?php echo e($application->phone ?? null); ?></td>
                            <td class="text-center"> <?php echo e($application->amount ?? null); ?></td>
                            <td class="text-center"> <?php echo e($application->payment_method ?? null); ?></td>
                            <td class="text-center"> <?php echo e($application->transaction_no ?? null); ?></td>
                            <td class="text-center">
                                <span
                                    class="badge <?php if($application->status == 'pending'): ?> badge-danger <?php else: ?> badge-success <?php endif; ?>"
                                    style="font-size: 100%; padding:5px;">
                                    <?php echo e($application->status ?? null); ?></span>
                            </td>
                            <td class="d-flex p-4">

                                <?php if($logged_in_user->can('admin.sanad.status')): ?>
                                    <form action="<?php echo e(route('admin.application.status')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="application_id" value="<?php echo e($application->id); ?>">
                                        <?php if($application->status == 'pending'): ?>
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="btn btn-outline-success" data-toggle="tooltip"
                                                title='Accept Application'>Accept</button>
                                        <?php endif; ?>
                                        <?php if($application->status == 'approved'): ?>
                                            <input type="hidden" name="status" value="pending">
                                            <button type="submit" class="btn btn-outline-danger" data-toggle="tooltip"
                                                title='Reject Application'>Reject</button>
                                        <?php endif; ?>
                                    </form>
                                <?php endif; ?>


                                <a class="btn btn-primary ml-1" data-toggle="tooltip" title='View Details'
                                    href="<?php echo e(route('admin.application.detail', $application->id)); ?>">
                                    <i class="fa fa-info-circle"></i></a>
                                <?php if($logged_in_user->id == 1): ?>
                                    <form method="delete"
                                        action="<?php echo e(route('admin.application.delete', $application->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-danger ml-1 show_confirm"
                                            data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>
            <?php if($applications): ?>
                <?php echo e($applications->links()); ?>

            <?php endif; ?>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script type="text/javascript">
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                        title: `Are you sure you want to delete this record?`,
                        text: "If you delete this, it will be gone forever.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jafor Computer\Downloads\main_site\resources\views/backend/content/applications/view-application.blade.php ENDPATH**/ ?>