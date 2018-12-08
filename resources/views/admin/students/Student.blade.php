@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách sinh viên</h1>
@endsection

@section('content')

    <div style="width: 30%; float: left">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertSingleStudent">Thêm sinh viên</button>
    </div>

    <div style="width: 30%; float: left">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertListStudent">Thêm danh sách sinh viên</button>
    </div>
    <div id="table">
        
    </div>
    
    
    @include('admin/students/InsertSingleStudentModal')

    @include('admin/students/EditSingleStudentModal')

    @include('admin.students.InsertListStudentModal')

@endsection

@section('js')
<script type="text/javascript">
    /*---------auto load list students by ajax-------------*/
    $(document).ready(function(){
        autoload();
        listUsers();
    });

    /* add students  */
    $(document).on('submit','#insert-Student',function(e){

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
                $('#insertSingleStudent').modal('hide')
                //console.log(data);
            }
        }).done(function(data) {
            $('#table').empty().html(data);
        }).fail(function(e) {
            $('#insertSingleStudent').modal('hide')
            //console.log(e.responseText.message);
            alert(e.responseText);
        });
    })
        /* delete students*/
    $(document).on('click','#delete',function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if(confirm('Are you sure?')){
            var id = $(this).data('id');

            $.post('{{URL::to("student/delete")}}',{id:id}, function(data){
                alert(data.message);
            }).done(function(data) {
                $('#listUsers #'+id).remove();
            }).fail(function() {
                alert( "delete error" );
            })
        }

    })

    /*-----------------Edit Student-----------------------*/
    $(document).on('click','#edit', function(){
        $('#editSingleStudent').modal('show');
        var id = $(this).data('id');
        console.log(id);
        student = "";
        $.get('{{URL::to("student/edit")}}',{id:id}).done(function(data) {
            $('#username-edit').val(data.username);
            $('#name-edit').val(data.name);
            $('#email-edit').val(data.email);
            $('#class-edit').val(data.class);
        }).fail(function(data){
            alert( "something error" );
            $('#editSingleStudent').modal('hide');
        });
        $('#username-edit').val(student.username);
        $('#name-edit').val(student.name);
        $('#email-edit').val(student.email);
        $('#class-edit').val(student.class);

        $('#edit-student').on('submit',function(e){
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
                $('#editSingleStudent').modal('hide');
                $('#table').empty().html(data);
            }).fail(function(data) {
                alert('something error');
            });
        })
    });

    /*----------show list Students---------------*/
    function listUsers(){
       $(document).on('click','.pagination a', function(e){
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var url = '{{URL::to("load-student")}}'+'?page='+page;
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
        var url = "load-student";
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
