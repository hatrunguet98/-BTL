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
                        <a class="btn btn-white">Sign in</a>
                        <a class="btn btn-outline-white">Learn more</a>
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
                    <a href="javascript:loadcourses()">adfad</a>
                    <div id="courses-all"></div>
                </div>
            </div>
        </section>
</main>

