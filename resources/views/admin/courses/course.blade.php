@extends('admin.adminLayout.adminLayout')


@section('content_header')
    <h1 id="h1">Danh sách lớp học phần</h1>
@endsection

@section('content')
<div id="data">

    {{--Hai nút điều khiển modal--}}
    <div class="main-button">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertSingleCourse">Thêm lớp môn học</button>
    </div>

    <div class="main-button2">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#enrollListStudent">Enroll danh sách sinh viên</button>
    </div>
    <div id="table">
       {{--Danh sách các môn học--}}
    
       {{--Nội dung danh sách các môn học sẽ load bằng ajax--}}
    </div>
</div>
    {{--form nhập 1 lớp môn học--}}
    @include('admin.courses.InsertSingleCourseModal')

    {{--form sửa 1 lớp môn học--}}
    @include('admin.courses.EditSingleCourseModal')

    {{--form thêm 1 danh sách lớp học--}}
    @include('admin.courses.EnrollListStudentModal')

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        var data = "";
        var url = "load-course";
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
        listCourse();
    });

    var code = '';

    // edit
    $(document).on('click','#edit', function(){
        $('#editSingleCourse').modal('show');
        var course = $(this).data('course');
        var semester = "";
        var code_id = course['code_id'];
        var user_id = course['user_id']
        if(course['semester'] == 'Kì I'){
            semester = 1;
        } else if(course['semester'] == 'Kì II'){
            semester = 2;
        } else {
            semester = 3;
        }

        $('#edit-selectcode').val(code_id).change();
        $('#edit-semester').val(semester).change();
        $('#edit-selectsubject').val(code_id).change();
        $('#edit-user').val(user_id).change();
        $('#course_id').val(course['id']);
        
        $('#edit-course').on('submit', function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();
            var data = $(this).serialize();
            var url = $(this).attr('action');
            var method = $(this).attr('method');
            $('#editSingleCourse').modal('hide');
            $.ajax({
                type : method,
                url : url,
                data : data,
                dataTy : 'json',
                success:function(data){
                    if ($.isEmptyObject(data.errors)) {
                       $('#table').empty().html(data);
                    } else {
                        alert('errors');
                    }
                }
            }).fail(function(data) {
                alert('something error');
            });
        })
    });

    // Xem danh sách sinh viên trong lớp
    $(document).on('click','#view', function(){
        var id = $(this).data('id');
        code = $(this).data('code');
        $.get('{{ URL::to("course/student")}}',{id:id}).done(function(data){
            $('#data').empty().html(data);
            $('#h1').empty().html('Danh sách sinh viên trong lớp '+code);

        });
    });

    //Tự động chọn mã môn học theo tên lớp hoặc tự chọn tên lớp thep mã môn học
    $(document).on('change', '#select-code', function () {
        var valCode = $( "#select-code option:checked" ).val();
        var valSubject = $( "#select-subject option:checked" ).val();
        if(valCode != valSubject){
            $('#select-subject').val(valCode).change();
            $('#select-subject').selectpicker('refresh');
        }

    });
    $(document).on('change', '#select-subject', function () {
        var valCode = $( "#select-code option:checked" ).val();
        var valSubject = $( "#select-subject option:checked" ).val();
        if(valCode != valSubject){
            $('#select-code').val(valSubject).change();
            $('#select-code').selectpicker('refresh');
        }
    });
    $(document).on('change', '#edit-selectcode', function () {
        var valCode = $( "#edit-selectcode option:checked" ).val();
        var valSubject = $( "#edit-selectsubject option:checked" ).val();
        if(valCode != valSubject){
            $('#edit-selectsubject').val(valCode).change();
        }
        
    });
    $(document).on('change', '#edit-selectsubject', function () {
        var valCode = $( "#edit-selectcode option:checked" ).val();
        var valSubject = $( "#edit-selectsubject option:checked" ).val();
        if(valCode != valSubject){
            $('#edit-selectcode').val(valSubject).change();
        }

    });
    $(document).on('change', '#edit-selectcode', function () {
        var valCode = $( "#edit-selectcode option:checked" ).val();
        var valSubject = $( "#edit-selectsubject option:checked" ).val();
        if(valCode != valSubject){
            $('#edit-selectsubject').val(valCode).change();
        }
        
    });

    $(document).on('change', '#edit-selectsubject', function () {
        var valCode = $( "#edit-selectcode option:checked" ).val();
        var valSubject = $( "#edit-selectsubject option:checked" ).val();
        if(valCode != valSubject){
            $('#edit-selectcode').val(valSubject).change();}
            
    });

    // Delete
    $(document).on('click', '#delete', function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

        });

        if(confirm('Are you sure?')){
            var id = $(this).data('id');
            $.post('{{URL::to("delete-course")}}',{id:id}, function(data){
                if ($.isEmptyObject(data.errors)) {
                    $('#list'+id).remove();
                    alert('success');
                } else {
                    alert(data.errors);
                }
            }).done(function(data) {
            }).fail(function() {
                alert( "delete error" );
            });
        }
    });


    //xóa sinh viên khỏi lớp
    $(document).on('click', '#delete-user', function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        if(confirm('Are you sure?')){
            var id = $(this).data('id');
            $.post('{{URL::to("delete-student")}}',{id:id}, function(data){
                if ($.isEmptyObject(data.errors)) {
                    $('#list'+id).remove();
                    alert(data.success);
                } else {
                    alert(data.errors);
                }
            }).fail(function() {
                alert( "something error" );
            });
        }
    });

    //nhập sinh viên cho lớp
    $(document).on('submit','#enroll-single', function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        $('#enrollSingleStudent').modal('hide');
        $.ajax({
            type : method,
            url : url,
            data : data,
            dataTy : 'json',
            success:function(data) {
                if ($.isEmptyObject(data.errors)) {
                    $('#data').empty().html(data);
                    console.log(data);
                    $('#h1').empty().html('Danh sách sinh viên trong lớp '+code);
                } else {
                    alert(data.errors);
                }
            }
        }).fail(function(data) {
            alert('something error')
        });
    })

    //kiểm tra thông tin nhập vào khi insert
    $(document).on('click', '#submit-course', function () {
        if(document.getElementById('select-code').value == "") {
            alert("Chưa chọn mã môn học")
        } else if (document.getElementById('select-semester').value == "") {
            alert("Chưa chọn học kì")
        } else if (document.getElementById('select-subject').value == "") {
            alert("Chưa chọn tên môn học")
        } else if (document.getElementById('select-teacher').value == "") {
            alert("Chưa chọn giảng viên")
        }
    });

    //hiện kết quả đánh giá của lớp
    $(document).on('click', '#result', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.get('{{ URL::to("course/result") }}', {id:id}).done(function(data){
            if ($.isEmptyObject(data.errors)) {
                $('#data').empty().html(data);
                $('#h1').empty();
            } else {
                alert(data.errors);
            }
        }).fail(function(data){
            alert('something error');
        });
    });

    function listCourse(){
       $(document).on('click','.pagination a', function(e){
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var url = '{{URL::to("load-course")}}'+'?page='+page;
            $.ajax({
                url : url
            }).done(function(data){
                $('#table').html(data);
            })
        })
    }
</script>
    
@endsection