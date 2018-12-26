<div class="modal fade" id="showSurvey" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <h2>Chi tiết đánh giá</h2>
                <div class="time">
                    <h3><b> Ngày bắt đầu: </b>{{$start}}</h3>
                    <h3><b> Ngày kết thúc: </b>{{$finish}}</h3>
                </div>
                <div class="list-survey">
                    <h3><b>Các tiêu chí đánh giá:</b> </h3>
                    <div class="about-equipments">
                        <h5><b> 1. Cơ sở vật chất</b></h5>
                        <ul>
                        @foreach($datas as $data)
                            @if($data['type'] == $type['0'])
                            <li>{{ $data['name'] }}</li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                    <div class="about-subject">
                        <h5><b> 2. Môn học</b></h5>
                        <ul>
                        @foreach($datas as $data)
                            @if($data['type'] == $type['1'])
                            <li>{{ $data['name'] }}</li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                    <div class="about-teachers">
                        <h5><b> 3. Hoạt động dạy hoc của giảng viên</b></h5>
                        <ul>
                        @foreach($datas as $data)
                            @if($data['type'] == $type['2'])
                            <li>{{ $data['name'] }}</li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                    <div class="about-students">
                        <h5><b> 4. Hoạt động học tập của sinh viên</b></h5>
                        <ul>
                        @foreach($datas as $data)
                            @if($data['type'] == $type['3'])
                            <li>{{ $data['name'] }}</li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                </div>
                <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>