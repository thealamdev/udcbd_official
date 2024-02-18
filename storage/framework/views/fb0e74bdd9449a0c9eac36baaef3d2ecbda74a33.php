<?php $__env->startSection('title', 'Application'); ?>

<?php $__env->startSection('content'); ?>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <?php
        // for english to bangla
        use Rakibhstu\Banglanumber\NumberToBangla;
        $numto = new NumberToBangla();

        $union = App\Models\Union::find($application->union_id);
    ?>

    <div class="card application-form">
        <div class="card-header">
            <div class="row">
                
                

                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <span class="badge <?php if($application->status == 'pending'): ?> badge-danger <?php else: ?> badge-success <?php endif; ?>"
                            style="font-size: 100%; padding:10px;">
                            <b>Status: </b> <?php echo e($application->status ?? null); ?></span>


                        <?php if($logged_in_user->can('admin.sanad.status')): ?>
                            <form action="<?php echo e(route('admin.application.status')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="application_id" value="<?php echo e($application->id); ?>">
                                <?php if($application->status == 'pending'): ?>
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="btn btn-outline-success ml-2">Approve</button>
                                <?php endif; ?>
                                <?php if($application->status == 'approved'): ?>
                                    <input type="hidden" name="status" value="pending">
                                    <button type="submit" class="btn btn-outline-danger ml-2">Reject</button>
                                <?php endif; ?>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header text-center">
                                <h5><?php echo e($application->applicant ?? 'N/A'); ?></h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="text-center"><b>NID/Birth Certificate</b></td>
                                        <td class="text-center"><?php echo e($application->nid_birth ?? 'N/A'); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>সনদ</b></td>
                                        <td class="text-center" style="color:red"><?php echo e($sanad->description ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>আবেদনের তারিখ</b></td>
                                        <td class="text-center"><?php echo e($application->form_date ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>ট্র্যাকিং নাম্বার</b></td>
                                        <td class="text-center"><?php echo e($application->tracking_no ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>আবেদনকৃত ঠিকানা</b></td>
                                        <td class="text-center">
                                            <?php echo e($application->applied_union_no ?? null); ?> নং
                                            <?php echo e($union->bn_name ?? null); ?>

                                            ইউনিয়ন পরিষদ, <?php echo e($application->applied_upazilla_name); ?>,
                                            <?php echo e($application->applied_zilla_name); ?>।

                                        </td>

                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav nav-link active" id="payment-info-tab" data-toggle="pill"
                                            href="#payment-info" role="tab" aria-controls="payment-info"
                                            aria-selected="true">পেমেন্ট ইনফর্মেশন</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <div class="tab-content" id="vert-tabs-tabContent">
                                    <div class="tab-pane text-left fade show active" id="payment-info" role="tabpanel"
                                        aria-labelledby="payment-info-tab">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="text-center"><b>পেমেন্টের ধরন</b></td>
                                                <td class="text-center"><?php echo e($application->payment_method ?? 'N/A'); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>মোবাইল নম্বর</b></td>
                                                <td class="text-center"><?php echo e($application->transaction_phone ?? 'N/A'); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>ট্রানজেকশন নম্বর</b></td>
                                                <td class="text-center"><?php echo e($application->transaction_no ?? 'N/A'); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>এমাউন্ট</b></td>
                                                <td class="text-center"><?php echo e($application->amount ?? 'N/A'); ?>

                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($logged_in_user->can('admin.sanad.download.sanad')): ?>
            <div class="print-shadow-0 print-m-0 application-form d-print-none text-center mt-3 card-footer">
                <form action="<?php echo e(route('frontend.user.application.certificate.info')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="application_id" value="<?php echo e($application->id); ?>">
                    <input type="hidden" name="printed_on" value="<?php echo e(now()->format('M d, Y')); ?>">
                    <input type="hidden" name="sanad_id" value="<?php echo e($sanad->id); ?>">
                    <input type="hidden" name="union_id" value="<?php echo e($application->union_id); ?>">

                    <?php if($account?->balance >= $certificate_pricing?->price_rate): ?>
                        <button class="btn btn-primary" type="submit" id="print-certificate">প্রিন্ট
                            সার্টিফিকেট <i class="fa fa-download" aria-hidden="true"></i>
                        </button>
                    <?php else: ?>
                        <div class="ml-3">
                            <h4 class="text-danger">Insufficient Balance. Please Recharge for Print</h4>
                            <a class="btn btn-success" href="<?php echo e(route('balance-topup')); ?>">Recharge</a>
                            <p class="mt-1">By</p>
                            <a href="<?php echo e(route('balance-topup')); ?>">
                                <img src="https://tds-images.thedailystar.net/sites/default/files/styles/very_big_201/public/images/2023/07/31/bkash.jpg"
                                    width="150px" alt="">
                            </a>
                        </div>
                    <?php endif; ?>
                </form>
                <!-- end col -->
            </div>
        <?php endif; ?>
    </div>
    <?php if($logged_in_user->can('admin.sanad.download.sanad')): ?>
        <?php if($sanad->description == 'বাৎসরিক আয়ের সনদপত্র'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_batshorik', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'মাসিক আয়ের সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_monthly', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'পারিবারিক সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_paribarik', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'মৃত্যু সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_dead', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'ভূমিহীন সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_bhumihin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'জাতীয়তা সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_nationality', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'নাগরিক সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_nagorik', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'পুনঃবিবাহ না হওয়ার প্রত্যয়ন'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_punobibaho', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'অভিভাবকের অনুমতিপত্র'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_obivabok', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'মুক্তিযোদ্ধা প্রত্যয়ন'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_freedomfighter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'বিবিধ সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_bidoba', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'অবিবাহিত সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_obibahito', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'স্থায়ী বাসিন্দা সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_permanentResident', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'প্রত্যায়ন পত্র নাম'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_samename', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'চারিত্রিক সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_charitrik', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'উত্তরাধিকার সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_uttoradhikar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'ওয়ারিশ সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_oarish', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'পুনঃবিবাহ না হওয়া সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_porno_biya', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'নতুন ভোটার প্রত্যয়ন'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_newVoter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'বিধবা প্রত্যয়ন'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_bidoba', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'সম্প্রদায় সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_sampro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'কৃষি প্রত্যয়ন'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_kri', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'এতিম সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_etim', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'বিবাহিত সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_biya', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'উপজাতি সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_opoj', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'জাতীয় পরিচয় তথ্য সংশোধন'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_song', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'নিঃসন্তান প্রত্যয়ন'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_son', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'আর্থিক অস্বচ্ছলতার সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_arthik', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'অনাপত্তি সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_onap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'অবকাঠামো নির্মাণের অনুমতি সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_obok', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'অটো রিক্সা ট্রেডলাইসেন্স'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_auto', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'ভোটার এলাকা স্থানান্তর প্রত্যয়ন'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_nid_solve', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'প্রতিবন্ধী সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_protibondi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'পুনঃবিবাহ  প্রত্যয়ন'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_punobibaho', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'বেকারত্ব সনদ'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_bekar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($sanad->description == 'ট্রেড লাইসেন্স'): ?>
            <?php echo $__env->make('backend.content.applications.sanad-certificate.c_trade', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

        <script type="text/javascript">
            (function($) {
                $(document).ready(function() {
                    $('#print-certificate').on('click', function(event) {
                        var form = $(this).closest("form");
                        var name = $(this).data("name");
                        event.preventDefault();
                        swal({
                                title: `Are you sure you want to print this certificate?`,
                                text: "If you print this, price will be deduct from your wallet.",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    $('.application-form').removeClass('d-print-block').addClass(
                                        'd-print-none');
                                    $('.certificate-form').removeClass('d-print-none').addClass(
                                        'd-print-block');
                                    print();
                                    form.submit();
                                }
                            });

                    });
                });
            })(jQuery);
        </script>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jafor Computer\Downloads\main_site\resources\views/backend/content/applications/application-details.blade.php ENDPATH**/ ?>