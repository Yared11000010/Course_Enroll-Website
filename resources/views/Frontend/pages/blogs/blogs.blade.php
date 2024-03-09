@extends('Frontend.layouts.main')
@section('content')
<div class="course-details-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 " id="bloglist">
                @foreach ($blogs as  $blog)
                <div class="single-blog blog-wrapper blog-list blog-details blue-blog mb-40">
                    <div class="single-blog-main-content mb-30">
                        <div class="blog-thumb mb-35">
                            <a href="{{ url('blogs/detail/'.$blog->id) }}">
                                <img src="{{ asset('/storage/blog/'.$blog->image) }}" alt=""></a>
                        </div>
                        <div class="blog-content news-content">
                            <div class="blog-meta news-meta">
                                <span>{{ $blog->created_at }}</span>
                            </div>
                            <h5><a href="{{ url('blogs/detail/'.$blog->id) }}">{{$blog->title }}</a></h5>
                            <p>
                                <?php
                                $words = str_word_count(strip_tags($blog->description), 2);
                                $first20Words = implode(' ', array_slice($words, 0, 200));
                                echo $first20Words . (count($words) > 20 ? '...' : '');
                            ?>
                            </p>
                            <a href="{{ url('blogs/detail/'.$blog->id) }}" class="blog-read-more-btn">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="row">
                    <div class="col-xl-12">
                        <nav class="course-pagination mt-10 mb-30" aria-label="Page navigation example">
                           {{ $blogs->links() }}
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4">
                <div class="courses-details-sidebar-area">
                    <div class="widget mb-40 white-bg">
                        <div class="sidebar-form">
                            <form id="searchForm" action="#" method="POST">
                                <input id="searchInput" placeholder="Search course" type="text">
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
                                @foreach ($blog_category as $category )
                                <li>
                                    <a href="#" onclick="displayBlogByCategory('{{ $category->id }}')">{{ $category->name }}</a>
                                    <span>{{ $category->blogs()->count() }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget mb-40 widget-padding white-bg">
                        <h4 class="widget-title">Recent Posts</h4>
                        <div class="sidebar-rc-post">
                            <ul>
                                @foreach ($latestFiveBlogs as $latest )
                                <li>
                                    <div class="sidebar-rc-post-main-area d-flex mb-20">
                                        <div class="rc-post-thumb">
                                            <a href="{{ url('blogs/detail/'.$latest->id) }}">
                                                <img src="{{ asset('/storage/blog/'.$latest->image) }}" style="max-width: 40px; max-height:40px; " alt="">
                                            </a>
                                        </div>
                                        <div class="rc-post-content">
                                            <h4>
                                                <a href="{{ url('blogs/detail/'.$latest->id) }}">{{ $latest->title }}</a>
                                            </h4>
                                            <div class="widget-advisors-name">
                                                <span>added by : <span class="f-500">{{ $latest->added_by }}</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="widget mb-40 widget-padding white-bg">
                        <h4 class="widget-title">Recent Course</h4>
                        <div class="widget-tags clearfix">
                            <ul class="sidebar-tad clearfix">
                                @foreach ($latestCourse as $course )
                                <li >
                                    <a href="{{ url('course/detail/'.$course->course_code) }}" style="width: 100%">{{ $course->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget mb-40 widget-padding banner-padding white-bg">
                        <div class="banner-thumb pos-relative">
                            <img src="img/courses/course_banner_01.png" alt="">
                            <div class="bannger-text">
                                <h2 class="text-dark">New eBook are avalible in our shop</h2>
                                <div class="banner-btn">
                                    <a href="{{ route('shop') }}" class="btn white-bg-btn">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function displayBlogByCategory(categoryId) {
        $.ajax({
            url: '/get-blog-by-category/' + categoryId,
            type: 'GET',
            success: function(response) {
                $('#bloglist').html(response);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#searchForm').submit(function(event) {
            event.preventDefault(); // Prevent form submission

            var query = $('#searchInput').val(); // Get the search query

            $.ajax({
                url: "{{ route('search') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    query: query
                },
                success: function(response) {
                    // Handle the search results
                    $('#bloglist').html(response);
                }
            });
        });
    });
</script>
@endsection
