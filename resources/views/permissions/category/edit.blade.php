@extends('dashboard.layout_dashboard')
@section('content')

<div class="content-wrapper p-4" style="min-height: 1302.4px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Permission Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">Permission Category</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="row">
    <div class="col-8">
        <div class="card card">
            <div class="card-header">
              <a href="{{ route('permission.category.index') }}" class="btn btn-secondary">All Permission Categorys</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('permission.category.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                 <input type="hidden" name="id" value="{{ $category->id }}">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn w-100 text-white">Save</button>
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
