@extends('backend.layouts.app')

@section('title', 'Club Management')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.club.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Banner</label>
                        <input type="file" name="banner" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="">Select Type</option>
                            <option value="Club">Club</option>
                            <option value="Association">Association</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                    {{-- <div class="form-group">
                            <label>Speech</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                        </div> --}}

                    <div class="table-responsive">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        {{-- <th>Description</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clubs as $club)
                    <tr>
                        <td><img src="{{ asset('/setting/team/' . $club->logo) ?? 'N/A' }}" style="height: 100px">
                        </td>
                        <td>{{ $club->name ?? 'N/A' }}</td>
                        <td>{{ $club->address ?? 'N/A' }}</td>
                        <td>{{ $club->phone ?? 'N/A' }}</td>
                        {{-- <td>{{ $club->description ?? 'N/A' }}</td> --}}

                        <td>
                            <a href="{{ route('admin.club.edit', ['id' => $club->id]) }}" class="btn btn-success">
                                <i class="fa fa-pencil"></i> Edit
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection