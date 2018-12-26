@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách đánh giá mặc định</h1>
@endsection

@section('content')
    <div class="main-button">
        <button type="button" class="btn btn-vimeo" data-toggle="modal" data-target="#insertCriterion">Thêm tiêu chí</button>
    </div>

    <div id="table">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                {{--<th>Số thứ tự</th>--}}
                <th>Cở sở vật chất</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                {{--<td>1</td>--}}
                <td><p>ssssssssssssss ssssssssssss sssssssssss ssssssssssss sssssssssssss sssssss ssssssssssss</p></td>
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
                {{--<th>Số thứ tự</th>--}}
                <th>Cở sở vật chất</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                {{--<td>1</td>--}}
                <td><p>ssssssssssssss ssssssssssss sssssssssss ssssssssssss sssssssssssss sssssss ssssssssssss</p></td>
                <td>
                    <a  class="btn btn-success btn-xs" id="edit">Edit</a>
                    <a  class="btn btn-danger btn-xs" id="delete">Delete</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>


    @include('admin.surveys.setDefault.InsertCriterionModal')

    @include('admin.surveys.setDefault.editCriterionModal')

@endsection

@section('js')
    <script type="text/javascript">
        // -----------------edit-----------------
        $(document).on('click','#edit', function(){
            $('#editCriterion').modal('show');
        });
    </script>
@endsection