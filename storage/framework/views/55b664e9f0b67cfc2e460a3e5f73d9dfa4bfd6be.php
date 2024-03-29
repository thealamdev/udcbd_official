<?php $attributes = $attributes->exceptProps(['active' => '', 'text' => '', 'hide' => false, 'icon' => false,  'permission' => false]); ?>
<?php foreach (array_filter((['active' => '', 'text' => '', 'hide' => false, 'icon' => false,  'permission' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if($permission): ?>
    <?php if($logged_in_user->can($permission)): ?>
        <?php if(!$hide): ?>
            <a <?php echo e($attributes->merge(['href' => '#', 'class' => $active])); ?>><?php if($icon): ?><i class="<?php echo e($icon); ?>"></i> <?php endif; ?><?php echo e(strlen($text) ? $text : $slot); ?></a>
        <?php endif; ?>
    <?php endif; ?>
<?php else: ?>
    <?php if(!$hide): ?>
        <a <?php echo e($attributes->merge(['href' => '#', 'class' => $active])); ?>><?php if($icon): ?><i class="<?php echo e($icon); ?>"></i> <?php endif; ?><?php echo e(strlen($text) ? $text : $slot); ?></a>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\Users\MSI_gaming\Downloads\project_final\project_final\main_site\resources\views/components/utils/link.blade.php ENDPATH**/ ?>