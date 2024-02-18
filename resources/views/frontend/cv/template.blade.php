@extends('frontend.layouts.app')
@section('title', 'Create CV')
@section('content')
    {{-- @dd($banner); --}}
    <section class="xs-banner-inner-section parallax-window mrt"
        style="background-image: url({{ asset('/setting/cvtemplate/' . $banner->banner) }});">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="container row">
                <div class="xs-welcome-wraper banner-verion-2 color-white col-md-8 content-left">
                    <h2 class="xs-title">Make your CV</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="xs-content-section-padding">
        <div class="container" style="max-width: 90%;">
            <div class="xs-heading">
                <h1 class="xs-title">Choose A Template</h1>
                <span class="xs-separetor bg-bondiBlue"></span>
            </div>
            <div class="row" style="margin-top: 30px;">
                @foreach ($cv as $c)
                    <div class="col-md-4 col-sm-6" style="padding: 10px;">

                        <a href="{{ route('frontend.cv.template', ['id' => $c->id]) }}" class="text-center">
                            <img src="{{ asset('/setting/cvtemplate/' . $c->template) }}" alt=""
                                style="height:400px; max-width:100%">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
