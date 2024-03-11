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
                <form action="{{ route('update-course') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $course->id }}">
                            <label for="category" class="form-label">Category</label>
                            <Select class=" form-control" name="category_id">
                                @foreach ($category as $cat)
                                <option value="{{ $cat->id }}" {{ $cat->id == $course->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </Select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $course->title }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="summernote" class="form-label">Description</label>
                            <textarea class="form-control" name="summernote" id="summernote">{{ $course->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="image">Course Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('/storage/course/'.$course->image) }}" style="width: 80px; height:40px; padding-top:3px;" alt="">
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
                            <br>
                            <video width="620" height="440" controls>
                                <source src="{{ asset('/storage/course/video/'.$course->video) }}" type="video/mp4">
                            </video>
                          </div>
                    </div>
                  </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="pdf">Course PDF Files</label>
                            <input type="file" name="pdf" multiple class="form-control">
                            @error('pdf')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @if ($course->pdf_file)
                            <a href="">{{ $course->pdf_file }}</a> <br>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="type" class="form-label">Course Type</label>
                            <Select class=" form-control" name="type">
                                <option value="Paid" {{ $course->type == 'Paid' ? 'selected' : '' }}>Paid</option>
                                <option value="Free" {{ $course->type == 'Free' ? 'selected' : '' }}>Free</option>
                            </Select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ $course->price }}" required>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
var i = {{ count($course->youtubeLinks) }};
$("#dynamic-ar").click(function () {
++i;
$("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
    '][subject]" placeholder="Enter Link" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger text-white remove-input-field">Delete</button></td></tr>'
    );
});
$(document).on('click', '.remove-input-field', function () {
$(this).parents('tr').remove();
});
</script>

@endsection
