@extends('backend.layouts.app')

@section('title', 'Application')

@section('content')

    @php
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
    @endphp
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <span style="color:red">{{ $sanad->description }} </span> এর আবেদনের বিস্তারিত
                </div>
                <div class="col-3">
                    @if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.computer.upload.certificate'))
                        @if ($applications->certificate_file == null)
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
                                Upload Certificate
                            </button>
                        @endif
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload Certificate</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.training.application.status') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="application_id" value="{{ $applications->id }}">
                                        <div class="form-group">
                                            <label>Upload Certificate File</label>
                                            <input type="file" name="certificate_file" class="form-control">
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
                </div>

                <div class="col-5">
                    <div class="row">
                        <div class="col-md-6 text-right">
                            <span class="badge @if ($applications->status == 'pending') badge-danger @else badge-success @endif"
                                style="font-size: 100%; padding:10px;">
                                <b>Status: </b> {{ $applications->status ?? null }}</span>
                        </div>
                        @if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.computer.status'))
                            <div class="col-md-6 text-right">
                                <form action="{{ route('admin.training.application.status') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="application_id" value="{{ $applications->id }}">
                                    @if ($applications->status == 'pending')
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    @endif
                                </form>
                            </div>
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
                                <img src="{{ asset('/setting/user-info/' . $infos->photo) ?? 'N/A' }}"
                                    style="height: 80px"><br>
                                <h5>{{ $infos->name_bn ?? 'N/A' }}</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="text-center"><b>নাম(ইংরেজীতে)</b></td>
                                        <td class="text-center">{{ $infos->name_en ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>পিতা / স্বামীর নাম</b></td>
                                        <td class="text-center">{{ $infos->father_or_husband_bn ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>পিতা / স্বামীর নাম (ইংরেজিতে)</b></td>
                                        <td class="text-center">{{ $infos->father_or_husband_en ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>মাতার নাম</b></td>
                                        <td class="text-center">{{ $infos->mother_bn ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>মাতার নাম (ইংরেজিতে)</b></td>
                                        <td class="text-center">{{ $infos->mother_en ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>মোবাইল নম্বর</b></td>
                                        <td class="text-center">{{ $infos->mobile ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>ই-মেইল</b></td>
                                        <td class="text-center">{{ $infos->e_mail ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>জাতীয় পরিচয়পত্র নং</b></td>
                                        <td class="text-center">{{ $infos->voter_birth_id ?? null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>লিঙ্গ</b></td>
                                        <td class="text-center">{{ $infos->gender ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>জন্ম তারিখ</b></td>
                                        <td class="text-center">
                                            {{ date('d-m-Y', strtotime($infos->birth_date)) ?? 'N/A' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><b>রক্তের গ্রুপ</b></td>
                                        <td class="text-center">{{ $infos->blood_group ?? 'N/A' }}
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
                                    <li class="nav-item">
                                        <a class="nav-link" id="present-address-tab" data-toggle="pill"
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
                                    <div class="tab-pane text-left fade show active" id="payment-info" role="tabpanel"
                                        aria-labelledby="payment-info-tab">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="text-center"><b>পেমেন্টের ধরন</b></td>
                                                <td class="text-center">{{ $applications->payment_method ?? 'N/A' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>মোবাইল নম্বর</b></td>
                                                <td class="text-center">{{ $applications->phone ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>ট্রানজেকশন নম্বর</b></td>
                                                <td class="text-center">{{ $applications->transaction_no ?? 'N/A' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>এমাউন্ট</b></td>
                                                <td class="text-center">{{ $applications->amount ?? 'N/A' }}
                                                </td>
                                            </tr>

                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="present-address" role="tabpanel"
                                        aria-labelledby="present-address-tab">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="text-center"><b>বিভাগ</b></td>
                                                <td class="text-center">{{ $present_division->bn_name }}</td>
                                                <td class="text-center">{{ $present_division->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>জেলা</b></td>
                                                <td class="text-center">{{ $present_district->bn_name }}</td>
                                                <td class="text-center">{{ $present_district->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>থানা / উপজেলা</b></td>
                                                <td class="text-center">{{ $present_thana->bn_name }}</td>
                                                <td class="text-center">{{ $present_thana->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>ইউনিয়ন</b></td>
                                                <td class="text-center">{{ $present_union->bn_name }}</td>
                                                <td class="text-center">{{ $present_union->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>ওয়ার্ড নং</b></td>
                                                <td class="text-center">{{ $numto->bnNum($infos->present_ward_no) }}নং
                                                </td>
                                                <td class="text-center">{{ $infos->present_ward_no }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>রোড / ব্লক / সেক্টর</b></td>
                                                <td class="text-center">{{ $infos->present_road_bn ?? null }}</td>
                                                <td class="text-center">{{ $infos->present_road_en ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>হোল্ডিং নং</b></td>
                                                <td class="text-center">{{ $infos->present_holding_no_bn ?? null }}</td>
                                                <td class="text-center">{{ $infos->present_holding_no_en ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>গ্রাম / বাড়ী</b></td>
                                                <td class="text-center">{{ $infos->present_village_bn ?? null }}</td>
                                                <td class="text-center">{{ $infos->present_village_en ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>মালিকানার ধরণ</b></td>
                                                <td class="text-center">
                                                    @if ($infos->present_owner_type == 'owner')
                                                        বাড়ির মালিক
                                                    @else
                                                        ভাড়াটিয়া
                                                    @endif

                                                </td>
                                                <td class="text-center">{{ $infos->present_owner_type ?? null }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="permanent-address" role="tabpanel"
                                        aria-labelledby="permanent-address-tab">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="text-center"><b>বিভাগ</b></td>
                                                <td class="text-center">{{ $permanent_division->bn_name }}</td>
                                                <td class="text-center">{{ $permanent_division->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>জেলা</b></td>
                                                <td class="text-center">{{ $permanent_district->bn_name }}</td>
                                                <td class="text-center">{{ $permanent_district->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>থানা / উপজেলা</b></td>
                                                <td class="text-center">{{ $permanent_thana->bn_name }}</td>
                                                <td class="text-center">{{ $permanent_thana->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>ইউনিয়ন</b></td>
                                                <td class="text-center">{{ $permanent_union->bn_name }}</td>
                                                <td class="text-center">{{ $permanent_union->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>ওয়ার্ড নং</b></td>
                                                <td class="text-center">{{ $numto->bnNum($infos->permanent_ward_no) }}নং
                                                </td>
                                                <td class="text-center">{{ $infos->permanent_ward_no }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>রোড / ব্লক / সেক্টর</b></td>
                                                <td class="text-center">{{ $infos->permanent_road_bn ?? null }}</td>
                                                <td class="text-center">{{ $infos->permanent_road_en ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>হোল্ডিং নং</b></td>
                                                <td class="text-center">{{ $infos->permanent_holding_no_bn ?? null }}</td>
                                                <td class="text-center">{{ $infos->permanent_holding_no_en ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>গ্রাম / বাড়ী</b></td>
                                                <td class="text-center">{{ $infos->permanent_village_bn ?? null }}</td>
                                                <td class="text-center">{{ $infos->permanent_village_en ?? null }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><b>মালিকানার ধরণ</b></td>
                                                <td class="text-center">
                                                    @if ($infos->permanent_owner_type == 'owner')
                                                        বাড়ির মালিক
                                                    @else
                                                        ভাড়াটিয়া
                                                    @endif

                                                </td>
                                                <td class="text-center">{{ $infos->permanent_owner_type ?? null }}</td>
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


@endsection
