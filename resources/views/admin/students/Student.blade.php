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
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã sinh viên/Tên đăng nhập</th>
                <th>Họ và tên</th>
                <th>VNU Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editSingleStudent" >Sửa</button>
                </td>
                 <td>
                    <form action="{{action('Admin\StudentController@delete', $user->id)}}" method="post">
                        {{csrf_field()}}
                        <!-- <input name="_method" type="hidden" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
                        <button class="btn btn-danger" onclick="if (!confirm('Are you sure?')) { return false }" type="submit">Delete</button>           
                    </form>
                </td>
                <td>
                     <a  class="btn btn-primary" onclick="if (!confirm('Are you sure?')) { return false }">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="clearfix">
        {{ $users->links() }}
    </div>

    @include('admin/students/InsertSingleStudentModal')

    @include('admin/students/EditSingleStudentModal')

    @include('admin.students.InsertListStudentModal')

@endsection
