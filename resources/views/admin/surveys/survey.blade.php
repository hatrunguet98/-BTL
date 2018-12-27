@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách đánh giá</h1>
@endsection

@section('content')


    <div class="main-button">
        <a class="btn btn-vimeo" href="http://localhost/-BTL/public/generate">Tạo đánh giá chung</a>
    </div>

    <div class="main-button2">
        <a class="btn btn-vimeo" href="http://localhost/-BTL/public/survey/setdefault">Cài đặt mặc định</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th style="width:15%;text-align: center"><i class="fa fa-cog" aria-hidden="true"></i></th>
            <th style="width:30%;text-align: center">Title</th>
            <th style="width:15%;text-align: center">Code</th>
            <th style="width:20%;text-align: center">Start</th>
            <th style="width:20%;text-align: center">Finish</th>
        </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td style="width:15%;text-align: center">
                        <button type="button" class="btn btn-default" id="edit" data-toggle="modal" data-target="#editSurvey" data-id="{{$course->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-default" id="show" data-id="{{$course->id}}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        <button type="button" href="" class="btn btn-danger" id="delete" data-id="{{$course->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </td>
                    <td style="width:30%;text-align: center">{{ $course->name }}</td>
                    <td style="width:15%;text-align: center">{{ $course->code }}</td>
                    <td style="width:20%;text-align: center">{{ $course->start }}</td>
                    <td style="width:20%;text-align: center">{{ $course->finish }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="data">
    </div>

@endsection
@section('js')
<script type="text/javascript">
    $(document).on('click','#show', function(e){
        var id = $(this).data('id');
        alert(id);
        $.get(
            '{{ URL::to("view-survey") }}',
            {id:id},
        ).done(function(data){
            $('#data').empty().html(data);
            $('#showSurvey').modal('show');
            alert('hello');
        }).fail(function(data){
            alert('errors');
        });
    });

    $(document).on('click','#edit', function(e){
        var id = $(this).data('id');
        alert(id);
        $.get(
            '{{ URL::to("edit-survey") }}',
            {id:id},
        ).done(function(data){
            $('#data').empty().html(data);
            $('#editSurvey').modal('show');
        }).fail(function(data){
            alert('errors');
        });
    })
</script>
@endsection