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
                    <h1>Lesson</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">lesson</li>
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
                    <a href="{{ route('all-lessons') }}" class="btn btn-secondary">All lessons</a>
                    @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('update-lesson') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $lesson->id }}">
                                    <label for="course_id" class="form-label">Lesson Category</label>
                                    <Select class=" form-control" name="course_id">
                                        @foreach ($course as $course)
                                        <option value="{{ $course->id }}" {{ $course->id == $lesson->course_id ?
                                            'selected' : '' }}>{{ $course->title }}</option>
                                        @endforeach
                                    </Select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $lesson->title }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for="summernote" class="form-label">Description</label>
                                    <textarea class="form-control" name="summernote"
                                        id="summernote">{{ $lesson->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for="image">lesson Image</label>
                                    <input type="file" name="image" class="form-control">
                                    <img src="{{ asset('/storage/lesson/'.$lesson->image) }}"
                                        style="width: 80px; height:40px; padding-top:3px;" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for="video">Lesson Video</label>
                                    <div class="input-group">
                                        <input type="file" name="video" class=" form-control" id="">
                                    </div>
                                    <br>
                                    <video width="620" height="440" controls>
                                        <source src="{{ asset('/storage/lesson/video/'.$lesson->video) }}"
                                            type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for="pdf">lesson PDF Files</label>
                                    <input type="file" name="pdf" multiple class="form-control">
                                    @error('pdf')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if ($lesson->pdf_file)
                                    <a href="javascript:void(0);">{{ $lesson->pdf_file }}</a> <br>
                                    @endif
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
