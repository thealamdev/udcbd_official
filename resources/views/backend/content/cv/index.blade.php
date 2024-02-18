@extends('backend.layouts.app')

@section('title', ' Computer Training Management')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.cv.template.store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Banner</label>
                            <input type="file" name="banner" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>CV Template Photo</label>
                            <input type="file" name="template" class="form-control">
                        </div>
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
                            <th>ID</th>
                            <th>Banner</th>
                            <th>Template</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cv as $c)
                            <tr>
                                <td>{{ $c->id ?? 'N/A' }}</td>
                                <td><img src="{{ asset('/setting/cvtemplate/' . $c->banner) ?? 'N/A' }}"
                                        style="height: 200px">
                                </td>
                                <td><img src="{{ asset('/setting/cvtemplate/' . $c->template) ?? 'N/A' }}"
                                        style="height: 200px">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
