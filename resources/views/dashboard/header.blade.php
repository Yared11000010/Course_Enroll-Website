  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">

    <img class="animation__shake" src="{{ asset('dashboard/dist/img/AdminLTELogo.png') }}"  height="60" width="60">
  </div>
 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-align-left"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a href="javascript:void();" class="nav-link">
            {{ Auth::guard('admin')->user()->name }}
        </a>
    </li>

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Settings</span>
          <div class="dropdown-divider"></div>
          <a href="{{ route('update_password') }}" class="dropdown-item">
            <i class="fas fa-user-lock mr-2"></i>Change Password
          </a>

          <div class="dropdown-divider"></div>
          <a href="{{url('admin/logout') }}" class="dropdown-item">
            <i class="fas fa-arrow-alt-circle-right  mr-2"></i>Logout
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
    @include('sweetalert::alert')

    {{-- <x:notify-messages /> --}}
  </nav>
  <!-- /.navbar -->
