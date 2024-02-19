
@extends('Frontend.layouts.main')
@section('content')
<div class="fag-area pt-100 pb-70 mb-">
    <div class="container">
        <div class="faq-list">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12">
                    <div class="faq-area-title mb-35">
                        <h2 class="mb-15">Frequently Ask Questions :</h2>
                        <p>Will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happi nesso one rejects. </p>
                    </div>
                    <div class="faq-wrapper mb-30 wow fadeInLeft" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                        <div class="accordion" id="accordion">
                            @foreach ($faq as $key =>$fa)
                            <div class="card">
                                <div class="card-header" id="headingOne{{ $key }}">
                                    <h5 class="mb-0">
                                        <button class="btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne{{ $key }}" aria-expanded="false" aria-controls="collapseOne">
                                            <span class="ti-help-alt"></span>
                                            {{ $fa->question }}
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne{{ $key }}" class="collapse " aria-labelledby="headingOne{{ $key }} data-parent="#accordion" style="">
                                    <div class="card-body">
                                      {{ $fa->answer }}
                                    </div>
                                </div>
                            </div>
                            @endforeach



                        </div>
                    </div>
                    <h5>Do You Have Any Questions <a href="route('contact-us')"> <u>Contact Us</u> </a></h5>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- faq end -->
<div class="faq-area-bottom pt-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="faq-area-form">
                    <form>
                        <div class="row">
                           <div class="col-xl-12">
                               <div class="faq-form-title text-center">
                               </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
