@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách đánh giá</h1>
@endsection

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.11/css/dataTables.checkboxes.css" rel="stylesheet"/>

    {{--button điều hướng--}}
    <div class="main-button">
       <a href="{{ url('/survey') }}" type="button" class="btn btn-vimeo"> Quay lại </a>
    </div>

    <form id="myform" action="{{ url('generate') }}" method="post">
        @csrf
        <table id="mytable" class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th></th>
                <th>Tên môn học</th>
                <th>Mã môn học</th>
                <th>Giảng viên</th>
            </tr>
            </thead>
        </table>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateSurvey">Tạo đánh giá</button>

        <div class="modal fade" id="generateSurvey" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">

                    <div class="form-group col-md-6 date">
                        <label for="start">Ngày bắt đầu:</label>
                        <input type="date" id="start" name="start" >
                    </div>
                    <div class="form-group col-md-6 date">
                        <label for="start">Ngày kết thúc:</label>
                        <input type="date" id="finish" name="finish" >
                    </div>
                    <div class="form-group col-md-12 survey">
                        <div class="survey-content">
                            <input type="checkbox"  id="check-all" checked /><b> Chọn tất cả</b><br/>

                            <div class="about-equipments">
                                <h5>1. Cơ sở vật chất</h5>
                                @foreach($criteria as $criterion)
                                    @if ($criterion->type == $type['0'])
                                    <div class="row">
                                        <label><input type="checkbox" class="survey-criterion" name="{{'survey'.$criterion->id}}" checked value="1"><span>{{ $criterion->name }}</span></label>
                                    </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="about-subject">
                                <h5>2. Môn học</h5>
                                @foreach($criteria as $criterion)
                                    @if ($criterion->type == $type['1'])
                                        <div class="row">
                                            <label><input type="checkbox" class="survey-criterion" name="{{'survey'.$criterion->id}}" checked value="1"><span>{{ $criterion->name }}</span></label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="about-teachers">
                                <h5>3. Hoạt động dạy hoc của giảng viên</h5>
                                @foreach($criteria as $criterion)
                                    @if ($criterion->type == $type['2'])
                                        <div class="row">
                                            <label><input type="checkbox" class="survey-criterion" name="{{'survey'.$criterion->id}}" checked value="1"><span>{{ $criterion->name }}</span></label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="about-students">
                                <h5>4. Hoạt động học tập của sinh viên</h5>
                                @foreach($criteria as $criterion)
                                    @if ($criterion->type == $type['3'])
                                        <div class="row">
                                            <label><input type="checkbox" class="survey-criterion" name="{{'survey'.$criterion->id}}" checked value="1"><span>{{ $criterion->name }}</span></label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </div>
        </div>
    </form>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.11/js/dataTables.checkboxes.min.js"></script>
    <script>
        $(document).ready(function(){
            var mytable = $("#mytable").DataTable({
                ajax : '{{URL::to("survey-generate")}}',
                columnDefs: [
                    {
                        targets: 0,
                        checkboxes: {
                            selectRow: true
                        }
                    }
                ],
                select:{
                    style: 'multi'
                },
                order: [[1, 'asc']]
            });


            $("#myform").on('submit', function(e){
                var form = this;
                var rowsel = mytable.column(0).checkboxes.selected();

                $.each(rowsel, function(index){
                    $(form).append(
                        $('<input>').attr('type','hidden').attr('name','courses[]').val(mytable.cell(index,0).data())
                    )
                });

                var countCriterion = 0;
                var criteria = document.getElementsByClassName('survey-criterion');
                for(var i = 0; i < criteria.length; i++) {
                    if (criteria[i].checked) {
                        countCriterion ++;
                    }
                }

                if(rowsel.count() == 0) {
                    alert("Chưa chọn môn học nào");
                    e.preventDefault();
                } else if (document.getElementById("start").value.length == 0) {
                    alert("Chưa chọn ngày bắt đầu");
                    e.preventDefault();
                } else if (document.getElementById("finish").value.length == 0){
                    alert("Chưa chọn ngày kết thúc");
                    e.preventDefault();
                } else if (countCriterion == 0){
                    alert("Chưa chọn tiêu chí nào");
                    e.preventDefault();
                } else if ( document.getElementById("start").value >= document.getElementById("finish").value) {
                    alert("Ngày bắt đầu phải ở trước ngày kết thúc");
                    e.preventDefault();
                }


            });
        });

        $(document).on('click','#check-all', function(){
            if(this.checked) {
                // Iterate each checkbox
                $('.survey-content .row  :checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.survey-content .row  :checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>

@endsection