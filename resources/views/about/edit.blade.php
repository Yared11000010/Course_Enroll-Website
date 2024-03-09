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
                    <h1>About Us</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="row">
    <div class="col-5">
        <div class="card card">
            <div class="card-header">
                @if ($user && $user->hasPermissionByRole('view about us'))
              <a href="{{ url('admin/all-aboutus') }}" class="btn btn-secondary">About Us</a>
              @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('update-about') }}">
                    @csrf
                    @method('PUT')
                 <div class="row">
                  <div class="col-sm-10">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $about->id }}">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" value="{{ $about->title }}" class="form-control" id="title" name="title"
                            required autocomplete="title">
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                      <div class="form-group">
                          <label for="description" class="form-label">Description</label>
                          <textarea name="description" class="form-control" id="" cols="70" rows="20">
                              {{ $about->description }}
                          </textarea>
                          {{-- <input type="text" value="{{ $about->description }}" class="form-control" id="description" name="description"
                              required autocomplete="description"> --}}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                          <button type="submit" class="btn btn w-100 text-white">Update</button>
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
