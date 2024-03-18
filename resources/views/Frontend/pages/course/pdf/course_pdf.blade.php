
@include('Frontend.layouts.pdf_layouts.css')
<div id="coursePDF" style="height: 95%; width: 95%; margin: auto;"></div>
@include('Frontend.layouts.pdf_layouts.js')
<script type="text/javascript">

	$(function() {
		$("#coursePDF").pdf( {
			source: "{{ url('show-course-pdf/'.$book->id) }}",
		} );
	});

</script>
