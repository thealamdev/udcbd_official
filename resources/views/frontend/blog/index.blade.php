@extends('frontend.layouts.app')
@section('content')
    <style>
        .gallery {
            width: 100%;
            margin: auto;
            border-radius: 3px;
            overflow: hidden;
        }

        .img-c {
            width: 215px;
            height: 200px;
            float: left;
            position: relative;
            overflow: hidden;
        }

        .img-w {
            position: relative;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            cursor: pointer;
            transition: transform ease-in-out 300ms;
        }

        .img-w img {
            display: none;
        }

        .img-c {
            transition: width ease 400ms, height ease 350ms, left cubic-bezier(0.4, 0, 0.2, 1) 420ms, top cubic-bezier(0.4, 0, 0.2, 1) 420ms;
        }

        .img-c:hover .img-w {
            transform: scale(1.08);
            transition: transform cubic-bezier(0.4, 0, 0.2, 1) 450ms;
        }

        .img-c.active {
            width: 1000px !important;
            height: 70vw !important;
            position: absolute;
            z-index: 2;

        }

        .img-c.postactive {
            position: absolute;
            z-index: 2;
            pointer-events: none;
        }

        .img-c.active.positioned {
            left: 0 !important;
            top: 0 !important;
            transition-delay: 50ms;
        }
    </style>
    <main class="xs-main">
        <section class="xs-banner-inner-section parallax-window"
            style="background-image: url({{ asset('/setting/banner/' . $banner->banner) }});">
            <div class="xs-black-overlay"></div>
            <div class="container">
                <div class="color-white xs-inner-banner-content">
                    <h2>{{ $banner->banner_text }}</h2>
                </div>
            </div>
        </section>
        <section class="xs-content-section-padding">
            <div class="container" style="max-width: 80%;">
                <div class="row" style="padding-top: 50px;">
                    @foreach ($blog as $blogs)
                        <a href="/blog/details/{{ $blogs->id }}">
                            <div class="col-lg-4 col-md-6">
                                <div class="xs-box-shadow xs-single-journal xs-mb-30">
                                    <div class="entry-thumbnail ">
                                        <img src="{{ asset('/setting/banner/' . $blogs->image) }}" alt="">

                                    </div>
                                    <div class="entry-header">
                                        <div class="entry-meta">
                                            <span class="date">
                                                <a href="/blog/details/{{ $blogs->id }}" rel="bookmark"
                                                    class="entry-date">
                                                    {{ date('M d, Y', strtotime($blogs->created_at)) }}
                                                </a>
                                            </span>
                                        </div>
                                        <h4 class="entry-title">
                                            <a href="/blog/details/{{ $blogs->id }}">{{ $blogs->description }}</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endsection
