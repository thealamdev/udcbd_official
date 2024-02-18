@extends('backend.layouts.app')

@section('title', __('All transactions'))

@section('content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <label for="link-generate">
                            Add prove of withdraw
                        </label>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.agent.withdrawProveStore') }}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <input type="hidden" name="withdraw_id" value="{{ $id }}">
                            <textarea name="prove" class="form-control" cols="30" rows="10"
                                placeholder="enter the prove of transaction">{{ $withdraw_prove?->prove }}</textarea>
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
