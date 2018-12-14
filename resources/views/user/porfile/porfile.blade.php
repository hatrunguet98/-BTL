@extends('welcome')
@section('main')
<main class="main-profile">
        <div class="row">
            <div class="col-sm-4 pt-5">
                <div class="img-profile container">
                    <div class="">
                            <label id="uploadImgParent" for="avatar" class="uploadImgButton">
                                <img class="pt-4" src="{{ asset('user/images/photo-camera.png') }}" alt="">
                                 <input type="file" class="img-avarta" id="avatar" name="avatar" accept="image/*"/>
                            </label>
                        </div>
                </div>
                <div class="info-profile">
                    <span class="nameuser">Name user</span>
                    <br>
                    <span class="msv">MSV:</span>
                    <br>
                    <span class="khóa">Khóa:</span>
                </div>
            </div>
            <div class="col-sm-8 set-info">
                <div class="content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <form class="form" action="##" method="post" id="registrationForm">
                            <div class="form-group pl-2 pt-1 row">
                                <div class="col-sm-4">
                                    <label for="first_name">
                                        <h4>First name</h4>
                                    </label>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                        placeholder="first name" title="enter your first name if any.">
                                </div>
                                <div class="col-sm-4">
                                    <label for="last_name">
                                        <h4>Last name</h4>
                                    </label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name"
                                        title="enter your last name if any.">
                                </div>
                            </div>
                            <div class="form-group pl-2 pt-1 row">

                                <div class="col-sm-2">
                                    <label for="msv">
                                        <h4>Msv</h4>
                                    </label>
                                    <input type="text" class="form-control" name="msv" id="msv" placeholder="enter msv"
                                        title="enter your msv number if any.">
                                </div>
                                <div class="col-sm-3">
                                    <label for="date">
                                        <h4>Date</h4>
                                    </label>
                                    <input type="date" class="form-control" name="date" id="date" placeholder="mm/dd/yyyy"
                                        value="" min="1990-01-01" max="2025-12-31" title="enter your birthday.">
                                </div>
                                <div class="col-sm-3">
                                    <label for="date">
                                        <h4>Giới tính</h4>
                                    </label>
                                    <div class="p-2">
                                        <input type="radio" name="gioitinh" value="Nam" checked> Male
                                        <input type="radio" name="gioitinh" value="Nữ"> Female
                                        <input type="radio" name="gioitinh" value="Khác"> Other </div>
                                </div>
                            </div>
                            <div class="form-group pl-2 pt-1 row">
                                <div class="col-sm-2">
                                    <label for="phone">
                                        <h4>Phone</h4>
                                    </label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone"
                                        title="enter your phone number if any.">
                                </div>
                                <div class="col-sm-4">
                                    <label for="email">
                                        <h4>Email</h4>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com"
                                        title="enter your email.">
                                </div>
                                <div class="col-sm-4">
                                    <label for="location">
                                        <h4>Location</h4>
                                    </label>
                                    <input type="email" class="form-control" id="location" placeholder="somewhere"
                                        title="enter a location">
                                </div>
                            </div>
                    </div>
                    <div class="form-group pl-2 pt-1 row">
                        <div class="col-sm-4">
                            <label for="password">
                                <h4>Password</h4>
                            </label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="password"
                                title="enter your password.">
                        </div>
                        <div class="col-sm-4">
                            <label for="password2">
                                <h4>Verify</h4>
                            </label>
                            <input type="password" class="form-control" name="password2" id="password2" placeholder="password2"
                                title="enter your password2.">
                        </div>
                    </div>
                    <div class="form-group pl-5 pt-1">
                        <div class="">
                            <br>
                            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
                                Commit</button>
                        </div>
                    </div>
                    </form>

                    <hr>

                </div>
                <!--/tab-pane-->

            </div>
        </div>
        </div>
    </main>
    @endsection
    <style>
    header{
        background: -webkit-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
    }
    </style>
