
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
                    <h1>permission category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">permission category</li>
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
                                @if ($user && $user->hasPermissionByRole('add permission category'))
                                <a href="{{ url('admin/permission-category/create') }}" class=" btn btn-outline-dark text-white">
                                     Create permission category
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
                                                    <th class="sorting">Status</th>
                                                    <th class="sorting">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($permission_category as $permission )
                                                <tr class="odd">
                                                    <td class="sorting_1 dtr-control" tabindex="0" style="">{{ $permission->id }}</td>
                                                    <td style="" class="">{{ $permission->name }}</td>
                                                    </td>
                                                    <td>
                                                        @if ($user && $user->hasPermissionByRole('edit permission category'))
                                                        @if($permission->status==1)
                                                        <a href="{{ url('admin/permission-category/inactive/'.$permission->id) }}" class=" bg-success text-white text-sm px-2 py-1" style="border-radius: 0.2rem;">Active</a>
                                                        @elseif($permission->status==0)
                                                        <a href="{{ url('admin/permission-category/active/'.$permission->id) }}"  class="bg-danger text-white text-sm px-2 py-1" style="border-radius: 0.2rem;">Inactive</a>
                                                        @endif
                                                        @endif
                                                    </td>

                                                    <td class="" style="">
                                                        @if ($user && $user->hasPermissionByRole('edit permission category'))
                                                        <a href="{{ url('admin/permission-category/edit/'.$permission->id) }}" class=" btn-sm">
                                                            <i class="fas fa-edit text-secondary"></i>
                                                        </a>
                                                        @endif
                                                        @if ($user && $user->hasPermissionByRole('delete permission category'))
                                                        <a href="{{ url('admin/permission-category/destroy/'.$permission->id) }}"  data-confirm-delete="true" class=" btn-sm">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>

                                        </table>
                                    </div>
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
