 @foreach($courses as $course)
	<tr>
	    <td>{{$course->id}}</td>
	    <td>{{$course->name}}</td>
	    <td>{{$course->code}}</td>
	    <td>{{$course->semester}}</td>
	    <td>{{$course->user_name}}</td>
	    <td>
	        <a  class="btn btn-info btn-xs" data-id="{{$course->id}}" data-code="{{$course->code}}" id="view">View</a>
	        <a  class="btn btn-success btn-xs" id="edit" data-course="{{$course}}">Edit</a>
	        <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
	    </td>
	</tr>
@endforeach