@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách quản trị viên </h1>
@endsection

@section('content')

    {{--2 button điều khiển modal--}}
    <div class="main-button">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertSingleAdmin">Thêm admin</button>
    </div>

    <div class="main-button2">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertListAdmin">Thêm danh sách admin</button>
    </div>
    <div id="table">

    </div>

    {{--form nhập 1 sinh viên--}}
    @include('admin.admins.InsertSingleAdminModal')

    {{--form sửa 1 sinh viên--}}
    @include('admin.admins.EditSingleAdminModal')

    {{--form nhập danh sách sinh viên--}}
    @include('admin.admins.InsertListAdminModal')

@endsection
@section('js')
    <script type="text/javascript">
        /*---------auto load list users by ajax-------------*/
        $(document).ready(function(){
            autoload();
            listUsers();
        });

        /* add users  */
        $(document).on('submit','#insert-admin',function(e){

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
                        $('#insertSingleAdmin').modal('hide')
                    } else {
                        msgError(data.errors);
                    }
                }
            }).fail(function(e) {
                $('#insertSingleAdmin').modal('hide')
                alert('something errors');
            });
        })
        /* delete users*/
        $(document).on('click','#delete',function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if(confirm('Are you sure?')){
                var id = $(this).data('id');

                $.post('{{URL::to("admin/delete")}}',{id:id}, function(data){
                    alert('delete success');
                }).done(function(data) {
                    $('#table').empty().html(data);
                }).fail(function() {
                    alert( "delete error" );
                })
            }

        })

        /*-----------------Edit User-----------------------*/
        $(document).on('click','#edit', function(){
            $('#editSingleAdmin').modal('show');
            var id = $(this).data('id');
            console.log(id);
            $.get('{{URL::to("admin/edit")}}',{id:id}).done(function(data) {
                $('#username-edit').text(data.username);
                $('#name-edit').val(data.name);
                $('#email-edit').text(data.email);
                $('#class-edit').val(data.class);
            }).fail(function(data){
                alert( "something error" );
                $('#editSingleAdmin').modal('hide');
            });
            $('#edit-admin').on('submit',function(e){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                var data = $(this).serialize();
                data += "&id=" +  id;
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                $.ajax({
                    type : method,
                    url : url,
                    data : data,
                    dataTy : 'json',
                    success:function(data){
                        if ($.isEmptyObject(data.errors)) {
                            alert('success');
                            $('#table').empty().html(data);
                            $('#editSingleAdmin').modal('hide')
                        } else {
                            msgError(data.errors);
                        }
                    }
                }).fail(function(data) {
                    alert('something error');
                });
            })
        });

        /*----------show list Users---------------*/
        function listUsers(){
            $(document).on('click','.pagination a', function(e){
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                var url = '{{URL::to("load-admin")}}'+'?page='+page;
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
            var url = "load-admin";
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

