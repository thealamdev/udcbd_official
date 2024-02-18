@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Update User'))

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@php
$divisions = App\Models\Division::get();
@endphp
<x-forms.patch :action="route('admin.auth.user.update', $user)">
    <x-backend.card>
        <x-slot name="header">
            @lang('Update User')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Cancel')" />
        </x-slot>

        <x-slot name="body">
            <div x-data="{ userType: '{{ $user->type }}' }">
                @if (!$user->isMasterAdmin())
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Type')</label>

                    <div class="col-md-10">
                        <select name="type" class="form-control" required x-on:change="userType = $event.target.value">
                            <option value="{{ $model::TYPE_USER }}" {{ $user->type === $model::TYPE_USER ? 'selected' : '' }}>@lang('User')</option>
                            <option value="{{ $model::TYPE_ADMIN }}" {{ $user->type === $model::TYPE_ADMIN ? 'selected' : '' }}>@lang('Administrator')
                            </option>
                        </select>
                    </div>
                </div>
                <!--form-group-->
                @endif
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Register For')</label>
                    <div class="col-md-10">
                        <select name="register_for" id="register_for" class="form-control" required>
                            <option value="">Register For</option>
                            <option value="নাগরিক">নাগরিক</option>
                            <option value="উদ্দোক্তা">উদ্দোক্তা</option>
                            <option value="হিসাব সহকারি">হিসাব সহকারি</option>
                            <option value="সচিব">সচিব</option>
                            <option value="চেয়ারম্যান">চেয়ারম্যান</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="present_division" class="col-md-2 col-form-label">বিভাগ</label>
                    <div class="col-md-10">
                        <select name="present_division" class="form-control" id="present_division">
                            <option value="">নির্বাচন করুন</option>
                            @foreach ($divisions as $division)
                            <option value="{{ $division->id }}">
                                {{ $division->bn_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="present_district" class="col-md-2 col-form-label">জেলা</label>
                    <div class="col-md-10">
                        <select name="present_district" class="form-control" id="present_district">
                            <option value="">নির্বাচন করুন</option>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="present_thana" class="col-md-2 col-form-label">থানা / উপজেলা</label>
                    <div class="col-md-10">
                        <select name="present_thana" class="form-control" id="present_thana">
                            <option value="">নির্বাচন করুন</option>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="present_union" class="col-md-2 col-form-label">ইউনিয়ন</label>
                    <div class="col-md-10">
                        <select name="present_union" id="present_union" class="form-control">
                            <option value="">নির্বাচন করুন</option>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $user->name }}" maxlength="100" required />
                    </div>
                </div>
                <!--form-group-->
                <div class="form-group row">
                    <label for="phone" class="col-md-2 col-form-label">@lang('Phone')</label>

                    <div class="col-md-10">
                        <input type="text" name="phone" class="form-control" placeholder="{{ __('Phone') }}" value="{{ old('phone') ?? $user->phone }}" maxlength="100" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">@lang('E-mail Address')</label>

                    <div class="col-md-10">
                        <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') ?? $user->email }}" maxlength="255" required />
                    </div>
                </div>
                <!--form-group-->

                @if (!$user->isMasterAdmin())
                @include('backend.auth.includes.roles')

                @if (!config('boilerplate.access.user.only_roles'))
                @include('backend.auth.includes.permissions')
                @endif
                @endif
            </div>
        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update User')</button>
        </x-slot>
    </x-backend.card>
</x-forms.patch>
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
