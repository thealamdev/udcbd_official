<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>
    <section class="xs-welcome-slider">
        <div class="xs-banner-slider owl-carousel">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="xs-welcome-content"
                    style="background-image: url(<?php echo e(asset('/setting/banner/' . $slider->image)); ?>);">
                    <div class="container row">
                        <div class="xs-welcome-wraper banner-verion-2 color-white col-md-8 content-left">
                            <p class="pb-3" style="color: black"><?php echo e($slider->bottom_title); ?></p>
                            <h2 style="color: rgb(54, 35, 35)"><?php echo e($slider->header_title); ?></h2>
                        </div>
                    </div>
                    <div class="xs-black-overlay"></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
    
    <section class="xs-content-section-padding">
        <div class="container" style="max-width: 90%;">
            <div class="d-sm-flex d-block">
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="xs-heading">
                        <h1 class="xs-title">সেবাসমূহ</h1>
                        <span class="xs-separetor bg-bondiBlue"></span>
                    </div>
                    
                    <div class="row" style="margin-top: 30px;">
                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="blo col-md-3 col-lg-3">
                                <a href="<?php echo e(url('/sanad/details/' . $blog->description)); ?>" class="text-center">
                                    
                                    <div class="xs-single-causes">
                                        <img src="<?php echo e(asset('/setting/banner/' . $blog->image)); ?>" alt=""
                                            style="max-width: 80%;margin-top:10px; height:100px;">
                                        <div class="xs-causes-footer">
                                            <h5 class="color-light-red"><?php echo e($blog->description); ?></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
                <div class="col-md-12 col-lg-4 mt-5">
                    <div class="container" style="max-width: 95%">
                        <div class="sidebar sidebar-right">
                            <div class="widget widget_categories xs-sidebar-widget">
                                <h3 class="widget-title">গুরুত্বপূর্ন ফর্ম</h3>
                                <ul class="xs-side-bar-list">
                                    <?php $__currentLoopData = $form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="row">
                                            <div class="col-6">
                                                <span class="text-left"><?php echo e($f->name); ?></span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-right"><a
                                                        href="<?php echo e(URL::asset('setting/form/' . $f->form)); ?>"
                                                        target="_blank"><i class="fa fa-download"></i> Form</a>
                                                </span>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </ul>

                            </div>
                            

                            <div class="widget widget_categories xs-sidebar-widget">
                                <h3 class="widget-title">গুরুত্বপূর্ন লিংক</h3>
                                <ul class="xs-side-bar-list">
                                    <?php $__currentLoopData = $link; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="text-center"><a href="<?php echo e($l->important_link); ?>" target="_blank"><i
                                                    class="fa fa-link" aria-hidden="true"></i> <?php echo e($l->description); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
    
    <section id="computer_course" class="xs-content-section-padding" style="background-color: #f1f1f1">
        <div class="container" style="max-width: 90%;">
            <div class="xs-heading">
                <h1 class="xs-title">কম্পিউটার প্রশিক্ষণ ভর্তি</h1>
                <span class="xs-separetor bg-bondiBlue"></span>
            </div>
            <div class="row">
                <?php $__currentLoopData = $course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $com): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="blo col-md-4 col-lg-4">
                        <a href="<?php echo e(route('course_type.details', ['id' => $com->id])); ?>" class="text-center">
                            <div class="xs-single-causes" style="border-radius: 0%;!important">
                                <img src="<?php echo e(asset('/setting/competition/' . $com->image)); ?>" alt=""
                                    style="height: 150px;width: 150px;margin-top:10px;">
                                <div class="xs-causes-footer">
                                    <h5 class="color-light-red"><?php echo e($com->type); ?></h5>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
        </div>
    </section>
    
    

    <section class="parallax-window xs-become-a-volunteer xs-section-padding"
        style="background-image:url(../../<?php echo e(get_setting('volunteer_bg_image')); ?>);background-size: auto;">
        <div class="container" style="max-width: 90%;">
            <div class="row">
                <div class="col-md-10 col-lg-10" style="padding-top:100px;padding-bottom: 100px">
                    <div class="volunteer-version-3">
                        <h1 style="color: #fc344f;"><?php echo e(get_setting('volunteer_title')); ?></h1>
                        <h5 style="color: #fc344f;"><?php echo e(get_setting('volunteer_description')); ?></h5>
                        <div class="xs-btn-wraper" style="margin:50px;">
                            <a href="<?php echo e(route('result.year.index')); ?>" class="btn btn-primary">
                                <span class="badge"></span>View All Results
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    

    <section class="banner" style=" padding: 50px 0px 100px 0px;">
        <div class="container" style="max-width: 90%;">
            <div class="xs-heading" style="margin-bottom: 5%">
                <h1 class="xs-title">Gallery</h1>
                <span class="xs-separetor bg-bondiBlue"></span>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="gallery">
                        
                    </div>
                </div>
            </div>
            <div style="float:right"><a href="/gallery" class="btn btn-primary">
                    <span class="badge"></span>See All Gallery
                </a>
            </div>
        </div>
    </section>
    

    
    <section class=" xs-partner-section"
        style="background-image: url('assets/images/map.png');  background-color: <?php echo e(get_setting('brand_bg_color')); ?>;">
        <div class="container" style="max-width: 90%;">

            <div class="row">
                <div class="col-lg-5">
                    <div class="xs-partner-content">
                        <div class="xs-heading xs-mb-40">
                            <h2 class="xs-mb-0 xs-title">
                                <?php echo e(get_setting('about_text_bottom')); ?></span>
                            </h2>
                        </div>
                        <p><?php echo e(get_setting('about_text_details')); ?></p>
                        <a href="/all/brand" class="btn btn-primary bg-orange">
                            More
                        </a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <ul class="fundpress-partners">
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="#"><img src="<?php echo e(asset('/setting/banner/' . $brand->logo)); ?>"
                                        style="height: 50%;" alt=""></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MSI_gaming\Downloads\project_final\project_final\main_site\resources\views/frontend/index.blade.php ENDPATH**/ ?>