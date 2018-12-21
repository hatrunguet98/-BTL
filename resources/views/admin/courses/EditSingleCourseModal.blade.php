<div class="modal fade" id="editSingleCourse" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="form">
                <h2>Sửa thông tin lớp môn học</h2>
                <form action="" method="post">
                    @csrf
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="Course_code" placeholder="Mã môn học">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="semester" placeholder="Học kì">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="name" placeholder="Tên môn học">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="teacher_name" placeholder="Tên giảng viên">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                    <button type="button" class="btn btn-danger" id="closeBtn" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>

    </div>
</div>
