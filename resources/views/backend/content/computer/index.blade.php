@extends('backend.layouts.app')

@section('title', 'Applications')

@section('content')
    @php
        $users = DB::table('users')->get();
        $user_info = DB::table('training_user_infos')->get();
    @endphp

    <div class="card">
        <div class="card-header">Computer Course Application Table</div>
        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Photo</th>
                        <th class="text-center">Applicant</th>
                        <th class="text-center">NID / Birth Certificate</th>
                        <th class="text-center">Course</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Payment Method</th>
                        <th class="text-center">Transaction No.</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $application)
                        @php
                            // dd($application);
                            $info = App\Models\TrainingUserInfo::find($application->training_user_info_id);
                            $sanad = App\Models\Course::find($application->course_id);
                            
                        @endphp
                        <tr>
                            <td class="text-center">
                                <img src="{{ asset('/setting/user-info/' . $info->photo) ?? 'N/A' }}" style="height: 100px">
                            </td>
                            <td class="text-center"> {{ $info->name_en }}</td>
                            <td class="text-center">
                                {{ $info->certificate_type ?? null }}-{{ $info->voter_birth_id ?? null }}</td>
                            <td class="text-center"> {{ $sanad->title ?? null }}</td>
                            <td class="text-center"> {{ $application->phone ?? null }}</td>
                            <td class="text-center"> {{ $application->amount ?? null }}</td>
                            <td class="text-center"> {{ $application->payment_method ?? null }}</td>
                            <td class="text-center"> {{ $application->transaction_no ?? null }}</td>
                            <td class="text-center">
                                <span
                                    class="badge @if ($application->status == 'pending') badge-danger @else badge-success @endif"
                                    style="font-size: 100%; padding:5px;">
                                    {{ $application->status ?? null }}</span>
                            </td>
                            <td class="align-content-center text-center">
                                <x-utils.view-button :href="route('admin.training.applicant.details', $application->id)" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endsection
