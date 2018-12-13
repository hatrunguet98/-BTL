
@extends('welcome')
@section('main')
    <div class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" id="sidebar">
            <!-- Sidebar user panel -->
            <ul class="tree pl-1">
                <a class="tag-sidebar p-1" href=""><img class="icontree" src="{{ asset('user/images/home.png') }}" /> Home</a>
                <li class="has-children p-1 pt-2">
                    <button class="tag-sidebar" id="course" href=""><img class="icontree" src="{{ asset('user/images/books-stack-of-three.png') }}" />
                    Courses</button>
                </li>
                <li class="has-children p-1 ">
                    <button class="tag-sidebar" id="class-survey" href=""><img class="icontree" src="{{ asset('user/images/notebook.png') }}" /> ClassSurvey</button>
                    <ul id="list-survey" style="display:none">
                        <li class="tag-courses">
                            <a class="tag-sidebar" href="">
                                <img class="icontree" src="{{ asset('user/images/book1.png') }}" />INT3306 2
                                <p class="name-course">  ứng dụng web</p>
                            </a>
                        </li>
                       
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </div>
        <div class="mobile-sidebar">
        <a class="tag-sidebar "href=""><img class="icontree" src="{{ asset('user/images/home.png') }}" /> Home</a>
        <button class="tag-sidebar" id="course" href=""><img class="icontree" src="{{ asset('user/images/books-stack-of-three.png') }}" />
        Courses</button>
        <button class="tag-sidebar" id="class-survey" href=""><img class="icontree" src="{{ asset('user/images/notebook.png') }}" /> ClassSurvey</button>
            <ul id="list-survey"  style="display:none">
                <li class="tag-courses" >
                    <a class="tag-sidebar" href="">
                        <img class="icontree" src="{{ asset('user/images/book1.png') }}" />INT3306 2
                        <p class="name-course">  ứng dụng web</p>
                    </a>
                </li>
            </ul>
    </div>
    <!--Main Layout-->
    @include("user.elements.courses")
    @endsection
    <style>
    header{
        background: -webkit-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
    }
</style>

