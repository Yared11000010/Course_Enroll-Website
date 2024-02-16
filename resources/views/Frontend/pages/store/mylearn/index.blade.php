
@extends('Frontend.layouts.main')
@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send your payment receipt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('check-book-order-transactions') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="book_id" id="book_id">
                    {{-- <div class="form-group">
                        <label for="">Enter Payment Reference Number</label>
                        <input type="text" class="form-control" name="reference" id="" placeholder="Enter reference number">
                    </div> --}}
                    <div class="form-group">
                        <label for="image">Attach Payment Receipt</label>
                        <input type="file" class="form-control" name="image" id="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Check</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="shop-area gray-bg pt-100 pb-70">
    <div class="container">
        <div class="row">
            @foreach ($enrolled_pdfs as $book )
            <div class="col-xl-4">
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
                            <div class="book-price text-right">
                                @php
                                $order = App\Models\PdfOrder::where('user_id', Auth::user()->id)
                                        ->where('pdf_id', $book->id)
                                        ->first();
                                 @endphp
                                @if ($order && $order->status !== "paid")
                                    <div class="courses-button f-left">
                                        <button type="button" class="py-2 px-2" style="background-color:#FDC800; border:none;color:black; border-radius:0.3rem;" data-toggle="modal" data-target="#exampleModal" onclick="setCourseId({{ $book->id }})">
                                            Verify your payment
                                        </button>
                                    </div>
                                @endif

                                @if ($order && $order->status === "paid")
                                <!-- Button to trigger the modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pdfModal">
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
                                            <div class="modal-body" >
                                                <div id="pdf-viewer"  style="width: 100%; height:600px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <a href="{{ route('pdf.show', ['id' => $book->id]) }}" target="_blank">View PDF</a>

                                    <div class="courses-button f-right">
                                        <a href="{{ url('my-pdf/'.$book->order_code) }}" type="button" class="px-2" style="padding:13px 0px; background-color:#FDC800; border:none;color:black; border-radius:0.3rem;">
                                            View Details
                                        </a>
                                    </div> --}}
                                @endif
                    </div>
                </div>
            </div>
        </div>
            </div>
            @endforeach
            </div>
</div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.3.0/pdfobject.min.js"></script>
<script src="sha512-P5CZHP7ONr+ivoaV0K5CRpUjuIJjg2OQ2lZ5edi+efrFxjCxqvMQOe3US8NcXc/ceVt3/ntx7FaWhCFtnF+1Wg=="></script>
<style>
    #toolbar {
      position: fixed;
      width: 100%;
      z-index: 4;
      display:none;
      /* This prevents touch actions done over toolbar (or any child elements such
      as flyouts/overflow menu) from scrolling/zooming the PDF content. */
      touch-action: none;
    }

    </style>
<script>
    const options = {
    pdfOpenParams: {
        view: "FitV",
        toolbar: 0 // Hide toolbar
    }
};
    PDFObject.embed("{{ route('pdf.show', ['id' => 4]) }}", "#pdf-viewer",options);
    document.getElementById("pdfViewer").addEventListener('contextmenu', event => event.preventDefault());

</script>
<script>
    function setCourseId(courseId) {
        document.getElementById("book_id").value = courseId;
    }
</script>
@endsection
