@extends('frontend.layouts.app')

@section('title', __('Manage Register Link'))

@section('content')
    <div class="row">
        <div class="col-lg-12 m-auto text-center">
            <h3 class="text-danger m-4">সর্বনিন্ম ১০ জন ক্লায়েন্ট এবং ১০০০ টাকা জমা হলে টাকা উত্তলন করতে পারবেন।</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <label for="link-generate">
                        Link Generate for Client Register
                    </label>
                </div>

                <div class="card-body">
                    <a style="font-size: 20px" href="#">Link for client Register: </a> <h5> {{ $link }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
