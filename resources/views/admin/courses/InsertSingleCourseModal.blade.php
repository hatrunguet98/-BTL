<div class="modal fade" id="insertSingleCourse" role="dialog">
    <link rel="stylesheet" href="{{ asset('css/adminView/modal.css') }}">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="form">
                <h2>Thêm mới lớp môn học</h2>
                <form action="{{ url('add-course') }}" method="post">
                    @csrf
                    <div class="form-group col-md-6" style="z-index: 2">
                        <div class="input-group">
                            <span class="input-group-addon "><i class="fa fa-book" aria-hidden="true"></i></span>
                            <select class="selectpicker form-control bootstrap-select" data-live-search="true">
                                <option selected disabled style="display: none;">Chọn mã môn học</option>
                                @foreach($subjects as $subject)
                                    <option id="{{'code' . $subject->id}}" name = "code" value="{{$subject->id}}">{{$subject->code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6" style="z-index: 2">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                            <select class="selectpicker  form-control bootstrap-select" data-live-search="true">
                                <option selected disabled style="display: none">Chọn mã học kỳ</option>
                                @foreach($semesters as $semester)
                                    <option id="{{'semester' . $semester->id}}" name = "semester" value="{{$semester->id}}">{{$semester->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6" style="z-index: 1">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                            <select class="selectpicker  form-control bootstrap-select" data-live-search="true">
                                <option selected disabled style="display: none">Chọn tên môn học</option>
                                @foreach($subjects as $subject)
                                    <option id="{{'name' . $subject->id}}" name = "subject">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6" style="z-index: 0">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <select class="selectpicker form-control bootstrap-select" data-live-search="true">
                                <option selected disabled style="display: none;">Chọn tên giảng viên</option>
                                @foreach($teachers as $teacher)
                                    <option id="{{'user' . $teacher->id}}" name = "user" value="{{$teacher->id}}">{{$teacher->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                    <button type="button" class="btn btn-default" id="closeBtn" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>

    </div>
</div>