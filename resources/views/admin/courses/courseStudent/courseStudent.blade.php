@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách sinh viên lớp INT1101 1</h1>
@endsection

@section('content')

    <div class="main-button">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#enrollSingleStudent">Enroll sinh viên</button>
    </div>

    <div class="main-button2">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#enrollListStudent">Enroll danh sách sinh viên</button>
    </div>
    <div class="modal fade" id="errors" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="form ">
                    <h2>Chọn danh sách sinh viên</h2>
                    <form >
                        <ul></ul>
                        <button type="button" class="btn btn-danger pull-right" id="close" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div id="table">

    </div>

   {{--html mẫu--}}
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
                <tr>
                    <td  style="width:5%;text-align: center">1</td>
                    <td style="width:15%;text-align: center">svviet</td>
                    <td style="width:30%;text-align: center">viet</td>
                    <td style="width:20%;text-align: center">svviet@abc.com</td>
                    <td style="width:15%;text-align: center">CB</td>
                    <td style="width:15%;text-align: center">
                        <a  class="btn btn-danger btn-xs" id="delete" >Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    {{--html mẫu--}}

    @include('admin.courses.courseStudent.EnrollSingleStudentModal')

    {{--<div class="modal fade" id="enrollSingleStudent" role="dialog">--}}
        {{--<div class="modal-dialog">--}}
            {{--<!-- Modal content-->--}}
            {{--<div class="modal-content">--}}
                {{--<div class="form">--}}
                    {{--<h2>Thêm mới sinh viên</h2>--}}
                    {{--<form action="{{ url('enroll-student') }}" method="post">--}}
                        {{--@csrf--}}
                        {{--<div class="form-group col-md-12">--}}
                            {{--<div class="input-group">--}}
                                {{--<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>--}}
                                {{--<input type="hidden" name="id" value="" id="input-id">--}}
                                {{--<input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}"  placeholder="Mã sinh viên" required autofocus>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>--}}
                        {{--<button type="button" class="btn btn-default" id="closeBtn" data-dismiss="modal">Close</button>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}

    @include('admin.courses.courseStudent.EnrollListStudentModal')

@endsection

@section('js')
    <script type="text/javascript">
        /*---------auto load list students by ajax-------------*/
        $(document).ready(function(){
            autoload();
            listUsers();
        });

        /* add students  */
        $(document).on('submit','#insert-Student',function(e){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();
            var data = $(this).serialize();
            var url = $(this).attr('action');
            var method = $(this).attr('method');
            $.ajax({
                type : method,
                url : url,
                data : data,
                dataTy : 'json',
                success:function(data) {
                    if ($.isEmptyObject(data.errors)) {
                        alert('success');
                        $('#table').empty().html(data);
                        $('#insertSingleStudent').modal('hide')
                    } else {
                        msgError(data.errors);
                    }
                    //console.log(data);
                }
            }).fail(function(data) {
                alert('something error')
            });
        });

        /* delete students*/
        $(document).on('click','#delete',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if(confirm('Are you sure?')){
                var id = $(this).data('id');

                $.post('{{URL::to("student/delete")}}',{id:id}, function(data){
                    alert(data.message);
                }).done(function(data) {
                    $('#listUsers #'+id).remove();
                }).fail(function() {
                    alert( "delete error" );
                })
            }

        });

        /*----------show list Students---------------*/
        function listUsers(){
            $(document).on('click','.pagination a', function(e){
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                var url = '{{URL::to("load-student")}}'+'?page='+page;
                $.ajax({
                    url : url
                }).done(function(data){
                    $('#table').html(data);
                })
            })
        }
        /*--------------auto load data---------------------------*/
        function autoload(){
            var data = "";
            var url = "load-student";
            var method = "get";
            $.ajax({
                type : method,
                url : url,
                data : data,
                dataTy : 'json',
                success:function(data){
                    $('#table').empty().html(data);
                }
            });
        }

        function msgError(data) {
            var a = "";
            $.each(data, function(key, value){
                a += "- " +value+"\n";
            });
            alert(a);
        }
    </script>
@endsection
