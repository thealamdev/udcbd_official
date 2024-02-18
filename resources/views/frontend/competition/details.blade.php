@extends('frontend.layouts.app')
@section('content')
<section class="xs-banner-inner-section parallax-window" style="background-image: url({{ asset('/setting/competition/' . $competition->banner_image) }});">
    <div class="xs-black-overlay"></div>
    <div class="container">
        <div class="xs-welcome-wraper banner-verion-2 col-md-8 content-left">
            <h2 style="color: black;">{{ $competition->title }}</h2>
        </div>
    </div>
</section>

<section class="xs-content-section-padding">
    <div class="container" style="max-width: 80%;">
        <div class="align-content-center text-center">
            <h2>{{ $competition->title }}</h2>
        </div>
        <div class="text-right">
            <a href="{{ route('frontend.apply.training', ['id' => $competition->id]) }}" class="btn btn-primary">
                <span class="badge"></span>Apply Now
            </a>
        </div>
    </div>

</section>
<section class="pb-1">
    <div class="container" style="max-width: 80%;">
        <div class="row pb-5">
            <div class="col-7">
                {!! $competition->description1 ?? null !!}
            </div>
            <div class="col-5">
                <div class="align-content-center text-center">
                    <img src="{{ asset('/setting/competition/' . $competition->photo) }}" style="max-width: 100%" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection