@extends('frontend.layouts.app')
@section('title', __('Dashboard'))

@section('content')
    <div class="container" style="padding-top: 2%;">
        <div class="row">
            <div class="col-lg-12 m-auto text-center">
                @if ($logged_in_user->register_for == 'এজেন্ট')
                    <h3 class="text-danger m-4">
                        সর্বনিন্ম ১০ জন ক্লায়েন্ট এবং ১০০০ টাকা জমা হলে টাকা উত্তলন করতে পারবেন।
                    </h3>
                @else
                    <h3 class="text-danger m-4">Welcome to your dashboard {{ auth()->user()->name }}</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
