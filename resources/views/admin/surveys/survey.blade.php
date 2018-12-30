@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách đánh giá</h1>
@endsection

@section('content')
    {{--các nút điều khiển modal--}}
    <div class="main-button">
        <a class="btn btn-vimeo" href="{{ asset('generate') }}">Tạo đánh giá chung</a>
    </div>

    <div class="main-button2">
        <a class="btn btn-vimeo" href="{{ asset('survey/set-default') }}">Cài đặt mặc định</a>
    </div>

    <div id="table">
        
    </div>
    <div id="data">
    </div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        autoload();
        listSurvey();
    })    

    //Hiện modal thông tin đánh giá
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

    //Hiện modal form sửa đánh giá
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

    //ajax khi submit phần vừa sửa
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

    //ajax khi xóa bản đánh giá
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

    function listSurvey(){
       $(document).on('click','.pagination a', function(e){
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var url = '{{URL::to("load-survey")}}'+'?page='+page;
            $.ajax({
                url : url
            }).done(function(data){
                $('#table').html(data);
            })
        })
    }

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