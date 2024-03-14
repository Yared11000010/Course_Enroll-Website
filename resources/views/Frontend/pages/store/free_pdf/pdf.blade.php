<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  {{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css"> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.489/pdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.489/pdf.worker.js"></script>
  <link rel="stylesheet" href="{{ asset('frontend/css/pdf.css') }}">
  <script src="{{ asset('frontend/js/easyPDF.js') }}"></script>
  @include('Frontend.layouts.css')
  <style>
    body,
    * {
      font-family: 'Roboto';
    }

    ui-corner-all {
      width: 1220px !important;
    }

    body {
      -webkit-user-select: none;
      /* Chrome all / Safari all */
      -moz-user-select: none;
      /* Firefox all */
      -ms-user-select: none;
      /* IE 10+ */
      -o-user-select: none;
      user-select: none;
    }
  </style>
</head>

<body>
    <button id="pdf" style="background-color:#FDC800; color:black; padding:15px 30px;margin:5px; border:none; border-radius:0.2rem;font-size:20px;">View PDF</button>

  <div class="jquery-script-ads" style="margin:30px auto">
    <script type="text/javascript">
      google_ad_client = "ca-pub-2783044520727903";
      /* jQuery_demo */
      google_ad_slot = "2780937993";
      google_ad_width = 728;
      google_ad_height = 90;
    </script>
    <script type="text/javascript" src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>

  </div>
  <div id="content"></div>
  <script>
    $('#pdf').click(function () {
      base = '{{$book->pdf_file}}';
      easyPDF(base, "syamartm.com")
    });
  </script>

  <script>
    jQuery(document).ready(function () {
      jQuery(function () {
        jQuery(this).bind("contextmenu", function (event) {
          event.preventDefault();
        });
      });
    });
  </script>
</body>

</html>
