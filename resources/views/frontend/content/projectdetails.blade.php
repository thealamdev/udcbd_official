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
    <section class="xs-content-section-padding">
        <div class="container" style="max-width: 90%;">
            @if ($service)
            <h1>{{ $service->header_title }}</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="xs-event-banner">
                        <p class="paragraph">{{ $service->details }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="xs-event-banner">
                        <img src="{{ asset('/setting/banner/' . $service->image) }}" alt="">
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-12">
                <div class="gallery">
                    @if ($photo)
                    <div class="row">
                        @foreach ($photo as $image)
                        <div class="col-md-3">
                            <img data-enlargable src="{{ asset('/setting/banner/' . $image) }}" alt="" />
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <script>
        $('img[data-enlargable]').addClass('img-enlargable').click(function() {
            var src = $(this).attr('src');
            $('<div>').css({
                background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
                backgroundSize: 'contain',
                width: '100%',
                height: '100%',
                position: 'fixed',
                zIndex: '10000',
                top: '0',
                left: '0',
                cursor: 'zoom-out'
            }).click(function() {
                $(this).remove();
            }).appendTo('body');
        });
    </script>
    @endsection