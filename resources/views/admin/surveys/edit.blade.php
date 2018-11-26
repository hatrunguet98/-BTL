@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Sửa đánh giá môn giải tich 1</h1>
@endsection

@section('content')

    <div class="container">
        <link rel="stylesheet" href="{{ asset("css/adminView/surveyForm.css") }}">
        <div class="form">
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
            </form>
        </div>
    </div>

@endsection