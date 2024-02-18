<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>CV</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'
        media="print">
    <link href='https://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css' media="print">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css' media="print">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    {{-- <link rel="stylesheet" href="{{ asset('assets/dist/css/dropify.min.css') }}"> --}}
    <!-- Custom CSS -->
    {{-- <link href="dist/css/style.min.css" rel="stylesheet"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/print/font-awesome/css/font-awesome.min.css') }}"
        type='text/css' media="print"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/print/bootstrap/dist/css/bootstrap.min.css') }}"
        type='text/css' media="print"> --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/print/order_print.css') }}" type="text/css" type='text/css'
        media="print">

    <style type="text/css" media="all">
        .rela-block {
            display: block;
            position: relative;
            margin: auto;
            top: ;
            left: ;
            right: ;
            bottom: ;
        }

        .rela-inline {
            display: inline-block;
            position: relative;
            margin: auto;
            top: ;
            left: ;
            right: ;
            bottom: ;
        }

        .floated {
            display: inline-block;
            position: relative;
            margin: false;
            top: ;
            left: ;
            right: ;
            bottom: ;
            float: left;
        }

        .abs-center {
            display: false;
            position: absolute;
            margin: false;
            top: 50%;
            left: 50%;
            right: false;
            bottom: false;
            transform: translate(-50%, -50%);
            text-align: center;
            width: 88%;
        }

        body {
            font-family: 'Open Sans';
            font-size: 18px;
            letter-spacing: 0px;
            font-weight: 400;
            line-height: 28px;
            background: url("http://kingofwallpapers.com/leaves/leaves-016.jpg") right no-repeat;
            background-size: cover;
        }

        body:before {
            content: "";
            display: false;
            position: fixed;
            margin: 0;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.92);
        }

        .caps {
            text-transform: uppercase;
        }

        .justified {
            text-align: justify;
        }

        p.light {
            color: #777;
        }

        h2 {
            font-family: 'Open Sans';
            font-size: 30px;
            letter-spacing: 5px;
            font-weight: 600;
            line-height: 40px;
            color: #000;
        }

        h3 {
            font-family: 'Open Sans';
            font-size: 21px;
            letter-spacing: 1px;
            font-weight: 600;
            line-height: 28px;
            color: #000;
        }

        .page {
            width: 100%;
            height: 100%;
            max-width: 100%;
            background-color: #fff;
            box-shadow: 6px 10px 28px 0px rgba(0, 0, 0, 0.4);
        }

        .top-bar {
            height: 220px;
            background-color: #848484;
            color: #fff;
        }

        .name {
            display: false;
            position: absolute;
            margin: false;
            top: false;
            left: calc(350px + 5%);
            right: 0;
            bottom: 0;
            height: 120px;
            text-align: center;
            font-family: 'Raleway';
            font-size: 58px;
            letter-spacing: 8px;
            font-weight: 100;
            line-height: 60px;
        }

        .name div {
            width: 94%;
        }

        .side-bar {
            display: false;
            position: absolute;
            margin: false;
            top: 60px;
            left: 5%;
            right: false;
            bottom: 0;
            width: 382px;
            background-color: #f7e0c1;
            padding: 320px 30px 50px;
        }

        .mugshot {
            display: false;
            position: absolute;
            margin: false;
            top: 50px;
            left: 70px;
            right: false;
            bottom: false;
            height: 210px;
            width: 210px;
        }

        .mugshot .logo {
            margin: 0px;
        }

        .logo {
            display: false;
            position: absolute;
            margin: false;
            top: 0;
            left: 0;
            right: false;
            bottom: false;
            z-index: 100;
            margin: 0;
            color: #000;
            height: 250px;
            width: 250px;
        }

        .logo .logo-svg {
            height: 100%;
            width: 100%;
            stroke: #000;
            cursor: pointer;
        }

        .logo .logo-text {
            display: false;
            position: absolute;
            margin: false;
            top: 14%;
            left: ;
            right: 11%;
            bottom: ;
            cursor: pointer;
            font-family: "Montserrat";
            font-size: 55px;
            letter-spacing: 0px;
            font-weight: 400;
            line-height: 58.333333333333336px;
        }

        .social {
            padding-left: 40px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .social:before {
            content: "";
            display: false;
            position: absolute;
            margin: false;
            top: -4px;
            left: -5px;
            right: false;
            bottom: false;
            height: 35px;
            width: 35px;
            background-size: cover !important;
        }

        /* .social.twitter:before {
            background: url("https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_Twitter-07-128.png") center no-repeat;
        } */

        /* .social.pinterest:before {
            background: url("https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_Pinterest-23-128.png") center no-repeat;
        } */

        .social.github:before {
            background: url("https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-social-github-outline-1024.png") center no-repeat;
        }

        .social.address:before {
            background: url("https://cdn2.iconfinder.com/data/icons/essential-web-1-1/50/home-house-homepage-resient-address-512.png") center no-repeat;
        }

        .social.phone:before {
            background: url("https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/phone1-512.png") center no-repeat;
        }

        .social.linked-in:before {
            background: url("https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_LinkedIn-128.png") center no-repeat;
        }

        .side-header {
            font-family: 'Open Sans';
            font-size: 18px;
            letter-spacing: 4px;
            font-weight: 600;
            line-height: 28px;
            margin: 60px auto 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #888;
        }

        .list-thing {
            padding-left: 25px;
            margin-bottom: 10px;
        }

        .content-container {
            margin-right: 0;
            width: calc(95% - 350px);
            padding: 20px 50px 30px;
        }

        .content-container>* {
            margin: 0 auto 25px;
        }

        .content-container>h3 {
            margin: 0 auto 5px;
        }

        .content-container>p.long-margin {
            margin: 0 auto 50px;
        }

        .title {
            width: 80%;
            text-align: center;
        }

        .separator {
            width: 240px;
            height: 2px;
            background-color: #999;
        }

        .greyed {
            background-color: #ddd;
            width: 100%;
            max-width: 580px;
            text-align: center;
            font-family: 'Open Sans';
            font-size: 18px;
            letter-spacing: 6px;
            font-weight: 600;
            line-height: 28px;
        }

        @media print {
            .noprint {
                display: none;
            }

            #wrapper {
                width: 100%;
                min-width: 250px;
                margin: 0 auto;
            }
        }

        @media screen and (max-width: 1150px) {
            .name {
                color: #fff;
                font-family: 'Raleway';
                font-size: 38px;
                letter-spacing: 6px;
                font-weight: 100;
                line-height: 48px;
            }
        }
    </style>
</head>

<body>
    <!-- FONTS -->

    <!-- PAGE STUFF -->
    <div class="rela-block page">
        <div class="rela-block top-bar">
            <div class="caps name">
                <div class="abs-center">{{ $info->name ?? 'N/A' }}</div>
            </div>
        </div>
        <div class="side-bar">
            <div class="mugshot">
                <div class="logo">
                    <svg viewbox="0 0 80 80" class="rela-block logo-svg">
                        <path d="M 10 10 L 72 10 L 72 10 L 72 70 L 30 70 L 10 70 Z" stroke-width="2.5" fill="none" />
                    </svg>
                    <p class="logo-text"><img src="{{ asset('/setting/cvinfo/' . $info->photo) }}" alt=""
                            style="height: 183px;width:189px"></p>
                </div>
            </div>
            <p class="rela-block social address">{{ $info->address }}</p>

            @if ($info->phone)
                <p class="rela-block social phone">{{ $info->phone }}</p>
            @endif
            @if ($info->github)
                <p class="rela-block social github"><a href="{{ $info->github }}" target="_blank"
                        style="color: black">{{ $info->github }}</a></p>
            @endif
            @if ($info->linkedin)
                <p class="rela-block social linked-in"><a href="{{ $info->linkedin ?? null }}" target="_blank"
                        style="color: black">{{ $info->linkedin ?? null }}</a></p>
            @endif


            <p class="rela-block caps side-header">Expertise</p>
            @foreach ($skills as $skill)
                <p class="rela-block list-thing">{{ $skill }}</p>
            @endforeach

            <p class="rela-block caps side-header">Education</p>
            @foreach ($educations as $education)
                <p class="rela-block list-thing"><b>{{ $education->institute }}</b> (
                    {{ $education->passing_year }} )
                </p>
                <p class="rela-block list-thing" style="margin-left:15px;">{{ $education->academic_qualification }}</p>
                <p class="rela-block list-thing" style="margin-left:15px;">Result: {{ $education->result }}</p>
            @endforeach
        </div>
        <div class="rela-block content-container">
            {{-- <h2 class="rela-block caps title">Jr Front-End Developer</h2>
            <div class="rela-block separator"></div> --}}
            <div class="rela-block caps greyed">Profile</div>
            <p class="long-margin">{{ $info->carrer_objective ?? null }}</p>

            @if ($jobs)
                <div class="rela-block caps greyed">Job Experience</div>
                @foreach ($jobs as $job)
                    <h3>{{ $job->office_name }}</h3>
                    <h6 style="margin:5px;margin-left:15px;">{{ $job->designation }}</h6>
                    <p class="light" style="margin-bottom:10px;margin-left:15px;">{{ $job->service_year }}</p>
                    <p class="justified" style="margin-left:15px;">{{ $job->job_description }}</p>
                @endforeach
            @endif

            @if ($projects)
                <div class="rela-block caps greyed">Projects</div>
                @foreach ($projects as $project)
                    <h3>{{ $project->project_name }}</h3>
                    <p class="justified" style="margin-left:15px;">{{ $project->details }}</p>
                @endforeach
            @endif
            @if ($references)
                <div class="rela-block caps greyed">References</div>
                @foreach ($references as $reference)
                    <h3>{{ $reference->name }}</h3>
                    @if ($reference->designation)
                        <p class="light" style="margin-bottom:10px;margin-left:15px;">{{ $reference->designation }}
                        </p>
                    @endif
                    @if ($reference->institution)
                        <p class="justified" style="margin-bottom:10px;margin-left:15px;">{{ $reference->institution }}
                        </p>
                    @endif
                    @if ($reference->phone)
                        <p class="justified" style="margin-bottom:10px;margin-left:15px;">Phone:
                            {{ $reference->phone }}</p>
                    @endif
                    @if ($reference->email)
                        <p class="justified" style="margin-bottom:10px;margin-left:15px;">Email:
                            {{ $reference->email }}</p>
                    @endif
                @endforeach
            @endif
        </div>
    </div>

    <script src="{{ asset('assets/plugins/print/print/jquery-2.0.3.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/print/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/print/print/custom.js') }}"></script>


</body>

</html>
