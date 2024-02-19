
@extends('Frontend.layouts.main')
@section('content')
<div class="shop-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <div class="shop-inner mb-30 white-bg">
                    <div class="shop-thumb">
                        <a href="shop_pages.html">
                            <img src="{{ asset('/storage/book/'.$pdf->image) }}" style="max-height: 300px;" alt="book image">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="book-inner-content">
                    <div class="sohop-heading mb-20">
                        <h1 class="shop-book-name"><a href="shop_pages.html">{{ $pdf->title }}</a></h1>
                        <p>
                            {!! $pdf->description !!}
                        </p>
                    </div>
                    <div class="shop-inner-details d-flex">
                      &nbsp;
                    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#pdfModal">
                        Open PDF
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="pdfModalLabel">PDF Viewer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div style="width: 100%; height: 800px;">
                                        <iframe src="{{ route('pdf.show', ['id' => $pdf->id]) }}" width="100%" height="100%" style="border: none;"></iframe>
                                    </div>
                                </div>
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
