@extends('dashboard.layout_dashboard')
@section('content')

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
              <a href="{{ route('all-courses') }}" class="btn btn-secondary">All Courses</a>
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
                            <label for="pdf">Course PDF Files</label>
                            <div class="input-group">
                             <input type="file" name="pdf[]" multiple class=" form-control" id="">
                            </div>
                            @error('pdf')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                        <table class="table table-bordered" id="dynamicAddRemove">
                            <tr>
                                <th>Youtube Link</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="addMoreInputFields[0][subject]" placeholder="Enter link" class="form-control" />
                                </td>
                                <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary text-white">Add Link</button></td>
                            </tr>
                        </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                      <div class="form-group">
                          <label for="youtube_link" class="form-label">Youtube Link</label>
                          <input type="text" class="form-control" id="youtube_link" name="youtube_link"
                              required >
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
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