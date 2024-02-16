
@extends('Frontend.layouts.main')
@section('content')
<div class="shop-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <div class="shop-inner mb-30 white-bg">
                    <div class="shop-thumb">
                        <a href="shop_pages.html">
                            <img src="{{ asset('/storage/book/'.$book->image) }}" style="max-height: 300px;" alt="book image">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="book-inner-content">
                    <div class="sohop-heading mb-20">
                        <h1 class="shop-book-name"><a href="shop_pages.html">{{ $book->title }}</a></h1>
                        <p>
                            {{ $book->description }}
                        </p>
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
</div>
</div>
@endsection
