<button id="notPrint" style="background-color: green;color: white;" onclick="switchLanguage('en')">English</button>
<button id="notPrint" style="background-color: green;color: white;" onclick="switchLanguage('bn')">বাংলা</button>

<style>

  .marl {
      margin-left: 100px;
  }

  @media print {
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
@include('frontend.user.sanad.applications.applicationstyles.style_application')
<div id="content">
  <div class="container-fluid card print-card shadow print-shadow-0 print-m-0 certificate-form font-15 d-print-block">
      <div class="card-body print-p-0">
          <div class="col-12 col-lg-10 col-xxl-8 pt-3 p-5 certificate-style marl">
              <style media="all">
                  .certificate-style::before {
                      background-image: url({{ asset('/setting/application/application-logo/' . $application->union_logo) }});
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
                      <h4 class="language-switch" data-en="{{ $application->noe }} No. {{ $application->une }} Union Parishad" data-bn="{{ $application->applied_union_no }} নং {{ $union->bn_name }} ইউনিয়ন পরিষদ" style="color:#7030A0;font-size:30px;">{{ $application->applied_union_no }} নং {{ $union->bn_name }}
                          ইউনিয়ন পরিষদ</h4>
                      <h6 class="language-switch" style="font-size:20px" data-en="Chairman Name: {{$application->che }}, " data-bn="চেয়ারম্যান: {{ $application->applied_chairman_name}}, " style="color:#000000;">চেয়ারম্যান: {{ $application->applied_chairman_name }},
                  </div>
                  <div class="col-2 text-center mt-3">
                      <img src="{{ asset('/setting/application/application-logo/' . $application->union_logo) }}"
                          style="width: 120px;margin-top:-2rem;">
                  </div>
              </div>
              <!-- header end here -->
              
              
              
              
              <!-- me edit -->
              <div class="row">
                  <div class="col-2 text-center mt-3">
                  </div>
                  <div class="col-8 text-center">
                      <h6 class="language-switch" style="color:#000000; font-size:20px;" data-en=" Upazilla: {{ $application->upe }}, District :{{ $application->eng }}। " data-bn="উপজেলা : {{ $application->applied_upazilla_name }}, জেলা : {{ $application->applied_zilla_name }}। " >উপজেলা : {{ $application->applied_upazilla_name }}, জেলা :
                          {{ $application->applied_zilla_name }}।
                      </h6>
                  </div>
              </div>
              <!-- me edit -->
              
                      <div class="col-4">				
                        <hr style="border: 1px solid black;margin: 0rem; margin-top: 0px;margin-left: 10px; width:300%">
                                                <hr style="border: 1px solid black;margin: 2rem; margin-top: -0rem;margin-left: 10px; width:300%">
                       </div>

   
                  
                             
              <!-- Data start -->
              <div class="row mt-3 mb-5" style="margin-top: 0px;">
                  <div style="font-size:18.8px" class="col-3 my-auto language-switch" data-en="Memo No. - {{ $application->form_serial }}" data-bn="স্মারক নং - {{ $application->form_serial }}">স্মারক নং - {{ $application->form_serial }}</div>

                  <div class="col-6 text-center border border-2 rounded-pill border-dark"
                      style="background-color: #B4D5FF;margin-top:3em;">
                      <h6 style="font-size:25px;" class="m-2 language-switch" data-en="Auto Rickshaw Trade License" data-bn="অটো রিক্সা ট্রেড লাইসেন্স"> অটো রিক্সা ট্রেড লাইসেন্স</h6>
                  </div>

                  <div style="font-size:18.8px" class="col-3 text-right my-auto language-switch" data-en="Date: {{ $application->date }}" data-bn="তারিখঃ {{ $application->date }}">তারিখঃ {{ $application->date }}</div>
              </div>
              
              
                              <div class="col-12 mt-3">
    <div class="border border-dark text-center p-3" style="margin-top: -2.4rem; margin-left: 48rem;margin-bottom:-4rem; height: 30mm; width: 25mm; border: 1px solid #000;">
        PHOTO
    </div>
</div>

              <!-- Row start -->
<div class="row" >
    <div class="col-3">
        
        <p style="font-size:18.5px;" class="language-switch" data-en="Name of institution" data-bn="প্রতিষ্ঠানের নাম">প্রতিষ্ঠানের নাম</p></p>
    </div>

    <div class="col-9 d-flex">
        <span class="me-3">:</span>
        <div class="flex-fill form-group has-feedback">
            <input style="font-size:18.5px;" name="organization_name" value="{{ $application->pname }}" class="w-100 border-0 bg-transparent font-size" data-bv-notempty-message="দয়া করে লাইসেন্স ধারীর নাম লিখুন" type="text" required="" readonly data-bv-field="applicant"><i class="form-control-feedback bv-no-label" data-bv-icon-for="applicant" style="display: none;"></i>
            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="applicant" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে ধারীর নাম লিখুন</small>
        </div>
    </div>
</div>

<!-- Row -->
<div class="row">
    <div class="col-3">
        
        <p style="font-size:18.5px;" class="language-switch" data-en="Name of Licensee" data-bn="লাইসেন্স ধারীর নাম">লাইসেন্স ধারীর নাম</p>
    </div>

    <div class="col-9 d-flex">
        <span class="me-3">:</span>
        <div class="flex-fill form-group has-feedback">
            <input style="font-size:18.5px;" name="applicant" value="{{ $application->lname }}" class="w-100 border-0 bg-transparent font-size" data-bv-notempty-message="দয়া করে লাইসেন্স ধারীর নাম লিখুন" type="text" required="" readonly data-bv-field="applicant"><i class="form-control-feedback bv-no-label" data-bv-icon-for="applicant" style="display: none;"></i>
            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="applicant" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে লাইসেন্স ধারীর নাম লিখুন</small>
        </div>
    </div>
</div>


<!-- Row -->
<div class="row">
    <div class="col-3">
        
        <p style="font-size:18.5px;" class="language-switch me-2" data-en="Identity Card / Birth Certificate" data-bn="পরিচয়পত্র / জন্ম সনদ">পরিচয়পত্র / জন্ম সনদ</p>
    </div>
    <div class="col-9 d-flex">
        <span class="me-3">:</span>
        <div class="flex-fill form-group has-feedback">
            <input style="font-size:18.5px;" class="border-0 w-100 bg-transparent nid-birth font-size" type="text" name="nid_birth" value="{{ $application->nid_birth }}" data-bv-notempty-message="দয়া করে জাতীয় পরিচয়পত্র / জন্ম সনদের নম্বর লিখুন" required="" readonly data-bv-field="nid_birth"><i class="form-control-feedback bv-no-label" data-bv-icon-for="nid_birth" style="display: none;"></i>
            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="nid_birth" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে জাতীয় পরিচয়পত্র / জন্ম সনদের নম্বর
                লিখুন</small>
        </div>
    </div>
</div>

<!-- Row -->
<div class="row">
    <div class="col-3">
       
        <p style="font-size:18.5px;" class="language-switch me-2" data-en="Father Name" data-bn="পিতার নাম">পিতার নাম</p>
    </div>
    <div class="col-9 d-flex">
        <span class="me-3">:</span>
        <div class="flex-fill form-group has-feedback">
            <input style="font-size:18.5px;" name="father_name" value="{{ $application->father_husband_name }}" class="w-100 border-0 bg-transparent font-size" data-bv-notempty-message="দয়া করে পিতার নাম লিখুন" type="text" required="" readonly data-bv-field="father_name"><i class="form-control-feedback bv-no-label" data-bv-icon-for="father_name" style="display: none;"></i>
            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="father_name" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে পিতার নাম লিখুন</small>
        </div>
    </div>
</div>

<!-- Row -->
<div class="row">
    <div class="col-3">
        
        <p style="font-size:18.5px;" class="language-switch" data-en="Addrerss" data-bn="ঠিকানা ">ঠিকানা </p>
    </div>
    <div class="col-9 d-flex form-group has-feedback">
        <span class="me-3">:</span>
        <div class="flex-fill">
            <input style="font-size:18.5px;" name="address" value="{{ $application->thikhana }}" class="w-100 border-0 bg-transparent font-size" data-bv-notempty-message="দয়া করে ঠিকানা লিখুন" type="text" required="" readonly data-bv-field="address"><i class="form-control-feedback bv-no-label" data-bv-icon-for="address" style="display: none;"></i>
        </div>
        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="address" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে ঠিকানা লিখুন</small>
    </div>
</div>

<!-- Row -->
<div class="row">
    <div class="col-3">
        
        <p style="font-size:18.5px;" class="language-switch" data-en="Type of business" data-bn="ব্যবসার ধরণ">ব্যবসার ধরণ</p>
    </div>
    <div class="col-9 d-flex">
        <span class="me-3">:</span>
        <div class="flex-fill form-group has-feedback">
            <input style="font-size:18.5px;" name="business_type" value="{{ $application->btype }}" class="w-100 border-0 bg-transparent font-size" data-bv-notempty-message="দয়া করে ব্যবসার ধরণ লিখুন" type="text" required="" readonly data-bv-field="business_type"><i class="form-control-feedback bv-no-label" data-bv-icon-for="business_type" style="display: none;"></i>
            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="business_type" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে ব্যবসার ধরণ লিখুন</small>
        </div>
    </div>
</div>

<!-- Row -->
<div class="row">
    <div class="col-3">
        
        <p style="font-size:18.5px;" class="language-switch" data-en="place of business" data-bn="ব্যবসার স্থান">ব্যবসার স্থান</p>
    </div>
    <div class="col-9 d-flex">
        <span class="me-3">:</span>
        <div class="flex-fill form-group has-feedback">
            <input style="font-size:18.5px;" name="business_place" value="{{ $application->bstan }}" class="w-100 border-0 bg-transparent font-size" data-bv-notempty-message="দয়া করে ব্যবসার স্থান লিখুন" type="text" required="" readonly data-bv-field="business_place"><i class="form-control-feedback bv-no-label" data-bv-icon-for="business_place" style="display: none;"></i>
            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="business_place" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে ব্যবসার স্থান লিখুন</small>
        </div>
    </div>
</div>

<!-- Row -->
<div class="row">
    <div class="col-3">
        
        <p style="font-size:18.5px;" class="language-switch" data-en="Validity period" data-bn="বৈধতার মেয়াদ">বৈধতার মেয়াদ</p>
    </div>

    <div class="col-3 d-flex">
        <span class="me-3">:</span>
        <div class="flex-fill form-group has-feedback">
            <input style="font-size:18.5px;" name="validity_period" value="{{ $application->rdt1 }}" class="w-100 border-0 bg-transparent font-size" data-bv-notempty-message="দয়া করে বৈধতার মেয়াদ  লিখুন" type="text" required="" readonly data-bv-field="validity_period"><i class="form-control-feedback bv-no-label" data-bv-icon-for="validity_period" style="display: none;"></i>
            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="validity_period" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে বৈধতার মেয়াদ লিখুন</small>
        </div>
    </div>

    <div class="col-2">
       
        <p style="font-size:18.5px;" class="language-switch" data-en="money year" data-bn="অর্থ বৎসর">অর্থ বৎসর</p>
    </div>

    <div class="col-4 d-flex">
        <span class="me-3">:</span>
        <div class="flex-fill form-group has-feedback">
            <input style="font-size:18.5px;" name="money_year" value="{{ $application->rdt2 }}" class="w-100 border-0 bg-transparent font-size" data-bv-notempty-message="দয়া করে অর্থ বৎসর লিখুন" type="text" required="" readonly  data-bv-field="money_year"><i class="form-control-feedback bv-no-label" data-bv-icon-for="money_year" style="display: none;"></i>
            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="money_year" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে অর্থ বৎসর লিখুন</small>
        </div>
    </div>
</div>

<!-- Row -->
<div class="row">
    <div class="col-3">
        
        <p style="font-size:18.5px;" class="language-switch" data-en="Amount of fee payable" data-bn="ফি প্রদানের পরিমান">ফি প্রদানের পরিমান</p>
    </div>

    <div class="col-5 d-flex">
        <span class="me-3">:</span>
        <div class="flex-fill form-group has-feedback">
            <input style="font-size:18.5px;" name="fee_amount" value="{{ $application->rtt1 }}" style="width: 60px;" class="border-0 bg-transparent font-size" data-bv-notempty-message="দয়া করে ফি  প্রদানের পরিমান লিখুন" type="text" required=""  readonly data-bv-field="fee_amount"><i class="form-control-feedback bv-no-label" data-bv-icon-for="fee_amount" style="display: none;"></i>
            <span style="margin-left:-7em;" class="font-size language-switch" data-en="TAKA" data-bn="টাকা">টাকা </span>
            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="fee_amount" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে ফি প্রদানের পরিমান লিখুন</small>
        </div>
    </div>
</div>

<!-- Row -->
<div class="row">
    <div class="col-3">
        
        <p style="font-size:18.5px;" class="language-switch" data-en="VAT collection" data-bn="ভ্যাট আদায়">ভ্যাট আদায়</p>
    </div>

    <div class="col-5 d-flex">
        <span class="me-3">:</span>
        <div class="flex-fill form-group has-feedback">
            <input style="font-size:18.5px;" name="vat_amount" value="{{ $application->rtt2 }}" style="width: 60px;" class="border-0 bg-transparent font-size" data-bv-notempty-message="দয়া করে ভ্যাট আদায়ের পরিমান লিখুন" type="text" required=""  readonly data-bv-field="vat_amount"><i class="form-control-feedback bv-no-label" data-bv-icon-for="vat_amount" style="display: none;"></i>
            <span style="margin-left:-7em;" class="font-size language-switch" data-en="TAKA" data-bn="টাকা">টাকা</span>
            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="vat_amount" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে ভ্যাট আদায়ের পরিমান লিখুন</small>
        </div>
    </div>
</div>

<!-- Row -->
<div class="row">
    <div class="col-3">
       
        <p style="font-size:18.5px;" class="language-switch" data-en="tax collection" data-bn="কর আদায় ">কর আদায়</p>
    </div>

    <div class="col-5 d-flex">
        <span class="me-3">:</span>
        <div class="flex-fill form-group has-feedback">
            <input style="font-size:18.5px;" name="tax_amount" value="{{ $application->rtt3 }}" style="width: 60px;" class="border-0 bg-transparent font-size" data-bv-notempty-message="দয়া করে কর আদায়ের পরিমান লিখুন" type="text" required="" readonly data-bv-field="tax_amount"><i class="form-control-feedback bv-no-label" data-bv-icon-for="tax_amount" style="display: none;"></i>
            <span style="margin-left:-7em;" class="font-size language-switch" data-en="TAKA" data-bn="টাকা">টাকা</span>
            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="tax_amount" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে কর আদায়ের পরিমান লিখুন</small>
        </div>
    </div>
</div>
                      <div class="col-4">				
                        <hr style="border: 0.2px solid black; margin-top:-10px; margin-bottom:-2px; margin-left: -20px; width:150%">
                       </div>
<!-- Row -->
<div class="row">
    <div class="col-3">
        
        <p style="font-size:18.5px;" class="font-size language-switch" data-en="total" data-bn="মোট">মোট </p>
    </div>

    <div class="col-5 d-flex">
        <span class="me-3">:</span>
        <div class="flex-fill form-group has-feedback">
            <input style="font-size:18.5px;" name="total_amount" value="{{ $application->rtt4 }}" style="width: 60px;" class="border-0 bg-transparent font-size" data-bv-notempty-message="দয়া করে মোট পরিমান লিখুন" type="text" required="" readonly data-bv-field="total_amount"><i class="form-control-feedback bv-no-label" data-bv-icon-for="total_amount" style="display: none;"></i>
            <span style="margin-left:-7em;" class="font-size language-switch" data-en="TAKA" data-bn="টাকা">টাকা</span>
            <small class="help-block" data-bv-validator="notEmpty" data-bv-for="total_amount" data-bv-result="NOT_VALIDATED" style="display: none;">দয়া করে মোট পরিমান লিখুন</small>
        </div>
    </div>
</div>

<!-- Row -->
<div class="row mt-5">
    <div class="col-12">
        
        <p style="font-size:18.5px;" class="font-size language-switch" data-en="He was accepted and given a license to carry on his business" data-bn="গ্রহণ পূর্বক তার ব্যবসা চালাইয়া যাইবার লাইসেন্স
            প্রদান করা হইল। ">গ্রহণ পূর্বক তার ব্যবসা চালাইয়া যাইবার লাইসেন্স
            প্রদান করা হইল।</p>
    </div>
</div>
              <!-- row Start -->


              <!-- Row start -->
              <div class="row mb-4 print-mb-2" style="margin-top: 2em;">
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
{!! QrCode::size(100)->generate(route('frontend.sanadViewer',["language"=>"en","id"=>$application_id])) !!}
</div>
<div id="qr_bangla">
{!! QrCode::size(100)->generate(route('frontend.sanadViewer',["language"=>"bn","id"=>$application_id])) !!}
</div>
                     
                  </div>
                  <div class="col-10"> <p  class="language-switch" data-en="Scan the certificate with the QR CODE app on your mobile to verify it" data-bn="সনদটি যাচাই করতে আপনার মোবাইলে থাকা QR CODE অ্যাপ দিয়ে স্ক্যান করুন" style="margin-left: 3rem; margin-top: 2rem;margin-bottom -6rem;">সনদটি যাচাই করতে আপনার মোবাইলে থাকা QR CODE অ্যাপ দিয়ে স্ক্যান করুন </p></div>
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
        switchLanguage("{{ $language }}");
  
    function setLineSpacing(size) {
      var textElement = document.getElementById('text');
      textElement.classList.remove('default-line-spacing');
      textElement.style.lineHeight = size;
    }
</script>
</div>