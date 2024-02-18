@extends('backend.layouts.app')

@section('title', __('Manage Register Link'))

@section('content')
    <div class="row">
        <div class="col-lg-11 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <label for="link-generate">
                            Withdraw Requests
                        </label>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Client Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Method</th>
                            <th>Comments</th>
                            <th>Balance</th>
                            <th>Request</th>
                            <th>Action</th>
                            <th>Prove</th>
                            <th>Prove Detail</th>
                            <th>Requested Time</th>
                            <th>Approval Time</th>
                        </thead>

                        <tbody>
                            @if (is_object($withdrawRequest) && count($withdrawRequest) > 0)
                                @foreach ($withdrawRequest as $each)
                                    <tr>
                                        <td>{{ $each?->user->id }}</td>
                                        <td>{{ $each?->user->name }}</td>
                                        <td>{{ $each?->user->email }}</td>
                                        <td>{{ $each?->withdrawRequest?->phone }}</td>
                                        <td>{{ $each?->withdrawRequest?->method }}</td>
                                        <td title="{{ $each?->withdrawRequest?->comments }}">
                                            {{ Str::limit($each?->withdrawRequest?->comments, 15, '...') }}</td>
                                        <td>{{ $each?->requested_amount }}</td>
                                        <td>
                                            @if ($each?->status == 'pending')
                                                <span class="btn btn-danger">Pending
                                                </span>
                                            @else
                                                <span class="btn btn-success">Approved
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('admin.agent.withDrawRequestExecute', ['id' => $each->id]) }}">
                                                @csrf
                                                @if ($each?->status == 'pending')
                                                    <button type="submit" class="btn btn-success">Make Approve</button>
                                                @elseif($each?->status == 'rejected')
                                                    <button type="button" class="btn btn-danger">Rejected</button>
                                                @else
                                                    <button type="button" disabled
                                                        class="btn btn-primary">Approved</button>
                                                @endif
                                            </form>

                                        <td>
                                            <a href="{{ route('admin.agent.withdrawProve', ['id' => $each?->id]) }}"
                                                class="btn btn-primary">Withdraw Prove</a>
                                        </td>
                                        <td>
                                            <p title="{{ $each?->withdrawProve?->prove }}">{{ Str::limit($each?->withdrawProve?->prove, 20, '...') }}</p>
                                        </td>
                                        </td>
                                        <td>{{ $each?->created_at->diffForHumans() }}</td>
                                        @if ($each?->status == 'approved')
                                            <td>{{ $each?->updated_at->diffForHumans() }}</td>
                                        @else
                                            <td>--</td>
                                        @endif

                                    </tr>
                                @endforeach
                            @endif
                        </tbody>

                        <tfoot>
                            <tr>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
