<?php $__env->startSection('title', 'Application'); ?>

<?php $__env->startSection('content'); ?>

    <?php
        // for english to bangla
        use Rakibhstu\Banglanumber\NumberToBangla;
        $numto = new NumberToBangla();
        // for english to bangla
        
        $present_division = App\Models\Division::find($infos->present_division);
        $present_district = App\Models\District::find($infos->present_district);
        $present_thana = App\Models\Upzilla::find($infos->present_thana);
        $present_union = App\Models\Union::find($infos->present_union);
        
        $permanent_division = App\Models\Division::find($infos->permanent_division);
        $permanent_district = App\Models\District::find($infos->permanent_district);
        $permanent_thana = App\Models\Upzilla::find($infos->permanent_thana);
        $permanent_union = App\Models\Union::find($infos->permanent_union);
    ?>

    <div class="card">
        <div class="card-header">
            <a class="btn btn-outline-primary" href="<?php echo e(route('frontend.user.info.edit', $infos->id)); ?>"><i
                    class="fa fa-edit"></i> Edit Your Info</a>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header text-center">
                                <img src="<?php echo e(asset('/setting/user-info/' . $infos->photo) ?? 'N/A'); ?>"
                                    style="height: 80px"><br>
                                <h5><?php echo e($infos->name_bn ?? 'N/A'); ?></h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="text-center"><b>নাম(ইংরেজীতে)</b></td>
                                        <td class="text-center"><?php echo e($infos->name_en ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>পিতা / স্বামীর নাম</b></td>
                                        <td class="text-center"><?php echo e($infos->father_or_husband_bn ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>পিতা / স্বামীর নাম (ইংরেজিতে)</b></td>
                                        <td class="text-center"><?php echo e($infos->father_or_husband_en ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>মাতার নাম</b></td>
                                        <td class="text-center"><?php echo e($infos->mother_bn ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>মাতার নাম (ইংরেজিতে)</b></td>
                                        <td class="text-center"><?php echo e($infos->mother_en ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>মোবাইল নম্বর</b></td>
                                        <td class="text-center"><?php echo e($infos->mobile ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>ই-মেইল</b></td>
                                        <td class="text-center"><?php echo e($infos->e_mail ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>জাতীয় পরিচয়পত্র নং</b></td>
                                        <td class="text-center"><?php echo e($infos->voter_birth_id ?? null); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>জাতীয় পরিচয়পত্রের ছবি</b></td>
                                        <td class="text-center"><img
                                                src="<?php echo e(asset('/setting/user-info/' . $infos->voter_birth_photo) ?? 'N/A'); ?>"
                                                style="height: 100px;width:100%;"><br></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>লিঙ্গ</b></td>
                                        <td class="text-center"><?php echo e($infos->gender ?? 'N/A'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>জন্ম তারিখ</b></td>
                                        <td class="text-center">
                                            <?php echo e(date('d-m-Y', strtotime($infos->birth_date)) ?? 'N/A'); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>রক্তের গ্রুপ</b></td>
                                        <td class="text-center"><?php echo e($infos->blood_group ?? 'N/A'); ?>

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
                                        <a class="nav-link active" id="present-address-tab" data-toggle="pill"
                                            href="#present-address" role="tab" aria-controls="present-address"
                                            aria-selected="false">বর্তমান
                                            ঠিকানা</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="permanent-address-tab" data-toggle="pill"
                                            href="#permanent-address" role="tab" aria-controls="permanent-address"
                                            aria-selected="false">স্থায়ী ঠিকানা</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <div class="tab-content" id="vert-tabs-tabContent">


                                    <div class="tab-pane text-left fade show active" id="present-address" role="tabpanel"
                                        aria-labelledby="present-address-tab">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="text-center"><b>বিভাগ</b></td>
                                                <td class="text-center"><?php echo e($present_division->bn_name); ?></td>
                                                <td class="text-center"><?php echo e($present_division->name); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>জেলা</b></td>
                                                <td class="text-center"><?php echo e($present_district->bn_name); ?></td>
                                                <td class="text-center"><?php echo e($present_district->name); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>থানা / উপজেলা</b></td>
                                                <td class="text-center"><?php echo e($present_thana->bn_name); ?></td>
                                                <td class="text-center"><?php echo e($present_thana->name); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>ইউনিয়ন</b></td>
                                                <td class="text-center"><?php echo e($present_union->bn_name); ?></td>
                                                <td class="text-center"><?php echo e($present_union->name); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>ওয়ার্ড নং</b></td>
                                                <td class="text-center"><?php echo e($numto->bnNum($infos->present_ward_no)); ?>নং
                                                </td>
                                                <td class="text-center"><?php echo e($infos->present_ward_no); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>রোড / ব্লক / সেক্টর</b></td>
                                                <td class="text-center"><?php echo e($infos->present_road_bn ?? null); ?></td>
                                                <td class="text-center"><?php echo e($infos->present_road_en ?? null); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>হোল্ডিং নং</b></td>
                                                <td class="text-center"><?php echo e($infos->present_holding_no_bn ?? null); ?></td>
                                                <td class="text-center"><?php echo e($infos->present_holding_no_en ?? null); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>গ্রাম / বাড়ী</b></td>
                                                <td class="text-center"><?php echo e($infos->present_village_bn ?? null); ?></td>
                                                <td class="text-center"><?php echo e($infos->present_village_en ?? null); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>মালিকানার ধরণ</b></td>
                                                <td class="text-center">
                                                    <?php if($infos->present_owner_type == 'owner'): ?>
                                                        বাড়ির মালিক
                                                    <?php else: ?>
                                                        ভাড়াটিয়া
                                                    <?php endif; ?>

                                                </td>
                                                <td class="text-center"><?php echo e($infos->present_owner_type ?? null); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="permanent-address" role="tabpanel"
                                        aria-labelledby="permanent-address-tab">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="text-center"><b>বিভাগ</b></td>
                                                <td class="text-center"><?php echo e($permanent_division->bn_name); ?></td>
                                                <td class="text-center"><?php echo e($permanent_division->name); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>জেলা</b></td>
                                                <td class="text-center"><?php echo e($permanent_district->bn_name); ?></td>
                                                <td class="text-center"><?php echo e($permanent_district->name); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>থানা / উপজেলা</b></td>
                                                <td class="text-center"><?php echo e($permanent_thana->bn_name); ?></td>
                                                <td class="text-center"><?php echo e($permanent_thana->name); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>ইউনিয়ন</b></td>
                                                <td class="text-center"><?php echo e($permanent_union->bn_name); ?></td>
                                                <td class="text-center"><?php echo e($permanent_union->name); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>ওয়ার্ড নং</b></td>
                                                <td class="text-center"><?php echo e($numto->bnNum($infos->permanent_ward_no)); ?>নং
                                                </td>
                                                <td class="text-center"><?php echo e($infos->permanent_ward_no); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>রোড / ব্লক / সেক্টর</b></td>
                                                <td class="text-center"><?php echo e($infos->permanent_road_bn ?? null); ?></td>
                                                <td class="text-center"><?php echo e($infos->permanent_road_en ?? null); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>হোল্ডিং নং</b></td>
                                                <td class="text-center"><?php echo e($infos->permanent_holding_no_bn ?? null); ?></td>
                                                <td class="text-center"><?php echo e($infos->permanent_holding_no_en ?? null); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>গ্রাম / বাড়ী</b></td>
                                                <td class="text-center"><?php echo e($infos->permanent_village_bn ?? null); ?></td>
                                                <td class="text-center"><?php echo e($infos->permanent_village_en ?? null); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>মালিকানার ধরণ</b></td>
                                                <td class="text-center">
                                                    <?php if($infos->permanent_owner_type == 'owner'): ?>
                                                        বাড়ির মালিক
                                                    <?php else: ?>
                                                        ভাড়াটিয়া
                                                    <?php endif; ?>

                                                </td>
                                                <td class="text-center"><?php echo e($infos->permanent_owner_type ?? null); ?></td>
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
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\udcbd\resources\views/backend/content/user-info/index.blade.php ENDPATH**/ ?>