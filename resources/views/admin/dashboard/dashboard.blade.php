@extends('admin.adminLayout.adminLayout')

@section('content')
    <div class="container">
        <div class="">
            <p class="h1 text-center">
            <img src="{{ asset('user/images/unnamed.png') }}" width="100" height="100" class="d-inline-block align-top" alt="ClassSurvey-logo">
            <strong> ClassSurvey</strong>
            </a>
            </p>
        </div>
        <div class="">
                    <p  class="h1"> Thành viên trong nhóm </p>
                    <p  class="pt-5"> - Hà Công Trung<p>
                    <p  class="pl-5"> - Hà Văn Tú  <p>
                    <p  class="pl-1"> - Nguyễn Tiến Việt<p>
            </div>
        <div class="row pt-5">
            <div class="col-lg-6">
                    <p id="p2" class="pt-md-2">Bài tập lớn môn ứng dụng web</p>
                    <p id="p3" class=" pt-md-2">Đề tài: ClassSurvey-hệ thống khảo sát lấy ý kiến đánh giá của sinh viên về lớp môn học.<p>
                    <a target="_blank" href="https://laravel.com/" id="p3" class=" pt-md-2">Website xây dựng trên cơ sở framework php Laravel. </a>
            </div>
            <div class="col-lg-6">
                <p id="p2" class="pt-md-2">Phiên bản phần mềm được sử dụng</p>
                <p id="p3" class=" pt-md-2">- Laravel 5.7.<p>
                <p id="p3" class=" pt-md-2">- PHP 7.2..<p>
                <p id="p3" class=" pt-md-2">- Mysql server.<p>
                <p id="p3" class=" pt-md-2">- Composer 1.7.2.<p>
                <p id="p3" class=" pt-md-2">- Maatwebsite/excel version 3.1.<p>
            </div>
        </div>
    </div>
@endsection
