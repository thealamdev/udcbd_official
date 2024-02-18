@extends('frontend.layouts.app')
@section('content')
    <section class="xs-banner-inner-section parallax-window mrt"
        style="background-image: url({{ asset('/setting/banner/' . $page->image) }});">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="color-white xs-inner-banner-content">
                <h2>{{ $page->title }}</h2>

                <ul class="xs-breadcumb">
                    <li class="badge badge-pill badge-primary"><a href="index.html" class="color-white"> Home /</a>
                        {{ $page->title }}</li>
                </ul>
            </div>
        </div>
    </section>
    <main class="xs-main">

        <section class="xs-contact-section-v2">
            <div class="container">
                <div class="xs-contact-container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="xs-contact-form-wraper">
                                <h4>Contact Us</h4>
                                <form action="/contact/submit" method="POST" id=""
                                    class="xs-contact-form contact-form-v2">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="name" id="xs-name" class="form-control"
                                            placeholder="Enter Your Name.....">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <input type="email" name="email" id="xs-email" class="form-control"
                                            placeholder="Enter Your Email.....">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" name="subject" id="xs-email" class="form-control"
                                            placeholder="Enter Your Subject.....">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-pencil"></i></div>
                                        </div>
                                    </div>
                                    <div class="input-group massage-group">
                                        <textarea name="massage" placeholder="Enter Your Message....." id="xs-massage" class="form-control" cols="30"
                                            rows="10"></textarea>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-pencil"></i></div>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="submit" id="xs-submit">submit</button>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6" style="color:white">
                            <div><strong>Phone:</strong> {{ get_setting('office_phone') }}</div>
                            <div><strong>Email:</strong> {{ get_setting('office_email') }}</div>
                            <br>

                            {!! get_setting('office_map_iframe_url') !!}

                        </div>
                    </div>
                </div>
            </div>


        </section>
    </main>
@endsection
