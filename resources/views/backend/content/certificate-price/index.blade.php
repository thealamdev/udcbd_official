@extends('backend.layouts.app')

@section('title', 'Certificate Pricing')

@section('content')

    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <label>Certificate Pricing</label>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.setting.certificatePriceStore') }}" method="POST">
                        @csrf
                        <div class="mt">
                            <input type="number" name="amount" value="{{ $certificate_pricing?->price_rate }}"
                                placeholder="enter certificate unit price" class="form-control">
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
