<div class="modal fade" id="insertCriterion" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="form">
                <h2>Thêm mới tiêu chí</h2>
                <form action="{{ url('survey/survey-insert') }}" method="post" id="insert-criterion">
                    @csrf
                    <div class="form-group col-md-12" style="z-index: 2">
                        <div class="input-group">
                            <span class="input-group-addon "><i class="fa fa-book" aria-hidden="true"></i></span>
                            <select class="selectpicker form-control bootstrap-select" name="type">
                                <option selected disabled style="display: none;">Chọn kiểu</option>
                                <option value="0">Cơ sở vật chất</option>
                                <option value="1">Môn học</option>
                                <option value="2">Hoạt động dạy hoc của giảng viên</option>
                                <option value="3">Hoạt động học tập của sinh viên</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-12" style="z-index: 1">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-align-left" aria-hidden="true"></i></span>
                            <input type="text" name="name" class="form-control"  placeholder="Nhập tiêu chí" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary submitBtn">Submit</button>
                    <button type="button" class="btn btn-danger closeBtn" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>

    </div>
</div>