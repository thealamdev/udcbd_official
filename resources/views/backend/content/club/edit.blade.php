@extends('backend.layouts.app')

@section('title', 'Club Management')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.club.update') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $club->id }}">
                        <div class="form-group">
                            <label>Banner</label>
                            <input type="file" name="banner" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Membership Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">Select Type</option>
                                <option @if ($club->type == 'Club') selected @endif value="Club">Club</option>
                                <option @if ($club->type == 'Association') selected @endif value="Association">Association
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <input type="file" name="logo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $club->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" value="{{ $club->phone }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" value="{{ $club->address }}" class="form-control">
                        </div>
                        {{-- <div class="form-group">
                            <label>Speech</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ $club->description }}</textarea>
            </div> --}}

                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
