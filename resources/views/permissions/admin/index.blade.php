
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
                    <h1>Admins</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">Admins</li>
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
                                <a href="javascirpt:void(0);" class="btn btn-sm btn-secondary">
                                     All Admins
                                </a>
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
                                                    <th class="sorting">Email</th>
                                                    <th class="sorting">Role</th>
                                                    <th class="sorting">Status</th>

                                                    <th class="sorting">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($admins as $admin )
                                                <tr class="odd">
                                                    <td class="sorting_1 dtr-control" tabindex="0" style="">{{ $admin->id }}</td>
                                                    <td style="" class="">{{ $admin->name }}</td>
                                                    <td style="">{{ $admin->email }}</td>
                                                    <td>
                                                        @if ($admin->roles->count() > 0)
                                                            @foreach ($admin->roles as $role)
                                                                <span class="btn btn-sm btn-success">{{ $role->name }}</span>
                                                            @endforeach
                                                        @else
                                                            <span class="badge badge-dark text-white">No Role</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        
                                                        @if($admin->status==1)
                                                        <a href="javascript:void(0);" class=" bg-success text-white text-sm px-2 py-1" style="border-radius: 0.2rem;">Active</a>
                                                        @elseif($admin->status==0)
                                                        <a href="javascript:void(0);"  class="bg-danger text-white text-sm px-2 py-1" style="border-radius: 0.2rem;">Inactive</a>
                                                        @endif
                                                    </td>
                                                    <td class="" style="">
                                                        @if ($user && $user->hasPermissionByRole('assign role'))
                                                        <a href="{{ url('admin/assign-role-to-admin/'.$admin->id) }}" class=" btn-sm btn-primary">
                                                           Assign Role
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
