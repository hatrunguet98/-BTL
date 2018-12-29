<div class="main-button">
    <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#enrollSingleStudent">Enroll sinh viên</button>
</div>

<div class="modal fade" id="errors" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="form ">
                <h2>Chọn danh sách sinh viên</h2>
                <form >
                    <ul></ul>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="table">

</div>
    <table class="table table-striped table-bordered  table-condensed" >
        <thead>
        <tr>
            <th style="width:5%;text-align: center">ID</th>
            <th style="width:15%;text-align: center">Mã sinh viên</th>
            <th style="width:30%;text-align: center">Họ và tên</th>
            <th style="width:20%;text-align: center">VNU Email</th>
            <th style="width:15%;text-align: center">Class</th>
            <th style="width:15%;text-align: center">Action</th>
        </tr>
        </thead>
        <tbody id="listUsers">
            @foreach( $students as $student)
            <tr id="{{'list'.$student->id}}">
                <td  style="width:5%;text-align: center">{{$student->user_id}}</td>
                <td style="width:15%;text-align: center">{{$student->username}}</td>
                <td style="width:30%;text-align: center">{{$student->name}}</td>
                <td style="width:20%;text-align: center">{{$student->email}}</td>
                <td style="width:15%;text-align: center">{{$student->class}}</td>
                <td style="width:15%;text-align: center">
                    <a  class="btn btn-danger btn-xs" id="delete-user" data-id="{{$student->id}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@include('admin.courses.courseStudent.EnrollSingleStudentModal')