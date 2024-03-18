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
                    <h1>Book</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">Book</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="row">
    <div class="col-8">
        <div class="card card">
            <div class="card-header">
             @if ($user && $user->hasPermissionByRole('view store'))
              <a href="{{ route('books') }}" class="btn btn-secondary">All Books</a>
              @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('update-book') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                 <div class="row">
                  <div class="col-sm-10">
                    <!-- text input -->
                    <input type="hidden" name="id" value="{{ $books->id }}">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" value="{{ $books->title }}" name="title"
                            required autocomplete="name" autofocus>
                    </div>
                  </div>

                </div>
                <div class="row">
                    <div class="col-sm-10">
                      <div class="form-group">
                        <label for="type" class="form-label">Book Type</label>
                         <Select class=" form-control" name="type">
                            <option @if($books->type=="paid") selected @endif value="paid">Paid</option>
                            <option @if($books->type=="free") selected @endif  value="free">Free</option>
                         </Select>
                      </div>
                    </div>
                  </div>
                <div class="row">
                  <div class="col-sm-10">
                    <div class="form-group">
                        <textarea class="form-control" name="summernote" id="summernote">
                            {{ $books->description }}
                        </textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                       <div class="form-group">
                         <label for="price">Price</label>
                         <input type="number" class="form-control" value="{{ $books->price }}" name="price" id="" placeholder="Enter Book Price">
                       </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="exampleInputFile">Book Image</label>
                            <div class="input-group">
                             <input type="file" name="image" class=" form-control" id="">
                            </div>
                            <img src="{{ asset('/storage/Book/'.$books->image) }}" style="width: 80px; height:40px; padding-top:3px;" alt="">

                          </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="file">Book File</label>
                            <div class="input-group">
                                {{-- <textarea name="pdf_file"  class=" form-control" id="" cols="50" rows="10">
                                 {{ $books->pdf_file }}
                                </textarea> --}}
                             <input type="file" name="file" class=" form-control" id="">
                            </div>
                            <br>   {{ $books->pdf_file }}

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
