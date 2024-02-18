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
                    <form class="form-horizontal" action="{{ route('admin.important.forms.update') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $forms->id }}">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $forms->name }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="form">Form File</label>
                                    <input type="file" name="form" class="form-control">
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
