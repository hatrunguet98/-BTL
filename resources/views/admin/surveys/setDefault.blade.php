@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách đánh giá mặc định</h1>
@endsection

@section('content')
    <div class="main-button">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertCriterion">Thêm tiêu chí</button>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            {{--<th>Số thứ tự</th>--}}
            <th style="text-align: center">Cở sở vật chất</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                {{--<td>1</td>--}}
                <td>ádfasdgadfgdfhsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssdj</td>
                <td>
                    <a  class="btn btn-success btn-xs" id="edit">Edit</a>
                    <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
                </td>
            </tr>
            <tr>
                {{--<td>2</td>--}}
                <td>ádfasdgadfgdfhdj</td>
                <td>
                    <a  class="btn btn-success btn-xs" id="edit">Edit</a>
                    <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
                </td>
            </tr>
            <tr>
                {{--<td>3</td>--}}
                <td>ádfasdgadfgdfhdj</td>
                <td>
                    <a  class="btn btn-success btn-xs" id="edit">Edit</a>
                    <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
                </td>
            </tr>
        </tbody>
        <thead>
        <tr>
            {{--<th></th>--}}
            <th style="text-align: center">Môn học</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            {{--<td>4</td>--}}
            <td>ádfasdgadfgdfhdj</td>
            <td>
                <a  class="btn btn-success btn-xs" id="edit">Edit</a>
                <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
            </td>
        </tr>
        </tbody>
        <thead>
        <tr>
            {{--<th></th>--}}
            <th>Hoạt động dạy hoc của giảng viên</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            {{--<td>5</td>--}}
            <td>ádfasdgadfgdfhdj</td>
            <td>
                <a  class="btn btn-success btn-xs" id="edit">Edit</a>
                <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
            </td>
        </tr>
        </tbody>
        <thead>
        <tr>
            {{--<th></th>--}}
            <th>Hoạt động học tập của sinh viên</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            {{--<td>6</td>--}}
            <td>ádfasdgadfgdfhdj</td>
            <td>
                <a  class="btn btn-success btn-xs" id="edit">Edit</a>
                <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>

    {{--@include('admin.surveys.InsertCriterionModal')--}}
    <div class="modal fade" id="insertCriterion" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="form">
                    <h2>Thêm mới lớp môn học</h2>
                    <form action="{{ url('add-course') }}" method="post">
                        @csrf
                        <div class="form-group col-md-12" style="z-index: 2">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-book" aria-hidden="true"></i></span>
                                <select class="selectpicker form-control bootstrap-select" name="code">
                                    <option selected disabled style="display: none;">Chọn kiểu</option>
                                    <option>Chọn kiểu</option>
                                    <option>Chọn kiểu</option>
                                    <option>Chọn kiểu</option>
                                    <option>Chọn kiểu</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group col-md-12" style="z-index: 1">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-align-left" aria-hidden="true"></i></span>
                                <input type="text" name="name" class="form-control"  placeholder="Nhập tiêu chí" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary submitBtn">Submit</button>
                        <button type="button" class="btn btn-danger closeBtn" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
