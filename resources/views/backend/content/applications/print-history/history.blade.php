@extends('backend.layouts.app')

@section('title', 'Printed History')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

    <div class="card">
        <div class="card-header">
            <div class="d-flex">
                <h3 class="xs-title">Printed Certificate History</h3>
                <span class="ml-5">
                    <a href="{{ route('admin.certificate.history') }}" class="btn btn-primary">
                        <i class="fa fa-refresh"></i> Refresh</a></span>
            </div>
            <hr>
            <form action="{{ route('admin.certificate.history') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-4 col-3">
                        <div class="form-group">
                            <label for="union">Union</label>
                            <select name="union" id="union" class="form-control js-example-basic-single">
                                <option value="">Select</option>
                                @foreach ($unions as $union)
                                    <option value="{{ $union->id }}">{{ $union->bn_name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control"
                                value="{{ request('start_date', null) }}">
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" class="form-control"
                                value="{{ request('end_date', null) }}">
                        </div>

                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-outline-primary" style="margin-top:30px;" id="filter"
                            name="filter"><i class="fa fa-search"></i> Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <span class="badge badge-dark p-2 mb-2" style="font-size: 100%;">
                Total: {{ $history_count ?? null }}</span>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Applicant</th>
                            <th class="text-center">NID</th>
                            <th class="text-center">Union</th>
                            <th class="text-center">Sanad Type</th>
                            <th class="text-center">Sanad Tracking No.</th>
                            <th class="text-center">Printed On</th>
                            <th class="text-center">Printed By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $history)
                            @php
                                $application = App\Models\Application::find($history->application_id);
                                $sanad = App\Models\Blog::find($history->sanad_id);
                                $union = App\Models\Union::find($application->union_id);
                                $user = App\Domains\Auth\Models\User::find($history->printed_by);
                                // $same_app_count = App\Models\PrintHistory::where('application_id', $application->id)->count();
                            @endphp
                            <tr>
                                <td class="text-center"> {{ $application->applicant ?? 'N/A' }}</td>
                                <td class="text-center"> {{ $application->nid_birth ?? 'N/A' }}</td>
                                <td class="text-center"> {{ $union->bn_name ?? 'N/A' }}</td>
                                <td class="text-center"> {{ $sanad->description ?? null }}</td>
                                <td class="text-center"> {{ $application->tracking_no ?? null }}</td>
                                <td class="text-center"> {{ $history->printed_on ?? null }}</td>
                                <td class="text-center"> {{ $user->name ?? null }}</td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            @if ($histories)
                {{ $histories->links() }}
            @endif
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
