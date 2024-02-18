@extends('backend.layouts.app')

@section('title', __('All transactions'))

@section('content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <label for="link-generate">
                            All transactions
                        </label>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Transaction ID</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Date</th>
                        </thead>

                        <tbody>
                            @if (is_object($transactions) && count($transactions) > 0)
                                @foreach ($transactions as $each)
                                    <tr>
                                        <td>{{ $each?->id }}</td>
                                        <td>{{ $each?->user?->name }}</td>
                                        <td>{{ $each?->user?->phone }}</td>
                                        <td>{{ $each?->transaction_id }}</td>
                                        <td>{{ $each?->amount }}</td>
                                        <td>{{ $each?->method }}</td>
                                        <td>{{ $each?->created_at->diffForHumans() }}</td>
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
