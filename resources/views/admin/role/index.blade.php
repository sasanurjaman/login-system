@extends('layouts.app')
@section('title', 'Role User')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Role User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Role User</li>
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
            <h3 class="card-title">Role User</h3>

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
            <a href="#" class="btn btn-primary mb-2" id="create">
                <i class="fas fa-plus-circle"></i> Add Role
            </a>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No</th>
                        <th>Role</th>
                        <th>User Permission</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>
                            <a href="#" onclick="edit({{ $role->id }}, '{{ $role->role}}')"
                                class="badge badge-warning edit" data-toggle="tooltip" data-placement="top"
                                title="edit"><i class="far fa-edit"></i></a>
                            <form action="{{ route('role.destroy', $role->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('apakah yakin hapus?');"
                                    class="badge badge-danger border-0" data-toggle="tooltip" data-placement="top"
                                    title="delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $role->role }}</td>
                        <td>User permission</td>
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
<div class="modal fade" id="rolemodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <form action="" method="POST" class="formModal">
                <div class="modal-body">
                    @csrf

                    <input type="hidden" name="_method" class="method">
                    <div class="form-group">
                        <label for="role">Role Name</label>
                        <input name="role" type="text" class="form-control" id="role" placeholder="Enter Role Name">
                    </div>
                    <div class="from-group">
                        <div class="custom-control custom-checkbox">
                            <input name="permission" class="custom-control-input" type="checkbox" id="customCheckbox1"
                                value="option1">
                            <label for="customCheckbox1" class="custom-control-label">Custom Checkbox</label>
                        </div>
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
    $('#create').click(function() {
        $('.modal-title').html('Add Role')
        $('.formModal').attr('action', `{{ route('role.store') }}`)
        $('.method').val('post')
        $('.btn-modal').html('Save Change')
        $('#rolemodal').modal('show')
    });

    @if (session()->has('success'))
        $(document).Toasts('create', {
            class: 'bg-success',
            body: `{{ session('success') }}`
        })
    @endif

    // show modal edit
    function edit(id, role) {
        $('.modal-title').html('Edit Role')
        $('.formModal').attr('action', '/role/' + id)
        $('.method').val('put')
        $('#role').val(role)
        $('.btn-modal').html('Update Change')
        $('#rolemodal').modal('show')
    }
</script>
@endpush