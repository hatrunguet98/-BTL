<div class="modal fade survey-content" id="editSurvey" role="dialog">
    <link rel="stylesheet" href="{{ asset('css/adminView/modal.css') }}">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <h2>Sửa đánh giá</h2>
            <div class="form" >
                <form action="" method="post">
                    @csrf
                    <div class="form-group col-md-6 date">
                        <label for="start">Ngày bắt đầu:</label>
                        <input type="date" id="start" name="start" value="{{$start}}">
                    </div>
                    <div class="form-group col-md-6 date">
                        <label for="end">Ngày kết thúc:</label>
                        <input type="date" id="end" name="end" value="{{$finish}}">
                    </div>
                    <div class="form-group col-md-12 survey">
                        <h4><b>Chọn tiêu chí:</b></h4>
                        <div class="survey-content">
                            <div class="about-equipments">
                                <h5>1. Cơ sở vật chất</h5>
                                @foreach($datas as $data)
		                           	@if($data['id'] <= 2 && $data['id'] >= 1)
		                                <div class="row">
		                                    <label><input type="checkbox" name="{{'survey'.$data['id']}}" value="1"><span>{{ $data['name'] }}</span></label>
		                                </div>
		                            @endif
                        		@endforeach
                            </div>

                            <div class="about-subject">
                                <h5>2. Môn học</h5>
                                @foreach($datas as $data)
		                           	@if($data['id'] <= 7 && $data['id'] >= 3)
		                                <div class="row">
		                                    <label><input type="checkbox" name="{{'survey'.$data['id']}}" value="1"><span>{{ $data['name'] }}</span></label>
		                                </div>
		                            @endif
                        		@endforeach
                            </div>

                            <div class="about-teachers">
                                <h5>3. Hoạt động dạy hoc của giảng viên</h5>
                               @foreach($datas as $data)
		                           	@if($data['id'] <= 15 && $data['id'] >= 8)
		                                <div class="row">
		                                    <label><input type="checkbox" name="{{'survey'.$data['id']}}" value="1"><span>{{ $data['name'] }}</span></label>
		                                </div>
		                            @endif
                        		@endforeach
                            </div>

                            <div class="about-students">
                                <h5>4. Hoạt động học tập của sinh viên</h5>
                                @foreach($datas as $data)
		                           	@if($data['id'] <= 19 && $data['id'] >= 16)
		                                <div class="row">
		                                    <label><input type="checkbox" name="{{'survey'.$data['id']}}" value="1"><span>{{ $data['name'] }}</span></label>
		                                </div>
		                            @endif
                        		@endforeach
                            </div>


                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary submitBtn">Submit</button>
                    <button type="button" class="btn btn-default closeBtn" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>

    </div>
</div>