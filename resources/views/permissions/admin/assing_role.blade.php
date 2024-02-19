@extends('dashboard.maindashboard')
@section('content')
<div class="content-wrapper" style="min-height: 1302.4px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Assign Role</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">Assign Role</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <h1>Assign Role to User: <b>{{ $admin->name }}</b>
                            </h1>
                            <form class="g-3" action="{{ route('update-admin-role') }}" method="POST">
                                @csrf
                                <br>
                                <div class="form-group mb-2">
                                    <label for="role_id" class="mb-2">Role</label>
                                    <input type="hidden" name="admin_id" value="{{ $admin->id }}">
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($roles as $role)
                                        <option @if($admin->type===$role->name) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Assign Role</button>
                                </div>
                            </form>
                        </div>
                    </div>
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

