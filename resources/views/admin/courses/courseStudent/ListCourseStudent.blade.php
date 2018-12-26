<table class="table table-striped table-bordered  table-condensed" >
    <thead>
        <tr>
            <th style="width:5%;text-align: center">ID</th>
            <th style="width:15%;text-align: center">Mã sinh viên</th>
            <th style="width:30%;text-align: center">Họ và tên</th>
            <th style="width:20%;text-align: center">VNU Email</th>
            <th style="width:15%;text-align: center">Class</th>
            <th style="width:15%;text-align: center">Action</th>
        </tr>
    </thead>
    <tbody id="listUsers">
        @foreach($users as $user)
        	<tr id="{{$user->id}}">
        		<td style="width:5%;text-align: center">{{$user->id}}</td>
        		<td style="width:15%;text-align: center">{{$user->username}}</td>
        		<td style="width:30%;text-align: center">{{$user->name}}</td>
        		<td style="width:20%;text-align: center">{{$user->email}}</td>
        		<td style="width:15%;text-align: center">{{$user->class}}</td>
        		<td style="width:15%;text-align: center">
        			<a  class="btn btn-success btn-xs" id="edit" data-id="{{$user->id}}">Edit</a>
        			<a  class="btn btn-danger btn-xs" id="delete" data-id="{{$user->id}}">Delete</a>
        		</td>

        	</tr>
        @endforeach
    </tbody>
</table>
<div class="clearfix">
	{{ $users->render() }}
</div>