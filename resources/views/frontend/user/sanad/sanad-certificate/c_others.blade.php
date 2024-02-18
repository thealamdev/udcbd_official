  @extends('frontend.layouts.app')

  @section('title', 'Apply for Sanad')

  @section('content')
  <style>
      .marl {
          margin-left: 100px;
      }

      @media print {
          .marl {
              margin-left: 0px;
          }
      }
  </style>
  @include('frontend.user.sanad.applications.applicationstyles.style_application')
  <div id="content">

      <div class="card print-card shadow print-shadow-0 my-5 print-m-0 d-print-block certificate-form font-15">
          <div class="card-body print-p-0 marl">
              <div class="col-12 col-lg-10 col-xxl-8 p-5" style="border: 5px solid #7030A0; background-color: #F2EEEB; background-image: url(https://www.updigitalservice.com/wp-content/themes/prottoyon/images/sonod-bg-img.png);background-repeat: no-repeat; background-position: center; background-size: contain;">

                  <!-- header start here -->
                  <div class="row">
                      <div class="col-2 text-center mt-3">
                          <img src="{{ asset('/setting/application/application-logo/' . $application->union_logo) }}" class="w-75">
                      </div>
                      <div class="col-8 text-center">
                          <h3 style="color:#8E5BB4;">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</h3>
                          <h2 style="color:#7030A0;">{{ $application->applied_union_no }} নং {{ $union->bn_name }}
                              ইউনিয়ন পরিষদ</h2>
                          <h4 style="color:#8E5BB4;">উপজেলা : {{ $application->applied_upazilla_name }}, জেলা :
                              {{ $application->applied_zilla_name }}।
                          </h4>
                      </div>
                      <div class="col-2 text-center mt-3">
                          <img src="https://seeklogo.com/images/B/bangladesh-govt-logo-A2C7688845-seeklogo.com.png" class="w-75">
                      </div>
                  </div>
                  <!-- header end here -->

                  <!-- Data start -->
                  <div class="row mt-3 mb-5">
                      <div class="col-3 my-auto">স্মারক নং - {{ $application->form_serial }}</div>
                      <div class="col-6 text-center">

                      </div>


                      <div class="col-3 text-right my-auto">তারিখঃ {{ $application->form_date }}</div>
                  </div>
                  <!-- Data end -->

                  <!-- row start -->
                  <div class="d-flex flex-column mb-2 lh-lg">
                      <span>বরাবর,</span>
                      <span><input value="{{ $application->first_heading }}" class="border-0 border-bottom-dotted w-25 bg-transparent" type="text"></span>
                      <span><input value="{{ $application->second_heading }}" class="border-0 border-bottom-dotted w-25 bg-transparent" type="text"></span>
                      <span><input value="{{ $application->third_heading }}" class="border-0 border-bottom-dotted w-25 bg-transparent" type="text"></span>
                  </div>
                  <!-- row end -->

                  <!-- row start -->
                  <div class="d-flex mt-2">
                      <span>বিষয়ঃ</span>
                      <div class="flex-fill">
                          <input value="{{ $application->subject }}" class="border-0 border-bottom-dotted w-100 ms-2 bg-transparent" type="text">
                      </div>
                  </div>
                  <!-- row end -->

                  <!-- row start -->
                  <div class="row mt-2">
                      <div class="col-8 d-flex">
                          <span>সূত্রঃ</span>
                          <div class="flex-fill">
                              <input value="{{ $application->law }}" class="border-0 border-bottom-dotted w-100 ms-2 bg-transparent" type="text">
                          </div>
                      </div>

                      <div class="col-4 d-flex">
                          <span>তারিখঃ</span>
                          <div class="">
                              <input value="{{ $application->other_app_date }}" class="border-0 border-bottom-dotted w-100 ms-1 bg-transparent" type="text">
                          </div>
                          <span class="ms-2">খ্রিঃ</span>
                      </div>
                  </div>
                  <!-- row end -->

                  <!-- Row start -->
                  <div class="mt-2">
                      <span>জনাব,</span>
                  </div>
                  <!-- Row end -->

                  <!-- Row start -->
                  <div class="d-flex mt-2 lh-lg">
                      <span>উপরোক্ত বিষয় এর আলোকে জানানো যাচ্ছে যে,</span>
                      <div class="flex-fill">
                          <input value="{{ $application->first_body }}" class="border-0 border-bottom-dotted w-100 ms-1 bg-transparent" type="text">
                      </div>
                  </div>
                  <span><input value="{{ $application->second_body }}" class="border-0 border-bottom-dotted w-100 bg-transparent" type="text"></span>
                  <span><input value="{{ $application->third_body }}" class="border-0 border-bottom-dotted w-100 bg-transparent" type="text"></span>
                  <!-- Row end -->

                  <!-- Row start -->
                  <div class="mt-3">
                      <span>ইহা আপনার সদয় অবগতির জন্য প্রেরণ করা হলো।</span>
                  </div>
                  <div class="row">

                  </div>
                  <!-- Row end -->

                  <!-- Row start -->
                  <div class="mt-3">
                      <span>অতএব, জনাব অনুগ্রহ পূর্বক ইহা গ্রহণ করত পরবর্তী ব্যবস্থা গ্রহণে আপনার মর্জি হয়।</span>
                  </div>
                  <!-- Row end -->

                  <!-- Row start -->
                  <div class="d-flex mb-4 print-mb-2" style="margin-top: 6em;">
                      <div class="text-center ms-auto">
                          <h5 class="font-12">{{ $application->applied_chairman_name }}</h5>
                          <h5 class="font-12">চেয়ারম্যান</h5>
                          <h5 class="font-12">{{ $application->applied_union_no }} নং
                              {{ $union->bn_name }}
                          </h5>
                          <h5 class="font-12">{{ $application->applied_upazilla_name }},
                              {{ $application->applied_zilla_name }}
                          </h5>
                      </div>
                  </div>
                  <!-- Row end -->
                  <!--form body end here -->
              </div>
          </div>
          <div class="card print-card shadow print-shadow-0 print-m-0 application-form d-print-none">
              <button class="btn btn-primary" type="button" id="print-certificate">প্রিন্ট
                  সার্টিফিকেট</button>
              <!-- end col -->
          </div>
      </div>

  </div>

  <script>
      (function($) {
          $(document).ready(function() {
              $('#print-certificate').on('click', function() {
                  $('.card.application-form').removeClass('d-print-block').addClass('d-print-none');
                  $('.card.certificate-form').removeClass('d-print-none').addClass('d-print-block');
                  print();
              });
          });
      })(jQuery);
  </script>
  @endsection
