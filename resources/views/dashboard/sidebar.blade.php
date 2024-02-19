<aside class="main-sidebar sidebar-light-orange   elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link text-center">
      <span class="brand-text font-weight-dark text-center">
        <img src="{{ asset('dashboard/dist/img/logo.png') }}" style="height: 60px;" alt="">
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 316px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <h2 href="#" class="d-block">Wellcome : <b>{{ Auth::guard('admin')->user()->name }}</b> </h2>
        </div>
      </div> --}}
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" style="padding-bottom: 100px;" data-widget="treeview" role="menu" data-accordion="false" >
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ url('admin/dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/assign-role-to-admin*')?'menu-open':'' }}  {{ request()->is('admin/permission*')?'menu-open':'' }} {{ request()->is('admin/role*')?'menu-open':'' }} {{ request()->is('admin/all-admin-user')?'menu-open':'' }}">
            <a href="#" class="nav-link bg-light  {{ request()->is('admin/assign-role-to-admin*')? 'active':'' }} {{ request()->is('admin/permission*')? 'active':'' }} {{ request()->is('admin/role*')?'active':'' }} {{ request()->is('admin/all-admin-user')?'active':'' }}">
              <i class="nav-icon fas fa-user "></i>
              <p>
                Role And Permission
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('permission.index') }}" class="nav-link {{ request()->is('admin/permission*')? 'active':'' }} ">
                      <i class="far fa-square  nav-icon"></i>
                      <p> Permission</p>
                    </a>
                  </li>
                <li class="nav-item">
                <a href="{{ route('role.index') }}" class="nav-link {{ request()->is('admin/role*')?'active':'' }} ">
                  <i class="far fa-square nav-icon"></i>
                  <p>Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('all-admin-user') }}" class="nav-link {{ request()->is('admin/assign-role-to-admin*')?'active':'' }} {{ request()->is('admin/all-admin-user')?'active':'' }} ">
                  <i class="far fa-square nav-icon"></i>
                  <p>Assing Role</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item {{ request()->is('admin/all-admins')?'menu-open':'' }} {{ request()->is('admin/create-admin')?'menu-open':'' }} {{ request()->is('admin/edit-admin/*')?'menu-open':'' }}">
            <a href="#" class="nav-link bg-light {{ request()->is('admin/all-admins')? 'active':'' }} {{ request()->is('admin/create-admin')?'active':'' }} {{ request()->is('admin/edit-admin/*')?'active':'' }}">
              <i class="nav-icon fas fa-user "></i>
              <p>
                Admins
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('admin/all-admins') }}" class="nav-link {{ request()->is('admin/all-admins')? 'active':'' }} ">
                      <i class="far fa-square  nav-icon"></i>
                      <p> Admins</p>
                    </a>
                  </li>
                <li class="nav-item">
                <a href="{{ url('admin/create-admin') }}" class="nav-link {{ request()->is('admin/create-admin')?'active':'' }} ">
                  <i class="far fa-square nav-icon"></i>
                  <p>Create Admin</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item {{ request()->is('admin/all-users')?'menu-open':'' }} {{ request()->is('admin/create-user')?'menu-open':'' }} {{ request()->is('admin/edit-user/*')?'menu-open':'' }}">
            <a href="#" class="nav-link bg-light {{ request()->is('admin/all-users')? 'active':'' }} {{ request()->is('admin/create-user')?'active':'' }} {{ request()->is('admin/edit-user/*')?'active':'' }}">
              <i class="nav-icon fas fa-users "></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ url('admin/all-users') }}" class="nav-link {{ request()->is('admin/all-users')? 'active':'' }} ">
                  <i class="far fa-square  nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/create-user') }}" class="nav-link {{ request()->is('admin/create-user')?'active':'' }} ">
                  <i class="far fa-square nav-icon"></i>
                  <p>Create User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ request()->is('admin/contact-us')?'menu-open':'' }} ">
            <a href="#" class="nav-link bg-light {{ request()->is('admin/contact-us')? 'active':'' }}">
                <i class=" fas  fa-database" >
                </i>
                 <p>
                Contact Messages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/contact-us') }}" class="nav-link {{ request()->is('admin/contact-us')?'active':'' }} ">
                  <i class="far fa-square nav-icon"></i>
                  <p>Messages</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item {{ request()->is('admin/blogs')?'menu-open':'' }}  {{ request()->is('admin/blogs/*')?'menu-open':'' }}  {{ request()->is('admin/blog-comment*')?'menu-open':'' }}  {{ request()->is('admin/blog-categories')?'menu-open':'' }} {{ request()->is('admin/blog/category*')?'menu-open':'' }} ">
            <a href="#" class="nav-link bg-light {{ request()->is('admin/blogs*')?'active':'' }} {{ request()->is('admin/blogs')?'active':'' }}  {{ request()->is('admin/blog-comment*')?'active':'' }}  {{ request()->is('admin/blog-categories')?'active':'' }}  {{ request()->is('admin/blog/category*')?'active':'' }}">
              <i class="nav-icon fas fa-newspaper "></i>
              <p>
                Blogs
                 <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('blogs') }}" class="nav-link {{ request()->is('admin/blogs')?'active':'' }} {{ request()->is('admin/blogs*')?'active':'' }} ">
                  <i class="far fa-square nav-icon"></i>
                  <p>Blogs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('blog-categories') }}" class="nav-link {{ request()->is('admin/blog-categories')?'active':'' }} {{ request()->is('admin/blog/category*')?'active':'' }}  ">
                  <i class="far fa-square nav-icon"></i>
                  <p>Blog Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('blog-comments') }}" class="nav-link {{ request()->is('admin/blog-comment*')?'active':'' }} {{ request()->is('admin/blog-comment')?'active':'' }} ">
                  <i class="far fa-square nav-icon"></i>
                  <p>Blog Comments</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ request()->is('admin/newslettersubscribers')?'menu-open':'' }}  {{ request()->is('admin/newslettersubscribers/*')?'menu-open':'' }}  {{ request()->is('admin/send-email-to-all')?'menu-open':'' }}">
            <a href="#" class="nav-link bg-light {{ request()->is('admin/newslettersubscribers*')?'active':'' }} {{ request()->is('admin/newslettersubscribers')?'active':'' }}  {{ request()->is('admin/send-email-to-all')?'active':'' }}">
              <i class="nav-icon fas fa-file"></i>
              <p>
                 Subscribers
                 <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('newslettersubscribers') }}" class="nav-link {{ request()->is('admin/newslettersubscribers')?'active':'' }} {{ request()->is('admin/newslettersubscribers*')?'active':'' }} ">
                  <i class="far fa-square nav-icon"></i>
                  <p>List of Subscribers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('send-email-to-all') }}" class="nav-link {{ request()->is('admin/send-email-to-all')?'active':'' }} {{ request()->is('admin/send-email-to-all*')?'active':'' }}  ">
                  <i class="far fa-square nav-icon"></i>
                  <p>Send Email</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ request()->is('admin/all-courses')?'menu-open':'' }}  {{ request()->is('admin/courses/*')?'menu-open':'' }}  {{ request()->is('admin/course/*')?'menu-open':'' }} {{ request()->is('admin/course-categories')?'menu-open':'' }}">
            <a href="#" class="nav-link bg-light {{ request()->is('admin/all-courses')?'active':'' }} {{ request()->is('admin/courses/*')?'active':'' }} {{ request()->is('admin/course*')?'active':'' }} {{ request()->is('admin/course-categories')?'active':'' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                 Courses
                 <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('all-courses') }}" class="nav-link {{ request()->is('admin/all-courses')?'active':'' }}  {{ request()->is('admin/course/edit*')?'active':'' }} ">
                  <i class="far fa-square nav-icon"></i>
                  <p>List of Course</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('add-course') }}" class="nav-link {{ request()->is('admin/course/add')?'active':'' }}">
                  <i class="far fa-square nav-icon"></i>
                  <p>Create Course</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('course-categories') }}" class="nav-link {{ request()->is('admin/course/category*')?'active':'' }} {{ request()->is('admin/course-categories')?'active':'' }}" >
                  <i class="far fa-square nav-icon"></i>
                  <p> Course Categories</p>
                </a>
              </li>
            </ul>

            <li class="nav-item {{ request()->is('admin/course-orders*')?'menu-open':'' }} {{ request()->is('admin/all-orders')?'menu-open':'' }}  {{ request()->is('admin/pdf-orders*')?'menu-open':'' }} {{ request()->is('admin/all-pdf-orders')?'menu-open':'' }}">
                <a href="javascript:void();" class="nav-link bg-light {{ request()->is('admin/course-orders*')?'active':'' }} {{ request()->is('admin/all-orders')?'active':'' }} {{ request()->is('admin/pdf-orders*')?'active':'' }} {{ request()->is('admin/all-pdf-orders')?'active':'' }}">
                  <i class="nav-icon fas">
                    <svg id='Purchase_Order_24' width='15' height='15' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                        <g transform="matrix(0.43 0 0 0.43 12 12)" >
                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-25, -25)" d="M 6 2 L 6 48 L 7 48 L 44 48 L 44 2 L 6 2 z M 8 4 L 42 4 L 42 46 L 8 46 L 8 4 z M 13 11 L 13 13 L 37 13 L 37 11 L 13 11 z M 13 25 L 13 27 L 17 27 L 17 25 L 13 25 z M 20 25 L 20 27 L 37 27 L 37 25 L 20 25 z M 13 31 L 13 33 L 17 33 L 17 31 L 13 31 z M 20 31 L 20 33 L 37 33 L 37 31 L 20 31 z M 13 37 L 13 39 L 17 39 L 17 37 L 13 37 z M 20 37 L 20 39 L 37 39 L 37 37 L 20 37 z" stroke-linecap="round" />
                        </g>
                        </svg>
                  </i>
                  <p>
                     Orders
                     <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('all-pdf-orders') }}" class="nav-link {{ request()->is('admin/all-pdf-orders')?'active':'' }}  {{ request()->is('admin/pdf-orders*')?'active':'' }}">
                    <i class="far fa-square nav-icon"></i>
                    <p>Pdf Orders</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('all-orders') }}" class="nav-link {{ request()->is('admin/all-orders')?'active':'' }} {{ request()->is('admin/course-orders*')?'active':'' }}">
                      <i class="far fa-square nav-icon"></i>
                      <p>Course Orders</p>
                    </a>
                  </li>
              </ul>
            </li>
            <li class="nav-item {{ request()->is('admin/books')?'menu-open':'' }}  {{ request()->is('admin/books*')?'menu-open':'' }}">
                <a href="javascript:void();" class="nav-link bg-light {{ request()->is('admin/books')?'active':'' }} {{ request()->is('admin/books*')?'active':'' }}">
                  <i class="nav-icon fas">
                    <svg id='Bookmark_24' width='15' height='15' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                        <g transform="matrix(1 0 0 1 12 12)" >
                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 6 2 C 4.895 2 4 2.895 4 4 L 4 19 C 4 20.64497 5.3550302 22 7 22 L 20 22 L 20 20 L 7 20 C 6.4349698 20 6 19.56503 6 19 C 6 18.43497 6.4349698 18 7 18 L 20 18 L 20 17 L 20 16 L 20 2 L 16 2 L 16 12 L 13 10 L 10 12 L 10 2 L 6 2 z" stroke-linecap="round" />
                        </g>
                        </svg>
                  </i>
                  <p>
                      Store
                     <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('books') }}" class="nav-link {{ request()->is('admin/books')?'active':'' }} {{ request()->is('admin/books*')?'active':'' }}">
                    <i class="far fa-square nav-icon"></i>
                    <p>List of Books</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item {{ request()->is('admin/banners')?'menu-open':'' }}  {{ request()->is('admin/banners*')?'menu-open':'' }}">
                <a href="javascript:void();" class="nav-link bg-light {{ request()->is('admin/banners')?'active':'' }} {{ request()->is('admin/banners*')?'active':'' }}">
                  <i class="nav-icon fas">
                    <svg id='Slider_24' width='15' height='15' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                        <g transform="matrix(0.36 0 0 0.36 12 12)" >
                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-32, -32)" d="M 7 6 C 5.347656 6 4 7.347656 4 9 L 4 55 C 4 56.652344 5.347656 58 7 58 L 57 58 C 58.652344 58 60 56.652344 60 55 L 60 9 C 60 7.347656 58.652344 6 57 6 Z M 7 8 L 57 8 C 57.550781 8 58 8.449219 58 9 L 58 55 C 58 55.550781 57.550781 56 57 56 L 7 56 C 6.449219 56 6 55.550781 6 55 L 6 9 C 6 8.449219 6.449219 8 7 8 Z M 17 14 C 16.449219 14 16 14.445313 16 15 L 16 19 C 16 19.554688 16.449219 20 17 20 C 17.550781 20 18 19.554688 18 19 L 18 15 C 18 14.445313 17.550781 14 17 14 Z M 35 17 C 33.140625 17 31.570313 18.269531 31.128906 20 L 29 20 C 28.449219 20 28 20.449219 28 21 C 28 21.550781 28.449219 22 29 22 L 31.128906 22 C 31.570313 23.730469 33.140625 25 35 25 C 36.859375 25 38.429688 23.730469 38.871094 22 L 52 22 C 52.550781 22 53 21.550781 53 21 C 53 20.449219 52.550781 20 52 20 L 38.871094 20 C 38.429688 18.269531 36.859375 17 35 17 Z M 35 19 C 35.738281 19 36.378906 19.398438 36.730469 20 C 36.902344 20.289063 37 20.640625 37 21 C 37 21.359375 36.902344 21.710938 36.730469 22 C 36.378906 22.601563 35.738281 23 35 23 C 34.261719 23 33.621094 22.601563 33.269531 22 C 33.097656 21.710938 33 21.359375 33 21 C 33 20.640625 33.097656 20.289063 33.269531 20 C 33.621094 19.398438 34.261719 19 35 19 Z M 17 22 C 16.449219 22 16 22.445313 16 23 L 16 40.585938 L 11.707031 36.292969 C 11.316406 35.902344 10.683594 35.902344 10.292969 36.292969 C 9.902344 36.683594 9.902344 37.316406 10.292969 37.707031 L 16.292969 43.703125 C 16.386719 43.796875 16.496094 43.871094 16.617188 43.921875 C 16.738281 43.972656 16.871094 44 17 44 C 17.128906 44 17.261719 43.972656 17.382813 43.921875 C 17.503906 43.871094 17.613281 43.796875 17.707031 43.703125 L 23.707031 37.707031 C 24.097656 37.316406 24.097656 36.683594 23.707031 36.292969 C 23.316406 35.902344 22.683594 35.902344 22.292969 36.292969 L 18 40.585938 L 18 23 C 18 22.445313 17.550781 22 17 22 Z M 46 25 C 44.140625 25 42.570313 26.269531 42.128906 28 L 29 28 C 28.449219 28 28 28.449219 28 29 C 28 29.550781 28.449219 30 29 30 L 42.128906 30 C 42.570313 31.730469 44.140625 33 46 33 C 47.859375 33 49.429688 31.730469 49.871094 30 L 52 30 C 52.550781 30 53 29.550781 53 29 C 53 28.449219 52.550781 28 52 28 L 49.871094 28 C 49.429688 26.269531 47.859375 25 46 25 Z M 46 27 C 46.738281 27 47.378906 27.398438 47.730469 28 C 47.902344 28.289063 48 28.640625 48 29 C 48 29.359375 47.902344 29.710938 47.730469 30 C 47.378906 30.601563 46.738281 31 46 31 C 45.261719 31 44.621094 30.601563 44.269531 30 C 44.097656 29.710938 44 29.359375 44 29 C 44 28.640625 44.097656 28.289063 44.269531 28 C 44.621094 27.398438 45.261719 27 46 27 Z M 38 33 C 36.140625 33 34.570313 34.269531 34.128906 36 L 29 36 C 28.449219 36 28 36.449219 28 37 C 28 37.550781 28.449219 38 29 38 L 34.128906 38 C 34.570313 39.730469 36.140625 41 38 41 C 39.859375 41 41.429688 39.730469 41.871094 38 L 52 38 C 52.550781 38 53 37.550781 53 37 C 53 36.449219 52.550781 36 52 36 L 41.871094 36 C 41.429688 34.269531 39.859375 33 38 33 Z M 38 35 C 38.738281 35 39.378906 35.398438 39.730469 36 C 39.902344 36.289063 40 36.640625 40 37 C 40 37.359375 39.902344 37.710938 39.730469 38 C 39.378906 38.601563 38.738281 39 38 39 C 37.261719 39 36.621094 38.601563 36.269531 38 C 36.097656 37.710938 36 37.359375 36 37 C 36 36.640625 36.097656 36.289063 36.269531 36 C 36.621094 35.398438 37.261719 35 38 35 Z M 9 50 C 8.449219 50 8 50.445313 8 51 L 8 53 C 8 53.554688 8.449219 54 9 54 C 9.550781 54 10 53.554688 10 53 L 10 51 C 10 50.445313 9.550781 50 9 50 Z M 14 50 C 13.449219 50 13 50.445313 13 51 L 13 53 C 13 53.554688 13.449219 54 14 54 C 14.550781 54 15 53.554688 15 53 L 15 51 C 15 50.445313 14.550781 50 14 50 Z M 19 50 C 18.449219 50 18 50.445313 18 51 L 18 53 C 18 53.554688 18.449219 54 19 54 C 19.550781 54 20 53.554688 20 53 L 20 51 C 20 50.445313 19.550781 50 19 50 Z M 24 50 C 23.449219 50 23 50.445313 23 51 L 23 53 C 23 53.554688 23.449219 54 24 54 C 24.550781 54 25 53.554688 25 53 L 25 51 C 25 50.445313 24.550781 50 24 50 Z M 29 50 C 28.449219 50 28 50.445313 28 51 L 28 53 C 28 53.554688 28.449219 54 29 54 C 29.550781 54 30 53.554688 30 53 L 30 51 C 30 50.445313 29.550781 50 29 50 Z M 34 50 C 33.449219 50 33 50.445313 33 51 L 33 53 C 33 53.554688 33.449219 54 34 54 C 34.550781 54 35 53.554688 35 53 L 35 51 C 35 50.445313 34.550781 50 34 50 Z M 39 50 C 38.449219 50 38 50.445313 38 51 L 38 53 C 38 53.554688 38.449219 54 39 54 C 39.550781 54 40 53.554688 40 53 L 40 51 C 40 50.445313 39.550781 50 39 50 Z M 44 50 C 43.449219 50 43 50.445313 43 51 L 43 53 C 43 53.554688 43.449219 54 44 54 C 44.550781 54 45 53.554688 45 53 L 45 51 C 45 50.445313 44.550781 50 44 50 Z M 49 50 C 48.449219 50 48 50.445313 48 51 L 48 53 C 48 53.554688 48.449219 54 49 54 C 49.550781 54 50 53.554688 50 53 L 50 51 C 50 50.445313 49.550781 50 49 50 Z M 54 50 C 53.449219 50 53 50.445313 53 51 L 53 53 C 53 53.554688 53.449219 54 54 54 C 54.550781 54 55 53.554688 55 53 L 55 51 C 55 50.445313 54.550781 50 54 50 Z" stroke-linecap="round" />
                        </g>
                        </svg>
                  </i>
                  <p>
                     Sliders
                     <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('banners') }}" class="nav-link {{ request()->is('admin/banners')?'active':'' }} {{ request()->is('admin/banners*')?'active':'' }}">
                    <i class="far fa-square nav-icon"></i>
                    <p>List of Sliders</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item {{ request()->is('admin/student-says')?'menu-open':'' }}  {{ request()->is('admin/student-says*')?'menu-open':'' }}">
                <a href="javascript:void();" class="nav-link bg-light {{ request()->is('admin/student-says')?'active':'' }} {{ request()->is('admin/student-says*')?'active':'' }}">
                  <i class="nav-icon fas">
                    <svg id='Slider_24' width='15' height='15' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                        <g transform="matrix(0.36 0 0 0.36 12 12)" >
                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-32, -32)" d="M 7 6 C 5.347656 6 4 7.347656 4 9 L 4 55 C 4 56.652344 5.347656 58 7 58 L 57 58 C 58.652344 58 60 56.652344 60 55 L 60 9 C 60 7.347656 58.652344 6 57 6 Z M 7 8 L 57 8 C 57.550781 8 58 8.449219 58 9 L 58 55 C 58 55.550781 57.550781 56 57 56 L 7 56 C 6.449219 56 6 55.550781 6 55 L 6 9 C 6 8.449219 6.449219 8 7 8 Z M 17 14 C 16.449219 14 16 14.445313 16 15 L 16 19 C 16 19.554688 16.449219 20 17 20 C 17.550781 20 18 19.554688 18 19 L 18 15 C 18 14.445313 17.550781 14 17 14 Z M 35 17 C 33.140625 17 31.570313 18.269531 31.128906 20 L 29 20 C 28.449219 20 28 20.449219 28 21 C 28 21.550781 28.449219 22 29 22 L 31.128906 22 C 31.570313 23.730469 33.140625 25 35 25 C 36.859375 25 38.429688 23.730469 38.871094 22 L 52 22 C 52.550781 22 53 21.550781 53 21 C 53 20.449219 52.550781 20 52 20 L 38.871094 20 C 38.429688 18.269531 36.859375 17 35 17 Z M 35 19 C 35.738281 19 36.378906 19.398438 36.730469 20 C 36.902344 20.289063 37 20.640625 37 21 C 37 21.359375 36.902344 21.710938 36.730469 22 C 36.378906 22.601563 35.738281 23 35 23 C 34.261719 23 33.621094 22.601563 33.269531 22 C 33.097656 21.710938 33 21.359375 33 21 C 33 20.640625 33.097656 20.289063 33.269531 20 C 33.621094 19.398438 34.261719 19 35 19 Z M 17 22 C 16.449219 22 16 22.445313 16 23 L 16 40.585938 L 11.707031 36.292969 C 11.316406 35.902344 10.683594 35.902344 10.292969 36.292969 C 9.902344 36.683594 9.902344 37.316406 10.292969 37.707031 L 16.292969 43.703125 C 16.386719 43.796875 16.496094 43.871094 16.617188 43.921875 C 16.738281 43.972656 16.871094 44 17 44 C 17.128906 44 17.261719 43.972656 17.382813 43.921875 C 17.503906 43.871094 17.613281 43.796875 17.707031 43.703125 L 23.707031 37.707031 C 24.097656 37.316406 24.097656 36.683594 23.707031 36.292969 C 23.316406 35.902344 22.683594 35.902344 22.292969 36.292969 L 18 40.585938 L 18 23 C 18 22.445313 17.550781 22 17 22 Z M 46 25 C 44.140625 25 42.570313 26.269531 42.128906 28 L 29 28 C 28.449219 28 28 28.449219 28 29 C 28 29.550781 28.449219 30 29 30 L 42.128906 30 C 42.570313 31.730469 44.140625 33 46 33 C 47.859375 33 49.429688 31.730469 49.871094 30 L 52 30 C 52.550781 30 53 29.550781 53 29 C 53 28.449219 52.550781 28 52 28 L 49.871094 28 C 49.429688 26.269531 47.859375 25 46 25 Z M 46 27 C 46.738281 27 47.378906 27.398438 47.730469 28 C 47.902344 28.289063 48 28.640625 48 29 C 48 29.359375 47.902344 29.710938 47.730469 30 C 47.378906 30.601563 46.738281 31 46 31 C 45.261719 31 44.621094 30.601563 44.269531 30 C 44.097656 29.710938 44 29.359375 44 29 C 44 28.640625 44.097656 28.289063 44.269531 28 C 44.621094 27.398438 45.261719 27 46 27 Z M 38 33 C 36.140625 33 34.570313 34.269531 34.128906 36 L 29 36 C 28.449219 36 28 36.449219 28 37 C 28 37.550781 28.449219 38 29 38 L 34.128906 38 C 34.570313 39.730469 36.140625 41 38 41 C 39.859375 41 41.429688 39.730469 41.871094 38 L 52 38 C 52.550781 38 53 37.550781 53 37 C 53 36.449219 52.550781 36 52 36 L 41.871094 36 C 41.429688 34.269531 39.859375 33 38 33 Z M 38 35 C 38.738281 35 39.378906 35.398438 39.730469 36 C 39.902344 36.289063 40 36.640625 40 37 C 40 37.359375 39.902344 37.710938 39.730469 38 C 39.378906 38.601563 38.738281 39 38 39 C 37.261719 39 36.621094 38.601563 36.269531 38 C 36.097656 37.710938 36 37.359375 36 37 C 36 36.640625 36.097656 36.289063 36.269531 36 C 36.621094 35.398438 37.261719 35 38 35 Z M 9 50 C 8.449219 50 8 50.445313 8 51 L 8 53 C 8 53.554688 8.449219 54 9 54 C 9.550781 54 10 53.554688 10 53 L 10 51 C 10 50.445313 9.550781 50 9 50 Z M 14 50 C 13.449219 50 13 50.445313 13 51 L 13 53 C 13 53.554688 13.449219 54 14 54 C 14.550781 54 15 53.554688 15 53 L 15 51 C 15 50.445313 14.550781 50 14 50 Z M 19 50 C 18.449219 50 18 50.445313 18 51 L 18 53 C 18 53.554688 18.449219 54 19 54 C 19.550781 54 20 53.554688 20 53 L 20 51 C 20 50.445313 19.550781 50 19 50 Z M 24 50 C 23.449219 50 23 50.445313 23 51 L 23 53 C 23 53.554688 23.449219 54 24 54 C 24.550781 54 25 53.554688 25 53 L 25 51 C 25 50.445313 24.550781 50 24 50 Z M 29 50 C 28.449219 50 28 50.445313 28 51 L 28 53 C 28 53.554688 28.449219 54 29 54 C 29.550781 54 30 53.554688 30 53 L 30 51 C 30 50.445313 29.550781 50 29 50 Z M 34 50 C 33.449219 50 33 50.445313 33 51 L 33 53 C 33 53.554688 33.449219 54 34 54 C 34.550781 54 35 53.554688 35 53 L 35 51 C 35 50.445313 34.550781 50 34 50 Z M 39 50 C 38.449219 50 38 50.445313 38 51 L 38 53 C 38 53.554688 38.449219 54 39 54 C 39.550781 54 40 53.554688 40 53 L 40 51 C 40 50.445313 39.550781 50 39 50 Z M 44 50 C 43.449219 50 43 50.445313 43 51 L 43 53 C 43 53.554688 43.449219 54 44 54 C 44.550781 54 45 53.554688 45 53 L 45 51 C 45 50.445313 44.550781 50 44 50 Z M 49 50 C 48.449219 50 48 50.445313 48 51 L 48 53 C 48 53.554688 48.449219 54 49 54 C 49.550781 54 50 53.554688 50 53 L 50 51 C 50 50.445313 49.550781 50 49 50 Z M 54 50 C 53.449219 50 53 50.445313 53 51 L 53 53 C 53 53.554688 53.449219 54 54 54 C 54.550781 54 55 53.554688 55 53 L 55 51 C 55 50.445313 54.550781 50 54 50 Z" stroke-linecap="round" />
                        </g>
                        </svg>
                  </i>
                  <p>
                     Testmony
                     <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('student-says') }}" class="nav-link {{ request()->is('admin/student-says')?'active':'' }} {{ request()->is('admin/student-says*')?'active':'' }}">
                    <i class="far fa-square nav-icon"></i>
                    <p>List of Testmonies</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item {{ request()->is('admin/faqs')?'menu-open':'' }}  {{ request()->is('admin/faq*')?'menu-open':'' }}">
                <a href="javascript:void();" class="nav-link bg-light {{ request()->is('admin/faqs')?'active':'' }} {{ request()->is('admin/faq*')?'active':'' }}">
                    <i class="nav-icon fas">
                        <svg id='Slider_24' width='15' height='15' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                            <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />
                            <g transform="matrix(0.36 0 0 0.36 12 12)">
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-32, -32)" d="M 7 6 C 5.347656 6 4 7.347656 4 9 L 4 55 C 4 56.652344 5.347656 58 7 58 L 57 58 C 58.652344 58 60 56.652344 60 55 L 60 9 C 60 7.347656 58.652344 6 57 6 Z M 7 8 L 57 8 C 57.550781 8 58 8.449219 58 9 L 58 55 C 58 55.550781 57.550781 56 57 56 L 7 56 C 6.449219 56 6 55.550781 6 55 L 6 9 C 6 8.449219 6.449219 8 7 8 Z M 17 14 C 16.449219 14 16 14.445313 16 15 L 16 19 C 16 19.554688 16.449219 20 17 20 C 17.550781 20 18 19.554688 18 19 L 18 15 C 18 14.445313 17.550781 14 17 14 Z M 35 17 C 33.140625 17 31.570313 18.269531 31.128906 20 L 29 20 C 28.449219 20 28 20.449219 28 21 C 28 21.550781 28.449219 22 29 22 L 31.128906 22 C 31.570313 23.730469 33.140625 25 35 25 C 36.859375 25 38.429688 23.730469 38.871094 22 L 52 22 C 52.550781 22 53 21.550781 53 21 C 53 20.449219 52.550781 20 52 20 L 38.871094 20 C 38.429688 18.269531 36.859375 17 35 17 Z M 35 19 C 35.738281 19 36.378906 19.398438 36.730469 20 C 36.902344 20.289063 37 20.640625 37 21 C 37 21.359375 36.902344 21.710938 36.730469 22 C 36.378906 22.601563 35.738281 23 35 23 C 34.261719 23 33.621094 22.601563 33.269531 22 C 33.097656 21.710938 33 21.359375 33 21 C 33 20.640625 33.097656 20.289063 33.269531 20 C 33.621094 19.398438 34.261719 19 35 19 Z M 17 22 C 16.449219 22 16 22.445313 16 23 L 16 40.585938 L 11.707031 36.292969 C 11.316406 35.902344 10.683594 35.902344 10.292969 36.292969 C 9.902344 36.683594 9.902344 37.316406 10.292969 37.707031 L 16.292969 43.703125 C 16.386719 43.796875 16.496094 43.871094 16.617188 43.921875 C 16.738281 43.972656 16.871094 44 17 44 C 17.128906 44 17.261719 43.972656 17.382813 43.921875 C 17.503906 43.871094 17.613281 43.796875 17.707031 43.703125 L 23.707031 37.707031 C 24.097656 37.316406 24.097656 36.683594 23.707031 36.292969 C 23.316406 35.902344 22.683594 35.902344 22.292969 36.292969 L 18 40.585938 L 18 23 C 18 22.445313 17.550781 22 17 22 Z M 46 25 C 44.140625 25 42.570313 26.269531 42.128906 28 L 29 28 C 28.449219 28 28 28.449219 28 29 C 28 29.550781 28.449219 30 29 30 L 42.128906 30 C 42.570313 31.730469 44.140625 33 46 33 C 47.859375 33 49.429688 31.730469 49.871094 30 L 52 30 C 52.550781 30 53 29.550781 53 29 C 53 28.449219 52.550781 28 52 28 L 49.871094 28 C 49.429688 26.269531 47.859375 25 46 25 Z M 46 27 C 46.738281 27 47.378906 27.398438 47.730469 28 C 47.902344 28.289063 48 28.640625 48 29 C 48 29.359375 47.902344 29.710938 47.730469 30 C 47.378906 30.601563 46.738281 31 46 31 C 45.261719 31 44.621094 30.601563 44.269531 30 C 44.097656 29.710938 44 29.359375 44 29 C 44 28.640625 44.097656 28.289063 44.269531 28 C 44.621094 27.398438 45.261719 27 46 27 Z M 38 33 C 36.140625 33 34.570313 34.269531 34.128906 36 L 29 36 C 28.449219 36 28 36.449219 28 37 C 28 37.550781 28.449219 38 29 38 L 34.128906 38 C 34.570313 39.730469 36.140625 41 38 41 C 39.859375 41 41.429688 39.730469 41.871094 38 L 52 38 C 52.550781 38 53 37.550781 53 37 C 53 36.449219 52.550781 36 52 36 L 41.871094 36 C 41.429688 34.269531 39.859375 33 38 33 Z M 38 35 C 38.738281 35 39.378906 35.398438 39.730469 36 C 39.902344 36.289063 40 36.640625 40 37 C 40 37.359375 39.902344 37.710938 39.730469 38 C 39.378906 38.601563 38.738281 39 38 39 C 37.261719 39 36.621094 38.601563 36.269531 38 C 36.097656 37.710938 36 37.359375 36 37 C 36 36.640625 36.097656 36.289063 36.269531 36 C 36.621094 35.398438 37.261719 35 38 35 Z M 9 50 C 8.449219 50 8 50.445313 8 51 L 8 53 C 8 53.554688 8.449219 54 9 54 C 9.550781 54 10 53.554688 10 53 L 10 51 C 10 50.445313 9.550781 50 9 50 Z M 14 50 C 13.449219 50 13 50.445313 13 51 L 13 53 C 13 53.554688 13.449219 54 14 54 C 14.550781 54 15 53.554688 15 53 L 15 51 C 15 50.445313 14.550781 50 14 50 Z M 19 50 C 18.449219 50 18 50.445313 18 51 L 18 53 C 18 53.554688 18.449219 54 19 54 C 19.550781 54 20 53.554688 20 53 L 20 51 C 20 50.445313 19.550781 50 19 50 Z M 24 50 C 23.449219 50 23 50.445313 23 51 L 23 53 C 23 53.554688 23.449219 54 24 54 C 24.550781 54 25 53.554688 25 53 L 25 51 C 25 50.445313 24.550781 50 24 50 Z M 29 50 C 28.449219 50 28 50.445313 28 51 L 28 53 C 28 53.554688 28.449219 54 29 54 C 29.550781 54 30 53.554688 30 53 L 30 51 C 30 50.445313 29.550781 50 29 50 Z M 34 50 C 33.449219 50 33 50.445313 33 51 L 33 53 C 33 53.554688 33.449219 54 34 54 C 34.550781 54 35 53.554688 35 53 L 35 51 C 35 50.445313 34.550781 50 34 50 Z M 39 50 C 38.449219 50 38 50.445313 38 51 L 38 53 C 38 53.554688 38.449219 54 39 54 C 39.550781 54 40 53.554688 40 53 L 40 51 C 40 50.445313 39.550781 50 39 50 Z M 44 50 C 43.449219 50 43 50.445313 43 51 L 43 53 C 43 53.554688 43.449219 54 44 54 C 44.550781 54 45 53.554688 45 53 L 45 51 C 45 50.445313 44.550781 50 44 50 Z M 49 50 C 48.449219 50 48 50.445313 48 51 L 48 53 C 48 53.554688 48.449219 54 49 54 C 49.550781 54 50 53.554688 50 53 L 50 51 C 50 50.445313 49.550781 50 49 50 Z M 54 50 C 53.449219 50 53 50.445313 53 51 L 53 53 C 53 53.554688 53.449219 54 54 54 C 54.550781 54 55 53.554688 55 53 L 55 51 C 55 50.445313 54.550781 50 54 50 Z" stroke-linecap="round" />
                            </g>
                        </svg>
                    </i>
                    <p>
                        FAQ
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('faqs') }}" class="nav-link {{ request()->is('admin/faqs')?'active':'' }} {{ request()->is('admin/faqs*')?'active':'' }}">
                            <i class="far fa-square nav-icon"></i>
                            <p>List of FAQ</p>
                        </a>
                    </li>
                </ul>
            </li>
            </li>
            <li class="nav-item {{ request()->is('admin/all-about-us')?'menu-open':'' }}  {{ request()->is('admin/about*')?'menu-open':'' }}">
                <a href="javascript:void();" class="nav-link bg-light {{ request()->is('admin/all-about-us')?'active':'' }} {{ request()->is('admin/about*')?'active':'' }}">
                    <i class="nav-icon fas">
                        <svg id='Slider_24' width='15' height='15' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                            <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />
                            <g transform="matrix(0.36 0 0 0.36 12 12)">
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-32, -32)" d="M 7 6 C 5.347656 6 4 7.347656 4 9 L 4 55 C 4 56.652344 5.347656 58 7 58 L 57 58 C 58.652344 58 60 56.652344 60 55 L 60 9 C 60 7.347656 58.652344 6 57 6 Z M 7 8 L 57 8 C 57.550781 8 58 8.449219 58 9 L 58 55 C 58 55.550781 57.550781 56 57 56 L 7 56 C 6.449219 56 6 55.550781 6 55 L 6 9 C 6 8.449219 6.449219 8 7 8 Z M 17 14 C 16.449219 14 16 14.445313 16 15 L 16 19 C 16 19.554688 16.449219 20 17 20 C 17.550781 20 18 19.554688 18 19 L 18 15 C 18 14.445313 17.550781 14 17 14 Z M 35 17 C 33.140625 17 31.570313 18.269531 31.128906 20 L 29 20 C 28.449219 20 28 20.449219 28 21 C 28 21.550781 28.449219 22 29 22 L 31.128906 22 C 31.570313 23.730469 33.140625 25 35 25 C 36.859375 25 38.429688 23.730469 38.871094 22 L 52 22 C 52.550781 22 53 21.550781 53 21 C 53 20.449219 52.550781 20 52 20 L 38.871094 20 C 38.429688 18.269531 36.859375 17 35 17 Z M 35 19 C 35.738281 19 36.378906 19.398438 36.730469 20 C 36.902344 20.289063 37 20.640625 37 21 C 37 21.359375 36.902344 21.710938 36.730469 22 C 36.378906 22.601563 35.738281 23 35 23 C 34.261719 23 33.621094 22.601563 33.269531 22 C 33.097656 21.710938 33 21.359375 33 21 C 33 20.640625 33.097656 20.289063 33.269531 20 C 33.621094 19.398438 34.261719 19 35 19 Z M 17 22 C 16.449219 22 16 22.445313 16 23 L 16 40.585938 L 11.707031 36.292969 C 11.316406 35.902344 10.683594 35.902344 10.292969 36.292969 C 9.902344 36.683594 9.902344 37.316406 10.292969 37.707031 L 16.292969 43.703125 C 16.386719 43.796875 16.496094 43.871094 16.617188 43.921875 C 16.738281 43.972656 16.871094 44 17 44 C 17.128906 44 17.261719 43.972656 17.382813 43.921875 C 17.503906 43.871094 17.613281 43.796875 17.707031 43.703125 L 23.707031 37.707031 C 24.097656 37.316406 24.097656 36.683594 23.707031 36.292969 C 23.316406 35.902344 22.683594 35.902344 22.292969 36.292969 L 18 40.585938 L 18 23 C 18 22.445313 17.550781 22 17 22 Z M 46 25 C 44.140625 25 42.570313 26.269531 42.128906 28 L 29 28 C 28.449219 28 28 28.449219 28 29 C 28 29.550781 28.449219 30 29 30 L 42.128906 30 C 42.570313 31.730469 44.140625 33 46 33 C 47.859375 33 49.429688 31.730469 49.871094 30 L 52 30 C 52.550781 30 53 29.550781 53 29 C 53 28.449219 52.550781 28 52 28 L 49.871094 28 C 49.429688 26.269531 47.859375 25 46 25 Z M 46 27 C 46.738281 27 47.378906 27.398438 47.730469 28 C 47.902344 28.289063 48 28.640625 48 29 C 48 29.359375 47.902344 29.710938 47.730469 30 C 47.378906 30.601563 46.738281 31 46 31 C 45.261719 31 44.621094 30.601563 44.269531 30 C 44.097656 29.710938 44 29.359375 44 29 C 44 28.640625 44.097656 28.289063 44.269531 28 C 44.621094 27.398438 45.261719 27 46 27 Z M 38 33 C 36.140625 33 34.570313 34.269531 34.128906 36 L 29 36 C 28.449219 36 28 36.449219 28 37 C 28 37.550781 28.449219 38 29 38 L 34.128906 38 C 34.570313 39.730469 36.140625 41 38 41 C 39.859375 41 41.429688 39.730469 41.871094 38 L 52 38 C 52.550781 38 53 37.550781 53 37 C 53 36.449219 52.550781 36 52 36 L 41.871094 36 C 41.429688 34.269531 39.859375 33 38 33 Z M 38 35 C 38.738281 35 39.378906 35.398438 39.730469 36 C 39.902344 36.289063 40 36.640625 40 37 C 40 37.359375 39.902344 37.710938 39.730469 38 C 39.378906 38.601563 38.738281 39 38 39 C 37.261719 39 36.621094 38.601563 36.269531 38 C 36.097656 37.710938 36 37.359375 36 37 C 36 36.640625 36.097656 36.289063 36.269531 36 C 36.621094 35.398438 37.261719 35 38 35 Z M 9 50 C 8.449219 50 8 50.445313 8 51 L 8 53 C 8 53.554688 8.449219 54 9 54 C 9.550781 54 10 53.554688 10 53 L 10 51 C 10 50.445313 9.550781 50 9 50 Z M 14 50 C 13.449219 50 13 50.445313 13 51 L 13 53 C 13 53.554688 13.449219 54 14 54 C 14.550781 54 15 53.554688 15 53 L 15 51 C 15 50.445313 14.550781 50 14 50 Z M 19 50 C 18.449219 50 18 50.445313 18 51 L 18 53 C 18 53.554688 18.449219 54 19 54 C 19.550781 54 20 53.554688 20 53 L 20 51 C 20 50.445313 19.550781 50 19 50 Z M 24 50 C 23.449219 50 23 50.445313 23 51 L 23 53 C 23 53.554688 23.449219 54 24 54 C 24.550781 54 25 53.554688 25 53 L 25 51 C 25 50.445313 24.550781 50 24 50 Z M 29 50 C 28.449219 50 28 50.445313 28 51 L 28 53 C 28 53.554688 28.449219 54 29 54 C 29.550781 54 30 53.554688 30 53 L 30 51 C 30 50.445313 29.550781 50 29 50 Z M 34 50 C 33.449219 50 33 50.445313 33 51 L 33 53 C 33 53.554688 33.449219 54 34 54 C 34.550781 54 35 53.554688 35 53 L 35 51 C 35 50.445313 34.550781 50 34 50 Z M 39 50 C 38.449219 50 38 50.445313 38 51 L 38 53 C 38 53.554688 38.449219 54 39 54 C 39.550781 54 40 53.554688 40 53 L 40 51 C 40 50.445313 39.550781 50 39 50 Z M 44 50 C 43.449219 50 43 50.445313 43 51 L 43 53 C 43 53.554688 43.449219 54 44 54 C 44.550781 54 45 53.554688 45 53 L 45 51 C 45 50.445313 44.550781 50 44 50 Z M 49 50 C 48.449219 50 48 50.445313 48 51 L 48 53 C 48 53.554688 48.449219 54 49 54 C 49.550781 54 50 53.554688 50 53 L 50 51 C 50 50.445313 49.550781 50 49 50 Z M 54 50 C 53.449219 50 53 50.445313 53 51 L 53 53 C 53 53.554688 53.449219 54 54 54 C 54.550781 54 55 53.554688 55 53 L 55 51 C 55 50.445313 54.550781 50 54 50 Z" stroke-linecap="round" />
                            </g>
                        </svg>
                    </i>
                    <p>
                        About Us
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('all-about-us') }}" class="nav-link {{ request()->is('admin/all-about-us')?'active':'' }} {{ request()->is('admin/about*')?'active':'' }}">
                            <i class="far fa-square nav-icon"></i>
                            <p>List of About Us</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 23.326%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
    <!-- /.sidebar -->
  </aside>
