@extends('backend.layouts.app')

@section('title', 'Applications')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    @php
        $users = DB::table('users')->get();
    @endphp

    <div class="card application-form">
        <div class="card-header">
            <div class="d-flex">
                <h3 class="xs-title">Applications for Sanad</h3>
                <span class="ml-5">
                    <a href="{{ route('admin.applications') }}" class="btn btn-primary">
                        <i class="fa fa-refresh"></i> Refresh</a></span>
            </div>
            <hr>
            <form action="{{ route('admin.applications') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tracking_no">Tracking Number</label>
                            <input type="text" name="tracking_no" class="form-control" placeholder="Tracking Number"
                                value="{{ request('tracking_no', null) }}">
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
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select</option>
                                        <option @if (request('status') == 'approved') selected @endif value="approved">approved
                                        </option>
                                        <option @if (request('status') == 'pending') selected @endif value="pending">pending
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-outline-primary" style="margin-top:30px;"
                                    id="filter" name="filter"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <div class="card-body">
            <span class="badge badge-dark p-2 mb-2" style="font-size: 100%;">
                Total: {{ $application_count ?? null }}</span>

            <table class="table table-hover table-bordered table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">Applicant</th>
                        <th class="text-center">Union</th>
                        <th class="text-center">Sanad Type</th>
                        <th class="text-center">Sanad Tracking No.</th>
                        <th class="text-center">Transaction Phone</th>
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
                            $sanad = App\Models\Blog::find($application->sanad_id);
                            $union = App\Models\Union::find($application->union_id);

                        @endphp
                        <tr>
                            <td class="text-center"> {{ $application->applicant ?? 'N/A' }}</td>
                            <td class="text-center"> {{ $union->bn_name ?? 'N/A' }}</td>
                            <td class="text-center"> {{ $sanad->description ?? null }}</td>
                            <td class="text-center"> {{ $application->tracking_no ?? null }}</td>
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
                            <td class="d-flex p-4">

                                @if ($logged_in_user->can('admin.sanad.status'))
                                    <form action="{{ route('admin.application.status') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="application_id" value="{{ $application->id }}">
                                        @if ($application->status == 'pending')
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="btn btn-outline-success" data-toggle="tooltip"
                                                title='Accept Application'>Accept</button>
                                        @endif
                                        @if ($application->status == 'approved')
                                            <input type="hidden" name="status" value="pending">
                                            <button type="submit" class="btn btn-outline-danger" data-toggle="tooltip"
                                                title='Reject Application'>Reject</button>
                                        @endif
                                    </form>
                                @endif


                                <a class="btn btn-primary ml-1" data-toggle="tooltip" title='View Details'
                                    href="{{ route('admin.application.detail', $application->id) }}">
                                    <i class="fa fa-info-circle"></i></a>
                                @if ($logged_in_user->id == 1)
                                    <form method="delete"
                                        action="{{ route('admin.application.delete', $application->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger ml-1 show_confirm"
                                            data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            @if ($applications)
                {{ $applications->links() }}
            @endif
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script type="text/javascript">
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                        title: `Are you sure you want to delete this record?`,
                        text: "If you delete this, it will be gone forever.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });
        </script>
    @endsection
