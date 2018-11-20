<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Demo Upload File - Toidicode.com</title>
</head>
<body>

	<h1>Create Student</h1>
    <form action="{{ url('student-import') }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <input type="file" name="FILE" required="true">
        <br/>
        <input type="submit" value="upload">
    </form>
</body>
</html>