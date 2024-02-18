@extends('backend.layouts.app')

@section('title', ' Computer Training Management')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.competition.store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Course Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">Select Type</option>
                                @foreach ($type as $t)
                                    <option value="{{ $t->id }}">{{ $t->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="description2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="" class="editor2 form-control" col="1" row="1" name="description1"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" name="link" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control">
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
                            <th>Image</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competition as $c)
                            @if ($c->type_id != null)
                                @php
                                    foreach ($type as $t) {
                                        $type = App\Models\CourseType::find($c->type_id);
                                    }
                                @endphp
                            @endif

                            <tr>
                                <td><img src="{{ asset('/setting/competition/' . $c->photo) ?? 'N/A' }}"
                                        style="height: 100px">
                                </td>
                                <td>{{ $c->title ?? 'N/A' }}</td>
                                <td>{{ $type->type ?? 'N/A' }}</td>
                                <td>{{ $c->description2 ?? 'N/A' }}</td>
                                <td>{{ $c->address ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('admin.competition.edit', ['id' => $c->id]) }}"
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
            $(document).ready(function() {
                simple_editor('.editor4', 450);
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
            $(document).ready(function() {
                simple_editor('.editor2', 450);
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
            $(document).ready(function() {
                simple_editor('.editor3', 450);
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
