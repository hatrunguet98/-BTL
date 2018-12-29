@extends('user.layout.userLayout')
<!--Main Layout-->
@section('main')
    <main class="main-user">
    	<div id="data">
    	</div>
    </main>
@endsection
<!--/.Main Layout-->
<!-- ajax -->
@section('js')
<script type="text/javascript">
	$(document).ready(function(e){
		loadCourses();
	})

	$(document).on('click', '#course', function(e){
		loadCourses();
	})

	$(document).on('click', '#survey',function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.get(
			'{{ URL::to("student/survey") }}',
			{id:id}
		).done(function(data){
			if ($.isEmptyObject(data.errors)) {
					$('#data').empty().html(data);
					$('#input-id').val(id);
                } else {
                    alert(data.errors);
                }
		}).fail(function(data){
			alert('something error');
		});
	});

	$(document).on('submit', '#insert-survey', function(e){
		e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        var method = $(this).attr('method');
		$.ajax({
			type : method,
            url : url,
            data : data,
            dataTy : 'json',
            success:function(data) {
            	if ($.isEmptyObject(data.errors)) {
            		alert(data.success);
                } else {
                    alert(data.errors);
                }
            }
		}).fail(function(data) {
            alert('something error');
        });

	})

	/*$(document).on('click','#insert-survey', function(e){
		e.preventDefault();
	})*/

	function loadCourses(){
		$.get(
			'{{ URL::to("courses") }}'
		).done(function(data){
			$('#data').empty().html(data);
		}).fail(function(data){
			alert('something errors');
		});
	}
</script>
@endsection
<!-- /.ajax -->

