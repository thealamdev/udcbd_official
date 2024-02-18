@extends('frontend.layouts.app')

@section('title', __('Manage Register Link'))

@section('content')
    <div class="row">
        <div class="col-lg-12 m-auto text-center">
            <h3 class="text-danger m-4">সর্বনিন্ম ১০ জন ক্লায়েন্ট এবং ১০০০ টাকা জমা হলে টাকা উত্তলন করতে পারবেন।</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <label for="link-generate">
                            Clients of <span class="text-danger">{{ auth()->user()->name }}</span>
                        </label>

                        <div>
                            <span class="text-success fs-3">Balance :
                                {{ $total_debit * ($setting->discount_percentage * 0.01) }} tk</span>
                            @if (
                                $total_debit * ($setting->discount_percentage * 0.01) >= $setting?->min_amount &&
                                    $client_count >= $setting?->min_client)
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    WithDraw Now
                                </button>
                            @else
                                <p class="text-danger">Amount or client is less than requirement.</p>
                            @endif

                            @if (is_object($processing) && count($processing) > 0)
                                <span class="btn btn-danger">Processing amount
                                    {{ collect($processing)->sum('amount') * ($setting->discount_percentage * 0.01) }}tk</span>
                                <br>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Give Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ route('frontend.user.agent.withdraw') }}" method="POST">
                                                @csrf
                                                <div class="mt-3">
                                                    <label for="method">Payment Method</label>
                                                    <input type="text" placeholder="enter payment method" name="method"
                                                        class="form-control">
                                                </div>

                                                <div class="mt-3">
                                                    <label for="method">Mobile</label>
                                                    <input type="text" placeholder="enter mobile" name="phone"
                                                        class="form-control">
                                                </div>

                                                <div class="mt-3">
                                                    <label for="method">Mobile</label>
                                                    <textarea name="comments" class="form-control" placeholder="leave comment if details need" cols="30"
                                                        rows="10"></textarea>
                                                </div>

                                                <input type="hidden"
                                                    value="{{ $total_debit * ($setting->discount_percentage * 0.01) }}"
                                                    name="amount">
                                                @if (is_object($requested_client))
                                                    @foreach ($requested_client as $each)
                                                        <input type="hidden" name="debit_id[]" value="{{ $each->id }}">
                                                    @endforeach
                                                @endif
                                                @if (
                                                    $total_debit * ($setting->discount_percentage * 0.01) >= $setting?->min_amount &&
                                                        $client_count >= $setting?->min_client)
                                                    <button type="submit" class="btn btn-sm btn-success">WithDraw</button>
                                                @endif
                                                @if (is_object($processing) && count($processing) > 0)
                                                    <span class="btn btn-danger">Processing amount
                                                        {{ collect($processing)->sum('amount') * ($setting->discount_percentage * 0.01) }}tk</span>
                                                    <br>
                                                @endif
                                            </form>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <label for="link-generate">

                    </label>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Client Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Balance</th>
                            <th>Debit</th>
                        </thead>

                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @if (is_object($clients?->agent_client) && count($clients?->agent_client) > 0)
                                @foreach ($clients?->agent_client as $each)
                                    @php
                                        $total += $each?->user?->balance?->balance;
                                    @endphp
                                    <tr>
                                        <td>{{ $each?->id }}</td>
                                        <td>{{ $each?->user?->name }}</td>
                                        <td>{{ $each?->user?->email }}</td>
                                        <td>{{ $each?->user?->phone }}</td>
                                        <td>{{ $each?->user?->balance?->balance ?? 0 }} tK</td>
                                        <td>{{ collect($each?->user?->balance?->debit)->sum('amount') ?? 0 }} tK</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td>Total amount</td>
                                <td>{{ $total }} tK</td>
                                <td>{{ $total_debit }} tK</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
