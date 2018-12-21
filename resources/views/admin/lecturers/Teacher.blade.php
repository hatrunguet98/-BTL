@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách Giảng Viên</h1>
@endsection

@section('content')

    <div class="main-button">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertSingleTeacher">Thêm giảng viên</button>
    </div>

    <div class="main-button2">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertListTeacher">Thêm danh sách giảng viên</button>
    </div>
    <div id="table">
        
    </div>

    @include('admin.lecturers.InsertSingleLecturerModal')

    @include('admin.lecturers.EditSingleLecturerModal')

    @include('admin.lecturers.InsertListLecturerModal')

@endsection
@section('js')
<script type="text/javascript">
    /*---------auto load list users by ajax-------------*/
    $(document).ready(function(){
        autoload();
        listUsers();
    });

    /* add users  */
    $(document).on('submit','#insert-teacher',function(e){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
                $('#insertSingleTeacher').modal('hide')
                alert('success');
            }
        }).done(function(data) {
            $('#table').empty().html(data);
        }).fail(function(e) {
            $('#insertSingleTeacher').modal('hide')
            //console.log(e.responseText.message);
            alert(e.responseText);
        });
    })
        /* delete users*/
    $(document).on('click','#delete',function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if(confirm('Are you sure?')){
            var id = $(this).data('id');

            $.post('{{URL::to("teacher/delete")}}',{id:id}, function(data){
                alert('delete success');
            }).done(function(data) {
                $('#table').empty().html(data);
            }).fail(function() {
                alert( "delete error" );
            })
        }

    })

    /*-----------------Edit User-----------------------*/
    $(document).on('click','#edit', function(){
        $('#editSingleTeacher').modal('show');
        var id = $(this).data('id');
        console.log(id);
        $.get('{{URL::to("teacher/edit")}}',{id:id}).done(function(data) {
            $('#username-edit').val(data.username);
            $('#name-edit').val(data.name);
            $('#email-edit').val(data.email);
            $('#class-edit').val(data.class);
        }).fail(function(data){
            alert( "something error" );
            $('#editSingleTeacher').modal('hide');
        });
        $('#edit-teacher').on('submit',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var data = $(this).serialize();
            data += "&id=" +  id;
            var url = $(this).attr('action');
            var method = $(this).attr('method');
            $.ajax({
                type : method,
                url : url,
                data : data,
                dataTy : 'json',
                success:function(data){
                    alert('success');
                }
            }).done(function(data) {
                $('#editSingleTeacher').modal('hide');
                $('#table').empty().html(data);
            }).fail(function(data) {
                alert('something error');
            });
        })
    });

    /*----------show list Users---------------*/
    function listUsers(){
       $(document).on('click','.pagination a', function(e){
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var url = '{{URL::to("load-teacher")}}'+'?page='+page;
            $.ajax({
                url : url
            }).done(function(data){
                $('#table').html(data);
            })
        })
    }
    /*--------------auto load data---------------------------*/
    function autoload(){
        var data = "";
        var url = "load-teacher";
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
