@extends('frontend.layouts.app')
@section('content')
    <main class="xs-main">
        <section class="xs-banner-inner-section2 parallax-window"
            style="background-image: url({{ asset('/setting/banner/' . $sanad->banner) }}); ">
            <div class="xs-black-overlay"></div>
            <div class="container">
                <div class="color-white xs-inner-banner-content">
                    <h2 style="color: black;">{{ $sanad->banner_text }}</h2>
                </div>
            </div>
        </section>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="{{ asset('/setting/user-info/' . $infos->photo) ?? 'N/A' }}" style="height: 80px"><br>
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
                        <div class="card-header" style="background-color:#12b81e">
                            <p>বর্তমান ঠিকানা</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('frontend.user-info.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="sanad_id" value="{{ $sanad->id }}">
                                {{-- <input type="hidden" name="sanad_name" value="{{ $sanad->description }}"> --}}
                                <input type="hidden" name="status" value="pending">
                                <input type="hidden" name="mobile" value="{{ $infos->mobile }}">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="present_village_en">গ্রাম / বাড়ী (ইংরেজিতে)
                                                *</label>
                                            <input type="text" class="form-control" name="present_village_en"
                                                id="present_village_en" value="{{ $infos->present_village_en }}" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="present_village_bn">গ্রাম /বাড়ী (বাংলায়)
                                                *</label>
                                            <input type="text" class="form-control" name="present_village_bn"
                                                id="present_village_bn" value="{{ $infos->present_village_bn }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="present_holding_no_en">হোল্ডিং নং
                                                (ইংরেজিতে)</label>
                                            <input type="text" class="form-control" id="present_holding_no_en"
                                                name="present_holding_no_en" value="{{ $infos->present_holding_no_en }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="present_holding_no_bn">হোল্ডিং নং
                                                (বাংলায়)</label>
                                            <input type="text" class="form-control" id="present_holding_no_bn"
                                                name="present_holding_no_bn" value="{{ $infos->present_holding_no_bn }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="present_road_en">রাস্তা / ব্লক / শাখা
                                                (ইংরেজিতে)</label>
                                            <input type="text" class="form-control" name="present_road_en"
                                                id="present_road_en" value="{{ $infos->present_road_en }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="present_road_bn">রাস্তা /ব্লক / শাখা
                                                (বাংলায়)</label>
                                            <input type="text" class="form-control" name="present_road_bn"
                                                id="present_road_bn" value="{{ $infos->present_road_bn }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="present_address_type">ঠিকানার ধরণ *</label>
                                            <select id="present_address_type" name="present_address_type"
                                                class="form-control" required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option @if ($infos->present_address_type == 'city_corporation') selected @endif
                                                    value="city_corporation">সিটি কর্পোরেশন
                                                </option>
                                                <option @if ($infos->present_address_type == 'pouroshova') selected @endif
                                                    value="pouroshova">পৌরসভা</option>
                                                <option @if ($infos->present_address_type == 'union') selected @endif value="union">
                                                    ইউনিয়ন</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="present_division">বিভাগ *</label>
                                            <select name="present_division" class="form-control" id="present_division"
                                                required>
                                                <option value="">নির্বাচন করুন</option>
                                                @foreach ($divisions as $division)
                                                    <option @if ($infos->present_division == $division->id) selected @endif
                                                        value="{{ $division->id }}">
                                                        {{ $division->bn_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="present_district">জেলা *</label>
                                            <select name="present_district" class="form-control" id="present_district"
                                                required>
                                                <option value="{{ $district->id }}">{{ $district->bn_name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="present_thana">থানা / উপজেলা *</label>
                                            <select name="present_thana" class="form-control" id="present_thana"
                                                required>
                                                <option value="{{ $upzilla->id }}">{{ $upzilla->bn_name }}</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="present_post_office">ডাকঘর *</label>
                                            <input type="text" class="form-control" id="present_post_office"
                                                name="present_post_office" value="{{ $infos->present_post_office }}"
                                                required>

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group" id="city">

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="present_owner_type">মালিকানার ধরণ *</label>
                                            <select name="present_owner_type" id="present_owner_type"
                                                class="form-control" required>
                                                <option value="">
                                                    নির্বাচন করুন</option>
                                                <option @if ($infos->present_owner_type == 'owner') selected @endif value="owner">
                                                    বাড়ির মালিক</option>
                                                <option @if ($infos->present_owner_type == 'rental') selected @endif value="rental">
                                                    ভাড়াটিয়া</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="present_ward_no">ওয়ার্ড নং *</label>
                                            <select name="present_ward_no" class="form-control" id="present_ward_no"
                                                required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option @if ($infos->present_ward_no == 1) selected @endif value="1">
                                                    ১নং</option>
                                                <option @if ($infos->present_ward_no == 2) selected @endif value="2">
                                                    ২নং</option>
                                                <option @if ($infos->present_ward_no == 3) selected @endif value="3">
                                                    ৩নং</option>
                                                <option @if ($infos->present_ward_no == 4) selected @endif value="4">
                                                    ৪নং</option>
                                                <option @if ($infos->present_ward_no == 5) selected @endif value="5">
                                                    ৫নং</option>
                                                <option @if ($infos->present_ward_no == 6) selected @endif value="6">
                                                    ৬নং</option>
                                                <option @if ($infos->present_ward_no == 7) selected @endif value="7">
                                                    ৭নং</option>
                                                <option @if ($infos->present_ward_no == 8) selected @endif value="8">
                                                    ৮নং</option>
                                                <option @if ($infos->present_ward_no == 9) selected @endif value="9">
                                                    ৯নং</option>
                                                <option @if ($infos->present_ward_no == 10) selected @endif value="10">
                                                    ১০নং</option>
                                                <option @if ($infos->present_ward_no == 11) selected @endif value="11">
                                                    ১১নং</option>
                                                <option @if ($infos->present_ward_no == 12) selected @endif value="12">
                                                    ১২নং</option>
                                                <option @if ($infos->present_ward_no == 13) selected @endif value="13">
                                                    ১৩নং</option>
                                                <option @if ($infos->present_ward_no == 14) selected @endif value="14">
                                                    ১৪নং</option>
                                                <option @if ($infos->present_ward_no == 15) selected @endif value="15">
                                                    ১৫নং</option>
                                                <option @if ($infos->present_ward_no == 16) selected @endif value="16">
                                                    ১৬নং</option>
                                                <option @if ($infos->present_ward_no == 17) selected @endif value="17">
                                                    ১৭নং</option>
                                                <option @if ($infos->present_ward_no == 18) selected @endif value="18">
                                                    ১৮নং</option>
                                                <option @if ($infos->present_ward_no == 19) selected @endif value="19">
                                                    ১৯নং</option>
                                                <option @if ($infos->present_ward_no == 20) selected @endif value="20">
                                                    ২০নং</option>
                                                <option @if ($infos->present_ward_no == 21) selected @endif value="21">
                                                    ২১নং</option>
                                                <option @if ($infos->present_ward_no == 22) selected @endif value="22">
                                                    ২২নং</option>
                                                <option @if ($infos->present_ward_no == 23) selected @endif value="23">
                                                    ২৩নং</option>
                                                <option @if ($infos->present_ward_no == 24) selected @endif value="24">
                                                    ২৪নং</option>
                                                <option @if ($infos->present_ward_no == 25) selected @endif value="25">
                                                    ২৫নং</option>
                                                <option @if ($infos->present_ward_no == 26) selected @endif value="26">
                                                    ২৬নং</option>
                                                <option @if ($infos->present_ward_no == 27) selected @endif value="27">
                                                    ২৭নং</option>
                                                <option @if ($infos->present_ward_no == 28) selected @endif value="28">
                                                    ২৮নং</option>
                                                <option @if ($infos->present_ward_no == 29) selected @endif value="29">
                                                    ২৯নং</option>
                                                <option @if ($infos->present_ward_no == 30) selected @endif value="30">
                                                    ৩০নং</option>
                                                <option @if ($infos->present_ward_no == 31) selected @endif value="31">
                                                    ৩১নং</option>
                                                <option @if ($infos->present_ward_no == 32) selected @endif value="32">
                                                    ৩২নং</option>
                                                <option @if ($infos->present_ward_no == 33) selected @endif value="33">
                                                    ৩৩নং</option>
                                                <option @if ($infos->present_ward_no == 34) selected @endif value="34">
                                                    ৩৪নং</option>
                                                <option @if ($infos->present_ward_no == 35) selected @endif value="35">
                                                    ৩৫নং</option>
                                                <option @if ($infos->present_ward_no == 36) selected @endif value="36">
                                                    ৩৬নং</option>
                                                <option @if ($infos->present_ward_no == 37) selected @endif value="37">
                                                    ৩৭নং</option>
                                                <option @if ($infos->present_ward_no == 38) selected @endif value="38">
                                                    ৩৮নং</option>
                                                <option @if ($infos->present_ward_no == 39) selected @endif value="39">
                                                    ৩৯নং</option>
                                                <option @if ($infos->present_ward_no == 40) selected @endif value="40">
                                                    ৪০নং</option>
                                                <option @if ($infos->present_ward_no == 41) selected @endif value="41">
                                                    ৪১নং</option>
                                                <option @if ($infos->present_ward_no == 42) selected @endif value="42">
                                                    ৪২নং</option>
                                                <option @if ($infos->present_ward_no == 43) selected @endif value="43">
                                                    ৪৩নং</option>
                                                <option @if ($infos->present_ward_no == 44) selected @endif value="44">
                                                    ৪৪নং</option>
                                                <option @if ($infos->present_ward_no == 45) selected @endif value="45">
                                                    ৪৫নং</option>
                                                <option @if ($infos->present_ward_no == 46) selected @endif value="46">
                                                    ৪৬নং</option>
                                                <option @if ($infos->present_ward_no == 47) selected @endif value="47">
                                                    ৪৭নং</option>
                                                <option @if ($infos->present_ward_no == 48) selected @endif value="48">
                                                    ৪৮নং</option>
                                                <option @if ($infos->present_ward_no == 49) selected @endif value="49">
                                                    ৪৯নং</option>
                                                <option @if ($infos->present_ward_no == 50) selected @endif value="50">
                                                    ৫০নং</option>
                                                <option @if ($infos->present_ward_no == 51) selected @endif value="51">
                                                    ৫১নং</option>
                                                <option @if ($infos->present_ward_no == 52) selected @endif value="52">
                                                    ৫২নং</option>
                                                <option @if ($infos->present_ward_no == 53) selected @endif value="53">
                                                    ৫৩নং</option>
                                                <option @if ($infos->present_ward_no == 54) selected @endif value="54">
                                                    ৫৪নং</option>
                                                <option @if ($infos->present_ward_no == 55) selected @endif value="55">
                                                    ৫৫নং</option>
                                                <option @if ($infos->present_ward_no == 56) selected @endif value="56">
                                                    ৫৬নং</option>
                                                <option @if ($infos->present_ward_no == 57) selected @endif value="57">
                                                    ৫৭নং</option>
                                                <option @if ($infos->present_ward_no == 58) selected @endif value="58">
                                                    ৫৮নং</option>
                                                <option @if ($infos->present_ward_no == 59) selected @endif value="59">
                                                    ৫৯নং</option>
                                                <option @if ($infos->present_ward_no == 60) selected @endif value="60">
                                                    ৬০নং</option>
                                                <option @if ($infos->present_ward_no == 61) selected @endif value="61">
                                                    ৬১নং</option>
                                                <option @if ($infos->present_ward_no == 62) selected @endif value="62">
                                                    ৬২নং</option>
                                                <option @if ($infos->present_ward_no == 63) selected @endif value="63">
                                                    ৬৩নং</option>
                                                <option @if ($infos->present_ward_no == 64) selected @endif value="64">
                                                    ৬৪নং</option>
                                                <option @if ($infos->present_ward_no == 65) selected @endif value="65">
                                                    ৬৫নং</option>
                                                <option @if ($infos->present_ward_no == 66) selected @endif value="66">
                                                    ৬৬নং</option>
                                                <option @if ($infos->present_ward_no == 67) selected @endif value="67">
                                                    ৬৭নং</option>
                                                <option @if ($infos->present_ward_no == 68) selected @endif value="68">
                                                    ৬৮নং</option>
                                                <option @if ($infos->present_ward_no == 69) selected @endif value="69">
                                                    ৬৯নং</option>
                                                <option @if ($infos->present_ward_no == 70) selected @endif value="70">
                                                    ৭০নং</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info">
                                        {{ $sanad->description }} এর জন্য আবেদন
                                        করুন</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {

                var hiddenCity = `<label for="present_union">সিটি কর্পোরেশন *</label>
                                                        <select name="present_union" id="present_union" class="form-control" required>
                                                         <option value="{{ $upzilla->id }}">{{ $upzilla->bn_name }}</option>
                                                        </select>`;
                var hiddenUnion = `<label for="present_union">ইউনিয়ন *</label>
                                                        <select name="present_union" id="present_union" class="form-control" required>
                                                            <option value="{{ $upzilla->id }}">{{ $upzilla->bn_name }}</option>
                                                             
                                                        </select>`;
                var hiddenPouroshova = `<label for="present_union">পৌরসভা *</label>
                                                        <select name="present_union" id="present_union" class="form-control" required>
                                                            <option value="">নির্বাচন করুন</option>
                                                            <option value="{{ $upzilla->id }}">{{ $upzilla->bn_name }}</option>
                                                        </select>`;


                $("#city").html(hiddenCity);

                $('#present_address_type').on('change', function() {
                    if (this.value == 'pouroshova') {
                        $("#city").html(hiddenPouroshova);
                    } else if (this.value === 'city_corporation') {
                        $("#city").html(hiddenCity);
                    } else if (this.value === 'union') {
                        $("#city").html(hiddenUnion);
                    }
                });

            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#present_division").on('change', function() {
                    var division_id = $(this).val();

                    $d = $("#present_district").empty();
                    if (division_id) {
                        $.ajax({
                            url: "{{ url('/district-get/ajax') }}/" + division_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {

                                $.each(data, function(key, value) {
                                    let liItem = document.createElement('li');
                                    liItem.setAttribute('data-value', value.id);
                                    liItem.classList.add('option');
                                    liItem.innerHTML = value.bn_name;
                                    $("#present_district").append(
                                        '<option value="' + value.id + '">' + value
                                        .bn_name + '</option>');
                                });
                            },
                        });
                    } else {
                        alert('danger');
                    }
                });



                $("#present_district").on('change', function() {
                    var zilla_id = $(this).val();

                    $d = $("#present_thana").empty();
                    if (zilla_id) {
                        $.ajax({
                            url: "{{ url('/upzilla-get/ajax') }}/" + zilla_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {

                                $.each(data, function(key, value) {
                                    let liItem = document.createElement('li');
                                    liItem.setAttribute('data-value', value.id);
                                    liItem.classList.add('option');
                                    liItem.innerHTML = value.bn_name;
                                    $("#present_thana").append('<option value="' + value
                                        .id + '">' + value.bn_name + '</option>');
                                });
                            },
                        });
                    } else {
                        alert('danger');
                    }
                });


                $("#present_thana").on('change', function() {
                    var upzilla_id = $(this).val();

                    $d = $("#present_union").empty();
                    if (upzilla_id) {
                        $.ajax({
                            url: "{{ url('/union-get/ajax') }}/" + upzilla_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {

                                $.each(data, function(key, value) {
                                    let liItem = document.createElement('li');
                                    liItem.setAttribute('data-value', value.id);
                                    liItem.classList.add('option');
                                    liItem.innerHTML = value.bn_name;
                                    $("#present_union").append('<option value="' +
                                        value.id + '">' + value.bn_name + '</option>');
                                });
                            },
                        });
                    } else {
                        alert('danger');
                    }
                });

            });
        </script>
    @endsection
