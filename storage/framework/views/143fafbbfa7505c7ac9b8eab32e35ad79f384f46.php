<?php $__env->startSection('title', __('User Management')); ?>

<?php $__env->startSection('breadcrumb-links'); ?>
    <?php echo $__env->make('backend.auth.user.includes.breadcrumb-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.backend.card','data' => []]); ?>
<?php $component->withName('backend.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('header', null, []); ?> 
            <?php echo app('translator')->get('User Management'); ?>
         <?php $__env->endSlot(); ?>

        <?php if($logged_in_user->hasAllAccess()): ?>
             <?php $__env->slot('headerActions', null, []); ?> 
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['icon' => 'c-icon cil-plus','class' => 'card-header-action','href' => route('admin.auth.user.create'),'text' => __('Create User')]]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['icon' => 'c-icon cil-plus','class' => 'card-header-action','href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.auth.user.create')),'text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Create User'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
             <?php $__env->endSlot(); ?>
        <?php endif; ?>

         <?php $__env->slot('body', null, []); ?> 
            <div style="overflow-x:auto;">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Type</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Register For</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Union</th>
                            <th class="text-center">Permissions</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $union = App\Models\Union::find($user->union_id);
                            ?>
                            <tr>
                                <td class="text-center"><?php echo e($user->type ?? 'N/A'); ?></td>
                                <td class="text-center"><?php echo e($user->name ?? 'N/A'); ?></td>
                                <td class="text-center">
                                    <span class="badge badge-dark p-2" style="font-size: 100%;">
                                        <?php echo e($user->register_for ?? 'N/A'); ?></span>
                                </td>
                                <td class="text-center"><?php echo e($user->phone ?? 'N/A'); ?></td>
                                <td class="text-center"><?php echo e($user->email ?? 'N/A'); ?></td>
                                <td class="text-center"><?php echo e($union->bn_name ?? 'N/A'); ?></td>
                                <td class="text-center"><?php echo $user->permissions_label; ?></td>
                                <td class="text-center"><?php echo $__env->make('backend.auth.user.includes.actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <script>
        new DataTable('#example');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jafor Computer\Downloads\main_site\resources\views/backend/auth/user/index.blade.php ENDPATH**/ ?>