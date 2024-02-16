@extends('dashboard.layout_dashboard')
@section('content')
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
                        <li class="breadcrumb-item active">admins</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="row">
    <div class="col-5">
        <div class="card card">
            <div class="card-header">
              <a href="javascript:void(0);" class="btn btn-secondary">Update your password</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{route('update_admin_password') }}">
                    @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-sm-10">
                    <div class="form-group">
                        <label for="old_password" class="form-label">Old Password </label>
                        <input type="password" class="form-control" id="old_password" name="old_password"
                            required autocomplete="old_password">
                            @error('old_password')
                              <span class=" text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                      <div class="form-group">
                        <label for="new_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required
                            autocomplete="new_password">
                            @error('new_password')
                            <span class=" text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="new_password_confirmation"
                                name="new_password_confirmation" required autocomplete="new_password_confirmation">
                                @error('new_password_confirmation')
                                <span class=" text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                        <!-- textarea -->
                        <div class="form-group">
                          <button type="submit" class="btn btn w-100 text-white">Update Password</button>
                        </div>
                      </div>
                  </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

</div>
</div>

@endsection
