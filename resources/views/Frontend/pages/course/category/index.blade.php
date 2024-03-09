@extends('Frontend.layouts.main')

@section('content')
<div class="courses-area courses-bg-height gray-bg pt-100 pb-70">
    <div class="container">
        <h2 class=" text-center">{{ $category->name }}</h2>
        <br>
        <div class="courses-list">
            <div class="row">
                @foreach ($courses as $course)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="courses-wrapper course-radius-none mb-30">
                        <div class="courses-thumb">
                            @if($course->type=="free")
                            <a href="{{ url('free-course-detail/'.$course->course_code) }}">
                                <img src="{{ asset('/storage/course/'.$course->image) }}" style="max-height: 300px; max-width:370px;"  alt="">
                            </a>
                            @endif
                            @if($course->type=="paid")
                            <a href="{{ url('course/detail/'.$course->course_code) }}">
                                <img src="{{ asset('/storage/course/'.$course->image) }}" style="max-height: 300px; max-width:370px;"  alt="">
                            </a>
                            @endif
                        </div>
                        <div class="courses-author">
                            <img src="img/courses/coursesauthor1.png" alt="">
                        </div>
                        <div class="course-main-content clearfix">
                            <div class="courses-content">
                                <div class="courses-category-name">
                                    <span>
                                        <a href="javascript:void(0);">{{ $course->category->name }}</a>
                                    </span>
                                </div>
                                <div class="courses-heading">
                                    <h1>
                                        @if($course->type=="paid")
                                        <a href="{{ url('free-course-detail/'.$course->course_code) }}">{{ $course->title }}</a>
                                        @endif
                                        @if($course->type=="paid")
                                        <a href="{{ url('course/enroll/'.$course->course_code) }}">{{ $course->title }}</a>
                                        @endif
                                    </h1>
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
                            @if($course->type=="free")
                            <div class="courses-icon d-flex f-left">
                                <div class="courses-single-icon">
                                    <a href="javascript:void(0);" style="color:white;">  <span class=""" style="height: 20px; background-color:rgb(33, 21, 96); border-radius:0.2rem; padding:9px 20px;">FREE</span></a>
                                </div>
                            </div>
                            @endif
                            @if($course->type=="paid")
                            <div class="courses-icon d-flex f-left">
                                <div class="courses-single-icon">
                                    <a href="{{ url('course/enroll/'.$course->course_code) }}" style="color:white;">  <span class=""" style="height: 20px; background-color:rgb(33, 21, 96); border-radius:0.2rem; padding:9px 20px;">Enroll</span></a>
                                </div>
                            </div>
                            @endif

                            @if($course->type=="paid")
                            <div class="courses-button f-right">
                                <a href="{{ url('course/detail/'.$course->course_code) }}">View Details</a>
                            </div>
                            @endif
                            @if($course->type=="free")
                            <div class="courses-button f-right">
                                <a href="{{ url('free-course-detail/'.$course->course_code) }}">View Details</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
