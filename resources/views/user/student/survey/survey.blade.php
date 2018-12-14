
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
                    @foreach($datas as $data)
                    @if($data['id'] <= 2)
                        <tr>
                            <td>{{ $data['name'] }}</td>
                            <form id="check-1">
                                <td><input type="radio" name="gender" value="1" checked> </td>
                                <td><input type="radio" name="gender" value="2" checked> </td>
                                <td><input type="radio" name="gender" value="3" checked> </td>
                                <td><input type="radio" name="gender" value="4" checked> </td>
                                <td><input type="radio" name="gender" value="5" checked> </td>
                            </form>
                        </tr>
                    @endif
                    @endforeach
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
                    @foreach($datas as $data)
                    @if($data['id'] <= 7 && $data['id'] > 2)
                        <tr>
                            <td>{{ $data['name'] }}</td>
                            <form id="check-1">
                                <td><input type="radio" name="gender" value="1" checked> </td>
                                <td><input type="radio" name="gender" value="2" checked> </td>
                                <td><input type="radio" name="gender" value="3" checked> </td>
                                <td><input type="radio" name="gender" value="4" checked> </td>
                                <td><input type="radio" name="gender" value="5" checked> </td>
                            </form>
                        </tr>
                    @endif
                    @endforeach
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
                    @foreach($datas as $data)
                    @if($data['id'] <= 15 && $data['id'] > 7)
                        <tr>
                            <td>{{ $data['name'] }}</td>
                            <form id="check-1">
                                <td><input type="radio" name="gender" value="1" checked> </td>
                                <td><input type="radio" name="gender" value="2" checked> </td>
                                <td><input type="radio" name="gender" value="3" checked> </td>
                                <td><input type="radio" name="gender" value="4" checked> </td>
                                <td><input type="radio" name="gender" value="5" checked> </td>
                            </form>
                        </tr>
                    @endif
                    @endforeach
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
                    @foreach($datas as $data)
                    @if($data['id'] > 15)
                        <tr>
                            <td>{{ $data['name'] }}</td>
                            <form id="check-1">
                                <td><input type="radio" name="gender" value="1" checked> </td>
                                <td><input type="radio" name="gender" value="2" checked> </td>
                                <td><input type="radio" name="gender" value="3" checked> </td>
                                <td><input type="radio" name="gender" value="4" checked> </td>
                                <td><input type="radio" name="gender" value="5" checked> </td>
                            </form>
                        </tr>
                    @endif
                    @endforeach
                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="p-5 text-center">
        <button class="btn btn-lg btn-success center-block">Nộp đánh giá</button>
    </div>
</div>

