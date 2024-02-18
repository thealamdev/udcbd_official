<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="padding: 10px;">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li>
            <a class="brand-link" href="<?php echo e(route('frontend.index')); ?>">
                <img src="<?php echo e(asset(get_setting('frontend_logo_menu'))); ?>" style="width:60px;height:60px;">
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">


        <?php if(auth()->guard()->guest()): ?>
            <li class="nav-item">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['href' => route('frontend.auth.login'),'active' => activeClass(Route::is('frontend.auth.login')),'text' => __('Login'),'class' => 'nav-link']]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.auth.login')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(activeClass(Route::is('frontend.auth.login'))),'text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Login')),'class' => 'nav-link']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </li>

            <?php if(config('boilerplate.access.user.registration')): ?>
                <li class="nav-item">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['href' => route('frontend.auth.register'),'active' => activeClass(Route::is('frontend.auth.register')),'text' => __('Register'),'class' => 'nav-link']]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.auth.register')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(activeClass(Route::is('frontend.auth.register'))),'text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Register')),'class' => 'nav-link']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                </li>
            <?php endif; ?>
        <?php else: ?>
            <li class="nav-item dropdown">
                <?php if(!empty($balance_users?->balance)): ?>
                    <h5 style="font-size: 17px;margin-top:6px;color:rgb(70, 180, 36)">Your Balance:
                        <?php echo e(number_format($balance_users?->balance->balance,2)); ?> BDT
                    </h5>
                <?php else: ?>
                    <h5 style="font-size: 17px;margin-top:6px;color:rgb(70, 180, 36)">Your Balance:
                        00 BDT
                    </h5>
                <?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['href' => '#','id' => 'navbarDropdown','class' => 'nav-link dropdown-toggle','role' => 'button','dataToggle' => 'dropdown','ariaHaspopup' => 'true','ariaExpanded' => 'false','vPre' => true]]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => '#','id' => 'navbarDropdown','class' => 'nav-link dropdown-toggle','role' => 'button','data-toggle' => 'dropdown','aria-haspopup' => 'true','aria-expanded' => 'false','v-pre' => true]); ?>
                     <?php $__env->slot('text', null, []); ?> 
                        <img class="rounded-circle" style="max-height: 20px" src="<?php echo e($logged_in_user->avatar); ?>" />
                        <?php echo e($logged_in_user->name ?? 'User'); ?> <span class="caret"></span>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <?php if($logged_in_user->isAdmin()): ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['href' => route('admin.dashboard'),'text' => __('Administration'),'class' => 'dropdown-item']]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.dashboard')),'text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Administration')),'class' => 'dropdown-item']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <?php if($logged_in_user->isUser()): ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['href' => route('frontend.user.dashboard'),'active' => activeClass(Route::is('frontend.user.dashboard')),'text' => __('Dashboard'),'class' => 'dropdown-item']]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.user.dashboard')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(activeClass(Route::is('frontend.user.dashboard'))),'text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Dashboard')),'class' => 'dropdown-item']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['href' => route('frontend.user.account'),'active' => activeClass(Route::is('frontend.user.account')),'text' => __('My Account'),'class' => 'dropdown-item']]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('frontend.user.account')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(activeClass(Route::is('frontend.user.account'))),'text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('My Account')),'class' => 'dropdown-item']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.utils.link','data' => ['text' => __('Logout'),'class' => 'dropdown-item','onclick' => 'event.preventDefault();document.getElementById(\'logout-form\').submit();']]); ?>
<?php $component->withName('utils.link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Logout')),'class' => 'dropdown-item','onclick' => 'event.preventDefault();document.getElementById(\'logout-form\').submit();']); ?>
                         <?php $__env->slot('text', null, []); ?> 
                            <?php echo app('translator')->get('Logout'); ?>
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
                    <div class="ml-3">
                        <a href="<?php echo e(route('balance-topup')); ?>">Top Up</a>
                    </div>
                </div>
            </li>
        <?php endif; ?>
    </ul>

</nav>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script src="<?php echo e(mix('js/manifest.js')); ?>"></script>
<script src="<?php echo e(mix('js/vendor.js')); ?>"></script>
<script src="<?php echo e(mix('js/backend.js')); ?>"></script>
<?php /**PATH C:\Users\Jafor Computer\Downloads\main_site\resources\views/frontend/includes/nav.blade.php ENDPATH**/ ?>