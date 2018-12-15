<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ClassSurvey</title>
    <link rel="icon" href="{{ asset('user/images/unnamed.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="{{ asset('user/js/home.js') }}"></script>
</head>
<body>
    <!--header-->
    @include("user.layout.partial.header")
    <!--Main Layout-->
    @section('main')
    <section style="background-image: url('{{ asset('user/css/architecture.jpg') }}');background-position: center;background-repeat: no-repeat;background-size: cover;color:#ffff;height: 80%">
            <div class="rgba-gradient d-flex align-items-center">
            <div class="container ">
                <!--Grid row-->
                <div class="row" id="row1">
                    <!--Grid column-->
                    <div class="col-md-6 mt-5">
                        <h1 class="font-weight-bold mb-0 pt-md-5 pt-5 "><strong>ClassSurvey</strong></h1>
                        <hr class="style2">
                        <h6 class="mb-4">An objective view about the teaching quality of UET.</h6>
                        <br />
                        @guest
                            <a href="{{ route('login') }}" class="btn login-content">Login</a>
                        @else
                        <a href="" class="btn login-content"><span class="nameuser">{{ Auth::user()->username }}</span></a>
                        @endguest
                        <a class="btn login-content">Learn more</a>
                    </div>

                    <!--Grid row-->
                </div>
            </div>
</section>
<main>
        <section class="banner-bottom py-5">
            <div class="container py-md-3">
                <div class="heading">
                    <h3 class="head text-center">The working of website</h3>
                    <p class="my-3 head text-center"> Website cung cấp các chức năng để đánh giá các vấn đề của khóa
                        học.Đưa ra kết quả đánh giá khách quan nhất từ sinh viên</p>
                </div>
                <div class="row bottom_grids text-center mt-5 pt-3">
                    <div class="col-lg-4 col-md-6">
                        <img src="{{ asset('user/images/s3.png') }}" alt="" class="img-fluid">
                        <h3 class="my-3">Giảng viên</h3>
                        <p class="mb-4">Xem kết quả khảo sát: Xem danh sách lớp môn học mình giảng dạy. Xem kết quả
                            tổng hợp của từng cuộc khảo sát đối với lớp môn học mình giảng dạy.
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <img src="{{ asset('user/images/s4.png') }}" alt="" class="img-fluid">
                        <h3 class="my-3">Sinh viên</h3>
                        <p class="mb-4"> Đánh giá và cho ý kiến: Xem danh sách lớp môn học mình tham gia. Cho ý kiến
                            đánh giá về giảng viên dạy từng lớp môn học theo phiếu khảo sát.</p>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <img id="phieu" src="{{ asset('user/images/contract.png') }}" alt="" class="img-fluid">
                        <h3 class="my-3">Phiếu khảo sát</h3>
                        <p class="mb-4"> Phiếu khảo sát gồm nhiều đánh giá về cơ sở vật chất cũng như chất lượng giảng
                            dạy.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="Courses py-5">
            <div class="container">
                <div class="inner-sec-w3ls py-lg-5 py-3">
                    <div class="heading">
                        <h3 class="head text-center">Các khóa học </h3>
                        <p class="my-3 head text-center">Sinh viên chỉ đánh gái được khóa học mình tham gia.</p>
                    </div>
            <div class="row">
                    <div class="col-xs-6 col-md-4 p-2 pl-2">
            <div class="card-course">
                <img id="image-course" src="{{ asset('user/images/course/ungdungweb.png') }} " alt="" class="img-course-ds">
                <div class="info-card row">
                    <div class="pl-3 pt-2">
                        <div><img src="{{ asset('user/images/book.png') }} " alt="" class="icon p-1"><label class="h10"id="name-course"> INT3306 1 Phát triển ứng dụng web </label></div>
                        <div><img src="{{ asset('user/images/teacher.png') }}" alt="" class="icon p-1"><label class="h10" id="name-teacher">Giảng viên name</label></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4 p-2 pl-2">
            <div class="card-course">
                <img id="image-course" src="{{ asset('user/images/course/ungdungweb.pn') }}g" alt="" class="img-course-ds">
                <div class="info-card row">
                    <div class="pl-3 pt-2">
                            <div><img src="{{ asset('user/images/book.png') }}" alt="" class="icon p-1"><label class="h10"> INT3306 2 Phát triển ứng dụng web </label></div>
                            <div><img src="{{ asset('user/images/teacher.png') }}" alt="" class="icon p-1"><label class="h10">Giảng viên name</label></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4 p-2 pl-2">
            <div class="card-course">
                <img id="image-course" src="{{ asset('user/images/course/he-dieu-hanh-mang.jpg') }}" alt="" class="img-course-ds">
                <div class="info-card row">
                    <div class="pl-3 pt-2">
                            <label class="h10"> <img src="{{ asset('user/images/book.png') }}" alt="" class="icon p-1"> INT3301 1 Thực hành hệ điều hành mạng </label>
                            <label class="h10"><img src="{{ asset('user/images/teacher.png') }}" alt="" class="icon p-1"> Giảng viên name</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-5 text-center">
            <button type="submit"  class="btn btn-lg btn-success center-block">Xem thêm</button>
        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
    <!--footer-->
    @include("user.layout.partial.footer")
    @show
</body>
<style>
header:hover {
    background: rgba(0, 0, 0, .6);
    transition-duration: 1s;
}
</style>
