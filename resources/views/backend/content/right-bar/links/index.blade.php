@extends('backend.layouts.app')

@section('title', 'Union Information')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Important Links</h2>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.important.links.store') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="important_link">Link</label>
                                    <input type="text" name="important_link" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
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
                            <th class="text-center">Name</th>
                            <th class="text-center">Forms</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($imp_link as $link)
                            <tr>
                                <td class="text-center">{{ $link->description ?? 'N/A' }}</td>
                                <td class="text-center"><a href="{{ $link->important_link ?? 'N/A' }}"
                                        target="_blank">{{ $link->important_link ?? 'N/A' }}</a></td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.important.links.edit', $link->id) }}"
                                        class="btn btn-outline-primary"><i class="fa fa-edit"></i> edit</a>
                                    <form method="delete" action="{{ route('admin.important.links.delete', $link->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger ml-1 show_confirm"
                                            data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>


                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>

@endsection
