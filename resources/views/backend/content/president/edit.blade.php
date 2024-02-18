@extends('backend.layouts.app')

@section('title', 'Team Management')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.president.update') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $president->id }}">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $president->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="position" value="{{ $president->position }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Short Speech</label>
                            <textarea name="speech" id="speech" class="form-control" cols="30" rows="10">{{ $president->speech }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Description Photo</label>
                            <input type="file" name="description_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="description" class="editor form-control" cols="30" rows="10">{!! $president->description !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Description-2</label>
                            <textarea name="description2" id="description2" class="editor form-control" cols="30" rows="10">{!! $president->description2 !!}</textarea>
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
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
