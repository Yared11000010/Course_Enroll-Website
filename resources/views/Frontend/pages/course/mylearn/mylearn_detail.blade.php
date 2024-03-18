@extends('Frontend.layouts.main')
@section('content')
<div class="course-details-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12" >
                <div class="single-blog blog-wrapper blog-list blog-details blue-blog mb-40">
                    <div class="single-blog-main-content mb-30">
                        <div class="blog-thumb mb-35">
                            <a href="{{ url('blogs/detail/'.$course->id) }}">
                                <img src="{{ asset('/storage/course/'.$course->image) }}" style="max-height: 350px;" alt="">
                            </a>
                        </div>
                        <div class="blog-content news-content">
                            <div class="blog-meta news-meta">
                                <span>{{ $course->created_at }}</span>
                            </div>
                            <h5><a href="{{ url('blogs/detail/'.$course->id) }}">{{$course->title }}</a></h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video id="player" class="embed-responsive-item" playsinline controls controlsList="nodownload"  data-poster="/path/to/poster.jpg">
                                            <source src="{{ asset('/storage/course/video/'.$course->video) }}" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="gray-color">Course pdf :<br>
                                        <a href="{{ url('view-course-pdf-view/'.$course->course_code) }}" target="_blank" class="btn btn-primary">View PDF</a>
                                    </span>
                                    <br>
                                    Description
                                    <p>
                                        {!! $course->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-xl-4 col-lg-4">
                <div class="courses-details-sidebar-area">
                    <div class="widget mb-40 widget-padding white-bg">
                        <h4 class="widget-title">Course Lesson</h4>
                        <div class="sidebar-rc-post">
                            <ul>
                                @foreach($lessons as $lesson)
                                <li>
                                    <div class="sidebar-rc-post-main-area d-flex mb-20">
                                        <div class="rc-post-thumb">
                                            <a onclick="displayBlogByCategory('{{ $lesson->id }}')" href="" >
                                                <img src="{{ asset('/storage/lesson/'.$lesson->image) }}" style="max-width: 40px; max-height:40px; " alt="">
                                            </a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h4>
                                                <a onclick="displayBlogByCategory('{{ $lesson->id }}')">{{ $lesson->title }}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 " id="lessonlist">
            </div>
        </div>
    </div>
</div>
<script>
    function displayBlogByCategory(id) {
        $.ajax({
            url: '/get-paid-course-lesson/' + id,
            type: 'GET',
            success: function(response) {
                $('#lessonlist').html(response);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
</script>

@endsection


