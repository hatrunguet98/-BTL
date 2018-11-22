@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách sinh viên</h1>
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
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Họ và tên</th>
                <th>VNU Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>15020881</td>
                <td>12345678</td>
                <td>Triệu Hoàng An</td>
                <td>15020881@vnu.edu.vn</td>
                <td>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editSingleAdmin">Sửa</button>
                    <a class="btn btn-default remove" href="#">Xóa</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>15021394</td>
                <td>12345678</td>
                <td>Bùi Châu Anh</td>
                <td>15021394@vnu.edu.vn</td>
                <td>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editSingleAdmin">Sửa</button>
                    <a class="btn btn-default remove" href="#">Xóa</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>15021606</td>
                <td>12345678</td>
                <td>Lưu Việt Anh</td>
                <td>15021606@vnu.edu.vn</td>
                <td>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editSingleAdmin">Sửa</button>
                    <a class="btn btn-default remove" href="#">Xóa</a>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>15020881</td>
                <td>12345678</td>
                <td>Triệu Hoàng An</td>
                <td>15020881@vnu.edu.vn</td>
                <td>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editSingleAdmin">Sửa</button>
                    <a class="btn btn-default remove" href="#">Xóa</a>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="modal fade" id="insertSingleAdmin" role="dialog">
        <link rel="stylesheet" href="{{ asset('css/adminView/form.css') }}">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="form">
                    <form action="" method="post">
                        <h2>Thêm mới admin</h2>
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="Admin_code" placeholder="Mã admin">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="name" placeholder="Họ và tên">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control" name="email" placeholder="Nhập VNU email">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                        <button type="button" class="btn btn-default" id="closeBtn" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="editSingleAdmin" role="dialog">
        <link rel="stylesheet" href="{{ asset('css/adminView/form.css') }}">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="form">
                    <form action="" method="post">
                        <h2>Sửa thông tin admin</h2>
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="Admin_code" placeholder="Mã admin">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="name" placeholder="Họ và tên">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control" name="email" placeholder="Nhập VNU email">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                        <button type="button" class="btn btn-default" id="closeBtn" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade insertList" id="insertListAdmin" role="dialog">
        <link rel="stylesheet" href="http://localhost/Laravel/public/css/admin_view/form.css">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="form">
                    <form action="" method="post">
                        <h2>Chọn danh sách admin</h2>
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <input type="file" class="button-a-background">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                        <button type="button" class="btn btn-default" id="closeBtn" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
