
@extends('Frontend.layouts.main')
@section('content')
<div class="course-details-area gray-bg pt-100">
    <div class="container">
        <div class="row">
            {{-- <div id="courseList"> --}}
            <div class="col-xl-8 col-lg-8" id="courseList">
                <div class="single-course-details-area mb-30">
                    <div class="course-details-thumb">
                        <img src="img/courses/course_details_thumb.jpg" alt="">
                    </div>
                    <div class="single-course-details white-bg">
                        <div class="course-details-title mb-20">
                            <h1>{{ $course->title }}</h1>
                        </div>
                        <div class="course-details-tabs">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="course-details-overview-top">
                                        <p class="course-details-overview-para"></p>
                                        <p>{!! $course->description !!}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        Date : {{ $course->created_at }}
                    </div>
                </div>
            </div>
            {{-- </div> --}}

            <div class="col-xl-4 col-lg-4">
                <div class="courses-details-sidebar-area">

                    <div class="widget mb-40 widget-padding white-bg">
                        <h4 class="widget-title">Category</h4>
                        <div class="widget-link">
                            <ul class="sidebar-link">
                                @foreach ($category as $cate)
                                <li>
                                    <a href="#" onclick="displayCoursesByCategory('{{ $cate->id }}')">{{ $cate->name }}</a>
                                    <span>{{ $cate->courses()->count() }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget mb-40 widget-padding white-bg">
                        <h4 class="widget-title">Recent Course</h4>
                        <div class="sidebar-rc-post">
                            <ul>
                                @foreach ($fivecourse as $course)
                                <li>
                                    <div class="sidebar-rc-post-main-area d-flex mb-20">
                                        <div class="rc-post-thumb">
                                            <a href="blog-details.html">
                                                <img src="img/courses/rcourses_thumb01.png" alt="">
                                            </a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h4>
                                                <a href="{{ url('course/detail/'.$course->course_code) }}">{{ $course->title }}</a>
                                            </h4>
                                            <div class="widget-advisors-name">
                                                <span>Date : <span class="f-500">{{ $course->created_at }}</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- courses start -->
<div class="courses-area courses-bg-height gray-bg pt-60 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="section-title mb-50 text-center">
                    <div class="section-title-heading mb-20">
                        <h1 class="primary-color">Our Latest Courses</h1>
                    </div>
                    <div class="section-title-para">
                        <p>Belis nisl adipiscing sapien sed malesu diame lacus eget erat Cras mollis scelerisqu Nullam arcu liquam here was consequat.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="courses-list">
            <div class="row">
                @foreach ($latestCourse as $latest)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="courses-wrapper courses-wrapper-3 mb-30">
                        <div class="courses-thumb">
                            <img src="img/courses/coursesthumb_home3_01.jpg" alt="">
                        </div>
                        <div class="courses-content clearfix">
                            <div class="courses-heading mt-25 d-flex">
                                <div class="course-title-3">
                                    <h1><a href="{{ url('course/detail/'.$latest->id) }}">{{ $latest->title }}</a></h1>
                                </div>
                                <div class="courses-pricing-3">
                                    <span> {{ $latest->price }} Birr</span>
                                </div>
                            </div>
                            <div class="courses-para mt-15">
                                <p>  <?php
                                    $words = str_word_count(strip_tags($course->description), 2);
                                    $first20Words = implode(' ', array_slice($words, 0, 200));
                                    echo $first20Words . (count($words) > 10 ? '...' : '');
                                ?></p>                            </div>
                            <div class="mt-35">
                                <div class="tex-dark justify-content-between ">
                                    <a href="{{ url('course/detail/'.$latest->course_code) }}" class="text-dark">View Details</a>
                                    &nbsp;
                                    <a href="{{ url('course/detail/'.$latest->course_code) }}" class="px-3 py-2 bg-warning text-dark f-right" style="border-radius: 0.1rem;">Enroll</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="courses-view-more-area mt-20 mb-30 text-center">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="courses-view-more-btn">
                            <a href="{{ route('courses') }}" class="btn gray-border-btn">view more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function displayCoursesByCategory(categoryId) {
        $.ajax({
            url: '/get-courses-by-category/' + categoryId,
            type: 'GET',
            success: function(response) {
                $('#courseList').html(response);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
</script>
@endsection
