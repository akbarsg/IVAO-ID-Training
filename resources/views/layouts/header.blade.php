<header id="top-bar" class="navbar-fixed-top animated-header">
    <div class="container">
        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <div class="navbar-brand">
                <a href="index.html" >
                    <img src="#" alt="">
                </a>
            </div>
            <!-- /logo -->
        </div>
        <!-- main menu -->
        <nav class="collapse navbar-collapse navbar-right" role="navigation">
            <div class="main-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/" >Beranda</a>
                    </li>
                    <!-- <li><a href="about.html">IVAO ID</a></li> -->
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Resources <span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="documents.html">Documents</a></li>
                                <li><a href="news.html">News</a></li>
                                <li><a href="softwares.html">Softwares</a></li>
                            </ul>
                        </div>
                    </li>
                    <!-- <li><a href="/training">Training</a></li> -->

                    <!-- <li><a href="contact.html">Contact</a></li> -->
                    @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
                    @else
                    <!-- <li><a href="{{ route('home') }}">Dashboard</a></li> -->
                    <li><a href="/training">Request</a></li>
                    <li><a href="/dashboard">Dashboard</a></li>
                    @if(Auth::user()->isStaff == 1)
                    <li><a href="/room">Trainer Room</a></li>
                    @endif
                    <li>
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        
                    </form>
                </li>
                @endif
            </ul>
        </div>
    </nav>
    <!-- /main nav -->
</div>
</header>