@extends('backend.layouts.app')

@section('title', 'Union Information')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Important Links</h2>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.important.links.update') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $link->id }}">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="description">Name</label>
                                    <input type="text" name="description" class="form-control"
                                        value="{{ $link->description }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="important_link">Link</label>
                                    <input type="text" name="important_link" class="form-control"
                                        value="{{ $link->important_link }}">
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
