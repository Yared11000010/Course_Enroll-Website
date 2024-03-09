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
