@extends('user.layout.userLayout')
@section('main')
    <!--Main Layout-->
    <main class="main-user">
    	<div id="data">
    		@include('user/courses/courses')
    	</div>
    </main>
    <!--/.Main Layout-->
    <!-- ajax -->
@endsection
@section('js')
<script type="text/javascript">
	$(document).on('click', '#survey', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.get('{{ URL::to("teacher/result") }}', {id:id}).done(function(data){
			if ($.isEmptyObject(data.errors)) {
                $('#data').empty().html(data);
            } else {
                alert(data.errors);
            }
		}).fail(function(data){
			alert('something error');
		});
	});
</script>
@endsection
<!-- /.ajax -->
