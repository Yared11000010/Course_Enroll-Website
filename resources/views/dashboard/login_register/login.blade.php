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
          <form action="{{ route('admin_login_validation') }}" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="email" class="form-control" name="email" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->

              <!-- /.col -->
            </div>

          <div class="social-auth-links text-center mt-2 mb-3">
            <button type="subimit" class="btn btn-block btn-primary">
             Login
            </button>
          </div>
          <!-- /.social-auth-links -->

          <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
          </p>
        </form>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->
@include('dashboard.dashboardjs.dashboardjs')
