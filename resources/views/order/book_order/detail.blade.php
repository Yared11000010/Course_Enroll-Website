
@extends('dashboard.maindashboard')
@section('content')
<div class="content-wrapper" style="min-height: 1302.4px;">
    <section class="content-header">
        <div class="container bg-white p-3">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1># {{ $order->id }} pdf order detail </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">pdf order detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container shadow-sm bg-white p-3">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>User Name</th>
                                <th>Pdf Name</th>
                                <th>Payment Reference</th>
                                <th>Amount</th>
                                <td>Payment Receipt</td>
                                <th>Order Status</th>
                                <td>Date</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="sorting_1 dtr-control" tabindex="0" style="">{{ $order->id }}</td>
                                <td style="" class="">{{ $order->user->first_name ." ".$order->user->last_name}}</td>
                                <td>{{ $order->pdf->title }}</td>
                                <td>{{ $order->payment_reference }}</td>
                                <td>{{ $order->amount }}</td>
                                <td>
                                    <a href="{{ url('admin/view-pdf-payment-receipt/'.$order->id) }}" target="_blank"><u>{{ $order->payment_receipt }}</u></a>
                                </td>
                                <td>
                                    {{ $order->status }}
                                </td>

                                <td>
                                    {{ $order->created_at }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
                    Order Status <button class="btn btn-primary">{{ $order->status }}</button><br>
                    <form action="{{ route('update_pdf_payment') }}" method="POST">
                        @csrf
                        @method('PUT')
                     <input type="hidden" value="{{ $order->id }}" name="id">
                     <input type="hidden" value="{{ $order->user->id }}" name="user_id">
                    <br>
                    <button type="submit" class="btn" style="background-color: rgb(14, 29, 70);color:white;">Change Payment Status</button>
                    </form>
        </div>
    </section>
</div>
@endsection
