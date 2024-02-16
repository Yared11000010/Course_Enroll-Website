@extends('Frontend.layouts.main')
@section('content')
<div class="container-fluid ">
<div class="row">
    <div class="col-lg-12">
      <div id="imageSlider" class="carousel slide "  data-ride="carousel">
        <ol class="carousel-indicators">
          @foreach ($banners as $index => $banner)
          <li data-target="#imageSlider" class="text-dark" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
         @endforeach
        </ol>
        <div class="carousel-inner">
          @foreach ($banners as $index => $banner)
          <div class="carousel-item  {{ $index === 0 ? 'active' : '' }}">
              <img src="{{ asset('/storage/banner/'.$banner['image']) }}" alt="Slider Image {{ $index + 1 }}" style="border-radius: 0.2rem;" class="d-block w-100">
              <div class="carousel-caption d-none d-md-block">
                  <h1 class="" style="font-size: 50px; text-weight:bold;color:white; ">{{ $banner['title'] }}</h1>
                  <p class="text-dark">{{ $banner['alt'] }}</p>
              </div>
           </div>
           @endforeach
        </div>
        <a class="carousel-control-prev" href="#imageSlider" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#imageSlider" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
</div>
<!-- slider-end -->
<!-- courses start -->

<div id="courses" class="courses-area courses-bg-height pt-95 pb-70">
    <div class="container">
        <div class="row">
                <div class="section-title mb-50 text-center">
                    <div class="section-title-heading mb-20">
                        <h1 class="primary-color">Our Latest Courses</h1>
                    </div>
                    <div class="section-title-para">
                        <p class="gray-color">
                           Dive into a world of knowledge with our latest courses! Stay ahead of the curve and explore our newest offerings designed to inspire, challenge, and enrich your learning journey. From cutting-edge technologies to timeless classics, our selection spans a diverse range of subjects to cater to every interest and ambition. Don't miss out on the opportunity to expand your horizons and acquire valuable skills. Enroll now and take the first step towards unlocking your full potential!
                        </p>
                    </div>
                </div>
            </div>

                        <div class="courses-list">
                            <div class="row">
                                @foreach ($course as $course)
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="courses-wrapper course-radius-none mb-30 " style="border:1px solid rgb(0, 0, 0);padding:2px;">
                                        <div class="courses-thumb">
                                            <a href="course_details.html">
                                                <img src="{{ asset('/storage/course/'.$course->image) }}" style="max-height: 300px; max-width:370px;"  alt="">
                                            </a>
                                        </div>
                                        <div class="courses-author">
                                            <img src="img/courses/coursesauthor1.png" alt="">
                                        </div>
                                        <div class="course-main-content clearfix">
                                            <div class="courses-content">
                                                <div class="courses-category-name">
                                                    <span>
                                                        <a href="javascript:void(0);">{{ $course->category->name }} </a>
                                                    </span>
                                                </div>
                                                <div class="courses-heading">
                                                    <h1><a href="{{ url('course/detail/'.$course->course_code) }}">{{ $course->title }} </a></h1>
                                                    <span class="px-2 py-1" style="background-color: #FDC800;border-radius:0.2rem;">$ {{ $course->price }} <small>Birr</small></span>
                                                </div>
                                                <div class="courses-para">
                                                    <p>  <?php
                                                        $words = str_word_count(strip_tags($course->description), 2);
                                                        $first20Words = implode(' ', array_slice($words, 0, 10));
                                                        echo $first20Words . (count($words) > 10 ? '...' : '');
                                                    ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="courses-wrapper-bottom clearfix">
                                            <div class="courses-icon d-flex f-left">
                                                <div class="courses-single-icon">
                                                    <span class=""" style="height: 20px; background-color:rgb(33, 21, 96); border-radius:0.2rem; padding:9px 20px;"><a href="{{ url('course/enroll/'.$course->course_code) }}" style="color:white;">Enroll</a></span>
                                                </div>
                                            </div>
                                            <div class="courses-button f-right">
                                                <a href="{{ url('course/detail/'.$course->course_code) }}">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="single-courses-btn text-center mt-15 mb-30">
                                        <button class="btn black-border">
                                            <a href="{{ route('courses') }}">
                                                View all course
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- courses end -->


<!-- counter start -->
<div class="counter-area gray-bg">
    <div class="container pt-90 pb-65">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="couter-wrapper mb-30 text-center">
                    <img src="img/counter/counter_icon1.png" alt="">
                    <span class="counter">{{ $count_user }}</span>
                    <h3>Satisfied Students</h3>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="couter-wrapper mb-30 text-center">
                    <img src="img/counter/counter_icon2.png" alt="">
                    <span class="counter">{{ $count_course }}</span>
                    <h3>Courses Complated</h3>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="container pt-5">
    <div class="row">
        <div class="section-title mb-50 text-center">
            <div class="section-title-heading mb-20">
                <h1 class="primary-color">Our Pdf Store</h1>
            </div>
            <div class="section-title-para">
                <p class="gray-color">
                    Welcome to Our Book Store, where endless literary adventures await. Explore captivating narratives, insightful non-fiction, and timeless classics curated to ignite your imagination. Whether you seek fiction for escape, personal development insights, or knowledge exploration, our diverse collection caters to every reader's appetite. Join us on a journey through pages of endless possibilities!
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($books as $book )
            <div class="col-xl-3">
                <div class="shop-inner mb-30 white-bg">
                    <div class="shop-thumb">
                        <a href="shop_pages.html">
                            <img src="{{ asset('/storage/book/'.$book->image) }}" style="max-height: 300px;" alt="book image">
                        </a>
                    </div>
                    <div class="book-inner-content">
                        <div class="sohop-heading mb-20">
                            <h1 class="shop-book-name"><a href="shop_pages.html">{{ $book->title }}</a></h1>
                            <p>  <?php
                                $words = str_word_count(strip_tags($book->description), 2);
                                $first20Words = implode(' ', array_slice($words, 0, 10));
                                echo $first20Words . (count($words) > 10 ? '...' : '');
                            ?></p>
                        </div>
                        <div class="shop-inner-details d-flex">
                            <div class="book-price">
                                <span class="price">Price</span>
                                <span class="user-number">$ {{ $book->price }}</span>
                            </div>
                            <div class="book-ratings text-right">
                                <ul>
                                    <li><a href="{{ url('enroll-book/'.$book->order_code) }}" class="" style="background-color: #FDC800;color:black;padding:8px 18px;">Enroll</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</div>
<!-- counter end -->
<!-- testimonials start -->
<div class="testimonilas-area pt-100 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="section-title mb-50 text-center">
                    <div class="section-title-heading mb-20">
                        <h1 class="primary-color">What Our Students Say</h1>
                    </div>
                    <div class="section-title-para">
                        <p class="gray-color">
                            Hear from our students! Discover firsthand testimonials and insights on the transformative experiences they've had with our courses. Join our community and be inspired by their stories!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonilas-list">
            <div class="row testimonilas-active-2">
                @foreach ($testmony as $tes )
                <div class="col-xl-12">
                    <div class="testimonilas-wrapper testimonilas-wrapper-2 mb-110">
                        <div class="testimonilas-para">
                            <p>{!! $tes->comment !!}</p>
                        </div>
                        <div class="testimonilas-heading d-flex">
                            <div class="testimonilas-author-thumb">
                                <img src="img/testimonials/testimonilas_author_thumb1.png" alt="">
                            </div>
                            <div class="testimonilas-author-title">
                                <h1>{{ $tes->name }}</h1>
                                <h2>{{ $tes->jobs }}</h2>
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
