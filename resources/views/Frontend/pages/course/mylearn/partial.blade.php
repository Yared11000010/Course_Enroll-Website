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
                                <span class="gray-color">Course pdf :<br>
                                    <a href="{{ url('view-lesson-pdf-view/'.$lesson->lesson_code) }}" target="_blank" class="btn btn-primary">View PDF</a>
                                </span>
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
                    <video id="player" class="embed-responsive-item" playsinline controls controlsList="nodownload"  data-poster="/path/to/poster.jpg">
                        <source src="{{ asset('/storage/lesson/video/'.$lesson->video) }}" type="video/mp4" />
                    </video>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
