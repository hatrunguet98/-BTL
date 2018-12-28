<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th><b> 1. Cơ sở vật chất</b></th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($criteria as $criterion)
            @if($criterion->type == $type['0'])
            <tr>
                <td><p style="margin-left: 30px">{{ $criterion->name }}</p></td>
                <td>
                    <a  class="btn btn-success btn-xs" id="edit" data-id="{{$criterion->id}}" data-name="{{$criterion->name}}">Edit</a>
                    <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>

    <thead>
    <tr>
        <th><b> 2. Môn học</b></th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($criteria as $criterion)
            @if($criterion->type == $type['1'])
            <tr>
                <td><p style="margin-left: 30px">{{ $criterion->name }}</p></td>
                <td>
                    <a  class="btn btn-success btn-xs" id="edit">Edit</a>
                    <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>

    <thead>
    <tr>
        <th><b> 3. Hoạt động dạy hoc của giảng viên</b></th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($criteria as $criterion)
            @if($criterion->type == $type['2'])
            <tr>
                <td><p style="margin-left: 30px">{{ $criterion->name }}</p></td>
                <td>
                    <a  class="btn btn-success btn-xs" id="edit">Edit</a>
                    <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>

    <thead>
    <tr>
        <th><b> 4. Hoạt động học tập của sinh viên</b></th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($criteria as $criterion)
            @if($criterion->type == $type['3'])
            <tr>
                <td><p style="margin-left: 30px">{{ $criterion->name }}</p></td>
                <td>
                    <a  class="btn btn-success btn-xs" id="edit">Edit</a>
                    <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>