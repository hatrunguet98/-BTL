@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách lớp học phần</h1>
@endsection

@section('content')

    <div style="width: 30%; float: left">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertSingleCourse">Thêm lớp môn học</button>
    </div>

    <div style="width: 30%; float: left">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertListCourse">Thêm danh sách lớp môn học</button>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Mã lớp học phần</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Giải tích</td>
            <td>INT1101 1</td>
            <td>
                <div class="dropdown" style="display: inline">
                    <button class="btn btn-info btn-xs dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Enroll
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li role="presentation"><a id="enrollSingle">Single</a></li>
                        <li role="presentation"><a id="enrollList">List</a></li>
                    </ul>
                </div>
                <a  class="btn btn-success btn-xs" id="edit">Edit</a>
                <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Cơ nhiệt</td>
            <td>INT1101 2</td>
            <td>
                <div class="dropdown" style="display: inline">
                    <button class="btn btn-info btn-xs dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Enroll
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li role="presentation"><a id="enrollSingle">Single</a></li>
                        <li role="presentation"><a id="enrollList">List</a></li>
                    </ul>
                </div>
                <a  class="btn btn-success btn-xs" id="edit">Edit</a>
                <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Điện quang</td>
            <td>INT1101 3</td>
            <td>
                <div class="dropdown" style="display: inline">
                    <button class="btn btn-info btn-xs dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Enroll
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li role="presentation"><a id="enrollSingle">Single</a></li>
                        <li role="presentation"><a id="enrollList">List</a></li>
                    </ul>
                </div>
                <a  class="btn btn-success btn-xs" id="edit">Edit</a>
                <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>

    @include('admin/courses/InsertSingleCourseModal')

    @include('admin/courses/EditSingleCourseModal')

    @include('admin/courses/InsertListCourseModal')

    @include('admin/courses/EnrollListStudentModal')

    @include('admin/courses/EnrollSingleStudentModal')



       <script type="text/javascript">
        /*-----------------Edit Student-----------------------*/
        $(document).on('click','#edit', function(){
            $('#editSingleCourse').modal('show');
        });

        $(document).on('click','#enrollSingle', function(){
            $('#enrollSingleStudent').modal('show');
        });

        $(document).on('click','#enrollList', function(){
            $('#enrollListStudent').modal('show');
        });
    </script>
@endsection

