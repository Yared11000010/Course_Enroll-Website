@include('dashboard.dashboardcss.dashboardcss')

<body class="login-page" style="min-height: 466px;">
    @include('sweetalert::alert')

    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline ">
        <div class="card-header text-center">
          <a href="../../index2.html" class="h1"><b>Sayzanarim</b></a>
        </div>
        <div class="card-body">
            <h1  class=" justify-content-center text-center" style="color:rgb(0,33,71);">FORGET PASSWORD </h1>
            <form method="POST" action="{{ route('admin-forgetpassword') }}">
                    @csrf
                <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="Email">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                </div>
                  <button type="submit" class="btn events-form-btn ">Send rest password link</button>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->
@include('dashboard.dashboardjs.dashboardjs')

