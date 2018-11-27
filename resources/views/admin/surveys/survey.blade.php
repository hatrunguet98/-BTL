@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách đánh giá</h1>
@endsection

@section('content')

    <link rel="stylesheet" href="{{ asset("css/adminView/table.css") }}">
    <div style="width: 30%; float: left">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertSingleSurvey">Thêm môn học</button>
    </div>

    <div style="width: 30%; float: left">
        <a class="btn btn-vimeo" href="http://localhost/MyBTL/public/survey-generate">Tạo đánh giá chung</a>
    </div>

    <div class="container" style="width: 1300px">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><i class="fa fa-cog" aria-hidden="true"></i></th>
                <th>Title</th>
                <th>Created At</th>
                <th>Modified At</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <a href="http://localhost/-BTL/public/survey-edit" class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#showSurvey"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    <button type="button" href="" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
                <td>Giải tích 1</td>
                <td>12/02/2222</td>
                <td>12/02/2222</td>
            </tr>
            <tr>
                <td>
                    <a href="http://localhost/-BTL/public/survey-edit" class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#showSurvey"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    <button type="button" href="" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
                <td>Điện quang</td>
                <td>12/02/2222</td>
                <td>12/02/2222</td>
            </tr>
            <tr>
                <td>
                    <a href="http://localhost/-BTL/public/survey-edit" class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#showSurvey"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    <button type="button" href="" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
                <td>Tín hiệu hê thống</td>
                <td>12/02/2222</td>
                <td>12/02/2222</td>
            </tr>

            </tbody>
        </table>
    </div>

    <div class="modal fade" id="insertSingleSurvey" role="dialog">
        <link rel="stylesheet" href="{{ asset('css/adminView/modal.css') }}">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="form">
                    <h2>Thêm mới môn học</h2>
                    <form action="{{ url('survey-register') }}" method="post">
                        @csrf
                        <h3>Danh sách môn</h3>
                        <div class="form-group col-md-12 survey first-child">
                            <div class="survey-content">
                                <input type="checkbox" name="vehicle1" value="Bike">
                                <label><span>mon1</span></label>
                            </div>
                        </div>
                        <div class="form-group col-md-12 survey">
                            <div class="survey-content">
                                <input type="checkbox" name="vehicle1" value="Bike">
                                <label><span>mon1</span></label>
                            </div>
                        </div>
                        <div class="form-group col-md-12 survey">
                            <div class="survey-content">
                                <input type="checkbox" name="vehicle1" value="Bike">
                                <label><span>mon1</span></label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                        <button type="button" class="btn btn-default" id="closeBtn" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>

        </div>
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