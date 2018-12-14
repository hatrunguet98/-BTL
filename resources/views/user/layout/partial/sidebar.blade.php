<div class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" id="sidebar">
            <!-- Sidebar user panel -->
            <ul class="tree pl-1">
                <a class="tag-sidebar p-1" href=""><img class="icontree" src="{{ asset('user/images/home.png') }}" /> Home</a>
                <li class="has-children p-1 pt-2">
                    <button class="tag-sidebar" id="course" href="{{ url('all-courses') }}"><img class="icontree" src="{{ asset('user/images/books-stack-of-three.png') }}" />
                    Courses</button>
                </li>
                <li class="has-children p-1 ">
                    <button class="tag-sidebar" id="class-survey" href=""><img class="icontree" src="{{ asset('user/images/notebook.png') }}" /> ClassSurvey</button>
                    <ul id="list-survey" style="display:none">
                        <a class="tag-sidebar" id="tag-classsurvey" href="{{ url('surveys') }}">
                            <img class="icontree" src="{{ asset('user/images/book1.png') }}" /><span id="name-courses">INT2202 1</span>
                        </a>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </div>
        <div class="mobile-sidebar">
        <a class="tag-sidebar "href=""><img class="icontree" src="{{ asset('user/images/home.png') }}" /> Home</a>
        <button class="tag-sidebar" id="course-mobile" href=""><img class="icontree" src="{{ asset('user/images/books-stack-of-three.png') }}" />
        Courses</button>
        <button class="tag-sidebar" id="class-survey-mobile" href=""><img class="icontree" src="{{ asset('user/images/notebook.png') }}" /> ClassSurvey</button>
        <ul id="list-survey-mobile" style="display:none">
            <li class="tag-courses">
            <button class="tag-sidebar" id="tag-classsurvey" href="{{ url('surveys') }}">
                    <img class="icontree" src="{{ asset('user/images/book1.png') }}" /><span id="name-courses">INT2202 1</span>
            </button>
            </li>
        </ul>
    </div>
