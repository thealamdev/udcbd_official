@extends('backend.layouts.app')

@section('title', __('Manage Register Link'))

@section('content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <label for="link-generate">
                            Agent Setting
                        </label>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.agentSetting.store') }}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <input type="hidden" name="id" value="{{ $setting?->id }}">
                            <label for="min_amount">Minimum Amount</label>
                            <input type="number" name="min_amount" value="{{ $setting?->min_amount }}" class="form-control"
                                placeholder="enter minimum amount">
                        </div>

                        <div class="mt-3">
                            <label for="min_amount">Minimum Client</label>
                            <input type="number" name="min_client" value="{{ $setting?->min_client }}" class="form-control"
                                placeholder="enter minimum client">
                        </div>

                        <div class="mt-3">
                            <label for="min_amount">Referal Percentage</label>
                            <input type="number" name="discount_percentage" value="{{ $setting?->discount_percentage }}"
                                class="form-control" placeholder="Referal Percentage">
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
