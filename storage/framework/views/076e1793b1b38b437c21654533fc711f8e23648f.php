<!-- Main Sidebar Container -->
<link href="<?php echo e(mix('css/backend.css')); ?>" rel="stylesheet">
<?php echo \Livewire\Livewire::styles(); ?>

<aside class="main-sidebar sidebar-light-cyan elevation-3" style="height: 175%;">
    <div class="w-100 text-center py-3 border-bottom">
        <a href="<?php echo e(route('frontend.user.account')); ?>">
            <div class="rounded-circle d-inline-block adm-profile-container"><img src="/img/business.png" alt="image"
                    class="rounded-circle elevation-2" style="width:70px;height:70px;"></div>
        </a>
        <p class="text-center text-color-2 mt-2 mb-0 font-17 font-md-15 font-medium">
            <?php echo e($logged_in_user->name ?? 'User'); ?>

        </p>
    </div>

    <div class="sidebar">
        <nav class="mt-2">

            <?php if($logged_in_user->register_for !== 'এজেন্ট'): ?>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link-sidebar','data' => ['href' => route('frontend.user.dashboard'),'text' => __('ড্যাশবোর্ড'),'icon' => 'nav-icon icon-star','active' => activeClass(Route::is('frontend.user.dashboard')),'class' => 'nav-link']]); ?>
<?php $component->withName('utils.link-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.user.dashboard')),'text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('ড্যাশবোর্ড')),'icon' => 'nav-icon icon-star','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(activeClass(Route::is('frontend.user.dashboard'))),'class' => 'nav-link']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link-sidebar','data' => ['href' => route('frontend.user.union.info'),'text' => __('ইউনিয়ন তথ্য'),'icon' => 'nav-icon icon-star','active' => activeClass(Route::is('frontend.user.union.info')),'class' => 'nav-link']]); ?>
<?php $component->withName('utils.link-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.user.union.info')),'text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('ইউনিয়ন তথ্য')),'icon' => 'nav-icon icon-star','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(activeClass(Route::is('frontend.user.union.info'))),'class' => 'nav-link']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['href' => route('frontend.user.info'),'icon' => 'nav-icon icon-star','class' => 'nav-link','text' => __('ব্যবহারকারীর তথ্য')]]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.user.info')),'icon' => 'nav-icon icon-star','class' => 'nav-link','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('ব্যবহারকারীর তথ্য'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link-sidebar','data' => ['href' => route('frontend.user.all.sanad'),'text' => __('সনদ'),'icon' => 'nav-icon icon-speedometer','active' => activeClass(Route::is('frontend.user.all.sanad')),'class' => 'nav-link']]); ?>
<?php $component->withName('utils.link-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.user.all.sanad')),'text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('সনদ')),'icon' => 'nav-icon icon-speedometer','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(activeClass(Route::is('frontend.user.all.sanad'))),'class' => 'nav-link']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link-sidebar','data' => ['href' => route('frontend.user.sanad.application'),'text' => __('সনদ অ্যাপ্লিকেশন'),'icon' => 'nav-icon icon-speedometer','active' => activeClass(Route::is('frontend.user.sanad.application')),'class' => 'nav-link']]); ?>
<?php $component->withName('utils.link-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.user.sanad.application')),'text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('সনদ অ্যাপ্লিকেশন')),'icon' => 'nav-icon icon-speedometer','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(activeClass(Route::is('frontend.user.sanad.application'))),'class' => 'nav-link']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link-sidebar','data' => ['href' => route('frontend.user.course.application'),'text' => __('কম্পিউটার কোর্সের আবেদন'),'icon' => 'nav-icon icon-speedometer','active' => activeClass(Route::is('frontend.user.course.application')),'class' => 'nav-link']]); ?>
<?php $component->withName('utils.link-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.user.course.application')),'text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('কম্পিউটার কোর্সের আবেদন')),'icon' => 'nav-icon icon-speedometer','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(activeClass(Route::is('frontend.user.course.application'))),'class' => 'nav-link']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </li>

                    <li class="nav-item">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link-sidebar','data' => ['href' => '#','text' => __('সিভি'),'icon' => 'nav-icon icon-star','class' => 'nav-link','rightIcon' => 'fa fa-angle-left right']]); ?>
<?php $component->withName('utils.link-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '#','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('সিভি')),'icon' => 'nav-icon icon-star','class' => 'nav-link','rightIcon' => 'fa fa-angle-left right']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['href' => route('frontend.user.cv.information'),'icon' => 'nav-icon icon-arrow-right','class' => 'nav-link','text' => __('সিভি তথ্য')]]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.user.cv.information')),'icon' => 'nav-icon icon-arrow-right','class' => 'nav-link','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('সিভি তথ্য'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </li>
                            <li class="nav-item">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['href' => route('frontend.user.cv.profile'),'icon' => 'nav-icon icon-arrow-right','class' => 'nav-link','text' => __('সিভি প্রোফাইল')]]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.user.cv.profile')),'icon' => 'nav-icon icon-arrow-right','class' => 'nav-link','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('সিভি প্রোফাইল'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            <?php else: ?>
                <ul>
                    <li class="nav-item">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['href' => route('frontend.user.agent.linkGenerate'),'icon' => 'nav-icon far fa-circle','class' => 'nav-link','text' => __('লিংক তৈরি')]]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.user.agent.linkGenerate')),'icon' => 'nav-icon far fa-circle','class' => 'nav-link','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('লিংক তৈরি'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['href' => route('frontend.user.agent.agnetClient'),'icon' => 'nav-icon far fa-circle','class' => 'nav-link','text' => __('ক্লায়েন্ট')]]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.user.agent.agnetClient')),'icon' => 'nav-icon far fa-circle','class' => 'nav-link','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('ক্লায়েন্ট'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </li>
                </ul>
            <?php endif; ?>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH C:\laragon\www\udcbd\resources\views/frontend/user/includes/sidebar.blade.php ENDPATH**/ ?>