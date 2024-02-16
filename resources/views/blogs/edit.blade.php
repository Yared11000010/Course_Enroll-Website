@extends('dashboard.layout_dashboard')
@section('content')

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
              <a href="{{ route('blogs') }}" class="btn btn-secondary">All Blogs</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('update-blog') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                 <div class="row">
                  <div class="col-sm-10">
                    <!-- text input -->
                    <input type="hidden" name="id" value="{{ $blogs->id }}">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" value="{{ $blogs->title }}" name="title"
                            required autocomplete="name" autofocus>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-sm-10">
                    <div class="form-group">
                        <textarea class="form-control" name="summernote" id="summernote">
                            {{ $blogs->description }}
                        </textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                      <div class="form-group">
                        <label for="password" class="form-label">Category</label>
                         <Select class=" form-control" name="category_id">
                            @foreach ($blog_category as $cat )
                            <option @if($blogs->category_id == $cat->id) selected @endif value="{{ $cat->id }}">{{ $cat->name }}</option>
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
                            <img src="{{ asset('/storage/blog/'.$blogs->image) }}" style="width: 80px; height:40px; padding-top:3px;" alt="">

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
