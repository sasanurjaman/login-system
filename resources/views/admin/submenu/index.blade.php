@extends('layouts.app')
@section('title', 'Sub Menu')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sub Menu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('menu.index')}}">Menu Management</a></li>
                    <li class="breadcrumb-item active">Sub Menu</li>
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
            <h3 class="card-title">Sub Menu {{ Str::title(request('menu'))}}</h3>

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
                        <th>Sub Menu Name</th>
                        <th>Sub Menu Icon</th>
                        <th>Sub Menu Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subMenus as $subMenu)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>
                            <a href="#"
                                onclick="edit( {{ $subMenu->id }}, '{{ $subMenu->sub_menu_name}}', '{{ $subMenu->sub_menu_icon }}', '{{ $subMenu->sub_menu_link }}' )"
                                class="badge badge-warning edit" data-toggle="tooltip" data-placement="top"
                                title="edit"><i class="far fa-edit"></i></a>
                            <form action="{{ route('subMenu.destroy', $subMenu->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="menu_id" value="{{ request('filter')}}">
                                <input type="hidden" name="menu_name" value="{{ request('menu')}}">
                                <button type="submit" onclick="return confirm('apakah yakin hapus?');"
                                    class="badge badge-danger border-0" data-toggle="tooltip" data-placement="top"
                                    title="delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subMenu->sub_menu_name }}</td>
                        <td>{{ $subMenu->sub_menu_icon }}</td>
                        <td>{{ $subMenu->sub_menu_link }}</td>
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

<!-- modal -->
<div class="modal fade" id="sub-menu-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <form action="" method="POST" class="modal-form">
                <div class="modal-body">
                    @csrf

                    <input type="hidden" name="menu_id" value="{{ request('filter')}}">
                    <input type="hidden" name="menu_name" value="{{ request('menu')}}">
                    <input type="hidden" name="_method" class="method">
                    <div class="form-group">
                        <label for="sub_menu_name">Sub Menu Name</label>
                        <input name="sub_menu_name" type="text" class="form-control" id="sub_menu_name" required
                            placeholder="Enter Sub Menu Name">
                    </div>
                    <div class="form-group">
                        <label for="sub_menu_icon">Sub Menu Icon</label>
                        <input name="sub_menu_icon" type="text" class="form-control" id="sub_menu_icon" required
                            placeholder="Enter Sub Menu Icon">
                    </div>
                    <div class="form-group">
                        <label for="sub_menu_Link">Sub Menu Link</label>
                        <input name="sub_menu_link" type="text" class="form-control" id="sub_menu_link" required
                            placeholder="Enter Sub Menu Link">
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
    @endsection

    @push('script')
    <script>
        // show modal create
        $('.create').click(function() {
            $('.modal-title').html('Add Sub Menu');
            $('.modal-form').attr('action', "{{ route('subMenu.store') }}");
            $('.method').val('POST');
            $('#sub_menu_name').val('');
            $('#sub_menu_icon').val('');
            $('#sub_menu_link').val('');
            $('.btn-modal').html('Save Change')
            $('#sub-menu-modal').modal('show');
        })

         // session alert
        @if (session()->has('success'))
            $(document).Toasts('create', {
                class: 'bg-success',
                body: `{{ session('success') }}`
            })
        @endif

        // show modal update
        function edit(subMenuId, subMenuName, subMenuIcon, subMenuLink) {
            $('.modal-title').html('Edit Sub Menu');
            $('.modal-form').attr('action', '/subMenu/' + subMenuId);
            $('.method').val('PUT');
            $('#sub_menu_name').val(subMenuName);
            $('#sub_menu_icon').val(subMenuIcon);
            $('#sub_menu_link').val(subMenuLink);
            $('.btn-modal').html('Update Change')
            $('#sub-menu-modal').modal('show');
        }
    </script>
    @endpush