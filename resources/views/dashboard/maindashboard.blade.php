<?php
use App\Models\Admin;
use App\Models\Application;
use App\Models\Blogs;
use App\Models\Contact;
use App\Models\Countries;
use App\Models\Course;
use App\Models\Order;
use App\Models\User;
$user=User::all()->count();
$admin=Admin::all()->count();
$course=Course::all()->count();
$order=Order::all()->count();
$blog=Blogs::all()->count();
$message=Contact::all()->count();
?>
@extends('dashboard.layout_dashboard')
@section('content')
<div class="content-wrapper" style="min-height: 260px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="far fa-user "></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Admins</span>
                <span class="info-box-number">{{ $admin }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-secondary">
              <span class="info-box-icon"><i class="far fa-user-friends "></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number">{{ $user }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="far fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Course</span>
                <span class="info-box-number">{{ $course }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="far fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Order</span>
                <span class="info-box-number">{{ $order }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info ">
              <span class="info-box-icon"><i class="far fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Blogs</span>
                <span class="info-box-number">{{ $blog }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-secondary ">
              <span class="info-box-icon"><i class="far fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Message</span>
                <span class="info-box-number">{{ $message }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
