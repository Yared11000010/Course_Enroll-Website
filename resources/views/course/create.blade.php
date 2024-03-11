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
                    <h1>Course</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">Course</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="row">
    <div class="col-8">
        <div class="card card">
            <div class="card-header">
                @if ($user && $user->hasPermissionByRole('view course'))
              <a href="{{ route('all-courses') }}" class="btn btn-secondary">All Courses</a>
              @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('store-course') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-10">
                      <div class="form-group">
                        <label for="password" class="form-label">Category</label>
                         <Select class=" form-control" name="category_id">
                            @foreach ($category as $cat )
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                         </Select>
                      </div>
                    </div>
                  </div>
                 <div class="row">
                  <div class="col-sm-10">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            required >
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-sm-10">
                    <div class="form-group">
                        <textarea class="form-control" name="summernote" id="summernote"></textarea>
                    </div>
                  </div>
                </div>

                  <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="image">Course Image</label>
                            <div class="input-group">
                             <input type="file" name="image" class=" form-control" id="">
                            </div>
                          </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="video">Course Video</label>
                            <div class="input-group">
                             <input type="file" name="video" class=" form-control" id="">
                            </div>
                          </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="pdf">Course PDF Files</label>
                            <div class="input-group">
                             <input type="file" name="pdf" multiple class=" form-control" id="">
                            </div>
                            @error('pdf')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-10">
                      <div class="form-group">
                        <label for="type" class="form-label">Course Type</label>
                         <Select class=" form-control" name="type">
                            <option value="Paid">Paid</option>
                            <option value="Paid">Free</option>
                         </Select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-10">
                      <div class="form-group">
                          <label for="price" class="form-label">Price</label>
                          <input type="number" class="form-control" id="price" name="price"
                              required >
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
