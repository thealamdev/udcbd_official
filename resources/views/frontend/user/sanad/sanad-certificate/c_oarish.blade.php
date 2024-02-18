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
      <div class="container-fluid card print-card shadow print-shadow-0 print-m-0 certificate-form font-15 d-print-block">
          <div class="card-body print-p-0">
              <div class="col-12 col-lg-10 col-xxl-8 pt-3 p-5 certificate-style marl">
                  <style media="all">
                      .certificate-style::before {
                          background-image: url({{ asset('/setting/application/application-logo/' . $application->union_logo)
                      }
                      });
                      }
                  </style>
                  <div class="row justify-content-center">
                      <div class="col-2 text-center mb-4">
                          <img src="https://seeklogo.com/images/B/bangladesh-govt-logo-A2C7688845-seeklogo.com.png" class="w-100">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-2 text-center mt-3">
                      </div>
                      <div class="col-8 text-center">
                          <h6 style="color:#8E5BB4;">গণপ্রজাতন্ত্রী বাংলাদেশ সরকার</h6>
                          <h4 style="color:#7030A0;">{{ $application->applied_union_no }} নং {{ $union->bn_name }}
                              ইউনিয়ন পরিষদ</h4>
                          <h6 style="color:#8E5BB4;">উপজেলা : {{ $application->applied_upazilla_name }}, জেলা :
                              {{ $application->applied_zilla_name }}।
                          </h6>
                      </div>
                      <div class="col-2 text-center mt-3">
                          <img src="{{ asset('/setting/application/application-logo/' . $application->union_logo) }}" style="width: 120px;">
                      </div>
                  </div>
                  <!-- header end here -->

                  <!-- Data start -->
                  <div class="row mt-3 mb-5">
                      <div class="col-3 my-auto">স্মারক নং - {{ $application->form_serial }}</div>

                      <div class="col-6 text-center border border-2 rounded-pill border-dark" style="background-color: #B4D5FF;">
                          <h6 class="m-2">ওয়ারিশ সনদপত্র</h6>
                      </div>

                      <div class="col-3 text-right my-auto">তারিখঃ {{ $application->form_date }}</div>
                  </div>

                  <!-- Row start -->
                  <div class="d-flex">
                      <p class="">আমি এই মর্মে সনদ প্রদান করিতেছি যে,</p>
                      <div class="flex-fill">
                          <input class="border-0 border-bottom-dotted text-center w-100 bg-transparent" type="text" value="{{ $oarish->dead_person_name }}" data-bv-notempty-message="দয়া করে নাম লিখুন" readonly>
                      </div>
                  </div>

                  <!-- Row end -->

                  <!-- Row start -->
                  <div class="d-flex">
                      <div class="d-flex flex-fill">
                          <p class="me-1">পিতা/স্বামীঃ</p>
                          <div class="flex-fill form-group">
                              <input class="border-0 border-bottom-dotted text-center w-100 bg-transparent" type="text" value="{{ $oarish->dead_person_father_husband_name }}" data-bv-notempty-message="দয়া করে পিতা/স্বামীর নাম লিখুন" readonly>
                          </div>
                      </div>

                      <div class="d-flex flex-fill">
                          <p class="ms-1 me-1">গ্রামঃ</p>
                          <div class="flex-fill form-group">
                              <input class="border-0 border-bottom-dotted text-center w-100 bg-transparent" type="text" value="{{ $oarish->dead_person_village }}" data-bv-notempty-message="দয়া করে  নাম লিখুন" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="d-flex">
                      <div class="d-flex flex-fill">
                          <p class="me-1">ডাকঘরঃ</p>
                          <div class="flex-fill form-group">
                              <input class="border-0 border-bottom-dotted text-center w-100 bg-transparent" type="text" value="{{ $oarish->dead_person_union }}" data-bv-notempty-message="দয়া করে ডাকঘরের নাম লিখুন" readonly>
                          </div>
                      </div>
                      <div class="d-flex flex-fill">
                          <p class="ms-1 me-1">উপজেলাঃ</p>
                          <div class="flex-fill form-group">
                              <input class="border-0 border-bottom-dotted text-center w-100 bg-transparent" type="text" value="{{ $oarish->dead_person_upazilla }}" data-bv-notempty-message="দয়া করে উপজেলার নাম লিখুন" readonly>
                          </div>
                      </div>
                      <div class="d-flex flex-fill">
                          <p class="ms-1 me-1">জেলাঃ</p>
                          <div class="flex-fill form-group">
                              <input class="border-0 border-bottom-dotted text-center w-75 bg-transparent" type="text" value="{{ $oarish->dead_person_zilla }}" data-bv-notempty-message="দয়া করে জেলার নাম লিখুন" readonly>।
                          </div>
                      </div>
                  </div>
                  <!-- row end -->

                  <!-- row Start -->
                  <div class="col-12 mt-2">
                      <p class="">তিনি আমার পরিচিত ছিলেন। তিনি মৃত্যুকালে নিম্ন বর্ণিত ওয়ারিশগণ রাখিয়া মৃত্যুবরণ
                          করিয়াছেন।</p>
                  </div>
                  <!-- row end -->

                  <!-- row Start -->
                  <!-- tabe start -->
                  @php
                  $sl = explode(',', $oarish->no);
                  $name = explode(',', $oarish->o_name);
                  $rel = explode(',', $oarish->o_relation);

                  @endphp
                  <table class="table table-bordered table-responsive font-12">
                      <thead>
                          <tr>
                              <th style="width: 5%; text-align: center;">ক্রমিক</th>
                              <th style="width: 40%; text-align: center;">নাম</th>
                              <th style="width: 30%; text-align: center;">সম্পর্ক</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($sl as $key => $val)
                          <tr>
                              <td class="text-center">{{ $sl[$key] }}</td>
                              <td class="text-center">{{ $name[$key] }}</td>
                              <td class="text-center">{{ $rel[$key] }}</td>

                          </tr>
                          @endforeach
                      </tbody>
                  </table>


                  <!-- Row start -->
                  <div class="row mb-4 print-mb-2" style="margin-top: 6em;">
                      <!-- seal area -->
                      <div class="col-4 d-flex align-items-center">
                          <div class="text-center border border-1 seal-border">
                              <p class="mt-3 pt-4"> কার্যালয়ের <br> সীল </p>
                          </div>
                      </div>

                      <!-- bar code area -->
                      <div class="col-4 d-flex justify-content-center align-items-center">
                          {!! base64_decode($application->qr_code) !!}
                      </div>

                      <div class="col-4 d-flex flex-column justify-content-center align-items-center">
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
