@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách đánh giá</h1>
@endsection

@section('content')


    <div class="main-button">
        <a class="btn btn-vimeo" href="http://localhost/-BTL/public/generate">Tạo đánh giá chung</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th style="width:15%;text-align: center"><i class="fa fa-cog" aria-hidden="true"></i></th>
            <th style="width:30%;text-align: center">Title</th>
            <th style="width:15%;text-align: center">Code</th>
            <th style="width:20%;text-align: center">Created At</th>
            <th style="width:20%;text-align: center">Modified At</th>
        </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td style="width:15%;text-align: center">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editSurvey"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#showSurvey"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        <button type="button" href="" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </td>
                    <td style="width:30%;text-align: center">{{ $course->name }}</td>
                    <td style="width:15%;text-align: center">{{ $course->code}}</td>
                    <td style="width:20%;text-align: center">12/02/2222</td>
                    <td style="width:20%;text-align: center">12/02/2222</td>

                </tr>
            @endforeach
        </tbody>
    </table>



    <div class="modal fade" id="showSurvey" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <h2>Chi tiết đánh giá</h2>
                <div class="time">
                    <h3>Ngày bắt đầu:  22/22/2222</h3>
                    <h3>Ngày kết thúc:  22/22/2222</h3>
                </div>
                <div class="list-survey">
                    <h3>Các tiêu chí đánh giá: </h3>
                    <ul>
                        <li>Tiêu chí 1Tiêu chí 1Tiêu chí 1Tiêu chí chí 1Tiêu chí 1Tiêu chí 1Tiêu chí 1Tiêu chí 1Tiêu chí 1Tiêu 1Tiêu chí 1Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                    </ul>
                </div>
                <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>

    <div class="modal fade" id="editSurvey" role="dialog">
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
                            <input type="date" id="start" name="start" value="2018-07-22">
                        </div>
                        <div class="form-group col-md-6 date">
                            <label for="start">Ngày kết thúc:</label>
                            <input type="date" id="start" name="start" value="2018-07-22">
                        </div>
                        <div class="form-group col-md-12 survey">
                            <h4>Chọn tiêu chí:</h4>
                            <div class="survey-content">
                                <div class="row">
                                    <label><input type="checkbox" name="survey1" value="1"><span>Giảng đường đáp ứng yêu cầu của môn học</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey2" value="1"><span>Các trang thiết bị tại giảng đường đáp ứng nhu cầu giảng dạy và học tập</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey3" value="1"><span>Bạn được hỗ trợ kịp thời trong quá trình học môn này</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey4" value="1"><span>Mục tiêu của môn học nêu rõ kiến thức và kỹ năng cần đạt được</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey5" value="1"><span>Thời lượng của môn học được phân bố hợp lý cho các hình thức học tập</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey6" value="1"><span>Các tài liệu phục vụ môn học được cập nhật</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey7" value="1"><span>Môn học góp phần trang bị kiến thức, kỹ năng nghề nghiệp cho bạn</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey8" value="1"><span>Giảng viên thực hiện đầy đủ nội dung và thời lượng của môn học theo kế hoạch</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey9" value="1"><span>Giảng viên hướng dẫn bạn phương pháp học tập khi bắt đầu môn học</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey10" value="1"><span>Phương pháp giảng dạy của giảng viên giúp bạn phát triển tư duy</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey11" value="1"><span>Giảng viên tạo cơ hội để bạn chủ động tham gia vào quá trình học tập</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey12" value="1"><span>Giảng viên giúp bạn phát triển kỹ năng làm việc độc lập</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey13" value="1"><span>Giảng viên rèn luyện cho bạn phương pháp liên hệ giữa các vẫn đề trong môn học và thực tiễn</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey14" value="1"><span>Giảng viên sử dụng hiệu quả phương tiện dạy học</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey15" value="1"><span>Giảng viên quan tâm giáo dục tư cách, phẩm chất nghề nhiệp của người học</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey16" value="1"><span>Bạn hiểu những vấn đề được truyền tải trên lớp</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey17" value="1"><span>Kết quả học tập của người học được đánh giá bằng nhiều hình thức phù hợp với tính chất và đặc thù môn học</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey18" value="1"><span>Nội dung kiểm tra đánh giá tổng hợp được các kỹ năng mà người học phải đạt theo yêu cầu</span></label>
                                </div>
                                <div class="row">
                                    <label><input type="checkbox" name="survey19" value="1"><span>Thông tin phản hồi từ kiểm tra đánh giá giúp bạn cải thiện kết quả học tập</span></label>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                        <button type="button" class="btn btn-default" id="closeBtn" data-dismiss="modal">Close</button>
                    </form>

            </div>

        </div>
    </div>
@endsection