@extends('backend.layouts.app')

@section('title', 'Application')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    @php
        // for english to bangla
        use Rakibhstu\Banglanumber\NumberToBangla;
        $numto = new NumberToBangla();

        $union = App\Models\Union::find($application->union_id);
    @endphp

    <div class="card application-form">
        <div class="card-header">
            <div class="row">
                {{-- <div class="col-4">
                    <span style="color:red">{{ $sanad->description }} </span> এর আবেদনের বিস্তারিত
        </div> --}}
                {{-- <div class="col-6">
                    @if ($logged_in_user->can('admin.sanad.upload.sanad'))
                        @if ($application->sanad_file == null)
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Upload Sanad
                            </button>
                        @endif
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload Sanad</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.application.sanad') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <input type="hidden" name="application_id" value="{{ $application->id }}">
            <div class="form-group">
                <label>Upload Sanad File</label>
                <input type="file" name="sanad_file" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
        </form>
    </div>
</div>
</div>
</div> --}}

                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <span class="badge @if ($application->status == 'pending') badge-danger @else badge-success @endif"
                            style="font-size: 100%; padding:10px;">
                            <b>Status: </b> {{ $application->status ?? null }}</span>


                        @if ($logged_in_user->can('admin.sanad.status'))
                            <form action="{{ route('admin.application.status') }}" method="POST">
                                @csrf
                                <input type="hidden" name="application_id" value="{{ $application->id }}">
                                @if ($application->status == 'pending')
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="btn btn-outline-success ml-2">Approve</button>
                                @endif
                                @if ($application->status == 'approved')
                                    <input type="hidden" name="status" value="pending">
                                    <button type="submit" class="btn btn-outline-danger ml-2">Reject</button>
                                @endif
                            </form>
                        @endif
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
                                <h5>{{ $application->applicant ?? 'N/A' }}</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="text-center"><b>NID/Birth Certificate</b></td>
                                        <td class="text-center">{{ $application->nid_birth ?? 'N/A' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>সনদ</b></td>
                                        <td class="text-center" style="color:red">{{ $sanad->description ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>আবেদনের তারিখ</b></td>
                                        <td class="text-center">{{ $application->form_date ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>ট্র্যাকিং নাম্বার</b></td>
                                        <td class="text-center">{{ $application->tracking_no ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>আবেদনকৃত ঠিকানা</b></td>
                                        <td class="text-center">
                                            {{ $application->applied_union_no ?? null }} নং
                                            {{ $union->bn_name ?? null }}
                                            ইউনিয়ন পরিষদ, {{ $application->applied_upazilla_name }},
                                            {{ $application->applied_zilla_name }}।

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
                                                <td class="text-center">{{ $application->payment_method ?? 'N/A' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>মোবাইল নম্বর</b></td>
                                                <td class="text-center">{{ $application->transaction_phone ?? 'N/A' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>ট্রানজেকশন নম্বর</b></td>
                                                <td class="text-center">{{ $application->transaction_no ?? 'N/A' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>এমাউন্ট</b></td>
                                                <td class="text-center">{{ $application->amount ?? 'N/A' }}
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
        @if ($logged_in_user->can('admin.sanad.download.sanad'))
            <div class="print-shadow-0 print-m-0 application-form d-print-none text-center mt-3 card-footer">
                <form action="{{ route('frontend.user.application.certificate.info') }}" method="POST">
                    @csrf
                    <input type="hidden" name="application_id" value="{{ $application->id }}">
                    <input type="hidden" name="printed_on" value="{{ now()->format('M d, Y') }}">
                    <input type="hidden" name="sanad_id" value="{{ $sanad->id }}">
                    <input type="hidden" name="union_id" value="{{ $application->union_id }}">

                    @if ($account?->balance >= $certificate_pricing?->price_rate)
                        <button class="btn btn-primary" type="submit" id="print-certificate">প্রিন্ট
                            সার্টিফিকেট <i class="fa fa-download" aria-hidden="true"></i>
                        </button>
                    @else
                        <div class="ml-3">
                            <h4 class="text-danger">Insufficient Balance. Please Recharge for Print</h4>
                            <a class="btn btn-success" href="{{ route('balance-topup') }}">Recharge</a>
                            <p class="mt-1">By</p>
                            <a href="{{ route('balance-topup') }}">
                                <img src="https://tds-images.thedailystar.net/sites/default/files/styles/very_big_201/public/images/2023/07/31/bkash.jpg"
                                    width="150px" alt="">
                            </a>
                        </div>
                    @endif
                </form>
                <!-- end col -->
            </div>
        @endif
    </div>
    @if ($logged_in_user->can('admin.sanad.download.sanad'))
        @if ($sanad->description == 'বাৎসরিক আয়ের সনদপত্র')
            @include('backend.content.applications.sanad-certificate.c_batshorik')
        @elseif ($sanad->description == 'মাসিক আয়ের সনদ')
            @include('backend.content.applications.sanad-certificate.c_monthly')
        @elseif ($sanad->description == 'পারিবারিক সনদ')
            @include('backend.content.applications.sanad-certificate.c_paribarik')
        @elseif ($sanad->description == 'মৃত্যু সনদ')
            @include('backend.content.applications.sanad-certificate.c_dead')
        @elseif ($sanad->description == 'ভূমিহীন সনদ')
            @include('backend.content.applications.sanad-certificate.c_bhumihin')
        @elseif ($sanad->description == 'জাতীয়তা সনদ')
            @include('backend.content.applications.sanad-certificate.c_nationality')
        @elseif ($sanad->description == 'নাগরিক সনদ')
            @include('backend.content.applications.sanad-certificate.c_nagorik')
        @elseif ($sanad->description == 'পুনঃবিবাহ না হওয়ার প্রত্যয়ন')
            @include('backend.content.applications.sanad-certificate.c_punobibaho')
        @elseif ($sanad->description == 'অভিভাবকের অনুমতিপত্র')
            @include('backend.content.applications.sanad-certificate.c_obivabok')
        @elseif ($sanad->description == 'মুক্তিযোদ্ধা প্রত্যয়ন')
            @include('backend.content.applications.sanad-certificate.c_freedomfighter')
        @elseif ($sanad->description == 'বিবিধ সনদ')
            @include('backend.content.applications.sanad-certificate.c_bidoba')
        @elseif ($sanad->description == 'অবিবাহিত সনদ')
            @include('backend.content.applications.sanad-certificate.c_obibahito')
        @elseif ($sanad->description == 'স্থায়ী বাসিন্দা সনদ')
            @include('backend.content.applications.sanad-certificate.c_permanentResident')
        @elseif ($sanad->description == 'প্রত্যায়ন পত্র নাম')
            @include('backend.content.applications.sanad-certificate.c_samename')
        @elseif ($sanad->description == 'চারিত্রিক সনদ')
            @include('backend.content.applications.sanad-certificate.c_charitrik')
        @elseif ($sanad->description == 'উত্তরাধিকার সনদ')
            @include('backend.content.applications.sanad-certificate.c_uttoradhikar')
        @elseif ($sanad->description == 'ওয়ারিশ সনদ')
            @include('backend.content.applications.sanad-certificate.c_oarish')
        @elseif ($sanad->description == 'পুনঃবিবাহ না হওয়া সনদ')
            @include('backend.content.applications.sanad-certificate.c_porno_biya')
        @elseif ($sanad->description == 'নতুন ভোটার প্রত্যয়ন')
            @include('backend.content.applications.sanad-certificate.c_newVoter')
        @elseif ($sanad->description == 'বিধবা প্রত্যয়ন')
            @include('backend.content.applications.sanad-certificate.c_bidoba')
        @elseif ($sanad->description == 'সম্প্রদায় সনদ')
            @include('backend.content.applications.sanad-certificate.c_sampro')
        @elseif ($sanad->description == 'কৃষি প্রত্যয়ন')
            @include('backend.content.applications.sanad-certificate.c_kri')
        @elseif ($sanad->description == 'এতিম সনদ')
            @include('backend.content.applications.sanad-certificate.c_etim')
        @elseif ($sanad->description == 'বিবাহিত সনদ')
            @include('backend.content.applications.sanad-certificate.c_biya')
        @elseif ($sanad->description == 'উপজাতি সনদ')
            @include('backend.content.applications.sanad-certificate.c_opoj')
        @elseif ($sanad->description == 'জাতীয় পরিচয় তথ্য সংশোধন')
            @include('backend.content.applications.sanad-certificate.c_song')
        @elseif ($sanad->description == 'নিঃসন্তান প্রত্যয়ন')
            @include('backend.content.applications.sanad-certificate.c_son')
        @elseif ($sanad->description == 'আর্থিক অস্বচ্ছলতার সনদ')
            @include('backend.content.applications.sanad-certificate.c_arthik')
        @elseif ($sanad->description == 'অনাপত্তি সনদ')
            @include('backend.content.applications.sanad-certificate.c_onap')
        @elseif ($sanad->description == 'অবকাঠামো নির্মাণের অনুমতি সনদ')
            @include('backend.content.applications.sanad-certificate.c_obok')
        @elseif ($sanad->description == 'অটো রিক্সা ট্রেডলাইসেন্স')
            @include('backend.content.applications.sanad-certificate.c_auto')
        @elseif ($sanad->description == 'ভোটার এলাকা স্থানান্তর প্রত্যয়ন')
            @include('backend.content.applications.sanad-certificate.c_nid_solve')
        @elseif ($sanad->description == 'প্রতিবন্ধী সনদ')
            @include('backend.content.applications.sanad-certificate.c_protibondi')
        @elseif ($sanad->description == 'পুনঃবিবাহ  প্রত্যয়ন')
            @include('backend.content.applications.sanad-certificate.c_punobibaho')
        @elseif ($sanad->description == 'বেকারত্ব সনদ')
            @include('backend.content.applications.sanad-certificate.c_bekar')
        @elseif ($sanad->description == 'ট্রেড লাইসেন্স')
            @include('backend.content.applications.sanad-certificate.c_trade')
        @endif


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

    @endif
@endsection
