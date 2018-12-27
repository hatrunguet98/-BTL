<div class="modal fade" id="editCriterion" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="form">
                <h2>Thêm mới lớp môn học</h2>
                <form action="{{ url('add-course') }}" method="post">
                    @csrf
                    <div class="form-group col-md-12" style="z-index: 2">
                        <div class="input-group">
                            <span class="input-group-addon "><i class="fa fa-book" aria-hidden="true"></i></span>
                            <select class="selectpicker form-control bootstrap-select" name="code">
                                <option selected disabled style="display: none;">Chọn kiểu</option>
                                <option>Chọn kiểu</option>
                                <option>Chọn kiểu</option>
                                <option>Chọn kiểu</option>
                                <option>Chọn kiểu</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-12" style="z-index: 1">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-align-left" aria-hidden="true"></i></span>
                            <input type="text" name="name" class="form-control"  placeholder="Sửa tiêu chí" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary submitBtn">Submit</button>
                    <button type="button" class="btn btn-danger closeBtn" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>

    </div>
</div>