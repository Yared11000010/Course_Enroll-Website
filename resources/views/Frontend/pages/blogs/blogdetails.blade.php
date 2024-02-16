
@extends('Frontend.layouts.main')
@section('content')
<div class="course-details-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <div class="blog-wrapper blog-list blog-details blue-blog mb-50">
                    <div class="blog-thumb mb-35">
                        <img src="{{ asset('/storage/blog/'.$blogs->image) }}" alt=""></a>
                    </div>
                    <div class="blog-content news-content">
                        <div class="blog-meta news-meta">
                            <span>{{ $blogs->created_at }}</span>
                        </div>
                        <h5>{{ $blogs->title }}</h5>
                        <p>{!!$blogs->description !!}</p>

                        <div class="blog-wrapper-footer">
                            <div class="news-wrapper-tags">
                                <div class="row">

                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="new-post-tag news-share-icon text-left text-md-right">
                                            <span>Share</span>
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a class="twitter" href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                            <a class="dribble" href="#">
                                                <i class="fab fa-dribbble"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="post-comments post-comments-padding white-bg mt-70 mb-30">
                    <div class="section-title mb-20">
                        <h2>Comments ({{ $count_blog_comment }})</h2>
                    </div>
                    <div class="latest-comments">
                        <ul>
                            <li>
                                @foreach ($blog_comment as $comment )
                                <div class="comments-box main-comments d-flex">
                                    <div class="comments-avatar">
                                        <img src="img/comments/comments_01.png" alt="">
                                    </div>
                                    <div class="comments-text">
                                        <div class="avatar-name">
                                            <h5>{{ $comment->fullname }}</h5>
                                        </div>
                                        <p>{{ $comment->comment }}</p>
                                        <a href="#">Reply</a>
                                    </div>
                                </div>
                                @endforeach
                                {{-- <ul class="comments-reply">
                                    <li>
                                        <div class="comments-box d-flex">
                                            <div class="comments-avatar">
                                                <img src="img/comments/comments_02.png" alt="">
                                            </div>
                                            <div class="comments-text">
                                                <div class="avatar-name">
                                                    <h5>Angelina</h5>
                                                </div>
                                                <p>Norem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore worth.</p>
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul> --}}
                            </li>

                        </ul>
                    </div>
                    <div class="post-comments-form">
                        <div class="section-title mb-30">
                            <h2>Leave a Reply</h2>
                        </div>
                        <form action="{{ route('send_comment') }}" method="POST">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id" value="{{ $blogs->id }}">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <input type="text" placeholder="Your Name" name="name">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <input type="text" placeholder="Your Email" name="email">
                                </div>
                                <div class="col-xl-12">
                                    <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Your Comments"></textarea>
                                    <button class="btn blue-bg" type="submit">send comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="courses-details-sidebar-area">
                    <div class="widget mb-40 white-bg">
                        <div class="sidebar-form">
                            <form action="#">
                                <input placeholder="Search course" type="text">
                                <button type="submit">
                                    <i class="ti-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="widget mb-40 widget-padding white-bg">
                        <h4 class="widget-title">Category</h4>
                        <div class="widget-link">
                            <ul class="sidebar-link">
                                <li>
                                    <a href="#">Busines Studies</a>
                                    <span>05</span>
                                </li>
                                <li>
                                    <a href="#">CSE Engineering</a>
                                    <span>07</span>
                                </li>
                                <li>
                                    <a href="#">Lerning English</a>
                                    <span>03</span>
                                </li>
                                <li>
                                    <a href="#">Civil Engineering</a>
                                    <span>05</span>
                                </li>
                                <li>
                                    <a href="#">Islamic Studies</a>
                                    <span>02</span>
                                </li>
                                <li>
                                    <a href="#">Banking Management</a>
                                    <span>09</span>
                                </li>
                                <li>
                                    <a href="#">Social Science</a>
                                    <span>13</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget mb-40 widget-padding white-bg">
                        <h4 class="widget-title">Recent Course</h4>
                        <div class="sidebar-rc-post">
                            <ul>
                                <li>
                                    <div class="sidebar-rc-post-main-area d-flex mb-20">
                                        <div class="rc-post-thumb">
                                            <a href="course_details.html">
                                                <img src="img/courses/rcourses_thumb01.png" alt="">
                                            </a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h4>
                                                <a href="course_details.html">How to design mobile apps with full resposibe layout</a>
                                            </h4>
                                            <div class="widget-advisors-name">
                                                <span>Advisor : <span class="f-500">Marcelo</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-rc-post-main-area d-flex mb-20">
                                        <div class="rc-post-thumb">
                                            <a href="course_details.html">
                                                <img src="img/courses/rcourses_thumb02.png" alt="">
                                            </a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h4>
                                                <a href="course_details.html">How to design mobile apps with full resposibe layout</a>
                                            </h4>
                                            <div class="widget-advisors-name">
                                                <span>Advisor : <span class="f-500">Marcelo</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-rc-post-main-area d-flex mb-20">
                                        <div class="rc-post-thumb">
                                            <a href="course_details.html">
                                                <img src="img/courses/rcourses_thumb03.png" alt="">
                                            </a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h4>
                                                <a href="course_details.html">How to design mobile apps with full resposibe layout</a>
                                            </h4>
                                            <div class="widget-advisors-name">
                                                <span>Advisor : <span class="f-500">Marcelo</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-rc-post-main-area d-flex">
                                        <div class="rc-post-thumb">
                                            <a href="course_details.html">
                                                <img src="img/courses/rcourses_thumb04.png" alt="">
                                            </a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h4>
                                                <a href="course_details.html">How to design mobile apps with full resposibe layout</a>
                                            </h4>
                                            <div class="widget-advisors-name">
                                                <span>Advisor : <span class="f-500">Marcelo</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget mb-40 widget-padding white-bg">
                        <h4 class="widget-title">Recent Course</h4>
                        <div class="widget-tags clearfix">
                            <ul class="sidebar-tad clearfix">
                                <li>
                                    <a href="#">CSE</a>
                                </li>
                                <li>
                                    <a href="#">Business</a>
                                </li>
                                <li>
                                    <a href="#">Study</a>
                                </li>
                                <li>
                                    <a href="#">English</a>
                                </li>
                                <li>
                                    <a href="#">Education</a>
                                </li>
                                <li>
                                    <a href="#">Engineering</a>
                                </li>
                                <li>
                                    <a href="#">Advisor</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget mb-40 widget-padding banner-padding white-bg">
                        <div class="banner-thumb pos-relative">
                            <img src="img/courses/course_banner_01.png" alt="">
                            <div class="bannger-text">
                                <h2>New eBook are availablei our shop</h2>
                                <div class="banner-btn">
                                    <button class="btn white-bg-btn">shop now</button>
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
