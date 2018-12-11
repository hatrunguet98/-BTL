@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách đánh giá</h1>
@endsection

@section('content')

    <link rel="stylesheet" href="{{ asset("css/adminView/table.css") }}">

    <div style="width: 30%; float: left">
        <a class="btn btn-vimeo" href="http://localhost/-BTL/public/generate">Tạo đánh giá chung</a>
    </div>

    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="width:15%;text-align: center"><i class="fa fa-cog" aria-hidden="true"></i></th>
                <th style="width:30%;text-align: center">Title</th>
                <th style="width:15%;text-align: center">Code</th>
                <th style="width:20%;text-align: center">Created At</th>
                <th style="width:20%;text-align: center">Modified At</th>
            </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td style="width:15%;text-align: center">
                            <a href="http://localhost/-BTL/public/survey-edit" class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#showSurvey"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            <button type="button" href="" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                        <td style="width:30%;text-align: center">{{ $course->name }}</td>
                        <td style="width:15%;text-align: center">{{ $course->code}}</td>
                        <td style="width:20%;text-align: center">12/02/2222</td>
                        <td style="width:20%;text-align: center">12/02/2222</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="showSurvey" role="dialog">
        <link rel="stylesheet" href="{{ asset('css/adminView/modal.css') }}">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <h2>Chi tiết đánh giá</h2>
                <div class="time">
                    <h4>Ngày bắt đầu:  22/22/2222</h4>
                    <h4>Ngày kết thúc:  22/22/2222</h4>
                </div>
                <div class="list-survey">
                    <h4>Các tiêu chí đánh giá: </h4>
                    <ul>
                        <li>Tiêu chí 1Tiêu chí 1Tiêu chí 1Tiêu chí chí 1Tiêu chí 1Tiêu chí 1Tiêu chí 1Tiêu chí 1Tiêu chí 1Tiêu 1Tiêu chí 1Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                        <li>Tiêu chí 1</li>
                    </ul>
                </div>
                <button type="button" class="btn btn-default" id="closeBtn" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>

@endsection