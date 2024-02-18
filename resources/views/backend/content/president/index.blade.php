@extends('backend.layouts.app')

@section('title', 'President Management')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.president.store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="position" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Short Speech</label>
                            <textarea name="speech" id="speech" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Description Photo</label>
                            <input type="file" name="description_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="description" class="editor form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Description-2</label>
                            <textarea name="description2" id="description2" class="editor form-control" cols="30" rows="10"></textarea>
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
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Speech</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presidents as $president)
                            <tr>
                                <td><img src="{{ asset('/setting/team/' . $president->photo) ?? 'N/A' }}"
                                        style="height: 100px">
                                </td>
                                <td>{{ $president->name ?? 'N/A' }}</td>
                                <td>{{ $president->position ?? 'N/A' }}</td>
                                <td>{{ $president->speech ?? 'N/A' }}</td>

                                <td>
                                    <a href="{{ route('admin.president.edit', ['id' => $president->id]) }}"
                                        class="btn btn-success">
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
    @push('after-styles')
        {{ style(asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')) }}
    @endpush

    @push('after-scripts')
        {!! script(asset('assets/plugins/tinymce/jquery.tinymce.min.js')) !!}
        {!! script(asset('assets/plugins/tinymce/tinymce.min.js')) !!}
        {!! script(asset('assets/plugins/tinymce/editor-helper.js')) !!}
        {!! script(asset('assets/plugins/moment/moment.js')) !!}
        {!! script(asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')) !!}

        <script>
            $(document).ready(function() {
                simple_editor('.editor', 450);
                $('#datepicker-autoclose').datepicker({
                    format: "dd/mm/yyyy",
                    clearBtn: true,
                    autoclose: true,
                    todayHighlight: true,
                });

                $("#image").change(function() {
                    readImageURL(this, $('#holder'));
                });
            });
            $(document).on('blur', "#post_title", function() {
                let postField = $(this);
                let post_title = postField.val();
                if (post_title) {
                    ajax_slug_url(post_title);
                    setTimeout(update, 1000); // 30 seconds
                    $("#post_error").empty();
                    postField.removeClass('is-invalid');
                } else {
                    $("#post_error").text('Title must not empty');
                    postField.addClass('is-invalid');
                }
            });

            $(function() {
                $(".form-check-input").click(function() {
                    const status = $(this).val();
                    if (status === "schedule") {
                        $("#scheduleDate").removeClass("d-none");
                    } else if (status === "1") {
                        $("#for_New_upload").removeClass("d-none");
                    } else if (status === "0") {
                        $("#for_New_upload").addClass("d-none");
                    } else {
                        $("#scheduleDate").addClass("d-none");
                    }
                });

            });
        </script>
    @endpush

@endsection
