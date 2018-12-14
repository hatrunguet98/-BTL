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
		$.get('{{ URL::to("student/survey") }}', {id:id}).done(function(data){
			console.log(data);
			$('#data').empty().html(data);
		}).fail(function(data){
			alert('something error');
		});
	});

	/*$(document).on('click','#insert-survey', function(e){
		e.preventDefault();
	})*/
</script>
@endsection

