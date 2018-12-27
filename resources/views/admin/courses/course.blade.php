@extends('admin.adminLayout.adminLayout')


@section('content_header')
    <h1 id="h1">Danh sách lớp học phần</h1>
@endsection

@section('content')
<div id="data">
    <div class="main-button">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertSingleCourse">Thêm lớp môn học</button>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Mã lớp học phần</th>
            <th>ki hoc</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
        <tr id="'course' . {{ $course->id }}">
            <td>{{$course->id}}</td>
            <td>{{$course->name}}</td>
            <td id="code" >{{$course->code}}</td>
            <td>{{$course->semester}}</td>
            <td>
                <a  class="btn btn-info btn-xs" data-id="{{$course->id}}" data-code="{{$course->code}}" id="view">View</a>
                <a  class="btn btn-success btn-xs" id="edit">Edit</a>
                <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

    @include('admin.courses.InsertSingleCourseModal')

    @include('admin.courses.EditSingleCourseModal')

@endsection

@section('js')
<script type="text/javascript">
    var code = '';
    $(document).on('click','#edit', function(){
        $('#editSingleCourse').modal('show');
    });

    $(document).on('click','#view', function(){
        var id = $(this).data('id');
        code = $(this).data('code');
        $.get('{{ URL::to("course/student")}}',{id:id}).done(function(data){
            console.log(data);
            console.log(1);
            alert("hello");
            $('#data').empty().html(data);
            $('#h1').empty().html('Danh sách sinh viên trong lớp '+code);

        });
    });
    
    $(document).on('change', '#select-code', function () {
        
    });

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
                    alert('hello');
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
</script>
    
@endsection