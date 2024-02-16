
@extends('Frontend.layouts.main')
@section('content')
<div class="shop-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            @foreach ($books as $book )
            <div class="col-xl-3">
                <div class="shop-inner mb-30 white-bg">
                    <div class="shop-thumb">
                        <a href="{{ url('shop-details/'.$book->id) }}">
                            <img src="{{ asset('/storage/book/'.$book->image) }}" style="max-height: 300px;" alt="book image">
                        </a>
                    </div>
                    <div class="book-inner-content">
                        <div class="sohop-heading mb-20">
                            <h1 class="shop-book-name"><a href="{{ url('shop-details/'.$book->id) }}">{{ $book->title }}</a></h1>
                            <p>  <?php
                                $words = str_word_count(strip_tags($book->description), 2);
                                $first20Words = implode(' ', array_slice($words, 0, 10));
                                echo $first20Words . (count($words) > 10 ? '...' : '');
                            ?></p>
                        </div>
                        <div class="shop-inner-details d-flex">
                            <div class="book-price">
                                <span class="price">Price</span>
                                <span class="user-number">$ {{ $book->price }}</span>
                            </div>
                            <div class="book-ratings text-right">
                                <ul>
                                    <li><a href="{{ url('enroll-book/'.$book->order_code) }}" class="" style="background-color: #FDC800;color:black;padding:8px 18px;">Enroll</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            </div>
</div>
</div>
@endsection
