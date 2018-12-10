<div class="modal fade" id="insertSingleCourse" role="dialog">
    <link rel="stylesheet" href="{{ asset('css/adminView/modal.css') }}">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="form">
                <h2>Thêm mới lớp môn học</h2>
                <form action="" method="post">
                    @csrf
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                            <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code') }}"  placeholder="Mã môn học" required autofocus>

                            @if ($errors->has('code'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                            <input id="semester" type="text" class="form-control{{ $errors->has('semester') ? ' is-invalid' : '' }}" name="semester" value="{{ old('semester') }}" placeholder="Học kì" required autofocus>

                            @if ($errors->has('semester'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('semester') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Tên môn học" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Tên giảng viên" required autofocus>

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