
@extends('Frontend.layouts.main')
@section('content')


<div class="shop-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            @foreach ($pdf as $book )
            <div class="col-xl-4">
                <div class="shop-inner mb-30 white-bg">
                    <div class="shop-thumb">
                        <a href="{{ url('shop-details/'.$book->id) }}">
                            <img src="{{ asset('/storage/book/'.$book->image) }}" style="max-height: 300px;" alt="book image">
                        </a>
                    </div>
                    <div class="book-inner-content">
                        <div class="sohop-heading mb-20">
                            <h1 class="shop-book-name"><a href="{{ url('shop-details/'.$book->id) }}">{{ $book->title }} <button class=" btn-sm"  style="padding:13px 0px; background-color:#FDC800; border:none;color:black; padding:4px 10px; border-radius:0.3rem;">Free</button></a></h1>
                            <p class="pr-3">
                                <?php
                              $words = str_word_count(strip_tags($book->description), 2);
                              $first20Words = implode(' ', array_slice($words, 0, 10));
                              echo $first20Words . (count($words) > 10 ? '...' : '');
                          ?></p>
                        </div>
                        <div class="shop-inner-details d-flex">

                            <div class="courses-button f-right">
                                <a href="{{ url('free-pdf-detail/'.$book->order_code) }}" type="button" class="px-2" style="padding:13px 0px; background-color:#FDC800; border:none;color:black; border-radius:0.3rem;">
                                    View Details
                                </a>
                            </div>
                    </div>

                </div>
            </div>
            @endforeach
            </div>
</div>
</div>

<script>
    function setCourseId(courseId) {
        document.getElementById("book_id").value = courseId;
    }
</script>
@endsection
