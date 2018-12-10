@extends('admin.adminLayout.adminLayout')

@section('content_header')
    <h1>Tạo đánh giá</h1>
@endsection

@section('content')

    <div class="container">
        <link rel="stylesheet" href="{{ asset('css/adminView/surveyForm.css') }}">
        <form action="{{ url('survey-register') }}" method="post">
            @csrf
            <h3>Chọn môn</h3>
            @foreach($courses as $course)
                <div class="row select-subject">
                    <div class="form-group col-md-12 survey first-child">
                        <div class="survey-content">
                            <input type="checkbox" name="{{ $course->code }}" value="1">
                            <label>{{ $course->name}}</label>
                        </div>
                    </div>
                </div>
            @endforeach

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

    <script type="text/javascript">
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