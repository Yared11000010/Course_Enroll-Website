@extends('Frontend.layouts.main')

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send your payment receipt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('check-transactions') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="course_id" id="course_id">
                    {{-- <div class="form-group">
                        <label for="">Enter Payment Reference Number</label>
                        <input type="text" class="form-control" name="reference" id="" placeholder="Enter reference number">
                    </div> --}}
                    <div class="form-group">
                        <label for="image">Attach Payment Receipt</label>
                        <input type="file" class="form-control" name="image" id="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Check</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="courses-area courses-bg-height gray-bg pt-100 pb-70">
    <div class="container">
        <div class="courses-list">
            <div class="row">
                @foreach ($enrolled_courses as $course)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="courses-wrapper course-radius-none mb-30">
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
                                        <a href="javascript:void(0);">{{ $course->category->name }}</a>
                                    </span>
                                </div>
                                <div class="courses-heading">
                                    <h1><a href="course_details.html">{{ $course->title }}</a></h1>
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

                          @php
                          $order = App\Models\Order::where('user_id', Auth::user()->id)
                                                    ->where('course_id', $course->id)
                                                    ->first();
                           @endphp
                        <div class="courses-wrapper-bottom clearfix">
                            @if ($order && $order->status !== "paid")
                            <div class="courses-button f-left">
                                <button type="button" class="py-2 px-2" style="background-color:#FDC800; border:none;color:black; border-radius:0.3rem;" data-toggle="modal" data-target="#exampleModal" onclick="setCourseId({{ $course->id }})">
                                    Verify your payment
                                </button>
                            </div>
                        @endif
                        @if ($order && $order->status === "paid")
                            <div class="courses-button f-right">
                                <a href="{{ url('my-learn/course/'.$course->course_code) }}" type="button" class="px-2" style="padding:13px 0px; background-color:#FDC800; border:none;color:black; border-radius:0.3rem;">
                                    View Details
                                </a>
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

<script>
    function setCourseId(courseId) {
        document.getElementById("course_id").value = courseId;
    }
</script>

@endsection

