@include('applications.applicationstyles.style_application')

<div id="content">

    <style>
        p {
            margin-bottom: 0.5rem;
        }

        table tr td {
            padding: 0.2rem 0.2rem !important;
        }
        .form-container {
            border: 2px solid black; /* Added black border */
            border-radius: 8px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <!-- Begin Page Content -->
    <div class="container-fluid print-p-0">

        <!-- Form -->
        <div class="card print-card shadow print-shadow-0 print-m-0 application-form d-print-none">
            <div class="card-body print-p-0">

                <div class="row m-5 print-m-0">
                    <div class="col-12 bangla-font">
                        <form class="bv-validate-form form-center hide-success font-15 bv-form" style="font-size:18.7px;" method="post" action="{{ route('frontend.user.application.sanad') }}">
                            @csrf
                            <input type="hidden" name="sanad_id" value="{{ $sanad->id }}">
                            <input type="hidden" name="tracking_no" value="{{ $q }}">
                            <input type="hidden" name="status" value="pending">
                            <input type="hidden" name="union_id" value="{{ $uni->id }}">

                            <input type="hidden" name="applied_union_no" value="{{ $union->union_no }}">
                            <input type="hidden" name="applied_upazilla_name" value="{{ $upzilla->bn_name }}">
                            <input type="hidden" name="applied_zilla_name" value="{{ $district->bn_name }}">
                            <input type="hidden" name="applied_chairman_name" value="{{ $union->chairman }}">
                            <input type="hidden" name="applied_union_id" value="{{ $union->id }}">
                            <input type="hidden" name="form_serial" value="{{ $sl_no }}">
                            <input type="hidden" name="noe" value="{{ $union->noe }}">
                            <input type="hidden" name="upe" value="{{ $union->upe }}">
                            <input type="hidden" name="eng" value="{{ $union->zee }}">
                            <input type="hidden" name="che" value="{{ $union->che }}">
                            <input type="hidden" name="une" value="{{ $union->une }}">
                            <input type="hidden" name="form_serial" value="{{ $sl_no }}">
                            <input type="hidden" name="qrcode" value="{{ $qr }}">

                            <div class="row justify-content-center">
                                <div class="col-12 col-xxl-10">


                                    <!-- Column start -->
                                     <div class="form-container">
                                    <div class="row">
                                        <div class="col-12 text-center mb-4">
                                            <h2 class="h3 border-bottom border-2 border-dark d-inline-block fw-light">
                                                অবকাঠামো নির্মাণের অনুমতি সনদ</h2>
                                        </div>
                                    </div>
                                    <!-- Row end -->

                                    <!-- Row start -->
                                    <div class="d-flex mb-1 form-group has-feedback">
                                        <p class="me-1">তারিখ:</p>
                                        <input type="text" name="form_date" class="border-0 border-bottom-dotted" data-bv-notempty-message="দয়া করে তারিখ লিখুন" value="{{ bn_date() }}" required="" data-bv-field="date"><i class="form-control-feedback bv-no-label" data-bv-icon-for="date" style="display: none;"></i>
                                        <p class="ms-1">খ্রিঃ</p>
                                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="date" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে তারিখ
                                            লিখুন</small>
                                    </div>
                                    <!-- Row end -->

                                    <!-- Row start -->
                                    <div class="d-block">
                                        <p class="m-0">বরাবর,</p>
                                        <div class="form-group has-feedback">
                                            <!-- <input class="border-0 border-bottom-dotted text-start" type="text" name="chairman" data-bv-notempty-message="দয়া করে মেম্বার ও চেয়ারম্যান সাহেবের নাম লিখুন" required> -->
                                            <input name="chairman_name" class="border-0 border-bottom-dotted bg-transparent" style="min-width: 200px  text-align:end;" type="text" value="" required="" data-bv-field="chairman_name"><i class="form-control-feedback bv-no-label" data-bv-icon-for="chairman_name" style="display: none;"></i>
                                            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="chairman_name" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a value</small>
                                        </div>
                                    </div>
                                    <!-- Row end -->

                                    <!-- Row start -->
                                    <div class="d-block">
                                        <p>{{ $union->union_no }} নং {{ $uni->bn_name }} ইউনিয়ন পরিষদ</p>
                                        <p>{{ $upzilla->bn_name }}, {{ $district->bn_name }}।</p>
                                        <p>বিষয়ঃ অবকাঠামো নির্মাণের অনুমতি সনদ প্রদানের অনুমতি প্রসঙ্গে।</p>

                                        <p class="mt-2">আবেদনকাররীর তথ্যঃ-</p>
                                    </div>
                                    <!-- Row end -->


                                    <!-- Row start -->
                                    
                                    <!-- Row end -->

                                    <!-- Row start -->
                                    <div class="d-flex">
                                        <div class="d-flex flex-fill">
                                            <p>নামঃ</p>
                                            <div class="flex-fill form-group has-feedback">
                                                <input class="border-0 border-bottom-dotted bg-transparent w-100" type="text" name="applicant" value="" data-bv-notempty-message="দয়া করে নাম লিখুন" required="" data-bv-field="applicant"><i class="form-control-feedback bv-no-label" data-bv-icon-for="applicant" style="display: none;"></i>
                                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="applicant" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে নাম লিখুন</small>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                        <p class="me-2">পরিচয়পত্র/ জন্ম সনদঃ</p>
                                        <div class="flex-fill form-group has-feedback">
                                            <input class="border-0 border-bottom-dotted bg-transparent w-100 nid-birth" type="text" name="nid_birth" value="" data-bv-notempty-message="দয়া করে জাতীয় পরিচয়পত্র / জন্ম সনদের নম্বর লিখুন" required="" data-bv-field="nid_birth"><i class="form-control-feedback bv-no-label" data-bv-icon-for="nid_birth" style="display: none;"></i>
                                            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="nid_birth" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে জাতীয় পরিচয়পত্র / জন্ম সনদের নম্বর
                                                লিখুন</small>
                                        </div>
                                    </div>
                                        <div class="d-flex flex-fill">
                                            <p class="ms-1">পিতা/স্বামীঃ</p>
                                            <div class="flex-fill form-group">
                                                <input class="border-0 border-bottom-dotted bg-transparent w-100" type="text" name="father_husband_name" value="" data-bv-notempty-message="দয়া করে পিতা/স্বামীর নাম লিখুন">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-fill">
                                            <p class="ms-1">মাতাঃ</p>
                                            <div class="flex-fill form-group has-feedback">
                                                <input class="border-0 border-bottom-dotted bg-transparent w-100" type="text" name="mother_name" value="" data-bv-notempty-message="দয়া করে মাতার নাম লিখুন" required="" data-bv-field="village_name"><i class="form-control-feedback bv-no-label" data-bv-icon-for="village_name" style="display: none;"></i>
                                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="village_name" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে
                                                    মাতার নাম লিখুন</small>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row end -->

                                    <!-- Row start -->
                                    <div class="d-flex">
                                        <div class="d-flex flex-fill"> 
                                            <p>গ্রামঃ</p>
                                            <div class="flex-fill form-group has-feedback">
                                                <input class="border-0 border-bottom-dotted bg-transparent w-100" type="text" name="village_name" value="" data-bv-notempty-message="দয়া করে  নাম লিখুন" required="" data-bv-field="village_name"><i class="form-control-feedback bv-no-label" data-bv-icon-for="village_name" style="display: none;"></i>
                                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="village_name" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে নাম লিখুন</small>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-fill">
                                            <p class="ms-1">ওয়ার্ডঃ</p>
                                            <div class="flex-fill form-group has-feedback">
                                                <input class="border-0 border-bottom-dotted bg-transparent w-100" type="text" name="mrword" value="" data-bv-notempty-message="দয়া করে ডাকঘরের নাম লিখুন" required="" data-bv-field="union_name"><i class="form-control-feedback bv-no-label" data-bv-icon-for="union_name" style="display: none;"></i>
                                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="union_name" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে ডাকঘরের নাম লিখুন</small>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-fill">
                                            <p class="ms-1">ডাকঘরঃ</p>
                                            <div class="flex-fill form-group has-feedback">
                                                <input class="border-0 border-bottom-dotted bg-transparent w-100" type="text" name="mrdak" value="" data-bv-notempty-message="দয়া করে ডাকঘরের নাম লিখুন" required="" data-bv-field="union_name"><i class="form-control-feedback bv-no-label" data-bv-icon-for="union_name" style="display: none;"></i>
                                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="union_name" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে ডাকঘরের নাম লিখুন</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="d-flex flex-fill">
                                            <p class="ms-1">ইউনিয়ন</p>
                                            <div class="flex-fill form-group has-feedback">
                                                <input class="border-0 border-bottom-dotted bg-transparent w-100" type="text" name="union_name" value="" data-bv-notempty-message="দয়া করে ডাকঘরের নাম লিখুন" required="" data-bv-field="union_name"><i class="form-control-feedback bv-no-label" data-bv-icon-for="union_name" style="display: none;"></i>
                                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="union_name" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে ডাকঘরের নাম লিখুন</small>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-fill form-group has-feedback">
                                            <p class="ms-1">উপজেলাঃ</p>
                                            <div class="flex-fill">
                                                <input class="border-0 border-bottom-dotted bg-transparent w-100" type="text" name="upazila_name" value="" data-bv-notempty-message="দয়া করে উপজেলার নাম লিখুন" required="" data-bv-field="upazila_name"><i class="form-control-feedback bv-no-label" data-bv-icon-for="upazila_name" style="display: none;"></i>
                                            </div>
                                            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="upazila_name" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে উপজেলার নাম লিখুন</small>
                                        </div>
                                        <div class="d-flex flex-fill">
                                            <p class="ms-1">জেলাঃ</p>
                                            <div class="flex-fill form-group has-feedback">
                                                <input class="border-0 border-bottom-dotted bg-transparent w-75" type="text" name="zila_name" value="" data-bv-notempty-message="দয়া করে জেলার নাম লিখুন" required="" data-bv-field="zila_name"><i class="form-control-feedback bv-no-label" data-bv-icon-for="zila_name" style="display: none;"></i>।
                                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="zila_name" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে জেলার নাম লিখুন</small>
                                            </div>
                                        </div>
                                    </div>
                                 
                                    <!-- Row end -->

                                    <!-- Row start -->
                                    <div class="d-block">
                                        <p>আমার জানামতে উপরোক্ত তথ্য সত্য ও সঠিক। কোন প্রকার ভুল বা গড়মিল থাকলে আমি
                                            ব্যক্তিগতভাবে দ্বায়ী থাকব।
                                            অতএব, উপরোক্ত তথ্যাবলী যাচাই পূর্বক আমাকে একটি অবকাঠামো নির্মাণের অনুমতি সনদ প্রদানের
                                            অনুমতি দানে কৃতজ্ঞ করবেন।</p>
                                    </div>
                                    <!-- Row end -->

                                    <!-- Row start -->
                                    <div class="row mt-4">
                                        <div class="col-8"></div>
                                        <div class="col-4">
                                            <p class="text-center">.................................................
                                            </p>
                                            <p class="text-center">আবেদনকারীর স্বাক্ষর</p>
                                        </div>
                                    </div>
                                    <!-- Row end -->

                                    <!-- Row start -->
                                    <div class="border border-dark text-center p-3">
    <p class="fw-bold">অনুমিত প্রদানকারীগণঃ</p>

    <!-- Row start -->
    <div class="d-flex justify-content-between">
        <div class="border border-dark text-center d-flex flex-column align-items-center" style="padding: 10px; width:220px; height:120px;">
            <div class="border-bottom border-dark mb-2" style="width: 50px;"></div>
            <input class="border-0 border-bottom-dotted w-75 mb-2" type="text" readonly="">
            <p class="text-center m-0">মেম্বরের স্বাক্ষর ও সীল</p>
        </div>
        
        <div class="border border-dark text-center d-flex flex-column align-items-center" style="padding: 10px; width:220px; height:120px;">
            <div class="border-bottom border-dark mb-2" style="width: 50px;"></div>
            <input class="border-0 border-bottom-dotted w-75 mb-2" type="text" readonly="">
            <p class="text-center m-0">চেয়ারম্যানের স্বাক্ষর ও সীল</p>
        </div>
    </div>
</div>


                                    <div class="d-flex form-group justify-content-start mb-4 mt-5 d-print-none">
                                        <button class="btn btn-success me-1" type="submit"> সংরক্ষণ করুন</button>

                                        <button class="btn btn-primary me-1" type="button" id="print-application">প্রিন্ট অ্যাপ্লিকেশন</button>
                                        </div>
                                         <p class="fw-bold d-print-none">প্রিন্ট করার আগে অবশ্যই সংরক্ষণ করে রাখবেন।</p>

                                        <div class="zloading pt-1 ps-2">
                                            <svg viewBox="25 25 50 50">
                                                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
                                            </svg>
                                        </div>
                                    </div>

                                    <script>
                                        (function($) {
                                            $(document).ready(function() {
                                                $('#print-application').on('click', function() {
                                                    $('.card.application-form').removeClass('d-print-none').addClass('d-print-block');
                                                    $('.card.certificate-form').removeClass('d-print-block').addClass('d-print-none');
                                                    print();
                                                });
                                                $('#print-certificate').on('click', function() {
                                                    $('.card.application-form').removeClass('d-print-block').addClass('d-print-none');
                                                    $('.card.certificate-form').removeClass('d-print-none').addClass('d-print-block');
                                                    print();
                                                });
                                                $('#add-another-row').on('click', function() {
                                                    var row = `  <tr>
                                                         <td class="form-group has-feedback">
                                                             <input class="border-0 bg-transparent w-100" type="text"
                                                                 name="no[]"
                                                                 data-bv-notempty-message="দয়া করে ওয়ারিশ নং লিখুন"
                                                                 required="" data-bv-field="no[]"><i
                                                                 class="form-control-feedback bv-no-label"
                                                                 data-bv-icon-for="no[]" style="display: none;"></i>
                                                             <small class="help-block" data-bv-validator="notEmpty"
                                                                 data-bv-for="no[]" data-bv-result="NOT_VALIDATED"
                                                                 style="display: none;">দয়া
                                                                 করে ওয়ারিশ নং লিখুন</small>
                                                         </td>
                                                         <td class="form-group has-feedback">
                                                             <input class="border-0 bg-transparent w-100" type="text"
                                                                 name="o_name[]"
                                                                 data-bv-notempty-message="দয়া করে ওয়ারিশের নাম লিখুন"
                                                                 required="" data-bv-field="o_name[]"><i
                                                                 class="form-control-feedback bv-no-label"
                                                                 data-bv-icon-for="o_name[]" style="display: none;"></i>
                                                             <small class="help-block" data-bv-validator="notEmpty"
                                                                 data-bv-for="o_name[]" data-bv-result="NOT_VALIDATED"
                                                                 style="display: none;">দয়া
                                                                 করে ওয়ারিশের নাম লিখুন</small>
                                                         </td>
                                                         <td class="form-group has-feedback">
                                                             <input class="border-0 bg-transparent w-100" type="text"
                                                                 name="o_relation[]"
                                                                 data-bv-notempty-message="দয়া করে ওয়ারিশের সম্পর্ক নাম লিখুন"
                                                                 required="" data-bv-field="o_relation[]"><i
                                                                 class="form-control-feedback bv-no-label"
                                                                 data-bv-icon-for="o_relation[]"
                                                                 style="display: none;"></i>
                                                             <small class="help-block" data-bv-validator="notEmpty"
                                                                 data-bv-for="o_relation[]" data-bv-result="NOT_VALIDATED"
                                                                 style="display: none;">দয়া
                                                                 করে ওয়ারিশের সম্পর্ক নাম লিখুন</small>
                                                         </td>
                                                         <td class="form-group has-feedback">
                                                             <input class="border-0 bg-transparent w-100" type="text"
                                                                 name="rnid[]"
                                                                 data-bv-notempty-message="দয়া করে ওয়ারিশ নং লিখুন"
                                                                 required="" data-bv-field="rnid[]"><i
                                                                 class="form-control-feedback bv-no-label"
                                                                 data-bv-icon-for="rnid[]" style="display: none;"></i>
                                                             <small class="help-block" data-bv-validator="notEmpty"
                                                                 data-bv-for="rnid[]" data-bv-result="NOT_VALIDATED"
                                                                 style="display: none;">দয়া
                                                                 করে ওয়ারিশ নং লিখুন</small>
                                                         </td>
                                                         <td class="form-group has-feedback">
                                                             <input class="border-0 bg-transparent w-100" type="text"
                                                                 name="rbirth[]"
                                                                 data-bv-notempty-message="দয়া করে ওয়ারিশের নাম লিখুন"
                                                                 required="" data-bv-field="rbirth[]"><i
                                                                 class="form-control-feedback bv-no-label"
                                                                 data-bv-icon-for="rbirth[]" style="display: none;"></i>
                                                             <small class="help-block" data-bv-validator="notEmpty"
                                                                 data-bv-for="rbirth[]" data-bv-result="NOT_VALIDATED"
                                                                 style="display: none;">দয়া
                                                                 করে ওয়ারিশের নাম লিখুন</small>
                                                         </td>
                                                         <td class="form-group has-feedback">
                                                             <input class="border-0 bg-transparent w-100" type="text"
                                                                 name="rcom[]"
                                                                 data-bv-notempty-message="দয়া করে ওয়ারিশের সম্পর্ক নাম লিখুন"
                                                                 required="" data-bv-field="rcom[]"><i
                                                                 class="form-control-feedback bv-no-label"
                                                                 data-bv-icon-for="rcom[]"
                                                                 style="display: none;"></i>
                                                             <small class="help-block" data-bv-validator="notEmpty"
                                                                 data-bv-for="rcom[]" data-bv-result="NOT_VALIDATED"
                                                                 style="display: none;">দয়া
                                                                 করে ওয়ারিশের সম্পর্ক নাম লিখুন</small>
                                                         </td>
                                                         <td class="d-print-none form-group text-center">
                                                             <button type="button"
                                                                 class="btn btn-outline-danger remove-tr">-</button>
                                                         </td>
                                                     </tr>`;
                                                    $(".dynamic-table tbody").append(row);
                                                });
                                                $(document).on("click", ".remove-tr", function(e) {
                                                    e.preventDefault();
                                                    $(this).parents("tr").remove();
                                                });
                                            });
                                        })(jQuery);
                                    </script>

                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end col -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->


</div>
