<header class="header">
        <nav class="navbar navbar-expand-md navbar-dark hearder-top ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('welcome') }}">
                    <img src="{{ asset('user/images/unnamed.png') }}" width="40" height="40" class="d-inline-block align-top" alt="ClassSurvey-logo">
                    <strong> ClassSurvey</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarCollapse">
                    <ul class="navbar-nav ml-lg-4 mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="about.html">Courses <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <form>
                                    <input type="text" class="form-search" name="search" placeholder="Search..">
                                </form>
                            </li>
                        </ul>
                    <div class="flex-center position-ref full-height">
             @if (Route::has('login'))
                <div class="header-right pt-1">
                    @auth
                        <a href="{{ url('/home') }}"  >Home</a>
                    @else
                        <a href="{{ route('login') }}" class="signin mr-4 contact">Login</a>
                @if (Route::has('register'))
                        @endif
                    @endauth
                </div>
                @endif
                    </div>
                </div>
            </div>
        </nav>
</header>
