@extends('user.layout.userLayout')
@section('main')
    <!--Main Layout-->
    <main class="main-user">
    	<div id="data">
    		
    	</div>
    </main>
@endsection

@section('js')
<script type="text/javascript">
	$(document).on('click', '#survey',function(e){
		e.preventDefault();
		var id = $(this).data('id');
		alert(id);
		$.get('{{ URL::to("student/survey") }}', {id:id}).done(function(data){
			alert('success');
			console.log(data);
			$('#data').empty().html(data);
		}).fail(function(data){
			alert('something error');
		});
	});
</script>
@endsection

