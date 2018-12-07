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
    <div id="action"></div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:5%;text-align: center">ID</th>
                <th style="width:15%;text-align: center">Mã sinh viên</th>
                <th style="width:30%;text-align: center">Họ và tên</th>
                <th style="width:20%;text-align: center">VNU Email</th>
                <th style="width:15;text-align: center">Class</th>
                <th style="width:15%;text-align: center">Action</th>
            </tr>
        </thead>
        <tbody id="listUsers">
            
        </tbody>
    </table>
    
    @include('admin/students/InsertSingleStudentModal')

    @include('admin/students/EditSingleStudentModal')

    @include('admin.students.InsertListStudentModal')

@endsection

@section('js')
<script type="text/javascript">
    var list = "";
    /*---------auto load list students by ajax-------------*/
    $(document).ready(function(){
        var data = "";
        var url = "load-student";
        var method = "get";
        $.ajax({
            type : method,
            url : url,
            data : data,
            dataTy : 'json',
            success:function(data){
                listUsers(data);
                list = data;
            }
        });
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
            alert('success');
            listUsers(data);
                list = data;
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
        var student = "";
        $.each(list,function(i,value){
            if(value.id == id){
               student = value;
            }
        })

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
                listUsers(data);
            }).fail(function(data) {
                alert('something error');
            });
        })
    });

    /*----------show list Students---------------*/
    function listUsers(data){
        var html = "";

        $.each(data,function(i,value){
            var id = value.id || "";
            var username = value.username || "";
            var name = value.name || "";
            var email = value.email || "";
            var clas = value.class || "";

            html += '<tr id="'+id+'">';
            html += '<td style="width:5%;text-align: center">'+id+'</td>';
            html += '<td style="width:15%;text-align: center">'+username+'</td>';
            html += '<td style="width:30%;text-align: center">'+name+'</td>';
            html += '<td style="width:20%;text-align: center">'+email+'</td>';
            html += '<td style="width:15%;text-align: center">'+clas+'</td>';
            html +='<td style="width:15%;text-align: center">';
            html += '<a  class="btn btn-info btn-xs" id="view" data-id="'+id+'">'+"View"+'</a>';
            html += " ";
            html += '<a  class="btn btn-success btn-xs" id="edit" data-id="'+id+'">'+"Edit"+'</a>';
            html += " ";
            html += '<a  class="btn btn-danger btn-xs" id="delete" data-id="'+id+'">'+"Delete"+'</a>';
            html +='</td>';
            html += '</tr>'; 
        });

        $('#listUsers').empty().html(html);
    }
</script>
@endsection
