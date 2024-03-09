@extends('dashboard.layout_dashboard')
@section('content')
@php
$user = Auth::guard('admin')->user();
@endphp
<div class="content-wrapper p-4" style="min-height: 1302.4px;">
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
<div class="row">
    <div class="col-10">
        <div class="card card">
            <div class="card-header">
                @if ($user && $user->hasPermissionByRole('view admin'))
                <a href="{{ url('admin/all-admins') }}" class="btn btn-secondary">All Admins</a>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{url('admin/update-admin/'.$admin->id) }}">
                    @csrf
                    @method('PUT')
                 <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $admin->name}}" required autocomplete="name" autofocus>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $admin->email }}" required autocomplete="email">
                    </div>
                  </div>
                </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
    <div class="col-2">

    </div>
</div>
</div>

@endsection
