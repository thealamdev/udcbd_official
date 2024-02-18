<footer class="xs-footer-section">
    <div class="container">
        <div class="xs-footer-top-layer">
            <div class="row">
                <div class="col-lg-4 col-md-6 footer-widget xs-pr-20">
                    <a href="/" class="xs-footer-logo footmobile">
                        <img src="<?php echo e(asset(get_setting('frontend_logo_footer'))); ?>" style="max-width: 100%; height: auto;"
                            alt="">
                    </a>
                    <h3 style="color: white;"><?php echo e(get_setting('footer_description')); ?></h3>


                    <img src="<?php echo e(asset(get_setting('affiliate_logo'))); ?>" style="max-width: 100%; height: auto;"
                        alt="">

                </div>

                <div class="col-lg-4 col-md-6 footer-widget">
                    <h3 class="widget-title">Contact Us</h3>
                    <ul class="xs-info-list">
                        <li><i class="fa fa-home bg-red"></i><?php echo e(get_setting('office_address')); ?></li>
                        <li><i class="fa fa-phone bg-green"></i><?php echo e(get_setting('office_phone')); ?></li>
                        <li><i class="fa fa-envelope-o bg-blue"></i><a href=""><span class="__cf_email__"
                                    data-cfemail="dea7b1abacb0bfb3bb9ebab1b3bfb7b0f0bdb1b3"><?php echo e(get_setting('office_email')); ?></span></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 footer-widget">
                    <h3 class="widget-title">Follow Us</h3>
                    <div class="facebook-page">
                        <?php echo get_setting('g_map_iframe_url'); ?>

                    </div>

                </div>


            </div>
        </div>

        <div class="container">
            <div class="xs-copyright">
                <div class="row">
                    <div class="col-md-6">
                        <div class="xs-copyright-text">
                            <p><?php echo e(get_setting('copyright_text')); ?></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="xs-back-to-top-wraper">
            <a href="#" class="xs-back-to-top"><i class="fa fa-angle-up"></i></a>
        </div>
</footer>
<?php /**PATH C:\laragon\www\udcbd\resources\views/frontend/layouts/footer.blade.php ENDPATH**/ ?>