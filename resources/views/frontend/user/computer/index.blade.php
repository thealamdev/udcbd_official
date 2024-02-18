@extends('frontend.layouts.app')
@section('title', __('Dashboard'))

@section('content')
    <div class="container" style="padding-top: 2%;">
        <div class=" row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        <h2 class="xs-title">Applications for Sanad</h2>
                    </x-slot>
                    <x-slot name="body">
                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Tracking No.</th>
                                    <th>Link</th>
                                    <th>Password</th>
                                    <th>Certificate</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($applications)
                                    @foreach ($applications as $application)
                                        @php
                                            $course = App\Models\Course::where('id', $application->course_id)
                                                ->latest()
                                                ->first();
                                            $course_type = App\Models\CourseType::where('id', $course->type_id)
                                                ->latest()
                                                ->first();
                                        @endphp
                                        <tr>

                                            <td>{{ $course_type->type ?? 'N/A' }}</td>
                                            <td>{{ $course->title ?? 'N/A' }}</td>
                                            <td>{{ $application->status ?? 'N/A' }}</td>
                                            <td>{{ $application->tracking_no ?? 'N/A' }}</td>
                                            @if ($application->status == 'approved')
                                                <td>
                                                    {{ $application->link ?? 'N/A' }}
                                                </td>
                                            @else
                                                <td>
                                                    N/A
                                                </td>
                                            @endif
                                            @if ($application->status == 'approved')
                                                <td>
                                                    {{ $application->password ?? 'N/A' }}
                                                </td>
                                            @else
                                                <td>
                                                    N/A
                                                </td>
                                            @endif

                                            <td>
                                                @if ($application->certificate_file != null)
                                                    <a href="{{ asset('/setting/certificate/' . $application->certificate_file) }}"
                                                        target="_blank">Open
                                                        <i class="fa fa-file"></i></a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </x-slot>
                </x-frontend.card>
            </div>
            <!--col-md-10-->
        </div>
        <!--row-->
    </div>
    <!--container-->
@endsection
