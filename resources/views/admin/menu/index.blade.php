@extends('layouts.app')
@section('title', 'Menu Management')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Menu Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Menu Management</li>
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
            <h3 class="card-title">Menu Management</h3>

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
                <i class="fas fa-plus-circle"></i> Add Menu
            </a>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No</th>
                        <th>Menu Name</th>
                        <th>Menu Icon</th>
                        <th>Menu Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>
                            <a href="#"
                                onclick="edit( {{ $menu->id }}, '{{ $menu->menu_name}}', '{{ $menu->menu_icon }}', '{{ $menu->menu_link }}' )"
                                class="badge badge-warning edit" data-toggle="tooltip" data-placement="top"
                                title="edit"><i class="far fa-edit"></i></a>
                            <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('apakah yakin hapus?');"
                                    class="badge badge-danger border-0" data-toggle="tooltip" data-placement="top"
                                    title="delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $menu->menu_name }}</td>
                        <td>{{ $menu->menu_icon }}</td>
                        <td>{{ $menu->menu_link }}</td>
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
<div class="modal fade" id="menu-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <form action="" method="POST" class="modal-form">
                <div class="modal-body">
                    @csrf

                    <input type="hidden" name="_method" class="method">
                    <div class="form-group">
                        <label for="menu_name">Menu Name</label>
                        <input name="menu_name" type="text" class="form-control" id="menu_name" required
                            placeholder="Enter Menu Name">
                    </div>
                    <div class="form-group">
                        <label for="menu_icon">Menu Icon</label>
                        <input name="menu_icon" type="text" class="form-control" id="menu_icon" required
                            placeholder="Enter Menu Icon">
                    </div>
                    <div class="form-group">
                        <label for="menu_Link">Menu Link</label>
                        <input name="menu_link" type="text" class="form-control" id="menu_link" required
                            placeholder="Enter Menu Link">
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

@if (session()->has('success'))
@endif

@push('script')
<script>
    // show modal create
    $('.create').click(function() {
        $('.modal-form').attr('action', `{{ route('menu.store') }}`);
        $('.method').val('POST');
        $('.modal-title').html('Add Menu');
        $('#menu_name').val('')
        $('#menu_icon').val('')
        $('#menu_link').val('')
        $('.btn-modal').html('Save Change')
        $('#menu-modal').modal('show');
    })

    // session alert
    @if (session()->has('success'))
            $(document).Toasts('create', {
            class: 'bg-success',
            body: `{{ session('success') }}`
        })
    @endif

    // show modal edit
    function edit(id, menu_name, menu_icon, menu_link) {
        $('.modal-form').attr('action', '/menu/' + id);
        $('.method').val('PUT');
        $('.modal-title').html('Edit Menu');
        $('#menu_name').val(menu_name);
        $('#menu_icon').val(menu_icon);
        $('#menu_link').val(menu_link);
        $('.btn-modal').html('Update Change')
        $('#menu-modal').modal('show');
    }
</script>
@endpush