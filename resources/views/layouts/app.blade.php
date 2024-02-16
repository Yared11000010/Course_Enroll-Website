<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GUZUPLUS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('front_assets/img/favicon.png')}}" rel="icion">

  <link href="{{asset('front_assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon')}}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('front_assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('front_assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('front_assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('front_assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('front_assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('front_assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('front_assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: GUZUPLUS
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/GUZUPLUS-bootstrap-metro-style-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    /* CSS */
.toast {
  position: fixed;
  top: 20px;
  right: 20px;
  width: 300px;
  background-color: #f8d7da;
  border: 1px solid #f5c6cb;
  border-radius: 4px;
  padding: 10px;
  z-index: 1000;
  display: none; /* Initially hidden */
}

.toast.show {
  display: block; /* Show when 'show' class is added */
}

.toast-header {
  display: flex;
  align-items: center;
}

.toast-header img {
  width: 30px;
  height: 30px;
  border-radius: 50%;
}

.toast-header .close {
  cursor: pointer;
}

.toast-body {
  padding-top: 5px;
}

  </style>
</head>

<body>
    <header id="header" class="fixed-top d-flex align-items-center">
            <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <h1><a href="{{ url('/') }}">GUZUPLUS</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="{{asset('front_assets/img/logo.png')}}" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">

                <ul>

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Create Account</a>
                            </li>
                        @endif
                    @else


                        <li><a class="nav-link scrollto " href="{{ url('/') }}">Home</a></li>
                        <li><a class="nav-link scrollto " href="{{ url('apply') }}">Apply Now</a></li>
                        <li><a class="nav-link scrollto" href="{{ url('my-application') }}">My Application</a></li>


                        <li class="dropdown"><a href="javascript:void();"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>

                        <ul>
                            <li><a class="nav-link scrollto" href="#about">Profile</a></li>
                            <li>
                                <a class="" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                        </li>
                        @if(Auth::user())
                        @if($extra_info->count()>0)
                        <div class="dropdown">
                          <a href="#" class="dropdown-toggle" role="button" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>Notification &nbsp;</span>
                            <span class="badge bg-danger" style="font-size: 10px;">1</span>
                            <i class="bi bi-chevron-down"></i>
                          </a>

                          <!-- Notification Dropdown Menu -->
                          <ul class="dropdown-menu border-0 " aria-labelledby="notificationDropdown">
                            <li><a class="dropdown-item" href="{{ url('send-extra-information') }}">from admin <u> click me</u></a></li>
                            <!-- Add more notification items here -->
                          </ul>
                        </div>
                        @endif
                        @endif
                        &nbsp;
                    @endguest
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            </div>

        </header><!-- End Header -->
        <section id="hero">
            @yield('content')
        </section>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <!--  JS Files -->
        <script src="{{asset('front_assets/vendor/aos/aos.js')}}"></script>
        <script src="{{asset('front_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('front_assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
        <script src="{{asset('front_assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('front_assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
        <!--  Main JS File -->
        <script src="{{asset('front_assets/js/main.js')}}"></script>

      </body>

      </html>
