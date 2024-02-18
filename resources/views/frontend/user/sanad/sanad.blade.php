@extends('frontend.layouts.app')
@section('title', __('Dashboard'))

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="xs-title">Applications for Sanad</h2>
            <hr>
            <form action="{{ route('frontend.user.sanad.application') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tracking_no">Tracking Number</label>
                            <input type="text" name="tracking_no" class="form-control" placeholder="Tracking Number"
                                value="{{ request('tracking_no', null) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-outline-primary" style="margin-top:30px;" id="filter"
                            name="filter"><i class="fa fa-search"></i> Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Tracking No.</th>
                        <th>Applicant</th>
                        <th>Sanad</th>
                        <th>Status</th>

                        {{-- <th>Sanad File</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if ($applications)
                        @foreach ($applications as $application)
                            @php
                                $sanad = App\Models\Blog::find($application->sanad_id);
                                
                            @endphp
                            <tr>
                                <td>{{ $application->tracking_no ?? 'N/A' }}</td>
                                <td>{{ $application->applicant ?? 'N/A' }}</td>
                                <td>{{ $sanad->description ?? 'N/A' }}</td>
                                <td><span
                                        class="badge @if ($application->status == 'pending') badge-danger @else badge-success @endif"
                                        style="font-size: 100%; padding:5px;">
                                        {{ $application->status ?? null }}</span></td>


                                {{-- <td>
                                    @if ($application->status == 'approved')
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('frontend.user.sanad.certificate', $application->id) }}">Certificate</a>
                                    @else
                                        N/A
                                    @endif
                                </td> --}}

                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            @if ($applications)
                {{ $applications->links() }}
            @endif
        </div>
    </div>
@endsection
