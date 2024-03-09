
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
                    <h1>orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">orders</li>
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
                                <a href="javascript:void();" class=" btn btn-outline-dark text-white">
                                     All orders
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
                                                    <th class="sorting">User</th>
                                                    <th class="sorting">Course</th>
                                                    <th class="sorting">Payment Reference</th>
                                                    <th class="sorting">Amount</th>
                                                    <th class="sorting">check payment receipt</th>
                                                    <th class="sorting">Status</th>
                                                    <th class="sorting">Date</th>
                                                    <th class="sorting">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($all_order as $order )
                                                <tr class="odd">
                                                    <td class="sorting_1 dtr-control" tabindex="0" style="">{{ $order->id }}</td>
                                                    <td style="" class="">{{ $order->user->first_name ." ".$order->user->last_name}}</td>
                                                    <td>{{ $order->course->title }}</td>
                                                    <td>{{ $order->payment_reference }}</td>
                                                    <td>{{ $order->amount }}</td>
                                                    <td>
                                                    @if ($user && $user->hasPermissionByRole('view payment receipt'))
                                                        <a href="{{ url('admin/view-payment-receipt/'.$order->id) }}" target="_blank" >{{ $order->payment_receipt }}</></a>
                                                    @endif
                                                    </td>
                                                    <td>
                                                    <button type="button" class="btn btn-primary">
                                                        {{ $order->status }}
                                                    </button>
                                                    </td>
                                                    <td>
                                                        {{ $order->created_at }}
                                                    </td>
                                                    <td class="" style="">
                                                        @if ($user && $user->hasPermissionByRole('view order'))
                                                        <a href="{{ url('admin/course-orders/view-detais/'.$order->id) }}"  data-confirm-delete="true" class=" btn-sm bg-secondary">
                                                            <i class="fas fa-eye text-white"></i>
                                                        </a>
                                                        @endif
                                                        @if ($user && $user->hasPermissionByRole('delete order'))
                                                        <a href="{{ url('admin/orders/delete/'.$order->id) }}"  data-confirm-delete="true" class=" btn-sm">
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
