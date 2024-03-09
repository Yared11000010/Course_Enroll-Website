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
                    <h1>Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">Banner</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="row">
    <div class="col-8">
        <div class="card card">
            <div class="card-header">
                @if ($user && $user->hasPermissionByRole('view slider'))
                <a href="{{ route('banners') }}" class="btn btn-secondary">All Banners</a>
                @endif
             </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('update_banner') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                 <div class="row">
                  <div class="col-sm-10">
                    <!-- text input -->
                    <input type="hidden" name="id" value="{{ $banner->id }}">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" value="{{ $banner->title }}" name="title"
                            required autocomplete="title" autofocus>
                    </div>
                  </div>

                </div>
                <div class="row">
                    <div class="col-sm-10">
                      <!-- text input -->
                      <div class="form-group">
                          <label for="link" class="form-label">Link</label>
                          <input type="text" class="form-control" id="link" value="{{ $banner->link }}" name="link"
                              required autocomplete="link" autofocus>
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="exampleInputFile">Banner Image</label>
                            <div class="input-group">
                             <input type="file" name="image" class=" form-control" id="">
                            </div>
                            <img src="{{ asset('/storage/banner/'.$banner->image) }}" style="width: 80px; height:40px; padding-top:3px;" alt="">

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
