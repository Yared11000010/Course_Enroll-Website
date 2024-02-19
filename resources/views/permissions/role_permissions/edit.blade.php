@extends('dashboard.layout_dashboard')
@section('content')

<div class="content-wrapper p-4" style="min-height: 1302.4px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Permission</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">Permission</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-8">
            <div class="card card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Assign Permissions to Role: <b>{{ $roles->name }}</b></h5>

                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="{{ route('role_permissions.update', $roles->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="permissions">Permissions</label>
                            <div class="row">
                                {{-- @foreach($permissions as $category)
                                    <h2><b>for {{ $category->name }} permissions </b></h2>
                                <ul>
                                    @foreach($category->permissions as $permission)
                                    <li>{{ $permission->name }}</li>
                                    @endforeach
                                </ul>
                                @endforeach --}}
                                @foreach ($permissions as $category)
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                    <h2><b>for {{ $category->name }} permissions </b></h2>
                                    @foreach($category->permissions as $permission)
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}" {{ $roles->permissions->contains($permission->id) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="permission_{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Assign Permissions</button>
                        </div>
                    </form>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

@endsection

