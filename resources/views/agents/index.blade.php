@extends('backend.layouts.app')

@section('title', __('Manage Register Link'))

@section('content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <label for="link-generate">
                            All Agents
                        </label>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Agent Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Request</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            @if (is_object($agents) && count($agents) > 0)
                                @foreach ($agents as $each)
                                    <tr>
                                        <td>{{ $each?->id }}</td>
                                        <td>{{ $each?->name }}</td>
                                        <td>{{ $each?->email }}</td>
                                        <td>{{ $each?->phone }}</td>

                                        <td>
                                            @if ($each->status == 1)
                                                <span class="btn btn-success">
                                                    Approved
                                                </span>
                                            @else
                                                <span class="btn btn-danger">
                                                    Pending
                                                </span>
                                            @endif

                                        </td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('admin.agent.update', ['agent' => $each->id]) }}">
                                                <input type="hidden" name="status" value="{{ $each->status }}">
                                                @method('put')
                                                @csrf
                                                @if ($each->status == 1)
                                                    <button type="submit" class="btn btn-danger">Make Pending</button>
                                                @else
                                                    <button type="submit" class="btn btn-success">Make Approved</button>
                                                @endif

                                            </form>
                                        </td>
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
