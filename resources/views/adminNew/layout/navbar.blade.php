    <!-- Begin page -->
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->

    <!-- Page Header Start-->
    <div class="page-header">
        <div class="header-wrapper row m-0">
            {{-- <form class="form-inline search-full col" action="#" method="get">
                <div class="form-group w-100">
                    <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative">
                            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                placeholder="Search Cuba .." name="q" title="" autofocus="">
                            <div class="spinner-border Typeahead-spinner" role="status"><span
                                    class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                        </div>
                        <div class="Typeahead-menu"></div>
                    </div>
                </div>
            </form> --}}
            <div class="header-logo-wrapper col-auto ">
                <div class="logo-wrapper"><a href="index.html"><img class="img-fluid"
                            src="{{ asset('adminNew') }}/assets/images/logo/logo.png" alt=""></a></div>
                <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle"
                        data-feather="align-center"></i></div>
            </div>

            <div class="nav-right  pull-right right-header mx-auto p-0">
                <ul class="nav-menus">
                    {{-- Yehi hy --}}
                    <li>
                        <div class="mode"><i class="fa fa-moon-o"></i></div>
                    </li>
                    {{-- Han han yehi hy --}}
                    <li class="maximize"><a class="text-dark" href="#!"
                            onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a>
                    </li>

                        {{-- Admin list Starts --}}
                    <li class="profile-nav onhover-dropdown p-0 me-0">
                        <div class="media profile-media">
                            <img class="b-r-10"
                                src="{{ asset('adminNew') }}/assets/images/dashboard/profile.jpg" alt="">

                            <div class="media-body"><span>{{Auth::user()->name}}</span>
                                <p class="mb-0 font-roboto">{{Auth::user()->role}} <i class="middle fa fa-angle-down"></i></p>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div">
                            <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>
                            <li><a href="#"><i data-feather="mail"></i><span>Inbox</span></a></li>
                            <li><a href="#"><i data-feather="file-text"></i><span>Taskboard</span></a></li>
                            <li><a href="#"><i data-feather="settings"></i><span>Settings</span></a></li>
                            <li><a href="#"><i data-feather="log-in"> </i><span>Log in</span></a></li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                        class="mdi mdi-power text-danger"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <script class="result-template" type="text/x-handlebars-template">
                    <div class="ProfileCard u-cf">
                    <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                    <div class="ProfileCard-details">
                    </div>
                    </div>
                  </script>
            <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
    </div>
