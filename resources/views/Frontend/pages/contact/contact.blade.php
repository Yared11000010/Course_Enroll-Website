@extends('Frontend.layouts.main')
@section('content')
<div class="advisors-area gray-bg pt-95 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 offset-md-1 ml-md-auto">
                <div class="contact-info-text">
                    <div class="section-title mb-20">
                        <div class="section-title-heading mb-10">
                            <h1>Contact Info</h1>
                        </div>
                        <div class="section-title-para">
                            <p>Lorem ipsum dolor sit amet, consecte adipisicing elit sed do eiusmod tempor incididunt.</p>
                        </div>
                    </div>
                </div>
                <div class="contact-info mb-50 wow fadeInRight" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                    <ul>
                        <li>
                            <div class="contact-icon">
                                <i class="ti-headphone"></i>
                            </div>
                            <div class="contact-text">
                                <h5>Call Us</h5>
                                <span>+251911262107</span>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="contact-text">
                                <h5>Email Us</h5>
                                <span>Atsbehateklu166@Gmail.Com</span>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="contact-text">
                                <h5>Location Address : Adiss Ababa, Ethiopia</h5>
                                <span>
                                Bole Subcity, Around 22 Tsega Business Center</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-10 offset-md-1 ml-md-auto">
                <div class="events-details-form faq-area-form mb-30 p-0">
                    <form action="{{ route('store-contact') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="events-form-title mb-25">
                                    <h2>Do You Have Any Questions</h2>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <input placeholder="Name :" type="text" name="name" >
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <input placeholder="Email :" type="text"  name="email">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <input placeholder="Subject :" type="text" name="subject" >
                            </div>

                            <div class="col-xl-12">
                                <textarea cols="30" rows="10" name="message" placeholder="Message :"></textarea>
                            </div>
                            <div class="col-xl-12">
                                <div class="faq-form-btn events-form-btn">
                                    <button type="submit" class="btn m-0">submit now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- courses end -->
<!-- map start -->
<div class="map-area" style="background-image: url('{{ asset('frontend/img/map/contact_us_map.jpg') }}'); height: 700px;">

</div>
@endsection
