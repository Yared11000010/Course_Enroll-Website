@extends('Frontend.layouts.main')
@section('content')
<div id="about" class="about-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-10">
                <div class="about-img mb-55">
                    <img src="img/about/about_details_left_img.jpg" alt="">
                </div>
                <div class="about-title-section about-title-section-2 mb-30">
                    <h1>{{ $about_us->title }}</h1>
                    <p>{{ $about_us->description }}</p>
                </div>
            </div>

        </div>
        <div class="row mt-60">
            <div class="col-xl-12">
                <div class="university-banner mb-30">
                    <img src="img/about/university.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
