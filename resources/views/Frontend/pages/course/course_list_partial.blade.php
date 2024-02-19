    {{-- @if(isempty($courses)) --}}
    @foreach ($courses as $course )
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
                            <p>{{ $course->description }}</p>
                        </div>

                    </div>
                </div>
            </div>
            Date : {{ $course->created_at }}
        </div>
    </div>
    @endforeach
 {{-- @else

 <h3>Not foud</h3>
 @endif --}}
