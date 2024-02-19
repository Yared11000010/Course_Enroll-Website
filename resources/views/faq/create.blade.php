@extends('dashboard.layout_dashboard')
@section('content')
<div class="content-wrapper p-4" style="min-height: 1302.4px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>FAQs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void();">Home</a></li>
                        <li class="breadcrumb-item active">FAQs</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="row">
    <div class="col-10">
        <div class="card card">
            <div class="card-header">
          <a href="{{ url('admin/faqs') }}" class="btn btn-secondary">All FAQs</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ route('store-faq') }}">
                    @csrf
                 <div class="row">
                  <div class="col-sm-10">
                    <div class="form-group">
                        <label for="question" class="form-label">Enter Question</label><br>
                         <textarea name="question" class=" form-control" id="" cols="20" rows="5">
                         </textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                      <div class="form-group">
                          <label for="answer" class="form-label">Enter Answer</label>
                          <textarea name="answer" class=" form-control" id="" cols="20" rows="5">
                         </textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
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
