@extends('user.student.students')
@section('main-course')
<div class="frame">
<div class="survey-table p-5">
        <div class="">
            <h2 class="text-center" id="name-courses">Name Course</h2>
            <div class="">
                <table class="table">
                    <thead>
                        <tr>
                            <th>1. Cơ sở vật chất</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Giảng đường có đáp ứng yêu cầu của môn học</td>
                            <form id="check-1">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Các trang thiết bị tại giảng đường đáp ứng nhu cầu giảng dạy và học tập</td>
                            <form id="check-2" >
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                    </tbody>
                    <tr>
                        <th>2. Môn học</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bạn được hỗ trợ kịp thời trong quá trình học này</td>
                            <form id="check-3">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Mục tiêu của môn học nêu rõ kiến thức</td>
                            <form id="check-4">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Mục tiêu của môn học nêu rõ kiến thức và kĩ năng cần đạt được</td>
                            <form id="check-5">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Các trang thiết bị tại giảng đường đáp ứng nhu cầu giảng dạy và học tập</td>
                            <form id="check-6">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Thời lượng của môn học được phân bố hợp lý cho các hình thức học tập</td>
                            <form id="check-7">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Môn học góp phần tran bị kiến thức, kỹ năng nghề nghiệp cho bạn</td>
                            <form id="check-8">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>3. Hoạt động giảng dạy của giáo viên</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Giảng viên thực hiện đầy đủ nội dung và thời lượng của môn học theo kế hoạch</td>
                            <form id="check-9">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Giảng viên hướng dẫn bạn phương pháp học tập khi bắt đầu môn học</td>
                            <form id="check-10">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Phương pháp giảng dạy của giảng viên giúp bạn phát triển tư duy</td>
                            <form id="check-11">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Giảng viên tạo cơ hội để bạn chủ động tham gia vào quá trình học tập</td>
                            <form id="check-12">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </for>
                        </tr>
                        <tr>
                            <td>Giảng viên giúp bạn phát triển kỹ năng làm việc độc lập</td>
                            <form id="check-13">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Giảng viên rèn luyện cho bạn phương pháp liên giữa hệ các vấn đề trong môn học và thực tiễn</td>
                            <form id="check-14">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Giảng viên sử dụng hiệu quả phương tiện dạy học</td>
                            <form id="check-15">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Giảng viên quan tâm giáo dục tư cách, phẩm chất nghề nghiệp của người học</td>
                            <form id="check-16">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>4. Hoạt động học tập cảu học sinh</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bạn hiểu những vấn đề được truyền tải trên lớp</td>
                            <form id="check-1">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Kết quả học tập của người học được đánh giá bằng nhiều hình thức phú hợp với tính chất và đặc thù môn học</td>
                            <form id="check-1">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Nội dung kiểm tra đánh giá tổng hợp được các kỹ năng mà người học phải đjat theo yêu cầu</td>
                            <form id="check-1">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                        <tr>
                            <td>Thông tin phản hồi từ kiểm tra đánh giá giúp bạn cả thiện được kết quả học tập</td>
                            <form id="check-1">
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                                <td><input type="radio" name="gender" value="male" checked> </td>
                            </form>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="p-5 text-center">
        <button class="btn btn-lg btn-success center-block">Nộp đánh giá</button>
    </div>
</div>
@endsection
<style>
    header{
        background: -webkit-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
    }
</style>
