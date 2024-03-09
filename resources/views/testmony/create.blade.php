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
                    <h1>Student comment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">Student comment</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="row">
    <div class="col-8">
        <div class="card card">
            <div class="card-header">
              @if ($user && $user->hasPermissionByRole('view testmony'))
              <a href="{{ route('student-says') }}" class="btn btn-secondary">All Student comments</a>
              @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('store-student-say') }}" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="row">
                  <div class="col-sm-10">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="name" class="form-label"> Student Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            required autocomplete="name" autofocus>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-10">
                    <div class="form-group">
                        <textarea class="form-control" name="comment" id="summernote"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                       <div class="form-group">
                         <label for="Jobs">Jobs</label>
                         <input type="text" class="form-control" name="job" id="" placeholder="Enter Jobs">
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
