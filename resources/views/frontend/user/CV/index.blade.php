@extends('frontend.layouts.app')
@section('title', __('CV Informations'))

@section('content')
    <div class="container" style="padding-top: 2%;">
        <div class=" row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Informations for CV</h5>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('frontend.user.cv.information.store') }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="User">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control"
                                            placeholder="user@user.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="+8888888888888">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" cols="10" rows="3" placeholder="Address"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>LinkedIn</label>
                                        <input type="text" name="linkedin" class="form-control"
                                            placeholder="https://www.linkedin.com/in/username/">
                                    </div>
                                    <div class="form-group">
                                        <label>Github</label>
                                        <input type="text" name="github" class="form-control"
                                            placeholder="https://github.com/username">
                                    </div>
                                    <div class="form-group">
                                        <label>Career Objective/Profile</label>
                                        <textarea name="description" class="form-control" cols="10" rows="4" placeholder="Career Objective/Profile"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Skills/Expertise</label>
                                        <div class="card" style="padding: 10px;">
                                            <table style="width:100%;padding: 10px;" id="skills">
                                                <tr>
                                                    <td>
                                                        <label>Skills</label>
                                                        <input type="text" name="skills[]" placeholder="Skills/Expertise"
                                                            class="form-control" />
                                                        <div class="form-group text-right">
                                                            <button class="btn btn-outline-success" id="addskills"
                                                                type="button">+
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Projects</label>
                                        <div class="card" style="padding: 10px;">
                                            <table style="width:100%;padding: 10px;" id="projects">
                                                <tr>
                                                    <td>
                                                        <label>Project Title</label>
                                                        <input type="text" name="project_name[]"
                                                            placeholder="Project Title" class="form-control" />
                                                        <label>Project Details</label>
                                                        <input type="text" name="project_details[]"
                                                            placeholder="Project Details" class="form-control" />
                                                        <div class="form-group text-right">
                                                            <button class="btn btn-outline-success" id="addproject"
                                                                type="button">+
                                                            </button>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">

                                    <div class="form-group">
                                        <label>Education</label>
                                        <div class="card" style="padding: 10px;">
                                            <table style="width:100%;padding: 10px;" id="education">
                                                <tr>
                                                    <td>
                                                        <label>Institute</label>
                                                        <input type="text" name="institute[]" placeholder="Institution"
                                                            class="form-control" />
                                                        <label>Academic Qualification</label>
                                                        <input type="text" name="academic_qualification[]"
                                                            placeholder="SSC(science)/HSC(science)/Bsc in CSE"
                                                            class="form-control" />

                                                        <label>Passing Year</label>
                                                        <input type="text" name="passing_year[]" placeholder="2012-14"
                                                            class="form-control" />

                                                        <label>Result</label>
                                                        <input type="text" name="result[]"
                                                            placeholder="GPA:5.00/CGPA:4.00" class="form-control" />

                                                        <div class="form-group text-right">
                                                            <button class="btn btn-outline-success" id="addeducation"
                                                                type="button">+
                                                            </button>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Working Experience</label>
                                        <div class="card" style="padding: 10px;">
                                            <table style="width:100%;padding: 10px;" id="job">
                                                <tr>
                                                    <td>
                                                        <label>Office Name</label>
                                                        <input type="text" name="office_name[]"
                                                            placeholder="Office Name" class="form-control" />
                                                        <label>Designation</label>
                                                        <input type="text" name="designation[]"
                                                            placeholder="Designation" class="form-control" />

                                                        <label>Service Year</label>
                                                        <input type="text" name="service_year[]"
                                                            placeholder="Service Year" class="form-control" />
                                                        <label>Job Description</label>
                                                        <input type="text" name="job_description[]"
                                                            placeholder="Job Description" class="form-control" />

                                                        <div class="form-group text-right">
                                                            <button class="btn btn-outline-success" id="addjob"
                                                                type="button">+
                                                            </button>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>References</label>
                                        <div class="card" style="padding: 10px;">
                                            <table style="width:100%;padding: 10px;" id="references">
                                                <tr>
                                                    <td>
                                                        <label>Name</label>
                                                        <input type="text" name="refer_name[]" placeholder="Name"
                                                            class="form-control" />
                                                        <label>Phone</label>
                                                        <input type="text" name="refer_phone[]" placeholder="Phone"
                                                            class="form-control" />

                                                        <label>Email</label>
                                                        <input type="text" name="refer_email[]" placeholder="email"
                                                            class="form-control" />
                                                        <label>Designation</label>
                                                        <input type="text" name="refer_designation[]"
                                                            placeholder="Designation" class="form-control" />
                                                        <label>Institution</label>
                                                        <input type="text" name="refer_institution[]"
                                                            placeholder="Institution" class="form-control" />

                                                        <div class="form-group text-right">
                                                            <button class="btn btn-outline-success" id="addreference"
                                                                type="button">+
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="table-responsive text-center">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--col-md-10-->
        </div>
        <!--row-->
    </div>
    <!--container-->
    <script type="text/javascript">
        $(document).on("click", "#addeducation", function() {
                var edu = `<tr>
                          <td>
                                                        <label>Institute</label>
                                                        <input type="text" name="institute[]" placeholder="Institution"
                                                            class="form-control" />
                                                        <label>Academic Qualification</label>
                                                        <input type="text" name="academic_qualification[]"
                                                            placeholder="SSC(science)/HSC(science)/Bsc in CSE" class="form-control" />

                                                        <label>Passing Year</label>
                                                        <input type="text" name="passing_year[]" placeholder="2012-14"
                                                            class="form-control" />

                                                        <label>Result</label>
                                                        <input type="text" name="result[]"
                                                            placeholder="GPA:5.00/CGPA:4.00" class="form-control" />

                                                        <div class="form-group text-right">
                                                            <button class="btn btn-outline-success"
                                                                id="addeducation" type="button">+
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger remove-tr">-</button> 
                                                        </div>
                                                    </td>
                                                </tr>`;
                $("#education").append(edu);
            }

        );
    </script>
    <script type="text/javascript">
        $(document).on("click", "#addjob", function() {
                var job = ` <tr>
                                                    <td>
                                                        <label>Office Name</label>
                                                        <input type="text" name="office_name[]" placeholder="Office Name"
                                                            class="form-control" />
                                                        <label>Designation</label>
                                                        <input type="text" name="designation[]" placeholder="Designation"
                                                            class="form-control" />
                                                        <label>Service Year</label>
                                                        <input type="text" name="service_year[]"
                                                            placeholder="Service Year" class="form-control" />
                                                        <label>Job Description</label>
                                                        <input type="text" name="job_description[]"
                                                            placeholder="Job Description" class="form-control" />

                                                        <div class="form-group text-right">
                                                            <button class="btn btn-outline-success" id="addjob"
                                                                type="button">+
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger remove-tr">-</button> 
                                                        </div>
                                                    </td>
                                                </tr>`;
                $("#job").append(job);
            }

        );
    </script>
    <script type="text/javascript">
        $(document).on("click", "#addreference", function() {
                var refer = ` <tr>
                                                    <td>
                                                        <label>Name</label>
                                                        <input type="text" name="refer_name[]" placeholder="Name"
                                                            class="form-control" />
                                                        <label>Phone</label>
                                                        <input type="text" name="refer_phone[]" placeholder="Phone"
                                                            class="form-control" />

                                                        <label>Email</label>
                                                        <input type="text" name="refer_email[]" placeholder="email"
                                                            class="form-control" />
                                                        <label>Designation</label>
                                                        <input type="text" name="refer_designation[]"
                                                            placeholder="Designation" class="form-control" />
                                                        <label>Institution</label>
                                                        <input type="text" name="refer_institution[]"
                                                            placeholder="Institution" class="form-control" />

                                                        <div class="form-group text-right">
                                                            <button class="btn btn-outline-success" id="addreference"
                                                                type="button">+
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger remove-tr">-</button> 
                                                        </div>
                                                    </td>
                                                </tr>`;
                $("#references").append(refer);
            }

        );
    </script>
    <script type="text/javascript">
        $(document).on("click", "#addproject", function() {
                var pro = `<tr>
                                                    <td>
                                                        <label>Project Title</label>
                                                        <input type="text" name="project_name[]"
                                                            placeholder="Project Title" class="form-control" />
                                                        <label>Project Details</label>
                                                        <input type="text" name="project_details[]"
                                                            placeholder="Project Details" class="form-control" />
                                                        <div class="form-group text-right">
                                                            <button class="btn btn-outline-success" id="addproject"
                                                                type="button">+
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger remove-tr">-</button> 
                                                        </div>
                                                    </td>
                                                </tr>`;
                $("#projects").append(pro);
            }

        );
    </script>
    <script type="text/javascript">
        $(document).on("click", "#addskills", function() {
                var skill = `<tr>
                                                    <td>
                                                        <label>Skills</label>
                                                        <input type="text" name="skills[]" placeholder="Skills/Expertise"
                                                            class="form-control" />
                                                        <div class="form-group text-right">
                                                            <button class="btn btn-outline-success" id="addskills"
                                                                type="button">+
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger remove-tr">-</button> 
                                                        </div>
                                                    </td>
                                                </tr>`;
                $("#skills").append(skill);
            }

        );
    </script>
    <script type="text/javascript">
        $(document).on("click", ".remove-tr", function(e) {
            e.preventDefault();
            $(this).parents("tr").remove();
        });
    </script>
@endsection
