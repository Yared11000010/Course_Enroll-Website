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
                    <h1>Course Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">Course Categories</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="row">
    <div class="col-5">
        <div class="card card">
            <div class="card-header">
              @if ($user && $user->hasPermissionByRole('view course category'))
              <a href="{{ url('admin/course-categories') }}" class="btn btn-secondary">All Course Categories</a>
              @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('update-course-category') }}">
                    @csrf
                    @method('PUT')
                 <div class="row">
                  <div class="col-sm-10">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $course_categories->id }}">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ $course_categories->name }}" class="form-control" id="name" name="name"
                            required autocomplete="name">
                    </div>
                  </div>
                </div>
                  <div class="row">
                    <div class="col-sm-10">
                        <!-- textarea -->
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
