@extends('frontend.layouts.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <section>
        <div class="container" style="max-width: 90%;">
            <div class="card">
                <div class="card-header">
                    <h3>Create User Info</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('frontend.user-info.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header" style="background-color:#12b81e">
                                        <p>সাধারণ তথ্য</p>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="name_en">নাম (ইংরেজিতে) *</label>
                                            <input type="text" class="form-control" name="name_en" value=""
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name_bn">নাম (বাংলায়) *</label>
                                            <input type="text" class="form-control" name="name_bn" value=""
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="father_or_husband_en">পিতার/স্বামীর নাম (ইংরেজিতে) *</label>
                                            <input type="text" class="form-control" name="father_or_husband_en"
                                                value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="father_or_husband_bn">পিতার / স্বামীর নাম (বাংলায়) *</label>
                                            <input type="text" class="form-control" name="father_or_husband_bn"
                                                value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="mother_en">মাতার নাম (ইংরেজিতে) *</label>
                                            <input type="text" class="form-control" name="mother_en" value=""
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="mother_bn">মাতার নাম (বাংলায়) *</label>
                                            <input type="text" class="form-control" name="mother_bn" value=""
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="e_mail">ই-মেইল</label>
                                            <input type="text" class="form-control" name="e_mail" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile">মোবাইল নম্বর *</label>
                                            <input type="text" class="form-control" name="mobile" value=""
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="voter_birth_id">জাতীয় পরিচয়পত্র নং অথবা জন্ম নিবন্ধন নং
                                                *</label>
                                            <div class="row">
                                                <div class="col-5">
                                                    <select name="certificate_type" class="form-control" required>
                                                        <option value="">নির্বাচন করুন</option>
                                                        <option value="voter_id">জাতীয় পরিচয়পত্র নং</option>
                                                        <option value="birth_id">জন্ম নিবন্ধন নং</option>
                                                    </select>
                                                </div>
                                                <div class="col-7">
                                                    <input type="text" class="form-control" name="voter_birth_id"
                                                        value="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="voter_birth_photo">জাতীয় পরিচয়পত্রের ছবি *</label>
                                            <input type="file" class="form-control" name="voter_birth_photo"
                                                value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="birth_date">জন্ম তারিখ *</label>
                                            <input type="date" class="form-control" name="birth_date" value=""
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">লিঙ্গ *</label>
                                            <select name="gender" class="form-control" required>
                                                <option value="">নির্বাচন করুন</option>
                                                <option value="পুরুষ">পুরুষ</option>
                                                <option value="মহিলা">মহিলা</option>
                                                <option value="অন্যান্য">অন্যান্য</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="blood_group">রক্তের গ্রুপ</label>
                                            <select name="blood_group" class="form-control">
                                                <option value="">নির্বাচন করুন</option>
                                                <option value="এ+">এ+</option>
                                                <option value="বি+">বি+</option>
                                                <option value="এবি+">এবি+</option>
                                                <option value="ও+">ও+</option>
                                                <option value="এ-">এ-</option>
                                                <option value="বি-">বি-</option>
                                                <option value="এবি-">এবি-</option>
                                                <option value="ও-">ও-</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="photo">ছবি *</label>
                                            <input type="file" class="form-control" name="photo" value=""
                                                required>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header" style="background-color:#12b81e">
                                        <p>বর্তমান ঠিকানা</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="present_village_en">গ্রাম / বাড়ী (ইংরেজিতে) *</label>
                                                    <input type="text" class="form-control" name="present_village_en"
                                                        id="present_village_en" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="present_village_bn">গ্রাম /বাড়ী (বাংলায়) *</label>
                                                    <input type="text" class="form-control" name="present_village_bn"
                                                        id="present_village_bn" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="present_holding_no_en">হোল্ডিং নং (ইংরেজিতে)</label>
                                                    <input type="text" class="form-control" id="present_holding_no_en"
                                                        name="present_holding_no_en" value="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="present_holding_no_bn">হোল্ডিং নং (বাংলায়)</label>
                                                    <input type="text" class="form-control" id="present_holding_no_bn"
                                                        name="present_holding_no_bn" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="present_road_en">রাস্তা / ব্লক / শাখা
                                                        (ইংরেজিতে)</label>
                                                    <input type="text" class="form-control" name="present_road_en"
                                                        id="present_road_en" value="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="present_road_bn">রাস্তা /ব্লক / শাখা
                                                        (বাংলায়)</label>
                                                    <input type="text" class="form-control" name="present_road_bn"
                                                        id="present_road_bn" value="">
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
                                                        <option value="city_corporation">সিটি কর্পোরেশন</option>
                                                        <option value="pouroshova">পৌরসভা</option>
                                                        <option value="union">ইউনিয়ন</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="present_division">বিভাগ *</label>
                                                    <select name="present_division" class="form-control"
                                                        id="present_division" required>
                                                        <option value="">নির্বাচন করুন</option>
                                                        @foreach ($divisions as $division)
                                                            <option value="{{ $division->id }}">
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
                                                    <select name="present_district" class="form-control"
                                                        id="present_district" required>
                                                        <option value="">নির্বাচন করুন</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="present_thana">থানা / উপজেলা *</label>
                                                    <select name="present_thana" class="form-control" id="present_thana"
                                                        required>
                                                        <option value="">নির্বাচন করুন</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="present_post_office">ডাকঘর *</label>
                                                    <input type="text" class="form-control" id="present_post_office"
                                                        name="present_post_office" value="" required>

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
                                                        <option value="">নির্বাচন করুন</option>
                                                        <option value="owner">বাড়ির মালিক</option>
                                                        <option value="rental">ভাড়াটিয়া</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="present_ward_no">ওয়ার্ড নং *</label>
                                                    <select name="present_ward_no" class="form-control"
                                                        id="present_ward_no" required>
                                                        <option value="">নির্বাচন করুন</option>
                                                        <option value="1">১নং</option>
                                                        <option value="2">২নং</option>
                                                        <option value="3">৩নং</option>
                                                        <option value="4">৪নং</option>
                                                        <option value="5">৫নং</option>
                                                        <option value="6">৬নং</option>
                                                        <option value="7">৭নং</option>
                                                        <option value="8">৮নং</option>
                                                        <option value="9">৯নং</option>
                                                        <option value="10">১০নং</option>
                                                        <option value="11">১১নং</option>
                                                        <option value="12">১২নং</option>
                                                        <option value="13">১৩নং</option>
                                                        <option value="14">১৪নং</option>
                                                        <option value="15">১৫নং</option>
                                                        <option value="16">১৬নং</option>
                                                        <option value="17">১৭নং</option>
                                                        <option value="18">১৮নং</option>
                                                        <option value="19">১৯নং</option>
                                                        <option value="20">২০নং</option>
                                                        <option value="21">২১নং</option>
                                                        <option value="22">২২নং</option>
                                                        <option value="23">২৩নং</option>
                                                        <option value="24">২৪নং</option>
                                                        <option value="25">২৫নং</option>
                                                        <option value="26">২৬নং</option>
                                                        <option value="27">২৭নং</option>
                                                        <option value="28">২৮নং</option>
                                                        <option value="29">২৯নং</option>
                                                        <option value="30">৩০নং</option>
                                                        <option value="31">৩১নং</option>
                                                        <option value="32">৩২নং</option>
                                                        <option value="33">৩৩নং</option>
                                                        <option value="34">৩৪নং</option>
                                                        <option value="35">৩৫নং</option>
                                                        <option value="36">৩৬নং</option>
                                                        <option value="37">৩৭নং</option>
                                                        <option value="38">৩৮নং</option>
                                                        <option value="39">৩৯নং</option>
                                                        <option value="40">৪০নং</option>
                                                        <option value="41">৪১নং</option>
                                                        <option value="42">৪২নং</option>
                                                        <option value="43">৪৩নং</option>
                                                        <option value="44">৪৪নং</option>
                                                        <option value="45">৪৫নং</option>
                                                        <option value="46">৪৬নং</option>
                                                        <option value="47">৪৭নং</option>
                                                        <option value="48">৪৮নং</option>
                                                        <option value="49">৪৯নং</option>
                                                        <option value="50">৫০নং</option>
                                                        <option value="51">৫১নং</option>
                                                        <option value="52">৫২নং</option>
                                                        <option value="53">৫৩নং</option>
                                                        <option value="54">৫৪নং</option>
                                                        <option value="55">৫৫নং</option>
                                                        <option value="56">৫৬নং</option>
                                                        <option value="57">৫৭নং</option>
                                                        <option value="58">৫৮নং</option>
                                                        <option value="59">৫৯নং</option>
                                                        <option value="60">৬০নং</option>
                                                        <option value="61">৬১নং</option>
                                                        <option value="62">৬২নং</option>
                                                        <option value="63">৬৩নং</option>
                                                        <option value="64">৬৪নং</option>
                                                        <option value="65">৬৫নং</option>
                                                        <option value="66">৬৬নং</option>
                                                        <option value="67">৬৭নং</option>
                                                        <option value="68">৬৮নং</option>
                                                        <option value="69">৬৯নং</option>
                                                        <option value="70">৭০নং</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card mt-5">
                                    <div class="card-header" style="background-color:#12b81e">
                                        <p>স্থায়ী ঠিকানা</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="checkbox" id="same_as_present" name="same_as_present"
                                                onclick="sameFunction()">&nbsp;<span>বর্তমান
                                                ঠিকানার মত</span>
                                            <div id="sameVal"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">

                                                <div class="form-group">
                                                    <label for="permanent_village_en">গ্রাম / বাড়ী (ইংরেজিতে) *</label>
                                                    <input type="text" class="form-control" id="permanent_village_en"
                                                        name="permanent_village_en" value="" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="permanent_village_bn">গ্রাম /বাড়ী (বাংলায়) *</label>
                                                    <input type="text" class="form-control" id="permanent_village_bn"
                                                        name="permanent_village_bn" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="permanent_holding_no_en">হোল্ডিং নং (ইংরেজিতে)</label>
                                                    <input type="text" class="form-control"
                                                        id="permanent_holding_no_en" name="permanent_holding_no_en"
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="permanent_holding_no_bn">হোল্ডিং নং (বাংলায়)</label>
                                                    <input type="text" class="form-control"
                                                        id="permanent_holding_no_bn" name="permanent_holding_no_bn"
                                                        value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="permanent_road_en">রাস্তা / ব্লক / শাখা
                                                        (ইংরেজিতে)</label>
                                                    <input type="text" class="form-control" id="permanent_road_en"
                                                        name="permanent_road_en" value="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="permanent_road_bn">রাস্তা /ব্লক / শাখা
                                                        (বাংলায়)</label>
                                                    <input type="text" class="form-control" id="permanent_road_bn"
                                                        name="permanent_road_bn" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="permanent_address_type">ঠিকানার ধরণ *</label>
                                                    <select id="permanent_address_type" name="permanent_address_type"
                                                        class="form-control" required>
                                                        <option value="">নির্বাচন করুন</option>
                                                        <option value="city_corporation">সিটি কর্পোরেশন</option>
                                                        <option value="pouroshova">পৌরসভা</option>
                                                        <option value="union">ইউনিয়ন</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="permanent_division">বিভাগ *</label>
                                                    <select name="permanent_division" id="permanent_division"
                                                        class="form-control" required>
                                                        <option value="">নির্বাচন করুন</option>
                                                        @foreach ($divisions as $division)
                                                            <option value="{{ $division->id }}">
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
                                                    <label for="permanent_district">জেলা *</label>
                                                    <select name="permanent_district" id="permanent_district"
                                                        class="form-control" required>
                                                        <option value="">নির্বাচন করুন</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="permanent_thana">থানা / উপজেলা *</label>
                                                    <select name="permanent_thana" id="permanent_thana"
                                                        class="form-control" required>
                                                        <option value="">নির্বাচন করুন</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="permanent_post_office">ডাকঘর *</label>
                                                    <input type="text" class="form-control" id="permanent_post_office"
                                                        name="permanent_post_office" value="" required>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group" id="perm_city">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="permanent_owner_type">মালিকানার ধরণ *</label>
                                                    <select name="permanent_owner_type" id="permanent_owner_type"
                                                        class="form-control" required>
                                                        <option value="">নির্বাচন করুন</option>
                                                        <option value="owner">বাড়ির মালিক</option>
                                                        <option value="rental">ভাড়াটিয়া</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="permanent_ward_no">ওয়ার্ড নং *</label>
                                                    <select name="permanent_ward_no" id="permanent_ward_no"
                                                        class="form-control" required>
                                                        <option value="">নির্বাচন করুন</option>
                                                        <option value="1">১নং</option>
                                                        <option value="2">২নং</option>
                                                        <option value="3">৩নং</option>
                                                        <option value="4">৪নং</option>
                                                        <option value="5">৫নং</option>
                                                        <option value="6">৬নং</option>
                                                        <option value="7">৭নং</option>
                                                        <option value="8">৮নং</option>
                                                        <option value="9">৯নং</option>
                                                        <option value="10">১০নং</option>
                                                        <option value="11">১১নং</option>
                                                        <option value="12">১২নং</option>
                                                        <option value="13">১৩নং</option>
                                                        <option value="14">১৪নং</option>
                                                        <option value="15">১৫নং</option>
                                                        <option value="16">১৬নং</option>
                                                        <option value="17">১৭নং</option>
                                                        <option value="18">১৮নং</option>
                                                        <option value="19">১৯নং</option>
                                                        <option value="20">২০নং</option>
                                                        <option value="21">২১নং</option>
                                                        <option value="22">২২নং</option>
                                                        <option value="23">২৩নং</option>
                                                        <option value="24">২৪নং</option>
                                                        <option value="25">২৫নং</option>
                                                        <option value="26">২৬নং</option>
                                                        <option value="27">২৭নং</option>
                                                        <option value="28">২৮নং</option>
                                                        <option value="29">২৯নং</option>
                                                        <option value="30">৩০নং</option>
                                                        <option value="31">৩১নং</option>
                                                        <option value="32">৩২নং</option>
                                                        <option value="33">৩৩নং</option>
                                                        <option value="34">৩৪নং</option>
                                                        <option value="35">৩৫নং</option>
                                                        <option value="36">৩৬নং</option>
                                                        <option value="37">৩৭নং</option>
                                                        <option value="38">৩৮নং</option>
                                                        <option value="39">৩৯নং</option>
                                                        <option value="40">৪০নং</option>
                                                        <option value="41">৪১নং</option>
                                                        <option value="42">৪২নং</option>
                                                        <option value="43">৪৩নং</option>
                                                        <option value="44">৪৪নং</option>
                                                        <option value="45">৪৫নং</option>
                                                        <option value="46">৪৬নং</option>
                                                        <option value="47">৪৭নং</option>
                                                        <option value="48">৪৮নং</option>
                                                        <option value="49">৪৯নং</option>
                                                        <option value="50">৫০নং</option>
                                                        <option value="51">৫১নং</option>
                                                        <option value="52">৫২নং</option>
                                                        <option value="53">৫৩নং</option>
                                                        <option value="54">৫৪নং</option>
                                                        <option value="55">৫৫নং</option>
                                                        <option value="56">৫৬নং</option>
                                                        <option value="57">৫৭নং</option>
                                                        <option value="58">৫৮নং</option>
                                                        <option value="59">৫৯নং</option>
                                                        <option value="60">৬০নং</option>
                                                        <option value="61">৬১নং</option>
                                                        <option value="62">৬২নং</option>
                                                        <option value="63">৬৩নং</option>
                                                        <option value="64">৬৪নং</option>
                                                        <option value="65">৬৫নং</option>
                                                        <option value="66">৬৬নং</option>
                                                        <option value="67">৬৭নং</option>
                                                        <option value="68">৬৮নং</option>
                                                        <option value="69">৬৯নং</option>
                                                        <option value="70">৭০নং</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center mb-3 mt-2">
                            <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> সংরক্ষণ
                                করুন</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {

            var hiddenCity = `<label for="present_union">সিটি কর্পোরেশন *</label>
                                                        <select name="present_union" id="present_union" class="form-control" required>

                                                        </select>`;
            var hiddenUnion = `<label for="present_union">ইউনিয়ন *</label>
                                                        <select name="present_union" id="present_union" class="form-control" required>
                                                            <option value="">নির্বাচন করুন</option>

                                                        </select>`;
            var hiddenPouroshova = `<label for="present_union">পৌরসভা *</label>
                                                        <select name="present_union" id="present_union" class="form-control" required>
                                                            <option value="">নির্বাচন করুন</option>

                                                        </select>`;


            $("#city").html(hiddenCity);

            var hiddenP_city = `<label for="permanent_union">সিটি কর্পোরেশন *</label>
                                                        <select name="permanent_union" id="permanent_union" class="form-control" required>
                                                            <option value="">নির্বাচন করুন</option>

                                                        </select>`;

            var hiddenP_union = `<label for="permanent_union">ইউনিয়ন *</label>
                                                        <select name="permanent_union" id="permanent_union"  class="form-control" required>
                                                            <option value="">নির্বাচন করুন</option>

                                                        </select>`;

            var hiddenP_pouroshova = `<label for="permanent_union">পৌরসভা *</label>
                                                        <select name="permanent_union" id="permanent_union" class="form-control" required>
                                                            <option value="">নির্বাচন করুন</option>


                                                        </select>`;


            $("#perm_city").html(hiddenP_city);
            $('#present_address_type').on('change', function() {
                if (this.value == 'pouroshova') {
                    $("#city").html(hiddenPouroshova);
                } else if (this.value === 'city_corporation') {
                    $("#city").html(hiddenCity);
                } else if (this.value === 'union') {
                    $("#city").html(hiddenUnion);
                }
            });
            $('#permanent_address_type').on('change', function() {
                if (this.value == 'pouroshova') {
                    $("#perm_city").html(hiddenP_pouroshova);
                } else if (this.value === 'city_corporation') {
                    $("#perm_city").html(hiddenP_city);
                } else if (this.value === 'union') {
                    $("#perm_city").html(hiddenP_union);
                }
            });
        });
    </script>

    <script>
        function sameFunction() {
            var checkBox = document.getElementById("same_as_present");
            if (checkBox.checked == true) {

                var hidden_check = `<input type="hidden" class="form-control" name="same" value="same">`;
                $("#sameVal").html(hidden_check);


                var hiddenP_city = `<label for="permanent_union">সিটি কর্পোরেশন </label>
                                                        <select name="permanent_union" id="permanent_union"  class="form-control" >
                                                            <option value="">নির্বাচন করুন</option>

                                                        </select>`;

                var hiddenP_union = `<label for="permanent_union">ইউনিয়ন *</label>
                                                        <select name="permanent_union" id="permanent_union"  class="form-control" >
                                                            <option value="">নির্বাচন করুন</option>

                                                        </select>`;

                var hiddenP_pouroshova = `<label for="permanent_union">পৌরসভা *</label>
                                                        <select name="permanent_union" id="permanent_union" class="form-control" >
                                                            <option value="">নির্বাচন করুন</option>


                                                        </select>`;

                $('#permanent_village_en').val($('#present_village_en').val());
                $('#permanent_village_bn').val($('#present_village_bn').val());
                $('#permanent_holding_no_en').val($('#present_holding_no_en').val());
                $('#permanent_holding_no_bn').val($('#present_holding_no_bn').val());
                $('#permanent_road_en').val($('#present_road_en').val());
                $('#permanent_road_bn').val($('#present_road_bn').val());
                $('#permanent_address_type').val($('#present_address_type').val());
                $('#permanent_division').val($('#present_division').val());

                $('#permanent_post_office').val($('#present_post_office').val());
                $('#permanent_owner_type').val($('#present_owner_type').val());
                $('#permanent_ward_no').val($('#present_ward_no').val());

                $('#permanent_district').removeAttr("required");
                $('#permanent_thana').removeAttr("required");
                $('#permanent_union').removeAttr("required");

                // var division_id = $("#present_division").val();
                // var zilla_id = $("#present_district").val();

                // if (division_id) {
                //     $.ajax({
                //         url: "{{ url('/district-get/ajax') }}/" + division_id,
                //         type: "GET",
                //         dataType: "json",
                //         success: function(data) {

                //             $.each(data, function(key, value) {
                //                 let liItem = document.createElement('li');
                //                 liItem.setAttribute('data-value', value.id);
                //                 liItem.classList.add('option');
                //                 liItem.innerHTML = value.bn_name;
                //                 $("#permanent_district").append(
                //                     '<option value="' + value.id +
                //                     '">' + value.bn_name + '</option>');
                //             });
                //         },
                //     });
                // } else {
                //     alert('danger');
                // }


                if ($('#present_address_type').val() === 'city_corporation') {
                    $("#perm_city").html(hiddenP_city);
                    $('#permanent_union').val(select);
                } else if ($('#present_address_type').val() === 'pouroshova') {
                    $("#perm_city").html(hiddenP_pouroshova);
                    var select = $('#present_union').val();
                    $('#permanent_union').val(select);
                } else if ($('#present_address_type').val() === 'union') {
                    $("#perm_city").html(hiddenP_union);
                    var select = $('#present_union').val();
                    $('#permanent_union').val(select);
                }

            }
        }
    </script>


    <script type="text/javascript">
        $(document).ready(function() {

            $("#present_division").on('change', function() {
                var division_id = $(this).val();
                $d = $("#present_district").empty();
                if (division_id) {
                    $.ajax({
                        url: "{{ '/district-get/ajax' }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            $.each(data, function(key, value) {
                                let liItem = document.createElement('li');
                                liItem.setAttribute('data-value', value.id);
                                liItem.classList.add('option');
                                liItem.innerHTML = value.bn_name;
                                $("#present_district").append(
                                    '<option value="' + value.id + '">' +
                                    value
                                    .bn_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $("#permanent_division").on('change', function() {
                var division_id = $(this).val();

                $d = $("#permanent_district").empty();
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
                                $("#permanent_district").append(
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
            $("#permanent_district").on('change', function() {
                var zilla_id = $(this).val();

                $d = $("#permanent_thana").empty();
                if (zilla_id) {
                    $.ajax({
                        url: "{{ url('admin/upzilla-get/ajax') }}/" + zilla_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {

                            $.each(data, function(key, value) {
                                let liItem = document.createElement('li');
                                liItem.setAttribute('data-value', value.id);
                                liItem.classList.add('option');
                                liItem.innerHTML = value.bn_name;
                                $("#permanent_thana").append('<option value="' +
                                    value
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
                                    value.id + '">' + value.bn_name +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $("#permanent_thana").on('change', function() {
                var upzilla_id = $(this).val();

                $d = $("#permanent_union").empty();
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
                                $("#permanent_union").append('<option value="' +
                                    value.id + '">' + value.bn_name +
                                    '</option>');
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
