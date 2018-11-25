<div class="modal fade" id="editSingleLecturer" role="dialog">
    <link rel="stylesheet" href="{{ asset('css/adminView/modal.css') }}">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="form">
                <h2>Sửa thông tin giảng viên</h2>
                <form action="" method="post">
                    @csrf
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="Lecturer_code" placeholder="Mã giảng viên">
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