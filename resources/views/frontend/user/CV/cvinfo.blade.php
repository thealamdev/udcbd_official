@extends('frontend.layouts.app')

@section('title', 'CV Profile')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="text-right"><a href="{{ route('frontend.user.cv.profile.edit', ['id' => $info->id]) }}"
                        class="btn btn-primary">Update</a></div>
                <div class="text-center">
                    <img src="{{ asset('/setting/cvinfo/' . $info->photo) ?? 'N/A' }}" style="height: 150px"><br>
                    <h5>{{ $info->name ?? 'N/A' }}</h5>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive">
                    <tr>
                        <td class="text-center"><b>Phone</b></td>
                        <td class="text-center">{{ $info->phone ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center"><b>Email</b></td>
                        <td class="text-center">{{ $info->email ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center"><b>Address</b></td>
                        <td class="text-center">{{ $info->address ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center"><b>LinkedIn</b></td>
                        <td class="text-center"><a href="{{ $info->linkedin ?? 'N/A' }}"
                                target="_blank">{{ $info->linkedin ?? 'N/A' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><b>Github</b></td>
                        <td class="text-center"><a href="{{ $info->github ?? 'N/A' }}"
                                target="_blank">{{ $info->github ?? 'N/A' }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><b>Career Objective/Profile</b></td>
                        <td>{{ $info->carrer_objective ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center"><b>Skills</b></td>
                        <td class="text-center">
                            <table class="table table-bordered">
                                @foreach ($skills as $key => $skill)
                                    <td>
                                        {{ $skill }}
                                    </td>
                                @endforeach

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><b>Education</b></td>
                        <td>
                            <table class="table table-bordered">
                                <thead>
                                    <td class="text-center"> <b>Institute</b></td>
                                    <td class="text-center"><b>Qualification</b></td>
                                    <td class="text-center"><b>Passing Year</b></td>
                                    <td class="text-center"><b>Result</b></td>
                                    <td class="text-center"><b>Action</b></td>
                                </thead>
                                <tbody>
                                    @foreach ($educations as $education)
                                        <tr>
                                            <td class="text-center">{{ $education->institute ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $education->academic_qualification ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $education->passing_year ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $education->result ?? 'N/A' }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('frontend.user.cv.profile.edu.delete', ['id' => $education->id]) }}"
                                                    class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><b>Work Experience</b></td>
                        <td>
                            <table class="table table-bordered">
                                <thead>
                                    <td class="text-center"> <b>Office Name</b></td>
                                    <td class="text-center"><b>Designation</b></td>
                                    <td class="text-center"><b>Service Year</b></td>
                                    <td class="text-center"><b>Job Description</b></td>
                                    <td class="text-center"><b>Action</b></td>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td class="text-center">{{ $job->office_name ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $job->designation ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $job->service_year ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $job->job_description ?? 'N/A' }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('frontend.user.cv.profile.job.delete', ['id' => $job->id]) }}"
                                                    class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><b>Projects</b></td>
                        <td>
                            <table class="table table-bordered">
                                <thead>
                                    <td class="text-center"><b>Project Title</b></td>
                                    <td class="text-center"><b>Project Details</b></td>
                                    <td class="text-center"><b>Action</b></td>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td class="text-center">{{ $project->project_name ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $project->details ?? 'N/A' }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('frontend.user.cv.profile.project.delete', ['id' => $project->id]) }}"
                                                    class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><b>References</b></td>
                        <td>
                            <table class="table table-bordered">
                                <thead>
                                    <td class="text-center"> <b>Name</b></td>
                                    <td class="text-center"><b>Phone</b></td>
                                    <td class="text-center"><b>Email</b></td>
                                    <td class="text-center"><b>Designation</b></td>
                                    <td class="text-center"><b>Institution</b></td>
                                    <td class="text-center"><b>Action</b></td>
                                </thead>
                                <tbody>
                                    @foreach ($references as $reference)
                                        <tr>
                                            <td class="text-center">{{ $reference->name ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $reference->phone ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $reference->email ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $reference->designation ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $reference->institution ?? 'N/A' }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('frontend.user.cv.profile.ref.delete', ['id' => $reference->id]) }}"
                                                    class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
