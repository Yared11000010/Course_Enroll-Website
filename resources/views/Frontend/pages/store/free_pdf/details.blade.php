@extends('Frontend.layouts.main')
@section('content')
<div class="shop-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <div class="shop-inner mb-30 white-bg">
                    <div class="shop-thumb">
                        <a href="javascript:void(0);">
                            <img src="{{ asset('/storage/book/'.$pdf->image) }}" style="max-height: 300px;"
                                alt="book image">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="book-inner-content">
                    <div class="sohop-heading mb-20">
                        <h1 class="shop-book-name"><a href="javascript:void(0);">{{ $pdf->title }}</a></h1>
                        <p>
                            {!! $pdf->description !!}
                        </p>
                    </div>
                    <div class="shop-inner-details d-flex">

                        <div class="book-price">
                            <span class="price">Price</span>
                            <span class="user-number">FREE</span>
                        </div>
                        &nbsp;
                    </div>
                    <br>
                        <a href="{{ url('free-pdf-view/'.$pdf->order_code) }}"  class="btn btn-primary" target="_blank">Open PDF</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
