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
    <!-- CSS -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <!-- AJAX -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <!-- Bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- js -->
    <script type="text/javascript" src="{{ asset('user/js/home.js') }}"></script>
    <!-- jquery-latest -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
    <!--header-->
    @include("user.layout.partial.header")
    <!--Main Layout-->
    @section('main')
    <!-- background-img -->
    <section style="background-image: url('{{ asset('user/css/bgk-0.jpg') }}');background-position: center;background-repeat: no-repeat;background-size: cover;color:#ffff;height: 100%">
    <!-- background-color -->
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
                        <a class="btn" href="#footer">About</a>
                        <a class="btn" href="#working">Working</a>
                    </div>
                <!--Grid row-->
                </div>
            </div>
    </section>
    <!-- main-content -->
    <main>
        <!-- banner-working -->
        <section class="banner-bottom py-5" id="working">
            <div class="container py-md-3">
                <div class="heading">
                    <h3 class="head text-center">Hoạt động của trang web</h3>
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
        <!-- /banner-working -->
        <!-- courses -->
        <section class="Courses py-5">
            <div class="container">
                <div class="inner-sec-w3ls py-lg-5 py-3">
                    <div class="heading">
                        <h3 class="head text-center">Các khóa học </h3>
                        <p class="my-3 head text-center">Sinh viên chỉ đánh giá được khóa học mình tham gia.</p>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-md-4 p-2 pl-2">
                            <div class="card-course">
                                <img id="image-course" src="{{ asset('user/images/course/ungdungweb.png') }} " alt="" class="img-course-ds">
                                <div class="info-card row">
                                    <div class="pl-3 pt-2">
                                        <div class="h7"id="name-course"><img src="{{ asset('user/images/book.png') }} " alt="" class="icon p-1"> INT3306 1 Phát triển ứng dụng web </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-xs-6 col-md-4 p-2 pl-2">
                    <div class="card-course">
                        <img id="image-course" src="{{ asset('user/images/course/quantrimang.jpg') }}" alt="" class="img-course-ds">
                        <div class="info-card row">
                            <div class="pl-3 pt-2">
                                <div class="h7"><img src="{{ asset('user/images/book.png') }}" alt="" class="icon p-1"> INT3310 1 Quản trị mạng
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-4 p-2 pl-2">
                    <div class="card-course">
                        <img id="image-course" src="{{ asset('user/images/course/dohoamaytinh.jpg') }}" alt="" class="img-course-ds">
                        <div class="info-card row">
                            <div class="pl-3 pt-2">
                            <div class="h7"><img src="{{ asset('user/images/book.png') }}" alt="" class="icon p-1"> INT3403 1 Đồ họa máy tính </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-4 p-2 pl-2">
                    <div class="card-course">
                        <img id="image-course" src="{{ asset('user/images/course/thuthapvaphantichyeucau.jpg') }}" alt="" class="img-course-ds">
                        <div class="info-card row">
                            <div class="pl-3 pt-2">
                                <div class="h7"><img src="{{ asset('user/images/book.png') }}" alt="" class="icon p-1"> INT3109  Thu thập và phân tích yêu cầu </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-4 p-2 pl-2">
                    <div class="card-course">
                        <img id="image-course" src="{{ asset('user/images/course/phattrienungdungdidong.jpg') }}" alt="" class="img-course-ds">
                        <div class="info-card row">
                            <div class="pl-3 pt-2">
                            <div class="h7"><img src="{{ asset('user/images/book.png') }}" alt="" class="icon p-1"> INT3120  Phát triển ứng dụng di động </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-4 p-2 pl-2">
                    <div class="card-course">
                        <img id="image-course" src="{{ asset('user/images/course/kientruchuongdichvu.PNG') }}" alt="" class="img-course-ds">
                        <div class="info-card row">
                            <div class="pl-3 pt-2">
                                <div class="h7"><img src="{{ asset('user/images/book.png') }}" alt="" class="icon p-1"> INT3505  Kiến trúc hướng dịch vụ </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-4 p-2 pl-2">
                <div class="card-course">
                    <img id="image-course" src="{{ asset('user/images/course/giaitich2.jpg') }}" alt="" class="img-course-ds">
                    <div class="info-card row">
                        <div class="pl-3 pt-2">
                            <div class="h7"><img src="{{ asset('user/images/book.png') }}" alt="" class="icon p-1"> MAT1042  Giải tích 2 </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-xs-6 col-md-4 p-2 pl-2">
                    <div class="card-course">
                    <img id="image-course" src="{{ asset('user/images/course/tienganh.jpg') }}" alt="" class="img-course-ds">
                    <div class="info-card row">
                        <div class="pl-3 pt-2">
                            <div class="h7"><img src="{{ asset('user/images/book.png') }}" alt="" class="icon p-1"> FLF2102  Tiếng Anh cơ sở 2 </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-4 p-2 pl-2">
                <div class="card-course">
                    <img id="image-course" src="{{ asset('user/images/course/marketing.jpg') }}" alt="" class="img-course-ds">
                    <div class="info-card row">
                        <div class="pl-3 pt-2">
                            <div class="h7"><img src="{{ asset('user/images/book.png') }}" alt="" class="icon p-1"> BSA2002  Nguyên lý Marketing  </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </section>
        <!-- /courses -->
    </main>
    <!-- /main-layout -->
    <!--footer-->
    @include("user.layout.partial.footer")
    @show
    <!-- /footer -->
    <!-- Back to top -->
    <div class='lentop'>
    <div>
    <img src="{{ asset('user/images/swipe-up.png') }}">
    </div>
    </div>
    <!-- /Back to top -->
</body>
<!-- style-background-head -->
<style>
header:hover {
    background: rgba(0, 0, 0, .6);
    transition-duration: 1s;
}
</style>
<!-- /style-background-head -->

