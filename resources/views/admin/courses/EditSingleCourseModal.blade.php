<div class="modal fade" id="editSingleCourse" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="form">
                <h2>Sửa lớp môn học</h2>
                <form action="{{url('course/edit-course')}}" method="post" id="edit-course">
                    @csrf
                    <input type="hidden" name="id" id="course_id" value="">
                    <div class="form-group col-md-6" style="z-index: 2">
                        <div class="input-group">
                            <span class="input-group-addon "><i class="fa fa-book" aria-hidden="true"></i></span>
                            <select class="selectpicker form-control bootstrap-select" title="Chọn mã môn học" data-count-selected-text="Not changable text" name="code" id="edit-selectcode" data-live-search="true">
                                <option id="code0" selected disabled style="display: none;">Chọn mã môn học</option>
                                @foreach($subjects as $subject)
                                    <option id="{{'code' . $subject->id}}"  value="{{$subject->id}}">{{$subject->code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6" style="z-index: 2">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                            <select class="selectpicker  form-control bootstrap-select" name="semester" id="edit-semester" data-live-search="true">
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
                            <select class="selectpicker  form-control bootstrap-select" name="subject" id="edit-selectsubject" data-live-search="true">
                                <option id="name0" selected disabled style="display: none">Chọn tên môn học</option>
                                @foreach($subjects as $subject)
                                    <option id="{{'name' . $subject->id}}" value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6" style="z-index: 0">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <select class="selectpicker form-control bootstrap-select"  name="user" id="edit-user" data-live-search="true">
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
