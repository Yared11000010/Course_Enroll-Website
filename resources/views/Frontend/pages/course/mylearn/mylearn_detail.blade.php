
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
                            <h1>{{ $course->title }}</h1>
                        </div>
                        <div class="course-details-tabs">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="course-details-overview-top">
                                        <p class="course-details-overview-para"></p>
                                        <p>{!! $course->description !!}</p>
                                    </div>
                                    <div class="course-details-overview-bottom d-flex justify-content-between mt-25">
                                        <div class="course-overview-info-left">
                                            <div class="course-overview-student-lecture mt-10">
                                                <span class="gray-color">Download course pdf :<br>
                                                @foreach ($course->pdfs as $pdf)
                                                <a href="{{ url('download-file/'.$pdf->file_path) }}" target="_blank">{{ $pdf->file_path }}</a><br>
                                                {{-- <a href="{{ url('show-course-pdf/'.$pdf->id) }}">aksjf</a> --}}
                                                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#pdfModal">
                                                    Open PDF
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="pdfModalLabel">PDF Viewer</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div style="width: 100%; height: 800px;">
                                                                    <iframe src="{{ url('show-course-pdf/'.$pdf->id) }}" width="100%" height="100%" style="border: none;"></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                </span>
                                                <br>
                                                <span class="gray-color">Course Video : <br>
                                                    @foreach ($course->youtubeLinks as $link)
                                                    <a href="{{ $link->youtube_link }}" target="_blank">{{ $link->youtube_link }}</a>
                                                    <x-embed url="{{ $link->youtube_link }}" />
                                                    @endforeach
                                                    </span>
                                               <div class="container">
                                            </div>
                                            </div>
                                            <div class="course-overview-info-advisor mt-10">
                                                <span class="gray-color">Date : <span class="primary-color"> {{ $course->created_at }}</span></span>
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
    </div>
</div>

@endsection
