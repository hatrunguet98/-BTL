<header class="header">
        <nav class="navbar navbar-expand-md navbar-dark hearder-top ">
            <div class="container">
                <!-- name-icon -->
                <a class="navbar-brand" href="{{ url('welcome') }}">
                    <img src="{{ asset('user/images/unnamed.png') }}" width="40" height="40" class="d-inline-block align-top" alt="ClassSurvey-logo">
                    <strong> ClassSurvey</strong>
                </a>
                <!-- /.name-icon -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- header-content -->
                <div class="collapse navbar-collapse " id="navbarCollapse">
                    <ul class="navbar-nav ml-lg-4 mr-auto">
                        <!-- url to courses -->
                            <li class="nav-item active p-1">
                                <a class="nav-link" id="all-courses" href="{{url('home')}}">Courses <span class="sr-only">(current)</span></a>
                            </li>
                        <!-- url to courses -->
                        <!-- search -->
                            <li class="nav-item active">
                                <form>
                                    <input type="text" id="search-courses" class="form-search" name="search" placeholder="Search..">
                                </form>
                            </li>
                        <!-- /.search -->
                        </ul>
                    <div class="flex-center position-ref full-height">
                        <!-- login -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                            <a href="{{ route('login') }}" class="mr-4 login">Login</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <!-- name-user -->
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img class="avatar" height="30" src="{{ asset('user/images/avatar.png') }}">
                                <span class="nameuser">
                                    @if (Auth::user()->name)
                                        {{ Auth::user()->name }}
                                    @else
                                        {{ Auth::user()->username }}
                                    @endif
                                </span>
                                <span class="caret"></span>
                                </a>
                                <!-- /.name-user -->
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" id="porfile" href="{{ url('porfile') }}" >
                                        Porfile
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <!-- /.login -->
                    </div>
                    <!-- /.header-content -->
                </div>
            </div>
        </nav>
</header>
