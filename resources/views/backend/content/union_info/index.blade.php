@extends('backend.layouts.app')

@section('title', 'Union Information')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('frontend.user.union.info.store') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @if ($union)
                            <input type="hidden" name="union_id" class="form-control" value="{{ $union->id }}">
                        @endif
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="present_division">বিভাগ *</label>
                                    <select name="present_division" class="form-control" id="present_division" required>
                                        <option value="">নির্বাচন করুন</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">
                                                {{ $division->bn_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="present_district">জেলা *</label>
                                    <select name="present_district" class="form-control" id="present_district" required>
                                        <option value="">নির্বাচন করুন</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="present_thana">থানা / উপজেলা *</label>
                                    <select name="present_thana" class="form-control" id="present_thana" required>
                                        <option value="">নির্বাচন করুন</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="present_union">ইউনিয়ন পরিষদের নাম *</label>
                                    <select name="present_union" id="present_union" class="form-control" required>
                                        <option value="">নির্বাচন করুন</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="present_thana">ইউনিয়ন পরিষদ নং *</label>
                                    <input type="text" name="union_no" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="present_union">চেয়ারম্যানের নাম *</label>
                                    <input type="text" name="chairman_name" class="form-control" required>
                                </div>
                            </div> <div class="col-6">
                                <div class="form-group">
                                    <label for="present_union">বিভাগ ENGLISH*</label>
                                    <input type="text" name="vie" class="form-control" required>
                                </div>
                            </div>
                             <div class="col-6">
                                <div class="form-group">
                                    <label for="present_union">জেলা ENGLISH  *</label>
                                    <input type="text" name="zee" class="form-control" required>
                                </div>
                            </div>
                             <div class="col-6">
                                <div class="form-group">
                                    <label for="present_union"> উপজেলা ENGLISH *</label>
                                    <input type="text" name="upe" class="form-control" required>
                                </div>
                            </div>
                             <div class="col-6">
                                <div class="form-group">
                                    <label for="present_union">ইউনিয়ন পরিষদের নাম *ENGLISH</label>
                                    <input type="text" name="une" class="form-control" required>
                                </div>
                            </div>
                             <div class="col-6">
                                <div class="form-group">
                                    <label for="present_union">চেয়ারম্যানের নাম ENGLISH *</label>
                                    <input type="text" name="che" class="form-control" required>
                                </div>
                            </div>
                             <div class="col-6">
                                <div class="form-group">
                                    <label for="present_union">ইউনিয়ন পরিষদ নং *ENGLISH  *</label>
                                    <input type="text" name="noe" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="present_thana">ইউনিয়ন পরিষদ লোগো *</label>
                                    <input type="file" name="logo" class="form-control" required>

                                </div>
                            </div>

                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">লোগো</th>
                            <th class="text-center">বিভাগ</th>
                            <th class="text-center">জেলা</th>
                            <th class="text-center">উপজেলা</th>
                            <th class="text-center">ইউনিয়ন পরিষদ নং</th>
                            <th class="text-center">ইউনিয়ন পরিষদের নাম </th>
                            <th class="text-center">চেয়ারম্যানের নাম</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>

                            <td class="text-center">
                                @if ($union)
                                    <img src="{{ asset('/setting/unioninfo/' . $union->logo) ?? 'N/A' }}"
                                        style="height: 100px">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="text-center">{{ $div->bn_name ?? 'N/A' }}</td>
                            <td class="text-center">{{ $district->bn_name ?? 'N/A' }}</td>
                            <td class="text-center">{{ $upzilla->bn_name ?? 'N/A' }}</td>
                            <td class="text-center">{{ $union->union_no ?? 'N/A' }}</td>
                            <td class="text-center">{{ $uni->bn_name ?? 'N/A' }}</td>
                            <td class="text-center">{{ $union->chairman ?? 'N/A' }}</td>

                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
    </div>

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
