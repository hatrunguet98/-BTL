<div class="modal fade" id="insertCriterion" role="dialog">
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
                            <select class="selectpicker form-control bootstrap-select" name="code" data-live-search="true">
                                <option selected disabled style="display: none;">Chọn mã môn học</option>
                                @foreach($subjects as $subject)
                                    <option id="{{'code' . $subject->id}}"  value="{{$subject->id}}">{{$subject->code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6" style="z-index: 2">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                            <select class="selectpicker  form-control bootstrap-select" name="semester" data-live-search="true">
                                <option selected disabled style="display: none">Chọn mã học kỳ</option>
                                @foreach($semesters as $semester)
                                    <option id="{{'semester' . $semester->id}}"  value="{{$semester->id}}">{{$semester->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6" style="z-index: 1">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                            <select class="selectpicker  form-control bootstrap-select" name="subject" data-live-search="true">
                                <option selected disabled style="display: none">Chọn tên môn học</option>
                                @foreach($subjects as $subject)
                                    <option id="{{'name' . $subject->id}}" >{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6" style="z-index: 0">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <select class="selectpicker form-control bootstrap-select"  name="user" data-live-search="true">
                                <option selected disabled style="display: none;">Chọn tên giảng viên</option>
                                @foreach($teachers as $teacher)
                                    <option id="{{'user' . $teacher->id}}" value="{{$teacher->id}}">{{$teacher->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary submitBtn">Submit</button>
                    <button type="button" class="btn btn-danger closeBtn" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>

    </div>
</div>