@extends('frontend.layouts.app')
@section('title', 'Computer Course')
@section('content')
    <section class="xs-banner-inner-section parallax-window"
        style="background-image: url({{ asset('/setting/competition/' . $banner->banner_image) }});">
        <div class="xs-black-overlay"></div>
        <div class="container">
            {{-- <div class="xs-welcome-wraper banner-verion-2 col-md-8 content-left">
                <h2 style="color: black;">{{ $banner->title }}</h2>
            </div> --}}
        </div>
    </section>
    <section class="xs-content-section-padding" style="background-color: #f1f1f1">
        <div class="container" style="max-width: 90%;">
            <div class="row">
                @foreach ($competition as $com)
                    <div class="blo col-md-3 col-lg-3">
                        <a href="{{ route('competition.details', ['id' => $com->id]) }}" class="text-center">
                            <div class="xs-single-causes" style="border-radius: 0%;!important">
                                <img src="{{ asset('/setting/competition/' . $com->photo) }}" alt=""
                                    style="height: 150px;width: 90%;margin-top:10px;">
                                <div class="xs-causes-footer">
                                    <h5 class="color-light-red">{{ $com->title }}</h5>
                                    <small>{{ $com->description2 ?? null }}</small>
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
@endsection
