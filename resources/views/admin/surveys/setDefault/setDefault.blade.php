@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách đánh giá mặc định</h1>
@endsection

@section('content')
    <div class="main-button">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertCriterion">Thêm tiêu chí</button>
    </div>

    <div id="table">
        
    </div>


    @include('admin.surveys.setDefault.InsertCriterionModal')

    @include('admin.surveys.setDefault.editCriterionModal')

@endsection

@section('js')
    <script type="text/javascript">
    $(document).ready(function(e){
        autoload();
    })
        // -----------------edit-----------------
    $(document).on('click','#edit', function(){
        $('#editCriterion').modal('show');
    });
    $(document).on('submit','#insertCriterion', function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        console.log(data);
        $.ajax({
            type : method,
            url : url,
            data : data,
            dataTy : 'json',
            success:function(data) {
                if ($.isEmptyObject(data.errors)) {
                    alert('success');
                    $('#table').empty().html(data);
                } else {
                    msgError(data.errors);
                }
            }
        }).fail(function(data) {
            alert('something error')
        });
    });

    function msgError(data) {
        var a = ""
        $.each(data, function(key, value){
            a += "- " +value+"\n";
        });
        alert(a);
    }

    function autoload(){
        var data = "";
        var url = "load-criterion";
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

    </script>
@endsection