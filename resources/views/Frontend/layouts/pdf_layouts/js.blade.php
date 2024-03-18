
<script type="text/javascript" src="{{ asset('pdf/pdf.compatibility.js') }}"></script>
<script type="text/javascript" src="{{ asset('pdf/pdf.js') }}"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('pdf/jquery.touchSwipe.js') }}"></script>
<script type="text/javascript" src="{{ asset('pdf/jquery.touchPDF.js') }}"></script>
<script type="text/javascript" src="{{ asset('pdf/jquery.panzoom.js') }}"></script>
<script type="text/javascript" src="{{ asset('pdf/jquery.mousewheel.js') }}"></script>


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
