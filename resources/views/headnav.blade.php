<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ url('/') }}" class="logo">
                        <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="/" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="/about">About</a></li>
                        <li class="scroll-to-section"><a href="/menu">Menu</a></li>
                        <li class="scroll-to-section"><a href="/chefs">Chefs</a></li>
                        <li class="scroll-to-section"><a href="/reservation">Resrvation</a></li>
                        <li class="submenu">
                            <a href="javascript:;">User</a>
                            <ul>
                                @guest
                                    @if (!Auth::user())
                                        <li><a href="/login">Login</a></li>
                                        <li><a href="/register">Registration</a></li>
                                    @endif
                                @else
                                    <li><a href="#UserProfile"> {{ Auth::user()->name }} </a></li>
                                    <li><a href="myreservation">My Reservation</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                    @endif
                                </ul>
                            </li>
                            

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
