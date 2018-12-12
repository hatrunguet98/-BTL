@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Danh sách đánh giá</h1>
@endsection

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.11/css/dataTables.checkboxes.css" rel="stylesheet"/>
    <div class="container" style="width: 95%; background: white; padding: 20px">
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
               <!--  <tfoot>
                <tr>
                    <th></th>
                    <th>Tên môn học</th>
                    <th>Mã môn học</th>
                    <th>Giảng viên</th>
                </tr>
                </tfoot> -->
            </table>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generateSurvey">Tạo đánh giá</button>

            <div class="modal fade" id="generateSurvey" role="dialog">
                <link rel="stylesheet" href="{{ asset('css/adminView/modal.css') }}">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="form-group col-md-6 date">
                            <label for="start">Ngày bắt đầu:</label>
                            <input type="date" id="start" name="start" value="2018-07-22">
                        </div>
                        <div class="form-group col-md-6 date">
                            <label for="start">Ngày kết thúc:</label>
                            <input type="date" id="start" name="finish" value="2018-07-22">
                        </div>
                        <div class="survey-content">
                            <input type="checkbox"  id="check-all" checked /> Toggle All<br/>
                            @foreach($criteria as $criterion)
                                <div class="row">
                                    <label><input type="checkbox" name="{{'survey'.$criterion->id}}" checked value="1"><span>{{ $criterion->name }}</span></label>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>

                    </div>

                </div>
            </div>
        </form>
    </div>



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
                order: [[0, 'asc']]
            });


            $("#myform").on('submit', function(e){
                var form = this;
                var rowsel = mytable.column(0).checkboxes.selected();
                $.each(rowsel, function(index){
                    console.log(form);
                    $(form).append(
                        $('<input>').attr('type','hidden').attr('name','courses[]').val(mytable.cell(index,0).data())
                    )
                });
                //e.preventDefault();
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