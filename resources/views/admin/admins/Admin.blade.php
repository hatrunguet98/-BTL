@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách quản trị viên </h1>
@endsection

@section('content')

    <div style="width: 30%; float: left">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertSingleAdmin">Thêm admin</button>
    </div>

    <div style="width: 30%; float: left">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertListAdmin">Thêm danh sách admin</button>
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
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editSingleLecturer">Sửa</button>
                </td>
                <td>
                    <form action="{{action('Admin\TeacherController@delete', $user->id)}}" method="post">
                        {{csrf_field()}}
                        <!-- <input name="_method" type="hidden" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
                        <button class="btn btn-danger" onclick="if (!confirm('Are you sure?')) { return false }" type="submit">Delete</button>           
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="clearfix">
        {{ $users->links() }}
    </div>
    @include('admin/admins/InsertSingleAdminModal')

    @include('admin/admins/EditSingleAdminModal')

    @include('admin/admins/InsertListAdminModal')
@endsection
