@extends('Frontend.layouts.main')
@section('content')
<div class="course-details-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12" >
                <div class="single-blog blog-wrapper blog-list blog-details blue-blog mb-40">
                    <div class="single-blog-main-content mb-30">
                        <div class="blog-thumb mb-35">
                            <a href="javascirpt:void(0);">
                                <img src="{{ asset('/storage/course/'.$cor->image) }}" style="max-height: 350px;" alt="">
                            </a>
                        </div>
                        <div class="blog-content news-content">
                            <div class="blog-meta news-meta">
                                <span>{{ $cor->created_at }}</span>
                            </div>
                            <h5><a href="javascirpt:void(0);">{{$cor->title }}</a></h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video id="player" class="embed-responsive-item" playsinline controls controlsList="nodownload"  data-poster="/path/to/poster.jpg">
                                            <source src="{{ asset('/storage/course/video/'.$cor->video) }}" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    Description
                                    <p>
                                        {!! $cor->description !!}
                                    </p>
                                    <span class="gray-color">Course pdf :<br>
                                        <a href="{{ url('view-course-pdf-view/'.$cor->course_code) }}" target="_blank" class="btn btn-primary">View PDF</a>
                                    </span>
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
    // Get the video element and the source element
    var video = document.getElementById('myVideo');
    // Set the source URL dynamically
    var videoUrl = '{{ $cor->video }}';
    // Set the src attribute with base64 data
    video.src = 'data:video/mp4;base64,' + videoUrl;
</script>
<script>
    function displayBlogByCategory(id) {
        $.ajax({
            url: '/get-free-course-lesson/' + id,
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





{{--
@extends('Frontend.layouts.main')
@section('content')
<div class="course-details-area gray-bg pt-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="single-course-details-area mb-30">
                    <div class="course-details-thumb">
                        <img src="img/courses/course_details_thumb.jpg" alt="">
                    </div>
                    <div class="single-course-details white-bg">
                        <div class="course-details-title mb-20">
                            <h1>{{$cor->title }}</h1>
                        </div>
                        <div class="courses-thumb">
                            <a href="javascript:void(0);">
                                <img src="{{ asset('/storage/course/'.$cor->image) }}" style="max-height: 300px; max-width:100%;"  alt="">
                            </a>
                        </div>
                        <div class="course-details-tabs">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="course-details-overview-top">
                                        <p class="course-details-overview-para"></p>
                                        <p>{!! $cor->description !!}</p>
                                    </div>
                                    <div class="course-details-overview-bottom d-flex justify-content-between mt-25">
                                        <div class="course-overview-info-left">
                                            <div class="course-overview-student-lecture mt-10">
                                                <span class="gray-color">Course pdf :<br>
                                                        <a href="javascript:void(0);">{{$cor->pdf_file }}</a>
                                                        </span>
                                                    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#coursepdfModal">
                                                        Open PDF
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="coursepdfModal" tabindex="-1" role="dialog" aria-labelledby="coursepdfModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="coursepdfModalLabel">PDF Viewer</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div style="width: 100%; height: 800px;">
                                                                        <iframe src="{{ url('show-course-pdf/'.$cor->id) }}" width="100%" height="100%" style="border: none;"></iframe>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($cor->video)
                        <div class="row">
                             <div class="col-md-12">
                              <span class="gray-color">Course Video : <br></span>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <video id="player" class="embed-responsive-item" playsinline controls data-poster="/path/to/poster.jpg">
                                        <source src="{{ asset('/storage/course/video/'.$cor->video) }}" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="course-overview-info-advisor mt-10">
                          <span class="gray-color">Date : <span class="primary-color"> {{$cor->created_at }}</span></span>
                       </div>

                       <div class="row">
                        <div class="col-md-12">
                            <div class="course-details-title mb-20">
                                <h1>Course Lesson</h1>
                            </div>
                            @foreach($lessons as $lesson)
                            <div class="single-course-details white-bg">
                                <div class="course-details-title mb-20">
                                    <h1>{{$lesson->title }}</h1>
                                </div>
                                <div class="courses-thumb">
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('/storage/lesson/'.$lesson->image) }}" style="max-height: 300px; max-width:100%;"  alt="">
                                    </a>
                                </div>
                                <div class="course-details-tabs">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            <div class="course-details-overview-top">
                                                <p class="course-details-overview-para"></p>
                                                <p>{!! $lesson->description !!}</p>
                                            </div>
                                            <div class="course-details-overview-bottom d-flex justify-content-between mt-25">
                                                <div class="course-overview-info-left">
                                                    <div class="course-overview-student-lecture mt-10">
                                                        <span class="gray-color">course pdf :<br>
                                                            <a href="javacript:void(0);">{{ $lesson->pdf_file }}</a><br>
                                                        </span>
                                                     <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#lessonPdf{{ $lesson->id }}">
                                                        Open PDF
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="lessonPdf{{ $lesson->id }}" tabindex="-1" role="dialog" aria-labelledby="lessonPdfLabel{{ $lesson->id }}" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="lessonPdfLabel{{ $lesson->id }}">PDF Viewer</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div style="width: 100%; height: 800px;">
                                                                        <iframe src="{{ url('show-lesson-pdf/'.$lesson->id) }}" width="100%" height="100%" style="border: none;"></iframe>
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
                                    @if($lesson->video)
                                    <div class="row">
                                        <div class="col-md-12">
                                        <span class="gray-color">Lesson Video : <br></span>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <video id="player" class="embed-responsive-item" playsinline controls data-poster="/path/to/poster.jpg">
                                                    <source src="{{ asset('/storage/lesson/video/'.$lesson->video) }}" type="video/mp4" />
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            <div class="row">
                                <div class="col-xl-12">
                                    <nav class="course-pagination mt-10 mb-30" aria-label="Page navigation example">
                                       {{ $lessons->links() }}
                                    </nav>
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

@endsection --}}
