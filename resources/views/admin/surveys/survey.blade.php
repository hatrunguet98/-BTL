@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách đánh giá</h1>
@endsection

@section('content')
    <div class="main-button">
        <a class="btn btn-vimeo" href="{{ asset('generate') }}">Tạo đánh giá chung</a>
    </div>

    <div class="main-button2">
        <a class="btn btn-vimeo" href="{{ asset('survey/set-default') }}">Cài đặt mặc định</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th style="width:15%;text-align: center"><i class="fa fa-cog" aria-hidden="true"></i></th>
            <th style="width:30%;text-align: center">Title</th>
            <th style="width:15%;text-align: center">Code</th>
            <th style="width:20%;text-align: center">Start</th>
            <th style="width:20%;text-align: center">Finish</th>
        </tr>
        </thead>
        <tbody id="table">
            
        </tbody>
    </table>
    <div id="data">
    </div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        autoload();
    })    

    $(document).on('click','#show', function(e){
        var id = $(this).data('id');
        $.get(
            '{{ URL::to("view-survey") }}',
            {id:id},
        ).done(function(data){
            $('#data').empty().html(data);
            $('#showSurvey').modal('show');
        }).fail(function(data){
            alert('errors');
        });
    });

    $(document).on('click','#edit', function(e){
        var id = $(this).data('id');
        $.get(
            '{{ URL::to("edit-survey") }}',
            {
                id:id,
            },
        ).done(function(data){
            $('#data').empty().html(data);
            $('#editSurvey').modal('show');
        }).fail(function(data){
            alert('errors');
        });
    })

    $(document).on('submit','#submitEdit', function(e){
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
                    alert('success');
                    $('#table').empty().html(data);
                    $('#editSurvey').modal('hide')
                } else {
                    msgError(data.errors);
                }
            }
        }).fail(function(data) {
            alert('something error')
        });
    })

    $(document).on('click', '#delete', function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if(confirm('Are you sure?')){
            var id = $(this).data('id');
            $.post('{{URL::to("survey/delete")}}',{id:id}, function(data){
                if ($.isEmptyObject(data.errors)) {
                    $('#list'+id).remove();
                    alert(data.success);
                } else {
                    alert(data.errors);
                }
            }).done(function(data) {
            }).fail(function() {
                alert( "delete error" );
            });
        }
    })

    function autoload(){
        var data = "";
        var url = "load-survey";
        var method = "get";
        $.ajax({
            type : method,
            url : url,
            data : data,
            dataTy : 'json',
            success:function(data){
                $('#table').empty().html(data);
            }
        });
    }
</script>
@endsection