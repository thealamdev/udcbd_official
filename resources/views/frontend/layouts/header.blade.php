{{-- <style>
    @media only screen and (min-width: 320px) and (max-width: 880px) {
        .mobilenone {
            display: none !important;
        }

        .mobileshow {
            display: inherit !important;
        }


        .mobile_padding_remove {
            padding-left: 0px;
            padding-right: 0px;
        }

        .xs-welcome-content {
            min-height: 565px !important;

        }



        .xs-welcome-wraper h2 {
            font-size: 33px !important;
            ;
            line-height: 40px !important;
            ;
        }


        .xs-banner-inner-section {
            padding-top: 150px !important;
            padding-bottom: 0px !important;

        }

        .xs-about-content-img {

            min-height: 290px !important;
        }



        .img-c {
            width: 100% !important;
            height: 200px !important;
            margin-bottom: 20px !important;
        }

        .gallery {
            width: 100% !important;
        }

        .parallax-window {
            background-attachment: inherit !important;
        }

        .xs-banner-inner-section {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }

        .xs-inner-banner-content h2 {
            font-size: 34px;
            padding-top: 35px;
            font-weight: 700;
            margin-bottom: 0px;

        }

        .xs-inner-banner-content p {
            font-size: 14px;
        }

        .xs-breadcumb li {
            padding: 7px 15px;
            margin-bottom: 15px;
            font-weight: 400;
            font-size: 12px;
        }

        .xs-newsletter-content {
            margin-top: 20px;
        }

        .xs-event-schedule-widget {
            padding: 15px;
        }

    }


    @media only screen and (min-width: 320px) and (max-width: 880px) {

        .mobileshow {
            display: inherit !important;
        }


    }
</style> --}}

<div style="position: fixed;width: 100%;z-index: 100; background-color:#fff">
    <div class="xs-top-bar top-bar-second">
        <div class="container">
            <ul class="xs-top-social">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-wordpress"></i></a></li>
                <li><a href="#"><i class="fa fa-slack"></i></a></li>
            </ul>
            <a href="" class="xs-top-bar-mail"><i class="fa fa-envelope-o"></i><span class="__cf_email__"
                    data-cfemail="fd94939b8dbd98859c908d9198d39e9290">{{ get_setting('office_email') }}</span></a>
        </div>
    </div>
    <header class="xs-header xs-fullWidth" style="background-color: #007308">

        <div class="container">
            <nav class="xs-menus">
                <div class="nav-header">
                    <div class="nav-toggle xs-logo-wraper">
                        <a href="/" class="xs-nav-logo">
                            <img src="{{ asset(get_setting('frontend_logo_menu')) }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="nav-menus-wrapper row">
                    <div class="xs-logo-wraper col-lg-1">
                        <a class="nav-brand" href="/">
                            <img src="{{ asset(get_setting('frontend_logo_menu')) }}" alt="" class="log">
                        </a>
                    </div>
                    <div class="col-lg-11">
                        <ul class="nav-menu">

                            {{-- <li><a href="/">Home</a>
                        </li> --}}
                            <li><a href="/">প্রথম পাতা</a></li>
                            {{-- @foreach ($headers as $header)
                            <li>
                                <a href="{{ $header->slug }}">{{ $header->title }}</a>
                            </li>
                            @endforeach --}}
                            {{-- </li> --}}
                            <li><a href="#">সেবাসমূহ</a>
                                <ul class="nav-dropdown">
                                    <li><a href="{{ route('about.index') }}">About BWUF</a></li>
                                    {{-- <li><a href="#">Structure</a></li> --}}

                                </ul>
                            </li>

                            {{-- <li><a href="#">মোবাইল রিচার্জ</a> --}}
                            </li>
                            <li><a href="{{ route('frontend.cv.all') }}">সিভি তৈরি</a>
                            </li>
                            <li><a href="#computer_course">কম্পিউটার প্রশিক্ষণ ভর্তি</a>
                            </li>
                            {{-- <li><a href="#">নোটিশ</a></li> --}}
                            <li><a href="#">যোগাযোগ</a></li>
                            @auth
                                @if ($logged_in_user->isSuperAdmin())
                                    <li>
                                        <a href="#">
                                            {{ $logged_in_user->name ?? 'Super Admin' }} </a>
                                        <ul class="nav-dropdown">
                                            <li>
                                                <a href="{{ route('admin.super.dashboard') }}">
                                                    ড্যাশবোর্ড</a>
                                            </li>
                                            <li>
                                                <x-utils.link :text="__('Logout')" class="dropdown-item"
                                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    <x-slot name="text">
                                                        @lang('লগআউট')
                                                        <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                                                    </x-slot>
                                                </x-utils.link>
                                            </li>
                                        </ul>

                                    </li>
                                @endif
                                @if ($logged_in_user->isAdmin())
                                    <li>
                                        <a href="#">
                                            {{ $logged_in_user->name ?? 'Admin' }} </a>
                                        <ul class="nav-dropdown">
                                            <li>
                                                <a href="{{ route('admin.dashboard') }}">
                                                    ড্যাশবোর্ড</a>
                                            </li>
                                            <li>
                                                <x-utils.link :text="__('Logout')" class="dropdown-item"
                                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    <x-slot name="text">
                                                        @lang('লগআউট')
                                                        <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                                                    </x-slot>
                                                </x-utils.link>
                                            </li>
                                        </ul>

                                    </li>
                                @endif

                                @if ($logged_in_user->isUser())
                                    <li>
                                        <a href="#">
                                            {{ $logged_in_user->name ?? 'User' }} </a>
                                        <ul class="nav-dropdown">
                                            <li>
                                                <a href="{{ route('frontend.user.dashboard') }}">
                                                    ড্যাশবোর্ড</a>
                                            </li>
                                            <li>
                                                <x-utils.link :text="__('Logout')" class="dropdown-item"
                                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    <x-slot name="text">
                                                        @lang('লগআউট')
                                                        <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                                                    </x-slot>
                                                </x-utils.link>
                                            </li>
                                        </ul>

                                    </li>
                                @endif
                            @else
                                @if (config('boilerplate.access.user.registration'))
                                    <li>
                                        <a href="{{ route('frontend.auth.login') }}">লগইন/রেজিস্টার</a>
                                    </li>
                                @endif
                            @endauth

                        </ul>

                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>
