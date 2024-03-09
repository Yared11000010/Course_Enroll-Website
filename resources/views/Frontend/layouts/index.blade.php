@extends('Frontend.layouts.main')
@section('content')
<style>
    .heading {
        text-align: center;
        color: #454343;
        font-size: 30px;
        font-weight: 700;
        position: relative;
        margin-bottom: 70px;
        text-transform: uppercase;
        z-index: 999;
    }

    .white-heading {
        color: #ffffff;
    }

    .heading:after {
        content: ' ';
        position: absolute;
        top: 100%;
        left: 50%;
        height: 40px;
        width: 180px;
        border-radius: 4px;
        transform: translateX(-50%);
        background: url(img/heading-line.png);
        background-repeat: no-repeat;
        background-position: center;
    }

    .white-heading:after {
        background: url(https://i.ibb.co/d7tSD1R/heading-line-white.png);
        background-repeat: no-repeat;
        background-position: center;
    }

    .heading span {
        font-size: 18px;
        display: block;
        font-weight: 500;
    }

    .white-heading span {
        color: #ffffff;
    }

    /*-----Testimonial-------*/

    .testimonial:after {
        position: absolute;
        top: -0 !important;
        left: 0;
        content: " ";
        background: url(img/testimonial.bg-top.png);
        background-size: 100% 100px;
        width: 100%;
        height: 100px;
        float: left;
        z-index: 99;
    }

    .testimonial {
        min-height: 375px;
        margin-bottom: 50px;
        position: relative;
        background: url({{ asset('assets/slider_bg_home01_1707777990.jpg')}});
        padding-top: 50px;
        padding-bottom: 50px;
        background-position: center;
        background-size: cover;
    }

    #testimonial4 .carousel-inner:hover {
        cursor: -moz-grab;
        cursor: -webkit-grab;
    }

    #testimonial4 .carousel-inner:active {
        cursor: -moz-grabbing;
        cursor: -webkit-grabbing;
    }

    #testimonial4 .carousel-inner .item {
        overflow: hidden;
    }

    .testimonial4_indicators .carousel-indicators {
        left: 0;
        margin: 0;
        width: 100%;
        font-size: 0;
        height: 20px;
        bottom: 15px;
        padding: 0 5px;
        cursor: e-resize;
        overflow-x: auto;
        overflow-y: hidden;
        position: absolute;
        text-align: center;
        white-space: nowrap;
    }

    .testimonial4_indicators .carousel-indicators li {
        padding: 0;
        width: 14px;
        height: 14px;
        border: none;
        text-indent: 0;
        margin: 2px 3px;
        cursor: pointer;
        display: inline-block;
        background: #ffffff;
        -webkit-border-radius: 100%;
        border-radius: 100%;
    }

    .testimonial4_indicators .carousel-indicators .active {
        padding: 0;
        width: 14px;
        height: 14px;
        border: none;
        margin: 2px 3px;
        background-color: #9dd3af;
        -webkit-border-radius: 100%;
        border-radius: 100%;
    }

    .testimonial4_indicators .carousel-indicators::-webkit-scrollbar {
        height: 3px;
    }

    .testimonial4_indicators .carousel-indicators::-webkit-scrollbar-thumb {
        background: #eeeeee;
        -webkit-border-radius: 0;
        border-radius: 0;
    }

    .testimonial4_control_button .carousel-control {
        top: 175px;
        opacity: 1;
        width: 40px;
        bottom: auto;
        height: 40px;
        font-size: 10px;
        cursor: pointer;
        font-weight: 700;
        overflow: hidden;
        line-height: 38px;
        text-shadow: none;
        text-align: center;
        position: absolute;
        background: transparent;
        border: 2px solid #ffffff;
        text-transform: uppercase;
        -webkit-border-radius: 100%;
        border-radius: 100%;
        -webkit-box-shadow: none;
        box-shadow: none;
        -webkit-transition: all 0.6s cubic-bezier(0.3, 1, 0, 1);
        transition: all 0.6s cubic-bezier(0.3, 1, 0, 1);
    }

    .testimonial4_control_button .carousel-control.left {
        left: 7%;
        top: 50%;
        right: auto;
    }

    .testimonial4_control_button .carousel-control.right {
        right: 7%;
        top: 50%;
        left: auto;
    }

    .testimonial4_control_button .carousel-control.left:hover,
    .testimonial4_control_button .carousel-control.right:hover {
        color: #000;
        background: #fff;
        border: 2px solid #fff;
    }

    .testimonial4_header {
        top: 0;
        left: 0;
        bottom: 0;
        width: 550px;
        display: block;
        margin: 30px auto;
        text-align: center;
        position: relative;
    }

    .testimonial4_header h4 {
        color: #ffffff;
        font-size: 30px;
        font-weight: 600;
        position: relative;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .testimonial4_slide {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 70%;
        margin: auto;
        padding: 20px;
        position: relative;
        text-align: center;
    }

    .testimonial4_slide img {
        top: 0;
        left: 0;
        right: 0;
        width: 136px;
        height: 136px;
        margin: auto;
        display: block;
        color: #f2f2f2;
        font-size: 18px;
        line-height: 46px;
        text-align: center;
        position: relative;
        border-radius: 50%;
        box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
        -moz-box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
        -o-box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
        -webkit-box-shadow: -6px 6px 6px rgba(0, 0, 0, 0.23);
    }

    .testimonial4_slide p {
        color: #ffffff;
        font-size: 20px;
        line-height: 1.4;
        margin: 40px 0 20px 0;
    }

    .testimonial4_slide h4 {
        color: #ffffff;
        font-size: 22px;
    }

    .testimonial .carousel {
        padding-bottom: 50px;
    }

    .testimonial .carousel-control-next-icon,
    .testimonial .carousel-control-prev-icon {
        width: 35px;
        height: 35px;
    }

    /* ------testimonial  close-------*/

</style>
<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-12">
            <div id="imageSlider" class="carousel slide " data-ride="carousel">
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
                    <div style="background-color: #ffffff; display:flex; padding:4px; justify-content:center; ">
                        @foreach ($course_category as $cat)
                        <a href="{{ url('course-category/'.$cat->id) }}" class="" style="padding:5px 15px; background-color:#FDC800;color:#000;">
                            {{ $cat->name }} &nbsp; (<span>{{ $cat->courses()->count() }}</span>)
                        </a> &nbsp;
                        @endforeach
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
                                    <img src="{{ asset('/storage/course/'.$course->image) }}" style="max-height: 300px; max-width:370px;" alt="">
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
                                        <p> <?php
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
                                        <span class=""" style=" height: 20px; background-color:rgb(33, 21, 96); border-radius:0.2rem; padding:9px 20px;"><a href="{{ url('course/enroll/'.$course->course_code) }}" style="color:white;">Enroll</a></span>
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
                        <p> <?php
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
<section class="testimonial text-center pt-100 pb-90">
    <div class="container">
        <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">
            <div class="carousel-inner" role="listbox">
                @foreach ($testmony as $index => $tes )
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="testimonial4_slide">
                        {{-- <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" /> --}}
                        <p>{!! $tes->comment !!}</p>
                        <h4>{{ $tes->name }} <br>{{ $tes->jobs }}</h4>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</section>


{{-- <!-- testimonials start -->
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
--}}

@endsection

