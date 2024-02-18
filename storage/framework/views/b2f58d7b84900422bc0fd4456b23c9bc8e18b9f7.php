<?php $__env->startSection('content'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <div class="container pb-5" style="padding-top:180px;">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12"></div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="card" style="box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;">
                    <div class="card-header text-center">
                        <h2>Login</h2>
                        <p>Login to go for getting all details</p>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('frontend.auth.login')); ?>" method="POST" id="loginForm">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                
                                <input type="text" name="phone" id="phone" class="form-control"
                                    placeholder="<?php echo e(__('Phone NUmber')); ?>" value="<?php echo e(old('phone')); ?>" maxlength="255"
                                    required autofocus autocomplete="phone"
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;" />
                            </div>
                            <div class="form-group">
                                
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="<?php echo e(__('Password')); ?>" maxlength="100" required
                                    autocomplete="current-password"
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;" />
                            </div>
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <script type="text/javascript">
                                    swal('<?php echo e($message); ?>');
                                </script>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <script type="text/javascript">
                                    swal('<?php echo e($message); ?>');
                                </script>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <div class="form-group text-center" style="padding-bottom: 5px;">
                                <div class="form-check">
                                    <input name="remember" id="remember" class="form-check-input" type="checkbox"
                                        <?php echo e(old('remember') ? 'checked' : ''); ?> />

                                    <label class="form-check-label" for="remember">
                                        <?php echo app('translator')->get('Remember Me'); ?>
                                    </label>
                                </div>
                            </div>

                            <?php if(config('boilerplate.access.captcha.login')): ?>
                                <div class="col">
                                    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script><div id="_g-recaptcha"></div>
                <div class="g-recaptcha"
                    data-sitekey=""
                    data-size="invisible"
                    data-callback="_submitForm"
                    data-badge="bottomright">
                </div><script src="https://www.google.com/recaptcha/api.js" async defer></script><script>var _submitForm,_captchaForm,_captchaSubmit,_execute=true;</script><script>window.addEventListener('load', _loadCaptcha);function _loadCaptcha(){
                _captchaForm=document.querySelector("#_g-recaptcha").closest("form");
                _captchaSubmit=_captchaForm.querySelector('[type=submit]');
                _submitForm=function(){if(typeof _submitEvent==="function"){_submitEvent();grecaptcha.reset();}else{_captchaForm.submit();}};
                _captchaForm.addEventListener('submit',function(e){e.preventDefault();
                if(typeof _beforeSubmit==='function'){_execute=_beforeSubmit(e);}
                if(_execute){grecaptcha.execute();}});}</script>
            
                                    <input type="hidden" name="captcha_status" value="true" />
                                </div>
                            <?php endif; ?>

                            <div class="text-center">
                                <button class="btn btn-primary" type="submit"><?php echo app('translator')->get('LOGIN'); ?></button>
                            </div>
                            
                            <div class="text-center">
                                <?php echo $__env->make('frontend.auth.includes.social', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>New to <?php echo e(app_name()); ?>? | <a href="<?php echo e(route('frontend.auth.register')); ?>">Create
                                Account</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\udcbd\resources\views/frontend/auth/login.blade.php ENDPATH**/ ?>