<!DOCTYPE html>

<head>
    <title>CV</title>
    {{-- <link rel="shortcut icon" href="иконка.ico"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style type="text/css" media="all">
        @import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            font-family: "Montserrat", sans-serif;
        }

        body {
            background: #585c68;
            font-size: 14px;
            line-height: 22px;
            color: #555555;
        }

        .bold {
            font-weight: 700;
            font-size: 20px;
            text-transform: uppercase;
        }

        .semi-bold {
            font-weight: 500;
            font-size: 16px;
        }



        .resume {
            width: 100%;
            height: 100%;
            display: flex;
            margin: 0px auto;
        }

        .resume .resume_left {
            width: 30%;
            background: #0bb5f4;
        }

        .resume .resume_left .resume_profile {
            width: 100%;
            height: 280px;
        }

        .resume .resume_left .resume_profile img {
            width: 80%;
            height: 100%;
            margin-left: 10%;
            border: 4px solid black;
        }

        .resume .resume_left .resume_content {
            padding: 0 25px;
        }

        .resume .title {
            margin-bottom: 20px;
        }

        .resume .resume_left .bold {
            color: #fff;
        }

        .resume .resume_left .regular {
            color: #b1eaff;
        }

        .resume .resume_item {
            padding: 25px 0;
            border-bottom: 2px solid #b1eaff;
        }

        .resume .resume_left .resume_item:last-child,
        .resume .resume_right .resume_item:last-child {
            border-bottom: 0px;
        }

        .resume .resume_left ul li {
            display: flex;
            margin-bottom: 10px;
            align-items: center;
        }

        .resume .resume_left ul li:last-child {
            margin-bottom: 0;
        }

        .resume .resume_left ul li .icon {
            width: 35px;
            height: 35px;
            background: #fff;
            color: #0bb5f4;
            border-radius: 50%;
            margin-right: 15px;
            font-size: 16px;
            position: relative;
        }


        .resume .icon i,
        .resume .resume_right .resume_hobby ul li i {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .resume .resume_left ul li .data {
            color: #b1eaff;
        }

        .resume .resume_left .resume_skills ul li {
            display: flex;
            margin-bottom: 10px;
            color: #b1eaff;
            justify-content: space-between;
            align-items: center;
        }

        .resume .resume_left .resume_skills ul li .skill_name {
            width: 25%;
        }

        .resume .resume_left .resume_skills ul li .skill_progress {
            width: 60%;
            margin: 0 5px;
            height: 5px;
            background: #009fd9;
            position: relative;
        }

        .resume .resume_left .resume_skills ul li .skill_per {
            width: 15%;
        }

        .resume .resume_left .resume_skills ul li .skill_progress span {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            background: #fff;
        }

        .resume .resume_left .resume_social .semi-bold {
            color: #fff;
            margin-bottom: 3px;
        }

        .resume .resume_right {
            width: 70%;
            background: #fff;
            padding: 25px;
        }

        .resume .resume_right .bold {
            color: #0bb5f4;
        }

        .resume .resume_right .resume_work ul,
        .resume .resume_right .resume_education ul {
            padding-left: 40px;
            overflow: hidden;
        }

        .resume .resume_right ul li {
            position: relative;
        }

        .resume .resume_right ul li .date {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .resume .resume_right ul li .info {
            margin-bottom: 20px;
        }

        .resume .resume_right ul li:last-child .info {
            margin-bottom: 0;
        }

        .resume .resume_right .resume_work ul li:before,
        .resume .resume_right .resume_education ul li:before {
            content: "";
            position: absolute;
            top: 5px;
            left: -25px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            border: 2px solid #0bb5f4;
        }

        .resume .resume_right .resume_work ul li:after,
        .resume .resume_right .resume_education ul li:after {
            content: "";
            position: absolute;
            top: 14px;
            left: -21px;
            width: 2px;
            height: 115px;
            background: #0bb5f4;
        }

        .resume .resume_right .resume_hobby ul {
            display: flex;
            justify-content: space-between;
        }

        .resume .resume_right .resume_hobby ul li {
            width: 80px;
            height: 80px;
            border: 2px solid #0bb5f4;
            border-radius: 50%;
            position: relative;
            color: #0bb5f4;
        }

        .resume .resume_right .resume_hobby ul li i {
            font-size: 30px;
        }

        .resume .resume_right .resume_hobby ul li:before {
            content: "";
            position: absolute;
            top: 40px;
            right: -52px;
            width: 50px;
            height: 2px;
            background: #0bb5f4;
        }

        .resume .resume_right .resume_hobby ul li:last-child:before {
            display: none;
        }

        @media print {
            .resume .resume_left {
                width: 30%;
                background: #0bb5f4;
            }

            .resume .resume_left .resume_social .semi-bold {
                color: #fff;
                margin-bottom: 3px;
                width: 100%;
            }

            .resume .resume_right {
                width: 100%;
                background: #fff;
                padding: 25px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js"
        integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/template3.css') }}" type="text/css" type='text/css' media="print">
    <base target="_blank">
</head>

<body>



    <div class="resume">
        <div class="resume_left">
            <div class="resume_profile">

                <img src="{{ asset('/setting/cvinfo/' . $info->photo) }}" alt="profile_pic">

            </div>
            <div class="resume_content">
                <div class="resume_item resume_info">
                    <div class="title">
                        <p class="bold">{{ $info->name }}</p>
                        {{-- <p class="regular">Designer</p> --}}
                    </div>
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fas fa-map-signs" style="width: 2em;height: 1em;margin-top: 0.59em;"></i>
                            </div>
                            <div class="data">
                                {{ $info->address }}
                            </div>

                        </li>
                        <li>
                            <div class="icon">
                                <i class="fas fa-mobile-alt" style="width: 2em;height: 1em;margin-top: 0.59em;"></i>
                            </div>
                            <div class="data">
                                {{ $info->phone }}
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fas fa-envelope" style="width: 2em;height: 1em;margin-top: 0.59em;"></i>
                            </div>
                            <div class="data">
                                {{ $info->email }}
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="resume_item resume_skills">
                    <div class="title">
                        <p class="bold">skill's</p>
                    </div>
                    <ul>
                        <li>

                            @foreach ($skills as $skill)
                                {{ $skill }},
                            @endforeach

                        </li>
                    </ul>
                </div>
                <div class="resume_item resume_social">
                    <div class="title">
                        <p class="bold">Social</p>
                    </div>
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="fab fa-linkedin" style="width: 2em;height: 1em;margin-top: 0.59em;"></i>
                            </div>
                            <div class="data">
                                <p class="semi-bold">Linkedin</p>
                                <p>{{ $info->github }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fab fa-github" style="width: 2em;height: 1em;margin-top: 0.59em;"></i>
                            </div>
                            <div class="data">
                                <p class="semi-bold">Github</p>
                                <div class="data">
                                    {{ $info->github }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="resume_right">
            <div class="resume_item resume_about">
                <div class="title">
                    <p class="bold">Career Objective</p>
                </div>
                <p>{{ $info->carrer_objective }}</p>
            </div>
            <div class="resume_item resume_education">
                <div class="title">
                    <p class="bold">Education</p>
                </div>
                <ul>
                    @foreach ($educations as $education)
                        <li>
                            <div class="date">{{ $education->passing_year }}</div>
                            <div class="info">
                                <p class="semi-bold">{{ $education->institute }}</p>
                                <p>{{ $education->academic_qualification }}</p>
                                <p>Result: {{ $education->result }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="resume_item resume_work">
                <div class="title">
                    <p class="bold">Work Experience</p>
                </div>
                <ul>
                    @foreach ($jobs as $job)
                        <li>
                            <div class="date">{{ $job->service_year }}</div>
                            <div class="info">
                                <p class="semi-bold">{{ $job->office_name }} ({{ $job->designation }})</p>
                                <p>{{ $job->job_description }}</p>
                            </div>
                        </li>
                    @endforeach


                </ul>
            </div>
            @if ($projects)
                <div class="resume_item resume_work">
                    <div class="title">
                        <p class="bold">Projects</p>
                    </div>
                    <div class="row">
                        @foreach ($projects as $project)
                            <div class="col-4">
                                <h5>{{ $project->project_name }}</h5>
                                <p class="justified" style="margin-left:15px;">{{ $project->details }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

            @endif
            <div class="resume_item resume_hobby">
                <div class="title">
                    <p class="bold">References</p>
                </div>
                <div class="row">
                    @foreach ($references as $refer)
                        <div class="col-4">
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

    <script src="{{ asset('assets/plugins/print/print/jquery-2.0.3.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/print/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/print/print/custom.js') }}"></script>

</body>

</html>
