<div class="frame">
    <!-- survey-course -->
    <form action="{{ URL('student/survey') }}" method="post" id="insert-survey" >
        @csrf
    <div class="survey-table p-5">
        <h2 class="text-center" id="name-courses">{{$course}}</h2>
            <input type="hidden" name="user_course_id" id="input-id" value="">
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
                @if($data['type'] == $type['0'])
                    <tr>
                        <td>{{ $data['name'] }}</td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==1 ?'checked':''}} value="1" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==2 ?'checked':''}} value="2" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==3 ?'checked':''}} value="3" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==4 ?'checked':''}} value="4" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==5 ?'checked':''}} value="5"required> </td>
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
                @if($data['type'] == $type['1'])

                    <tr>
                        <td>{{ $data['name'] }}</td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==1 ?'checked':''}} value="1" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==2 ?'checked':''}} value="2" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==3 ?'checked':''}} value="3" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==4 ?'checked':''}} value="4" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==5 ?'checked':''}} value="5" required> </td>
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
                @if($data['type'] == $type['2'])

                    <tr>
                        <td>{{ $data['name'] }}</td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==1 ?'checked':''}} value="1" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==2 ?'checked':''}} value="2" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==3 ?'checked':''}} value="3" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==4 ?'checked':''}} value="4" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==5 ?'checked':''}} value="5" required> </td>
                    </tr>
                @endif
                @endforeach
                </tbody>
                <thead>
                    <tr>
                        <th>4. Hoạt động học tập của học sinh</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($datas as $data)
                @if($data['type'] == $type['3'])
                    <tr>
                        <td>{{ $data['name'] }}</td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==1 ?'checked':''}} value="1" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==2 ?'checked':''}} value="2" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==3 ?'checked':''}} value="3" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==4 ?'checked':''}} value="4" required> </td>
                        <td><input type="radio" name="{{ 'survey'.$data['id'] }}" {{ $data['value']==5 ?'checked':''}} value="5" required> </td>
                    </tr>
                @endif
                @endforeach
                </tbody>
                <thead>
                        <tr>
                        <th>5.Ý kiến bổ xung của sinh viên</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <form>
                                <td><input type="" class="form-control" value="{{$comment}}" name="comment" id="input-note"></td>
                            </form>
                        </tr>
                    </tbody>
            </table>
    </div>
    <div class="p-1 text-center">
        <input type="submit" value="submit" class="btn btn-lg btn-success center-block">
    </div>
    </form>
    <!-- /.survey-course -->
    <!-- note -->
    <div class="p-5">
        <em class="h5">Giá trị chuẩn của các mức đánh giá</em><br>
        <em class="h6">- 1: rất chưa hài lòng/ kém.</em><br>
        <em class="h6">- 2: chưa hài lòng/ chưa tốt.</em><br>
        <em class="h6">- 3: khá hài lòng/ khá tốt.</em><br>
        <em class="h6">- 4: hài lòng/ tốt.</em><br>
        <em class="h6">- 5: rất hài lòng/ rất tốt.</em><br>
        <em class="h6">- Ý kiến bổ sung của sinh viên: Sinh viên bổ sung ý kiến đánh giá riêng của mình về các vấn đề của khoa học. </em><br>
    </div>
    <!-- /.note -->
</div>
