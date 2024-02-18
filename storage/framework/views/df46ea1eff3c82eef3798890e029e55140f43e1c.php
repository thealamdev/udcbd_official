<form method="post" <?php echo e($attributes->merge(['action' => '#', 'class' => 'form-horizontal'])); ?>>
    <?php echo csrf_field(); ?>

    <?php echo e($slot); ?>

</form>
<?php /**PATH C:\Users\MSI_gaming\Downloads\project_final\project_final\main_site\resources\views/components/forms/post.blade.php ENDPATH**/ ?>