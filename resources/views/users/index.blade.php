
@extends('dashboard.maindashboard')
@section('content')
@php
$userss = Auth::guard('admin')->user();
@endphp
<div class="content-wrapper" style="min-height: 1302.4px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                                @if ($userss && $userss->hasPermissionByRole('add user'))
                                <a href="{{ url('admin/create-user') }}" class="btn btn-sm btn-secondary">
                                     Add user
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
                                                    <th class="sorting">First Name</th>
                                                    <th class="sorting">Last Name</th>
                                                    <th class="sorting">Email</th>
                                                    <th class="sorting">Mobile</th>
                                                    <th class="sorting">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allusers as $user )
                                                <tr class="odd">
                                                    <td class="sorting_1 dtr-control" tabindex="0" style="">{{ $user->id }}</td>
                                                    <td style="" class="">{{ $user->first_name }}</td>
                                                    <td style="">{{ $user->last_name }}</td>
                                                    <td style="">{{ $user->email }}</td>
                                                    <td class="" style="">{{ $user->mobile }}</td>
                                                    <td class="" style="">
                                                        @if ($userss && $userss->hasPermissionByRole('edit user'))
                                                        <a href="{{ url('admin/edit-user/'.$user->id) }}" class=" btn-sm">
                                                            <i class="fas fa-edit text-secondary"></i>
                                                        </a>
                                                        @endif
                                                        @if ($userss && $userss->hasPermissionByRole('delete user'))
                                                        <a href="{{ url('admin/delete-user/'.$user->id) }}" class=" btn-sm">
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
