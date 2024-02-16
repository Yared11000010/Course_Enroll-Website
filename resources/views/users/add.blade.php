@extends('dashboard.layout_dashboard')
@section('content')
<div class="content-wrapper p-4" style="min-height: 1302.4px;">
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
                        <li class="breadcrumb-item active">users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="row">
    <div class="col-10">
        <div class="card card">
            <div class="card-header">
              <a href="{{ url('admin/all-users') }}" class="btn btn-secondary">All Users</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{route('store-user') }}">
                    @csrf
                 <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}" required autocomplete="email">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" id="phone" name="phone"
                            value="{{ old('phone') }}" required autocomplete="phone">
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required
                            autocomplete="new-password">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label for="password-confirm" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password-confirm"
                            name="password_confirmation" required autocomplete="new-password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary w-100">Save</button>
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
