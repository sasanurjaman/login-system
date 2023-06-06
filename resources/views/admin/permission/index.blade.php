@extends('layouts.app')
@section('title', 'User Permission')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Permission</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">User Permission</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Permission</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-primary mb-2 create">
                <i class="fas fa-plus-circle"></i> Add Permission
            </a>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No</th>
                        <th>Permission</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>
                            <a href="#" onclick="edit({{ $permission->id }}, '{{ $permission->permission}}')"
                                class="badge badge-warning edit" data-toggle="tooltip" data-placement="top"
                                title="edit"><i class="far fa-edit"></i></a>
                            <form action="{{ route('permission.destroy', $permission->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('apakah yakin hapus?');"
                                    class="badge badge-danger border-0" data-toggle="tooltip" data-placement="top"
                                    title="delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $permission->permission }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection

<!-- modal -->
<div class="modal fade" id="permission-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <form action="" method="POST" class="modal-form">
                <div class="modal-body">
                    @csrf

                    <input type="hidden" name="_method" class="method">
                    <div class="form-group">
                        <label for="permission">Permission Name</label>
                        <input name="permission" type="text" class="form-control" id="permission"
                            placeholder="Enter Permission Name">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-modal"></button>
                </div>
            </form>
        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('script')
<script>
    // show modal create
    $('.create').click(function() {
        $('.modal-form').attr('action', `{{ route('permission.store') }}`);
        $('.method').val('POST');
        $('.modal-title').html('Add Permission');
        $('.btn-modal').html('Save Change');
        $('#permission-modal').modal('show');
    })

    // alert session
    @if (session()->has('success'))
        $(document).Toasts('create', {
            class: 'bg-success',
            body: `{{ session('success') }}`
        })
    @endif

    // sow modal edit
    function edit(id, permission) {
        $('.modal-form').attr('action', '/permission/' + id);
        $('.method').val('PUT');
        $('.modal-title').html('Edit Permission');
        $('.btn-modal').html('Update Change');
        $('#permission').val(permission)
        $('#permission-modal').modal('show');
    }

</script>
@endpush