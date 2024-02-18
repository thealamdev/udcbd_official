

<?php $__env->startSection('content'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <div class="container pb-5" style="padding-top:180px;">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12"></div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                <div class="card" style="box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;">
                    <div class="card-header text-center">
                        <h2>REGISTER</h2>
                        <p>Register to go for getting all details</p>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('frontend.auth.client.registered')); ?>" method="POST" id="registerForm">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="agent_id" value="<?php echo e(request()->id); ?>">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control"
                                    value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('Name')); ?>" maxlength="100" required
                                    autofocus autocomplete="name"
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="<?php echo e(old('phone')); ?>" placeholder="<?php echo e(__('Phone')); ?>" maxlength="100" required
                                    autofocus autocomplete="phone"
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;" />
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
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="<?php echo e(__('E-mail Address')); ?>" value="<?php echo e(old('email')); ?>" maxlength="255"
                                    required autocomplete="email"
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;" />
                                <?php $__errorArgs = ['email'];
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
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="<?php echo e(__('Password')); ?>" maxlength="100" required autocomplete="new-password"
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;" />
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
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="<?php echo e(__('Confirm Password')); ?>" maxlength="100"
                                    required autocomplete="new-password"
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;" />
                            </div>
                            
                            <div class="form-group">
                                <select name="register_for" id="register_for" class="form-control" required
                                    style=" border-radius: 20px;box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;">
                                    <option value="">Register For</option>
                                    <option value="নাগরিক">নাগরিক</option>
                                    <option value="উদ্দোক্তা">উদ্দোক্তা</option>
                                    <option value="হিসাব সহকারি">হিসাব সহকারি</option>
                                    <option value="সচিব">সচিব</option>
                                    <option value="চেয়ারম্যান">চেয়ারম্যান</option>
                                    <option value="এজেন্ট">এজেন্ট</option>
                                </select>
                            </div>

                            <div class="form-check" style="padding-bottom: 10px;">
                                <input type="checkbox" name="terms" value="1" id="terms" class="form-check-input"
                                    required>
                                <label class="form-check-label" for="terms">
                                    <?php echo app('translator')->get('I agree to the'); ?> <a href="<?php echo e(route('frontend.pages.terms')); ?>"
                                        target="_blank"><?php echo app('translator')->get('Terms & Conditions'); ?></a>
                                </label>
                            </div>

                            <?php if(config('boilerplate.access.captcha.registration')): ?>
                                <div class="cta-form-col d-flex justify-content-between">
                                    <div class="col-md-4">
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
                                </div>
                            <?php endif; ?>
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit"><?php echo app('translator')->get('Sign Up'); ?></button>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Already have an account? | <a href="<?php echo e(route('frontend.auth.login')); ?>">Login</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jafor Computer\Downloads\main_site\resources\views/agents/clients/register.blade.php ENDPATH**/ ?>