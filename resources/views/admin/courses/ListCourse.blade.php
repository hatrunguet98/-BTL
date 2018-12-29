<table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Mã lớp học phần</th>
            <th>Ki hoc</th>
            <th>Giáo Viên</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        	 @foreach($courses as $course)
				<tr id="{{'list'.$course->id}}">
				    <td>{{$course->id}}</td>
				    <td>{{$course->name}}</td>
				    <td>{{$course->code}}</td>
				    <td>{{$course->semester}}</td>
				    <td>{{$course->user_name}}</td>
				    <td>
				    	<a  class="btn btn-primary btn-xs" id="result" data-id="{{$course->user_course_id}}">Result</a>
				        <a  class="btn btn-info btn-xs" data-id="{{$course->id}}" data-code="{{$course->code}}" id="view">View</a>
				        <a  class="btn btn-success btn-xs" id="edit" data-course="{{$course}}">Edit</a>
				        <a  class="btn btn-danger btn-xs" id="delete" data-id="{{$course->id}}">Delete</a>
				    </td>
				</tr>
			@endforeach
        </tbody>
    </table>
    <div class="clearfix">
        {{ $courses->render() }}
    </div>