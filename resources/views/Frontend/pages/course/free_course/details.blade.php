
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
                        <div class="course-details-tabs">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="course-details-overview-top">
                                        <p class="course-details-overview-para"></p>
                                        <p>{{$cor->description }}</p>
                                    </div>
                                    <div class="course-details-overview-bottom d-flex justify-content-between mt-25">
                                        <div class="course-overview-info-left">
                                            <div class="course-overview-student-lecture mt-10">
                                                <span class="gray-color">Download course pdf :<br>
                                                    @foreach ($cor->pdfs as $pdf)
                                                    <a href="{{ url('download-file/'.$pdf->file_path) }}" target="_blank">{{ $pdf->file_path }}</a><br>
                                                    @endforeach
                                                    </span>
                                                    <br>
                                                    <span class="gray-color">Course Video : <br>
                                                        @foreach ($cor->youtubeLinks as $link)
                                                        <a href="{{ $link->youtube_link }}" target="_blank">{{ $link->youtube_link }}</a>
                                                        <x-embed url="{{ $link->youtube_link }}" />
                                                            @endforeach

                                                        </span>
                                                {{-- <span class="gray-color">Download course pdf :
                                                <a href="{{ url('download-file/'.$cor->pdf_file) }}">{{$cor->pdf_file }}</a>
                                                </span>
                                                <span class="gray-color">Course Video :
                                                    <x-embed url="{{$cor->youtube_link }}" aspect-ratio="22:22" />
                                                </span> --}}
                                               <div class="container">
                                            </div>
                                            </div>
                                            <div class="course-overview-info-advisor mt-10">
                                                <span class="gray-color">Date : <span class="primary-color"> {{$cor->created_at }}</span></span>
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
