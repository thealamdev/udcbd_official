@extends('backend.layouts.app')

@section('title', 'Balance Top Up')

@section('content')

    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <label>Bkash Recharge</label>
                </div>

                <div class="card-body">
                    <form action="{{ route('bkash-create-payment') }}" method="POST">
                        @csrf
                        <div class="mt">
                            <input type="number" name="amount" placeholder="enter amount" class="form-control">
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Confirm & Next</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
