@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách sinh viên</h1>
@endsection

@section('content')

    {{--các nút điều khiển modal--}}
    <div class="main-button">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertSingleStudent">Thêm sinh viên</button>
    </div>

    <div class="main-button2">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertListStudent">Thêm danh sách sinh viên</button>
    </div>

    <div class="modal fade" id="errors" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="form ">
                    <h2>Chọn danh sách sinh viên</h2>
                    <form >
                        <ul></ul>
                        <button type="button" class="btn btn-danger closeBtn" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div id="table">
        
    </div>

    {{--form nhập 1 sinh viên--}}
    @include('admin.students.InsertSingleStudentModal')

    {{--form sửa 1 sinh viên--}}
    @include('admin.students.EditSingleStudentModal')

    {{--form nhập 1 danh sách giảng viên--}}
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
                if ($.isEmptyObject(data.errors)) {
                    alert('success');
                    $('#table').empty().html(data);
                    $('#insertSingleStudent').modal('hide')
                } else {
                    msgError(data.errors);
                }
            }
        }).fail(function(data) {
            alert('something error')
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
        student = "";
        $.get('{{URL::to("student/edit")}}',{id:id}).done(function(data) {
            $('#username-edit').text(data.username);
            $('#name-edit').val(data.name);
            $('#email-edit').text(data.email);
            $('#class-edit').val(data.class);
        }).fail(function(data){
            alert( "something error" );
            $('#editSingleStudent').modal('hide');
        });

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
                    if ($.isEmptyObject(data.errors)) {
                        alert('success');
                        $('#table').empty().html(data);
                        $('#editSingleStudent').modal('hide')
                    } else {
                        msgError(data.errors);
                    }
                }
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

    function msgError(data) {
        var a = ""
        $.each(data, function(key, value){
            a += "- " +value+"\n";
        });
        alert(a);
    }
</script>
@endsection
