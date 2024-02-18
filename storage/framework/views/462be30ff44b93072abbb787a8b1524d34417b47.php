

<div style="position: fixed;width: 100%;z-index: 100; background-color:#fff">
    <div class="xs-top-bar top-bar-second">
        <div class="container">
            <ul class="xs-top-social">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-wordpress"></i></a></li>
                <li><a href="#"><i class="fa fa-slack"></i></a></li>
            </ul>
            <a href="" class="xs-top-bar-mail"><i class="fa fa-envelope-o"></i><span class="__cf_email__"
                    data-cfemail="fd94939b8dbd98859c908d9198d39e9290"><?php echo e(get_setting('office_email')); ?></span></a>
        </div>
    </div>
    <header class="xs-header xs-fullWidth" style="background-color: #007308">

        <div class="container">
            <nav class="xs-menus">
                <div class="nav-header">
                    <div class="nav-toggle xs-logo-wraper">
                        <a href="/" class="xs-nav-logo">
                            <img src="<?php echo e(asset(get_setting('frontend_logo_menu'))); ?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="nav-menus-wrapper row">
                    <div class="xs-logo-wraper col-lg-1">
                        <a class="nav-brand" href="/">
                            <img src="<?php echo e(asset(get_setting('frontend_logo_menu'))); ?>" alt="" class="log">
                        </a>
                    </div>
                    <div class="col-lg-11">
                        <ul class="nav-menu">

                            
                            <li><a href="/">প্রথম পাতা</a></li>
                            
                            
                            <li><a href="#">সেবাসমূহ</a>
                                <ul class="nav-dropdown">
                                    <li><a href="<?php echo e(route('about.index')); ?>">About BWUF</a></li>
                                    

                                </ul>
                            </li>

                            
                            </li>
                            <li><a href="<?php echo e(route('frontend.cv.all')); ?>">সিভি তৈরি</a>
                            </li>
                            <li><a href="#computer_course">কম্পিউটার প্রশিক্ষণ ভর্তি</a>
                            </li>
                            
                            <li><a href="#">যোগাযোগ</a></li>
                            <?php if(auth()->guard()->check()): ?>
                                <?php if($logged_in_user->isSuperAdmin()): ?>
                                    <li>
                                        <a href="#">
                                            <?php echo e($logged_in_user->name ?? 'Super Admin'); ?> </a>
                                        <ul class="nav-dropdown">
                                            <li>
                                                <a href="<?php echo e(route('admin.super.dashboard')); ?>">
                                                    ড্যাশবোর্ড</a>
                                            </li>
                                            <li>
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['text' => __('Logout'),'class' => 'dropdown-item','onclick' => 'event.preventDefault();document.getElementById(\'logout-form\').submit();']]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Logout')),'class' => 'dropdown-item','onclick' => 'event.preventDefault();document.getElementById(\'logout-form\').submit();']); ?>
                                                     <?php $__env->slot('text', null, []); ?> 
                                                        <?php echo app('translator')->get('লগআউট'); ?>
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.forms.post','data' => ['action' => route('frontend.auth.logout'),'id' => 'logout-form','class' => 'd-none']]); ?>
<?php $component->withName('forms.post'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.auth.logout')),'id' => 'logout-form','class' => 'd-none']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                     <?php $__env->endSlot(); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            </li>
                                        </ul>

                                    </li>
                                <?php endif; ?>
                                <?php if($logged_in_user->isAdmin()): ?>
                                    <li>
                                        <a href="#">
                                            <?php echo e($logged_in_user->name ?? 'Admin'); ?> </a>
                                        <ul class="nav-dropdown">
                                            <li>
                                                <a href="<?php echo e(route('admin.dashboard')); ?>">
                                                    ড্যাশবোর্ড</a>
                                            </li>
                                            <li>
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['text' => __('Logout'),'class' => 'dropdown-item','onclick' => 'event.preventDefault();document.getElementById(\'logout-form\').submit();']]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Logout')),'class' => 'dropdown-item','onclick' => 'event.preventDefault();document.getElementById(\'logout-form\').submit();']); ?>
                                                     <?php $__env->slot('text', null, []); ?> 
                                                        <?php echo app('translator')->get('লগআউট'); ?>
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.forms.post','data' => ['action' => route('frontend.auth.logout'),'id' => 'logout-form','class' => 'd-none']]); ?>
<?php $component->withName('forms.post'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.auth.logout')),'id' => 'logout-form','class' => 'd-none']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                     <?php $__env->endSlot(); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            </li>
                                        </ul>

                                    </li>
                                <?php endif; ?>

                                <?php if($logged_in_user->isUser()): ?>
                                    <li>
                                        <a href="#">
                                            <?php echo e($logged_in_user->name ?? 'User'); ?> </a>
                                        <ul class="nav-dropdown">
                                            <li>
                                                <a href="<?php echo e(route('frontend.user.dashboard')); ?>">
                                                    ড্যাশবোর্ড</a>
                                            </li>
                                            <li>
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['text' => __('Logout'),'class' => 'dropdown-item','onclick' => 'event.preventDefault();document.getElementById(\'logout-form\').submit();']]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Logout')),'class' => 'dropdown-item','onclick' => 'event.preventDefault();document.getElementById(\'logout-form\').submit();']); ?>
                                                     <?php $__env->slot('text', null, []); ?> 
                                                        <?php echo app('translator')->get('লগআউট'); ?>
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.forms.post','data' => ['action' => route('frontend.auth.logout'),'id' => 'logout-form','class' => 'd-none']]); ?>
<?php $component->withName('forms.post'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.auth.logout')),'id' => 'logout-form','class' => 'd-none']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                     <?php $__env->endSlot(); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            </li>
                                        </ul>

                                    </li>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if(config('boilerplate.access.user.registration')): ?>
                                    <li>
                                        <a href="<?php echo e(route('frontend.auth.login')); ?>">লগইন/রেজিস্টার</a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                        </ul>

                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>
<?php /**PATH C:\laragon\www\udcbd\resources\views/frontend/layouts/header.blade.php ENDPATH**/ ?>