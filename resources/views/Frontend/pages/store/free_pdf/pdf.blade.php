
@include('Frontend.layouts.pdf_layouts.css')
<div id="myPDF" style="height: 95%; width: 95%; margin: auto;"></div>
@include('Frontend.layouts.pdf_layouts.js')
<script type="text/javascript">

	$(function() {
		$("#myPDF").pdf( {
			source: "{{ url('pdf/'.$book->id) }}",
		} );
	});

</script>
