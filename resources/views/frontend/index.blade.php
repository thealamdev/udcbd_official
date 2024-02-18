@extends('frontend.layouts.app')
@section('title', 'Home')
@section('content')
    <section class="xs-welcome-slider">
        <div class="xs-banner-slider owl-carousel">
            @foreach ($sliders as $slider)
                <div class="xs-welcome-content"
                    style="background-image: url({{ asset('/setting/banner/' . $slider->image) }});">
                    <div class="container row">
                        <div class="xs-welcome-wraper banner-verion-2 color-white col-md-8 content-left">
                            <p class="pb-3" style="color: black">{{ $slider->bottom_title }}</p>
                            <h2 style="color: rgb(54, 35, 35)">{{ $slider->header_title }}</h2>
                        </div>
                    </div>
                    <div class="xs-black-overlay"></div>
                </div>
            @endforeach
        </div>
    </section>
    {{-- slider highlight section start --}}
    <section class="xs-content-section-padding">
        <div class="container" style="max-width: 90%;">
            <div class="d-sm-flex d-block">
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="xs-heading">
                        <h1 class="xs-title">সেবাসমূহ</h1>
                        <span class="xs-separetor bg-bondiBlue"></span>
                    </div>
                    {{-- blog start --}}
                    <div class="row" style="margin-top: 30px;">
                        @foreach ($blogs as $blog)
                            <div class="blo col-md-3 col-lg-3">
                                <a href="{{ url('/sanad/details/' . $blog->description) }}" class="text-center">
                                    {{-- <a href="{{ route('frontend.shonod.details', ['id' => $blog->id]) }}" class="text-center"> --}}
                                    <div class="xs-single-causes">
                                        <img src="{{ asset('/setting/banner/' . $blog->image) }}" alt=""
                                            style="max-width: 80%;margin-top:10px; height:100px;">
                                        <div class="xs-causes-footer">
                                            <h5 class="color-light-red">{{ $blog->description }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-md-12 col-lg-4 mt-5">
                    <div class="container" style="max-width: 95%">
                        <div class="sidebar sidebar-right">
                            <div class="widget widget_categories xs-sidebar-widget">
                                <h3 class="widget-title">গুরুত্বপূর্ন ফর্ম</h3>
                                <ul class="xs-side-bar-list">
                                    @foreach ($form as $f)
                                        <li class="row">
                                            <div class="col-6">
                                                <span class="text-left">{{ $f->name }}</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-right"><a
                                                        href="{{ URL::asset('setting/form/' . $f->form) }}"
                                                        target="_blank"><i class="fa fa-download"></i> Form</a>
                                                </span>
                                            </div>
                                        </li>
                                    @endforeach
                                    {{-- <p><a href="#">see more</a></p> --}}
                                </ul>

                            </div>
                            {{-- <div class="widget widget_call_to_action">
                                <a href="#" class="d-block">
                                    <img src="{{ asset('/setting/banner/' . $blog->promotion_img) }}" alt="">
                                </a>
                            </div> --}}

                            <div class="widget widget_categories xs-sidebar-widget">
                                <h3 class="widget-title">গুরুত্বপূর্ন লিংক</h3>
                                <ul class="xs-side-bar-list">
                                    @foreach ($link as $l)
                                        <li class="text-center"><a href="{{ $l->important_link }}" target="_blank"><i
                                                    class="fa fa-link" aria-hidden="true"></i> {{ $l->description }}</a>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- services --}}
    {{-- @if ($service_count != 0) --}}
    <section id="computer_course" class="xs-content-section-padding" style="background-color: #f1f1f1">
        <div class="container" style="max-width: 90%;">
            <div class="xs-heading">
                <h1 class="xs-title">কম্পিউটার প্রশিক্ষণ ভর্তি</h1>
                <span class="xs-separetor bg-bondiBlue"></span>
            </div>
            <div class="row">
                @foreach ($course as $com)
                    <div class="blo col-md-4 col-lg-4">
                        <a href="{{ route('course_type.details', ['id' => $com->id]) }}" class="text-center">
                            <div class="xs-single-causes" style="border-radius: 0%;!important">
                                <img src="{{ asset('/setting/competition/' . $com->image) }}" alt=""
                                    style="height: 150px;width: 150px;margin-top:10px;">
                                <div class="xs-causes-footer">
                                    <h5 class="color-light-red">{{ $com->type }}</h5>
                                    {{-- <small>{{ $com->description2 ?? null }}</small> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{-- <div style="float:right"><a href="/blogs" class="btn btn-primary">
                    <span class="badge"></span>See All Competitions
                </a></div> --}}
        </div>
    </section>
    {{-- @endif --}}
    {{-- services end --}}

    <section class="parallax-window xs-become-a-volunteer xs-section-padding"
        style="background-image:url(../../{{ get_setting('volunteer_bg_image') }});background-size: auto;">
        <div class="container" style="max-width: 90%;">
            <div class="row">
                <div class="col-md-10 col-lg-10" style="padding-top:100px;padding-bottom: 100px">
                    <div class="volunteer-version-3">
                        <h1 style="color: #fc344f;">{{ get_setting('volunteer_title') }}</h1>
                        <h5 style="color: #fc344f;">{{ get_setting('volunteer_description') }}</h5>
                        <div class="xs-btn-wraper" style="margin:50px;">
                            <a href="{{ route('result.year.index') }}" class="btn btn-primary">
                                <span class="badge"></span>View All Results
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Project section start --}}
    {{-- <section class="xs-content-section-padding">
        <div class="container" style="max-width: 90%;">
            <div class="xs-heading">
                <h1 class="xs-title">OUR PROJECTS</h1>
                <span class="xs-separetor bg-bondiBlue"></span>
            </div>
            <div class="row" style="padding-top: 50px;">
                @foreach ($projects as $service)
                    <div class="col-md-6 col-lg-4">
                        <div class="xs-single-causes" style="height: 100%">
                            <img src="{{ asset('/setting/banner/' . $service->image) }}" alt="">
<div class="xs-causes-footer">
    <h2 class="color-light-red">{{ $service->header_title }}</h2>
    <p>{{ $service->bottom_title }}</p>
    <div style="margin-top: 15px;">
        <a href="/project/details/{{ $service->id }}" class="btn-sm btn-primary">
            View Details
        </a>
    </div>
</div>
</div>
</div>
@endforeach
</div>
</div>
</div>
</section> --}}

    <section class="banner" style=" padding: 50px 0px 100px 0px;">
        <div class="container" style="max-width: 90%;">
            <div class="xs-heading" style="margin-bottom: 5%">
                <h1 class="xs-title">Gallery</h1>
                <span class="xs-separetor bg-bondiBlue"></span>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="gallery">
                        {{-- <div class="row">
                            @foreach ($galary as $image)
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <a href="/gallery/{{ $image->id }}">
                                        <div class="xs-single-causes" style="height: 100%">
                                            <img src="{{ asset('/setting/banner/' . $image->image) }}" alt="">
                                            <div class="xs-causes-footer">
                                                <h2 class="color-light-red">{{ $image->details }}</h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div> --}}
                    </div>
                </div>
            </div>
            <div style="float:right"><a href="/gallery" class="btn btn-primary">
                    <span class="badge"></span>See All Gallery
                </a>
            </div>
        </div>
    </section>
    {{-- Project section end --}}

    {{-- Brand section start --}}
    <section class=" xs-partner-section"
        style="background-image: url('assets/images/map.png');  background-color: {{ get_setting('brand_bg_color') }};">
        <div class="container" style="max-width: 90%;">

            <div class="row">
                <div class="col-lg-5">
                    <div class="xs-partner-content">
                        <div class="xs-heading xs-mb-40">
                            <h2 class="xs-mb-0 xs-title">
                                {{ get_setting('about_text_bottom') }}</span>
                            </h2>
                        </div>
                        <p>{{ get_setting('about_text_details') }}</p>
                        <a href="/all/brand" class="btn btn-primary bg-orange">
                            More
                        </a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <ul class="fundpress-partners">
                        @foreach ($brands as $brand)
                            <li><a href="#"><img src="{{ asset('/setting/banner/' . $brand->logo) }}"
                                        style="height: 50%;" alt=""></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    {{-- Brand section end --}}
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
@endsection
