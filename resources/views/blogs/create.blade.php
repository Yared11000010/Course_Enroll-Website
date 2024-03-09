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
                    <h1>Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="row">
    <div class="col-8">
        <div class="card card">
            <div class="card-header">
              @if($user && $user->hasPermissionByRole('view blog'))
              <a href="{{ route('blogs') }}" class="btn btn-secondary">All Blogs</a>
              @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('store-blog') }}" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="row">
                  <div class="col-sm-10">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            required autocomplete="name" autofocus>
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
                        <label for="password" class="form-label">Category</label>
                         <Select class=" form-control" name="category_id">
                            @foreach ($blog_category as $cat )
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                         </Select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="exampleInputFile">Blog Image</label>
                            <div class="input-group">
                             <input type="file" name="image" class=" form-control" id="">
                            </div>
                          </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-2">
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
