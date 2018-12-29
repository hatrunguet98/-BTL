<div class="modal fade survey-content" id="editSurvey" role="dialog">
    <link rel="stylesheet" href="{{ asset('css/adminView/modal.css') }}">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <h2>Sửa đánh giá</h2>
            <div class="form" >
                <form action="{{ url('survey/submitEditSurvey') }}" method="post" id="submitEdit">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}" >
                    <div class="form-group col-md-6 date">
                        <label for="start">Ngày bắt đầu:</label>
                        <input type="date" id="start" name="start" value="{{$start}}">
                    </div>
                    <div class="form-group col-md-6 date">
                        <label for="end">Ngày kết thúc:</label>
                        <input type="date" id="end" name="finish" value="{{$finish}}">
                    </div>
                    <div class="form-group col-md-12 survey">
                        <h4><b>Chọn tiêu chí:</b></h4>
                        <div class="survey-content">
                            <div class="about-equipments">
                                <h5>1. Cơ sở vật chất</h5>
                                @foreach($results as $key => $result)
		                           	@if($result['type'] == $type['0'])
		                                <div class="row">
		                                    <label><input type="checkbox" name="{{'survey'.$result['id']}}" value="1" {{ isset($datas[$key]['id']) ? 'checked' : '' }} ><span>{{ $result['name'] }}</span></label>
		                                </div>
		                            @endif
                        		@endforeach
                            </div>

                            <div class="about-subject">
                                <h5>2. Môn học</h5>
                                @foreach($results as $key => $result)
		                           	@if($result['type'] == $type['1'])
		                                <div class="row">
		                                    <label><input type="checkbox" name="{{'survey'.$result['id']}}" value="1" {{ isset($datas[$key]) ? 'checked' : '' }}><span>{{ $result['name'] }}</span></label>
		                                </div>
		                            @endif
                        		@endforeach
                            </div>

                            <div class="about-teachers">
                                <h5>3. Hoạt động dạy hoc của giảng viên</h5>
                               @foreach($results as $key => $result)
		                           	@if($result['type'] == $type[2])
		                                <div class="row">
		                                    <label><input type="checkbox" name="{{'survey'.$result['id']}}" value="1" {{ isset($datas[$key]) ? 'checked' : '' }}><span>{{ $result['name'] }}</span></label>
		                                </div>
		                            @endif
                        		@endforeach
                            </div>

                            <div class="about-students">
                                <h5>4. Hoạt động học tập của sinh viên</h5>
                                @foreach($results as $key => $result)
		                           	@if($result['type'] == $type['3'])
		                                <div class="row">
		                                    <label><input type="checkbox" name="{{'survey'.$result['id']}}" value="1" {{ isset($datas[$key]) ? 'checked' : '' }}><span>{{ $result['name'] }}</span></label>
		                                </div>
		                            @endif
                        		@endforeach
                            </div>


                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary submitBtn">Submit</button>
                    <button type="button" class="btn btn-danger closeBtn" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>

    </div>
</div>