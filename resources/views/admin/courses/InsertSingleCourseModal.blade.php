<div class="modal fade" id="insertSingleCourse" role="dialog">
    <link rel="stylesheet" href="{{ asset('css/adminView/modal.css') }}">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="form">
                <h2>Thêm mới lớp môn học</h2>
                <form action="" method="post">
                    @csrf
                    <div class="form-group col-md-6" style="z-index: 2">
                        <div class="input-group">
                            <span class="input-group-addon "><i class="fa fa-book" aria-hidden="true"></i></span>
                            <select class="selectpicker form-control bootstrap-select" data-live-search="true">
                                <option selected disabled style="display: none;">Chọn mã môn học</option>
                                <option>Hot Dog, Fries and a Soda</option>
                                <option>Burger, Shake and a Smile</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                            </select>

                            @if ($errors->has('code'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-6" style="z-index: 2">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                            <select class="selectpicker  form-control bootstrap-select" data-live-search="true">
                                <option selected disabled style="display: none">Chọn mã học kỳ</option>
                                <option>Hot Dog, Fries and a Soda</option>
                                <option>Burger, Shake and a Smile</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                            </select>

                            @if ($errors->has('semester'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('semester') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-6" style="z-index: 1">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                            <select class="selectpicker  form-control bootstrap-select" data-live-search="true">
                                <option selected disabled style="display: none">Chọn tên môn học</option>
                                <option>Hot Dog, Fries and a Soda</option>
                                <option>Burger, Shake and a Smile</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                            </select>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-6" style="z-index: 0">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <select class="selectpicker form-control bootstrap-select" data-live-search="true">
                                <option selected disabled style="display: none;">Chọn tên giảng viên</option>
                                <option>Hot Dog, Fries and a Soda</option>
                                <option>Burger, Shake and a Smile</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                                <option>Sugar, Spice and all things nice</option>
                            </select>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                    <button type="button" class="btn btn-default" id="closeBtn" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>

    </div>
</div>