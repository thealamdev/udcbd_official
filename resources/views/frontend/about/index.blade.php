@extends('frontend.layouts.app')
@section('content')
    <section class="xs-banner-inner-section parallax-window mrt"
        style="background-image: url({{ asset('/setting/about/' . $about->banner_img) }});">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="container row">
                <div class="xs-welcome-wraper banner-verion-2 color-white col-md-8 content-left">
                    <h2 class="xs-title">About Us</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="xs-content-section-padding">
        <div class="container" style="max-width: 90%;">
            <div class="row">
                <div class="col-lg-7">
                    <div class="xs-feature-text-content">
                        <div class="xs-heading">
                            <h3 class="xs-title">{{ $about->title }}</h3>
                            <span class="xs-separetor bg-bondiBlue"></span>
                        </div>
                        <p>{!! $about->description !!}</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="xs-about-content-img"
                        style="background-image:url({{ asset('/setting/about/' . $about->about_image) }})">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container" style="max-width: 90%;">
            <div class="row">
                <div class="col-md-6">
                    <div class="xs-feature-text-content">
                        <div class="xs-single-causes">
                            <div class="xs-causes-footer">
                                <h3 class="color-light-red">Our Mission</h3>
                                <span class="xs-separetor bg-bondiBlue"></span>
                                <p>{!! $about->mission !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="xs-feature-text-content">
                        <div class="xs-single-causes">
                            <div class="xs-causes-footer">
                                <h3 class="color-light-red">Our Vision</h3>
                                <span class="xs-separetor bg-bondiBlue"></span>
                                <p>{!! $about->vision !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
