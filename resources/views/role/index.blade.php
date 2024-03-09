
@extends('dashboard.maindashboard')
@section('content')
@php
$user = Auth::guard('admin')->user();
@endphp
<div class="content-wrapper" style="min-height: 1302.4px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Role</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">Role </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                @if ($user && $user->hasPermissionByRole('add role'))
                                <a href="{{ url('admin/role/create') }}" class=" btn btn-outline-dark text-white">
                                     Create role
                                </a>
                                @endif
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting">ID</th>
                                                    <th class="sorting">Name</th>
                                                    <th class="sorting">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roles as $role )
                                                <tr class="odd">
                                                    <td class="sorting_1 dtr-control" tabindex="0" style="">{{ $role->id }}</td>
                                                    <td style="" class="">{{ $role->name }}</td>
                                                    </td>
                                                    <td>
                                                        @if ($role->permissions->count() > 0)
                                                        @foreach ($role->permissions as $permission)
                                                        <span class="badge bg-light text-dark border-1 ">{{ $permission->name }}</span>
                                                        @endforeach
                                                        @else
                                                        <span class="badge badge-dark">No permission</span>
                                                        @endif
                                                    </td>
                                                    <td class="" style="">
                                                        @if ($user && $user->hasPermissionByRole('assign permission'))
                                                        <a href="{{ url('admin/role/'.$role->id.'/permission') }}" class=" btn-sm">
                                                            <i class="fas fa-arrow-circle-up  text-secondary"></i>
                                                        </a>
                                                        @endif
                                                        @if ($user && $user->hasPermissionByRole('edit role'))
                                                        <a href="{{ url('admin/role/edit/'.$role->id) }}" class=" btn-sm">
                                                            <i class="fas fa-edit text-secondary"></i>
                                                        </a>
                                                        @endif
                                                        @if ($user && $user->hasPermissionByRole('delete role'))
                                                        <a href="{{ url('admin/role/destroy/'.$role->id) }}"  data-confirm-delete="true" class=" btn-sm">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>

                                        </table>
                                    </div>
                                    {!! $roles->links() !!}
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
