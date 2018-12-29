<!-- sidebar-pc -->
<div class="main-sidebar">
        <!-- sidebar-pc: style can be found in sidebar.less -->
        <section class="sidebar" id="sidebar">
            <!-- Sidebar-pc user panel -->
            <ul class="tree pl-1">
                <a class="tag-sidebar p-1" href="{{ url('welcome') }}"><img class="icontree" src="{{ asset('user/images/home.png') }}" /> Home</a>
                <li class="has-children p-1 pt-2">
                    <button class="tag-sidebar" id="course"><img class="icontree" src="{{ asset('user/images/books-stack-of-three.png') }}" />
                    Courses</button>
                </li>
                <!-- list-survery-result -->
                <li class="has-children p-1 ">
                    <button class="tag-sidebar" id="class-survey" href=""><img class="icontree" src="{{ asset('user/images/notebook.png') }}" /> ClassSurvey</button>
                    <ul id="list-survey" style="display:none">
                        @foreach($courses as $course)
                        <li>
                        <a class="tag-sidebar" id="survey" data-id="{{$course->user_courses_id}}" href="{{ url('surveys') }}">
                            <img class="icontree" src="{{ asset('user/images/book1.png') }}" /><span id="name-courses">{{$course->code}}</span>
                            <p class="h6" id="name-course" style="display:">{{$course->course_name}}</p>
                        </a>
                        @endforeach
                        </li>
                    </ul>
                </li>
                <!-- /.list-survery-result -->
            </ul>
        </section>
        <!-- /.sidebar-pc -->
</div>
<!-- sidebar-mobile -->
<div class="mobile-sidebar">
        <a class="tag-sidebar "href="{{ url('welcome') }}"><img class="icontree" src="{{ asset('user/images/home.png') }}" /> Home</a>
        <button class="tag-sidebar" id="course"><img class="icontree" src="{{ asset('user/images/books-stack-of-three.png') }}" />
                    Courses</button>
        <button class="tag-sidebar" id="class-survey-mobile" href=""><img class="icontree" src="{{ asset('user/images/notebook.png') }}" /> ClassSurvey</button>
        <!-- list-survery-result -->
        <ul id="list-survey-mobile" style="display:none">
        @foreach($courses as $course)
            <li class="tag-courses p-0">
                <a class="tag-sidebar" id="survey" data-id="{{$course->user_courses_id}}" href="{{ url('surveys') }}">
                    <img class="icontree" src="{{ asset('user/images/book1.png') }}" /><span id="name-courses">{{$course->code}}</span>
                    <p class="h6" id="name-course" >{{$course->course_name}}</p>
                </a>
            @endforeach
            </li>
        </ul>
        <!-- /.list-survery-result -->
</div>
<!-- /.sidebar-mobile -->
