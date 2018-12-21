@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách lớp học phần</h1>
@endsection

@section('content')

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
        <tr{{ $course->id }}>
            <td>{{$course->id}}</td>
            <td>{{$course->name}}</td>
            <td>{{$course->code}}</td>
            <td>{{$course->semester}}</td>
            <td>
                <a  class="btn btn-info btn-xs" href="{{ url('course/courseStudent') }}" id="view">View</a>
                <a  class="btn btn-success btn-xs" id="edit">Edit</a>
                <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    @include('admin.courses.InsertSingleCourseModal')

    @include('admin.courses.EditSingleCourseModal')

@endsection

@section('js')
   <script type="text/javascript">
        /*-----------------Edit Student-----------------------*/
        $(document).on('click','#edit', function(){
            $('#editSingleCourse').modal('show');
        });
    </script>
    
@endsection

