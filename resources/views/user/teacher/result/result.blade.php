<div class="frame">
<div class="p-5">
    <form>
    <div class="container">
        <div>
            <p class="font-weight-bold text-center h2">KẾT QUẢ PHẢN HỒI CỦA NGƯỜI HỌC VỀ HỌC PHẦN</p>
        </div>
        <div>
            <span class="text-center font-weight-bold">
                <p class="h5">Học kỳ:1, Năm học: 2017-2018</p>
            </span>
        </div>
    </div>
    <div>
        <span>
            <label class="h5">Tên học phần:</label><br>
            <label class="h5">Tên giảng viên:</label><br>
            <label class="h5">Số lượng sinh viên đánh giá:</label><br>
            <label class="h5">Số lượng giản viên tham gia giảng dạy môn học:</label><br>
            <label class="h5">Số lượng môn học giảng viên tham gia giảng dạy:</label><br>
        </span>
    </div>
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tiêu chí</th>
                    <th>M</th>
                    <th>STD</th>
                    <th>M1</th>
                    <th>STD1</th>
                    <th>M2</th>
                    <th>STD2</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $key => $result)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $result['name'] }}</td>
                    <td>{{$result['M'] }}</td>
                    <td>{{$result['STD'] }}</td>
                    <td>{{$result['M1'] }}</td>
                    <td>{{$result['STD1'] }}</td>
                    <td>{{$result['M2'] }}</td>
                    <td>{{$result['STD2'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-5">
        <p class="h4">Ghi chú</p>
        <p class="h5">- M: giá trị trung bình của các tiêu chí theo lớp học phần</p>
        <p class="h5">- STD: độ lệch chuẩn của các tiêu chí theo lớp học phần</p>
        <p class="h5">- M1: giá trị trung bifnhcuar các tiêu chí dựa trên dữ liệu phản hồi của sinh viên cho các giảng viên dạy cùng môn học với thầy/cô</p>
        <p class="h5">- STD1: độ lệch chuẩn của các tiêu chí dựa trên ý kiến phản hồi của sinh viên cho các giảng viên dạy cùng môn học với thầy/cô</p>
        <p class="h5">- M2: giá tri trung bình của các tiêu chí dựa trên ý kiến phản hồi của sinh viên về các môn học mà các thầy/cô đã thực hiện giảng dạy</p>
        <p class="h5">-STD2: độ lệch chuẩn của các tiêu chí dựa trên ý kiến phản hồi của sinh viên về các môn học mà các thầy/cô đã thực hiện giảng dạy </p>
    </div>
    </form> 
</div>
</div>
