
<?php $__env->startSection('title', __('Dashboard')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container" style="padding-top: 2%;">
        <div class=" row justify-content-center">
            <div class="col-md-12">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.card','data' => []]); ?>
<?php $component->withName('frontend.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                     <?php $__env->slot('header', null, []); ?> 
                        <h2 class="xs-title">সেবাসমূহ</h2>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('body', null, []); ?> 
                        hello
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
            <!--col-md-10-->
        </div>
        <!--row-->
    </div>
    <!--container-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jafor Computer\Downloads\main_site\resources\views/frontend/user/dashboard.blade.php ENDPATH**/ ?>