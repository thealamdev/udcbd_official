<button id="notPrint" style="background-color: green;color: white;" onclick="switchLanguage('en')">English</button>
<button id="notPrint" style="background-color: green;color: white;" onclick="switchLanguage('bn')">বাংলা</button>
  <button id="notPrint" style="background-color: blue;color: white;" onclick="setLineSpacing(1)">Set to 1</button>
  <button id="notPrint" style="background-color: blue;color: white;" onclick="setLineSpacing(1.5)">Set to 1.5</button>
  <button id="notPrint" style="background-color: blue;color: white;" onclick="setLineSpacing(2)">Set to 2</button>
  <button id="notPrint" style="background-color: blue;color: white;" onclick="setLineSpacing(2.25)">Set to 2.25</button>
  <button id="notPrint" style="background-color: blue;color: white;" onclick="setLineSpacing(3)">Set to 3</button>
  <button id="notPrint" style="background-color: blue;color: white;" onclick="setLineSpacing(3.5)">Set to 3.5</button>
  <button id="notPrint" style="background-color: blue;color: white;" onclick="setLineSpacing(4)">Set to 4</button>
  <button id="notPrint" style="background-color: blue;color: white;" onclick="setLineSpacing(5)">Set to 5</button>
  <button id="notPrint" style="background-color: blue;color: white;" onclick="setLineSpacing(6)">Set to 6</button>
  <button id="notPrint" style="background-color: blue;color: white;" onclick="setLineSpacing(7)">Set to 7</button>

<style>

  .marl {
      margin-left: 100px;
  }

  @media  print {
      .marl {
          margin-left: 0px;
      }
      #notPrint, #notPrint *{
visibility: hidden;
}
  }
      /* Default line spacing */
    .default-line-spacing {
      line-height: 1.5;
    }

</style>
<?php echo $__env->make('frontend.user.sanad.applications.applicationstyles.style_application', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id="content">
  <div class="container-fluid card print-card shadow print-shadow-0 print-m-0 certificate-form font-15 d-print-block">
      <div class="card-body print-p-0">
          <div class="col-12 col-lg-10 col-xxl-8 pt-3 p-5 certificate-style marl">
              <style media="all">
                  .certificate-style::before {
                      background-image: url(<?php echo e(asset('/setting/application/application-logo/' . $application->union_logo)); ?>);
                  }
              </style>
<div class="row">
                  <div class="col-2 text-center mb-4">
                      <img src="https://seeklogo.com/images/B/bangladesh-govt-logo-A2C7688845-seeklogo.com.png"
                          class="w-100">
                  </div>
              </div>
              <div class="row" style="margin-top:-8rem;">
                  <div class="col-2 text-center mt-3">
                  </div>
                  <div class="col-8 text-center">
                      <h6 class="language-switch" data-en="Bismillahir Rahmanir Rahim" data-bn="বিসমিল্লাহির রাহমানির রাহিম" style="color:#8E5BB4;"> বিসমিল্লাহির রাহমানির রাহিম</h6>
                      <h6 class="language-switch" data-en="Government of the People's Republic of Bangladesh" data-bn="গণপ্রজাতন্ত্রী বাংলাদেশ সরকার" style="color:#8E5BB4; font-size:20px;">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</h6>
                      <h4 class="language-switch" data-en="<?php echo e($application->noe); ?> No. <?php echo e($application->une); ?> Union Parishad" data-bn="<?php echo e($application->applied_union_no); ?> নং <?php echo e($union->bn_name); ?> ইউনিয়ন পরিষদ" style="color:#7030A0;font-size:30px;"><?php echo e($application->applied_union_no); ?> নং <?php echo e($union->bn_name); ?>

                          ইউনিয়ন পরিষদ</h4>
                      <h6 class="language-switch" style="font-size:20px" data-en="Chairman Name: <?php echo e($application->che); ?>, " data-bn="চেয়ারম্যানের নাম: <?php echo e($application->applied_chairman_name); ?>, " style="color:#000000;">চেয়ারম্যান: <?php echo e($application->applied_chairman_name); ?>,
                  </div>
                  <div class="col-2 text-center mt-3">
                      <img src="<?php echo e(asset('/setting/application/application-logo/' . $application->union_logo)); ?>"
                          style="width: 120px;margin-top:-2rem;">
                  </div>
              </div>
              <!-- header end here -->
              
              
              
              
              <!-- me edit -->
              <div class="row">
                  <div class="col-2 text-center mt-3">
                  </div>
                  <div class="col-8 text-center">
                      <h6 class="language-switch" style="color:#000000; font-size:20px;" data-en=" Upazilla: <?php echo e($application->upe); ?>, District :<?php echo e($application->eng); ?>। " data-bn="উপজেলা : <?php echo e($application->applied_upazilla_name); ?>, জেলা : <?php echo e($application->applied_zilla_name); ?>। " >উপজেলা : <?php echo e($application->applied_upazilla_name); ?>, জেলা :
                          <?php echo e($application->applied_zilla_name); ?>।
                      </h6>
                  </div>
              </div>
              <!-- me edit -->
              
                      <div class="col-4">				
                        <hr style="border: 1px solid black;margin: 2rem; margin-top: 2px;margin-left: 10px; width:300%">
                                                <hr style="border: 1px solid black;margin: 2rem; margin-top: -1.9rem;margin-left: 10px; width:300%">
                       </div>
              
              <!-- Data start -->
              <div class="row mt-3 mb-5" style="margin-top: 2rem;">
                  <div style="font-size:18.8px" class="col-3 my-auto language-switch" data-en="Memo No. - <?php echo e($application->form_serial); ?>" data-bn="স্মারক নং - <?php echo e($application->form_serial); ?>">স্মারক নং - <?php echo e($application->form_serial); ?></div>

                  <div class="col-6 text-center border border-2 rounded-pill border-dark"
                      style="background-color: #B4D5FF;margin-top:6em;">
                      <h6 style="font-size:25px;" class="m-2 language-switch" data-en="Certificate Name" data-bn="প্রত্যায়ন পত্র নাম">একই নামের প্রত্যায়ন পত্র</h6>
                  </div>

                  <div style="font-size:18.8px" class="col-3 text-right my-auto language-switch" data-en="Date: <?php echo e($application->date); ?>" data-bn="তারিখঃ <?php echo e($application->date); ?>">তারিখঃ <?php echo e($application->date); ?></div>
              </div>

              <!-- Row start -->
              <div class="d-flex">
                  <div class="flex-fill">

                  </div>
              </div>

              <!-- Row end -->
        <p style="font-size: 18.8px;letter-spacing: 1px;margin-top: 2rem; text-align:justify;" id="text" class="language-switch default-line-spacing" data-en="In this sense, the certificate of Certificate Name is being issued, <strong><?php echo e($application->applicant); ?></strong> National Identity Card / Birth Certificate No:  <strong><?php echo e($application->nid_birth); ?></strong> Father/Husband:  <strong><?php echo e($application->father_husband_name); ?>, </strong>Village: <strong><?php echo e($application->mrgram); ?>,</strong> Ward:   <strong><?php echo e($application->mrword); ?></strong>, Post office: <strong><?php echo e($application->mrdak); ?>, </strong>
            </strong>, Union:  <strong><?php echo e($application->union_name); ?></strong>, Upazila: <strong><?php echo e($application->upazilla_name); ?></strong>, District: <strong><?php echo e($application->zilla_name); ?></strong> He belongs to my union: <strong><?php echo e($application->mrword); ?></strong> A permanent resident of Ward no. I know him personally. To my knowledge <strong><?php echo e($application->rn1); ?></strong> and <strong><?php echo e($application->rn2); ?></strong> are the same person. " data-bn="   এই মর্মে প্রত্যায়ন পত্র নাম প্রদান করা যাইতেছে যে, <strong><?php echo e($application->applicant); ?></strong> জাতীয় পরিচয়পত্র / জন্ম সনদ নং: <strong><?php echo e($application->nid_birth); ?></strong> পিতা/স্বামীঃ <strong><?php echo e($application->father_husband_name); ?>, </strong>গ্রামঃ<strong><?php echo e($application->mrgram); ?>,</strong> ওয়ার্ডঃ <strong><?php echo e($application->mrword); ?></strong>, ডাকঘরঃ<strong><?php echo e($application->mrdak); ?>, </strong>
            </strong>ইউনিয়নেঃ <strong><?php echo e($application->union_name); ?></strong>, উপজেলাঃ <strong><?php echo e($application->upazilla_name); ?></strong>, জেলাঃ <strong><?php echo e($application->zilla_name); ?></strong> তিনি আমার ইউনিয়নের   <strong><?php echo e($application->mrword); ?></strong>
           নং ওয়ার্ডের একজন স্থায়ী বাসিন্দা। আমি তাকে ব্যক্তি গত ভাবে চিনি ও জানি।  আমার জানামতে <strong><?php echo e($application->rn1); ?></strong> এবং <strong><?php echo e($application->rn2); ?></strong> এই উভয় নামে একই ব্যাক্তি।">
           এই মর্মে প্রত্যায়ন পত্র নাম প্রদান করা যাইতেছে যে, <strong><?php echo e($application->applicant); ?></strong> জাতীয় পরিচয়পত্র / জন্ম সনদ নং: <strong><?php echo e($application->nid_birth); ?></strong> পিতা/স্বামীঃ <strong><?php echo e($application->father_husband_name); ?>, </strong>গ্রামঃ<strong><?php echo e($application->mrgram); ?>,</strong> ওয়ার্ডঃ <strong><?php echo e($application->mrword); ?></strong>, ডাকঘরঃ<strong><?php echo e($application->mrdak); ?>, </strong>
            </strong>,ইউনিয়নঃ <strong><?php echo e($application->union_name); ?></strong>, উপজেলাঃ <strong><?php echo e($application->upazilla_name); ?></strong>, জেলাঃ <strong><?php echo e($application->zilla_name); ?></strong> তিনি আমার ইউনিয়নের   <strong><?php echo e($application->mrword); ?></strong>
           নং ওয়ার্ডের একজন স্থায়ী বাসিন্দা। আমি তাকে ব্যক্তি গত ভাবে চিনি ও জানি। আমার জানামতে <strong><?php echo e($application->rn1); ?></strong> এবং <strong><?php echo e($application->rn2); ?></strong> এই উভয় নামে একই ব্যাক্তি


        </p>
        <p style="font-size: 18.8px;letter-spacing: 1px;" id="text" class="language-switch default-line-spacing"  class="language-switch" data-en="I pray for the forgiveness/peace of his soul." data-bn="
আমি তার জীবনের সার্বিক উন্নতি ও মঙ্গল কামনা করি।
">
আমি তার জীবনের সার্বিক উন্নতি ও মঙ্গল কামনা করি।
</p>

              <!-- row Start -->


              <!-- Row start -->
              <div class="row mb-4 print-mb-2" style="margin-top: 6em;">
                  <!-- seal area -->
                  <div class="col-3 d-flex align-items-center">
                      <div class="text-center border border-1 seal-border">
                          <p class="mt-3 pt-4 font-6 language-switch" data-en="Seal of office" data-bn="কার্যালয়ের সীল"> কার্যালয়ের সীল </p>
                      </div>
                  </div>

                  <!-- bar code area -->
                  <div class="col-3 text-cnenter justify-content-center align-items-center mt-4">
                      <hr style="border: 1px solid black; width:90%; margin-left:-0.5rem">
                      <p class="font-6 language-switch" data-en="Manufacturer's seal and signature" data-bn="প্রস্তুত কারীর সীল ও স্বাক্ষর">প্রস্তুত কারীর সীল ও   স্বাক্ষর</p>
                  </div>
                  <div class="col-3 text-center justify-content-center align-items-center mt-4">
                      <hr style="border: 1px solid black; width:90%">
                      <p class="font-6 language-switch" data-en="Seal and signature of UP member" data-bn="ইউপি সদস্যর সীল ও স্বাক্ষর">ইউপি সদস্যর সীল ও স্বাক্ষর</p>
                  </div>
                  <div class="col-3 text-center justify-content-center align-items-center mt-4">
                      <hr style="border: 1px solid black; width:90%">
                      <p class="font-6 language-switch" data-en="of the approver
Seal and Signature" data-bn="অনুমোদন কারীর
সীল ও স্বাক্ষর">অনুমোদন কারীর সীল ও স্বাক্ষর</p>
                  </div>
              </div>
              <!-- Row end -->
              <div class="row">
<div class="col-2 text-center mb-6">
                    <div id="qr_english">
<?php echo QrCode::size(100)->generate(route('frontend.sanadViewer',["language"=>"en","id"=>$application_id])); ?>

</div>
<div id="qr_bangla">
<?php echo QrCode::size(100)->generate(route('frontend.sanadViewer',["language"=>"bn","id"=>$application_id])); ?>

</div>
                     
                  </div>
                  <div class="col-10"> <p  class="language-switch" data-en="Scan the certificate with the QR CODE app on your mobile to verify it" data-bn="সনদটি যাচাই করতে আপনার মোবাইলে থাকা QR CODE অ্যাপ দিয়ে স্ক্যান করুন" style="margin-left: 3rem; margin-top: 4rem;margin-bottom: -3rem;">সনদটি যাচাই করতে আপনার মোবাইলে থাকা QR CODE অ্যাপ দিয়ে স্ক্যান করুন </p></div>
              </div>
              <!--form body end here --> 
          </div>
      </div>

  </div>
<script>
          function switchLanguage(language) {
            var elements = document.getElementsByClassName('language-switch');
            var qrEnglish = document.getElementById("qr_english")
            var qrBangla = document.getElementById("qr_bangla")
            for (var i = 0; i < elements.length; i++) {
                if (language === 'en') {
                    elements[i].innerHTML = elements[i].dataset.en;
                    qrBangla.style.display = "none";
                    qrEnglish.style.display = "block";
                } else if (language === 'bn') {
                    elements[i].innerHTML = elements[i].dataset.bn;
                    qrEnglish.style.display = "none";
                    qrBangla.style.display = "block";
                }
            }
        }
        switchLanguage("<?php echo e($language); ?>");
  
    function setLineSpacing(size) {
      var textElement = document.getElementById('text');
      textElement.classList.remove('default-line-spacing');
      textElement.style.lineHeight = size;
    }
</script>
</div><?php /**PATH C:\laragon\www\udcbd\resources\views/backend/content/applications/sanad-certificate/c_samename.blade.php ENDPATH**/ ?>