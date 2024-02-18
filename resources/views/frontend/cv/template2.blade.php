<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>CV</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'
        media="print">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <link href='https://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css' media="print">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css' media="print">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


    <style type="text/css" media="all">
        :root {
            --color-gray-light-1: #f8f8f8;
            --color-gray-light-2: #e9e9e9;
            --color-gray-light-3: #dedede;
            --color-gray-dark-1: #545454;
            --color-gray-dark-2: #737373;
            --color-gray-dark-3: #9a9a9a;
            --color-blue-dark-1: #00387f;
            --color-tiffany: #00a6a6;
            --profile-theme: #4682bf;
            --timeline-circle-theme: #14253e;

            --pgbar-length: 100%;

            --MATH-PI: 3.1415px;
            --percent: 100;
        }

        html {
            font-size: 100%;
            font-family: "PT Sans", sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-color: var(--color-gray-light-3);
        }

        .wrapper {
            margin: 0 auto;
            max-width: 100%;
            background-color: var(--color-gray-light-2);
            display: flex;
            box-shadow: 0px 0px 15px 4px #b3b3b3;
        }

        .intro {
            /* flex: 0 0 250px; */
            background-color: var(--color-gray-light-1);
            box-shadow: 5px 0px 15px 0px #b3b3b3;
            z-index: 5;
            width: 25%;
        }

        .profile {
            position: relative;
            background-color: var(--profile-theme);
            padding: 2rem 1rem;
            margin-bottom: 50px;
            text-align: center;
            user-select: none;
        }

        .profile::after {
            content: " ";
            position: absolute;
            left: 0;
            bottom: -15px;
            width: 100%;
            height: 30px;
            background-color: var(--profile-theme);
            transform: skewY(-5deg);
        }

        .photo img {
            width: 80%;
            border-radius: 50%;
        }

        .bio .name {
            font-size: 1.5rem;
            text-align: center;
            color: var(--color-gray-light-1);
            margin: 0;
            margin-top: 1rem;
        }

        .bio .profession {
            font-size: 1rem;
            text-align: center;
            color: var(--color-gray-light-1);
            margin: 0;
        }

        .intro-section {
            padding: 0 1rem;
            color: var(--color-gray-dark-1);
        }

        .intro-section .title {
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .about .paragraph {
            text-align: justify;
        }

        .info-section {
            margin: 1rem 0;
        }

        .info-section span {
            position: relative;
            transition: all 0.3s;
        }

        .info-section i {
            color: var(--profile-theme);
            width: 20px;
            height: 20px;
        }

        .link a {
            text-decoration: none;
            color: inherit;
        }

        .link span::after {
            position: absolute;
            content: "";
            left: 50%;
            bottom: -3px;
            width: 0;
            height: 2px;
            background-color: var(--profile-theme);
            transition: width 0.3s;

        }


        /* Detail section overall setting*/
        .detail {
            flex: 1 0 0;
            background-color: white;
            padding: 2rem;
        }

        .detail-section:not(:last-of-type) {
            padding-bottom: 1rem;
        }

        .detail-title {
            display: flex;
            align-items: center;
        }

        .detail-section>.detail-content {
            padding: 1.5rem;
            padding-left: 2rem;
            user-select: none;
        }

        .detail-section.edu>.detail-content {
            padding-left: calc(1.5rem + 10px);
        }

        .title-icon+span {
            font-size: 1.5rem;
            transition: all 0.3s;
        }

        .title-icon {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            margin-right: 1rem;
            width: 2.5rem;
            height: 2.5rem;
            /* background-color: var(--profile-theme); */
            border-radius: 50%;
            transition: all 0.3s;
        }

        .title-icon i {
            color: black;
            line-height: 1rem;
            font-size: 1rem;
            text-align: center;
        }



        /* time line block in education section */
        .timeline-block {
            position: relative;
            padding-left: 30px;
        }

        .timeline-block:not(:last-of-type) {
            margin-bottom: 1rem;
        }

        .timeline-block h1 {
            font-size: 1rem;
            margin: 5px 0;
            transition: all 0.3s;
        }

        .timeline-block p {
            font-size: 0.8rem;
            margin: 5px 0;
        }

        .timeline-block time {
            font-size: 0.8rem;
            color: var(--color-gray-dark-2);
        }

        .timeline-block::before {
            position: absolute;
            content: "";
            width: 15px;
            height: 15px;
            background-color: white;
            border: 3px solid var(--timeline-circle-theme);
            border-radius: 50%;
            left: -10px;
            top: -5px;
        }

        .timeline-block::after {
            position: absolute;
            content: "";
            width: 3px;
            height: 100%;
            background-color: var(--timeline-circle-theme);
            left: -1px;
            top: 13px;
        }




        /* Programming skills section */
        .pg-list,
        .tool-list,
        .favor-list {
            padding: 0;
            list-style: none;
        }

        .pg-list>li {
            margin: 1rem 0;
            display: flex;
            align-items: center;
        }

        .sb-skeleton {
            position: relative;
            flex: 1 0 auto;
            height: 2px;
            background-color: var(--color-gray-dark-3);
        }

        .pg-list>li>span {
            flex: 0 0 100px;
        }

        .sb-skeleton>.skillbar {
            position: absolute;
            left: 0;
            top: -1px;
            width: var(--pgbar-length);
            height: 4px;
            background-color: var(--profile-theme);
        }

        .tool-list {
            list-style: none;
            display: flex;
            justify-content: space-between;
        }

        .tool-list>li {
            position: relative;
            text-align: center;
            flex: 0 0 25%;
        }

        .tool-list>li>svg {
            position: relative;
            fill: transparent;
            width: 95%;
            transform: rotate(-90deg);
        }

        .tool-list>li>svg>circle {
            stroke-width: 1px;
            stroke: #cdcdcd;
        }

        .tool-list>li>svg>circle.cbar {
            stroke-width: 3px;
            stroke: var(--profile-theme);
            stroke-linecap: round;
            stroke-dashoffset: 0;
            stroke-dasharray: calc(var(--MATH-PI) * 45 * 2);
            transition: all 0.8s;
            transition-timing-function: cubic-bezier(0.64, 0.51, 0.16, 0.86);
        }



        .tool-list>li>.tl-name,
        .tool-list>li>.tl-exp {
            position: absolute;
            left: 50%;
            color: var(--color-gray-dark-1);
        }

        .tool-list>li>.tl-name {
            top: 50%;
            font-size: 1.2rem;
            transform: translate(-50%, -50%);
        }

        .tool-list>li>.tl-exp {
            top: calc(50% + 1.4rem);
            font-size: 1rem;
            transform: translate(-50%, -50%);
        }

        /* Interests Section */
        .outer-frame {
            border: 1px solid var(--color-gray-dark-3);
            border-radius: 5px;
        }

        .favor-list {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            align-content: center;
        }

        .favor-list>li {
            display: flex;
            flex: 1 0 0;
            align-items: center;
            justify-content: baseline;
            flex-direction: column;
            color: var(--profile-theme);
            padding: 1rem 0;
            transition: all 0.3s;
        }

        .favor-list>li>i {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            width: 50px;
            height: 50px;
        }



        .favor-list>li>span {
            letter-spacing: 1px;
        }

        @keyframes circle {
            0% {
                box-shadow: 0 0 0 0px rgba(51, 52, 57, 1);
            }

            100% {
                box-shadow: 0 0 0 6px rgba(51, 52, 57, 0);
            }
        }

        @media print {
            .intro {
                /* flex: 0 0 250px; */
                background-color: var(--color-gray-light-1);
                box-shadow: 5px 0px 15px 0px #b3b3b3;
                z-index: 5;
                width: 30%;
            }

            .no-print {
                display: none;
            }

            #wrapper {
                width: 100%;
                min-width: 250px;
                margin: 0 auto;
            }

            .info-section {
                margin: 1rem 0;
            }

            .info-section span {
                position: relative;
                transition: all 0.3s;
            }

            .info-section i {
                color: var(--profile-theme);
                width: 20px;
                height: 20px;
            }

            .link a {
                text-decoration: none;
                color: inherit;
            }

            .link span::after {
                position: absolute;
                content: "";
                left: 0;
                bottom: -3px;
                width: 40px;
                height: 2px;
                background-color: var(--profile-theme);

            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="intro">
            <div class="profile">
                <div class="photo">
                    <img src="{{ asset('/setting/cvinfo/' . $info->photo) }}" alt="">
                </div>
                <div class="bio">
                    <h1 class="name">{{ $info->name }}</h1>
                    {{-- <p class="profession">Front-end Developer</p> --}}
                </div>
            </div>
            <div class="intro-section about">
                <h1 class="title">about me</h1>
                <p class="paragraph">
                    {{ $info->carrer_objective }}
                </p>
            </div>
            <div class="intro-section contact">
                <h1 class="title">Contact</h1>
                <div class="info-section">
                    <i class="fa fa-phone"></i>
                    <span>{{ $info->phone }}</span>
                </div>
                <div class="info-section">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $info->address }}</span>
                </div>
                <div class="info-section">
                    <i class="fa fa-envelope"></i>
                    <span>{{ $info->email }}</span>
                </div>
            </div>
            <div class="intro-section follow">
                <h1 class="title">Follow</h1>
                <div class="info-section link">
                    <i class="fab fa-github"></i>
                    <a target="_blank" rel="author" href="{{ $info->github }}">
                        <span>{{ $info->github }}</span>
                    </a>
                </div>
                <div class="info-section link">
                    <i class="fab fa-linkedin"></i>
                    <a target="_blank" rel="author" href="{{ $info->linkedin }}">
                        <span>{{ $info->linkedin }}</span>
                    </a>
                </div>

            </div>
        </div>
        <div class="detail">
            <div class="detail-section edu">
                <div class="detail-title">
                    <div class="title-icon">
                        <i class="fa fa-user-graduate"></i>
                    </div>
                    <span>Eduation</span>
                </div>
                <div class="detail-content">
                    @foreach ($educations as $education)
                        <div class="timeline-block">
                            <h1>{{ $education->institute }}</h1>
                            <p>{{ $education->academic_qualification }}</p>
                            <p>{{ $education->result }}</p>
                            <time>{{ $education->passing_year }}</time>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="detail-section pg-skill">
                <div class="detail-title">
                    <div class="title-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <span>Skills</span>
                </div>
                <div class="detail-content">

                    <table class="table table-bordered">
                        <tr>
                            @foreach ($skills as $skill)
                                <td class="text-center">{{ $skill ?? null }}

                                </td>
                            @endforeach
                        </tr>
                    </table>
                </div>
            </div>
            <div class="detail-section edu">
                <div class="detail-title">
                    <div class="title-icon">
                        <i class="fa fa-briefcase"></i>
                    </div>
                    <span>Working Experience</span>
                </div>
                <div class="detail-content">
                    @foreach ($jobs as $job)
                        <div class="timeline-block">
                            <h1>{{ $job->office_name }}</h1>
                            <p>{{ $job->designation }}</p>

                            <time>{{ $job->service_year }}</time>
                            <p>{{ $job->job_description }}</p>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="detail-section tool-skill">
                <div class="detail-title">
                    <div class="title-icon">
                        <i class="fa fa-tools"></i>
                    </div>
                    <span>Projects</span>
                </div>
                <div class="detail-content">
                    <table class="table table-bordered">
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->project_name }}</td>
                                <td>{{ $project->details }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>


            </div>
            <div class="detail-section interests">
                <div class="detail-title">
                    <div class="title-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <span>References</span>
                </div>
                <div class="detail-content">
                    <div class="row">
                        @foreach ($references as $refer)
                            <div class="col-6">
                                <h5>{{ $refer->name }}</h5>
                                <p>{{ $refer->phone }}</p>
                                <p>{{ $refer->email }}</p>
                                <p>{{ $refer->institution }}({{ $refer->designation }})</p>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/plugins/print/print/jquery-2.0.3.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/print/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/print/print/custom.js') }}"></script>


</body>

</html>
