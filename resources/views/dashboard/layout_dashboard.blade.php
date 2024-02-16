@include('dashboard.dashboardcss.dashboardcss')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
{{-- header --}}
@include('dashboard.header')
@include('dashboard.sidebar')

@yield('content')

@include('dashboard.footer')
</div>
<!-- ./wrapper -->
@include('dashboard.dashboardjs.dashboardjs')
