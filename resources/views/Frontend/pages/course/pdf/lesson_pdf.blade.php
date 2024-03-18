
@include('Frontend.layouts.pdf_layouts.css')
<div id="lessonPDF" style="height: 95%; width: 95%; margin: auto;"></div>
@include('Frontend.layouts.pdf_layouts.js')
<script type="text/javascript">

	$(function() {
		$("#lessonPDF").pdf( {
			source: "{{ url('show-lesson-pdf/'.$book->id) }}",
		} );
	});

</script>
