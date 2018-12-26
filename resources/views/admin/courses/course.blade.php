@extends('admin.adminLayout.adminLayout')


@section('content')
<div id="data">
    <div class="text-center">
    <h1>Danh sách lớp học phần</h1>
    </div>

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
        <tr id="{{ $course->id }}">
            <td>{{$course->id}}</td>
            <td>{{$course->name}}</td>
            <td>{{$course->code}}</td>
            <td>{{$course->semester}}</td>
            <td>
                <a  class="btn btn-info btn-xs" data-id="{{$course->id}}" id="view">View</a>
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
    /*-----------------Edit Student-----------------------*/
    $(document).on('click','#edit', function(){
        $('#editSingleCourse').modal('show');
    });

    $(document).on('click','#view', function(){
        var id = $(this).data('id');
        alert(id);
        $.get('{{ URL::to("course/student")}}',{id:id}).done(function(data){
            console.log(data);
            console.log(1);
            alert("hello");
            $('#data').empty().html(data);
        });
    })

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
                alert('hello');
                $('#data').empty().html(data);
            }
        }).fail(function(data) {
            alert('something error')
        });
    })
</script>
    
@endsection