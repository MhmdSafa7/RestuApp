<<<<<<< HEAD
=======
<!-- filepath: /c:/maaref/capstone project/resto1/resources/views/inc/navbar.blade.php -->
>>>>>>> fafad3d9bb1ebe1d47cd1dfe745a38b46e59e29e
<div class="wrap">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-md d-flex align-items-center">
                <p class="mb-0 phone"><span class="mailus">Phone no:</span> <a href="#">+961 78983139</a> or
                    <span class="mailus">email us:</span> <a href="#">Grilledtaste@email.com</a>
                </p>
            </div>
            <div class="col-12 col-md d-flex justify-content-md-end">
                <p class="mb-0">Mon - Fri / 9:00-21:00, Sat - Sun / 10:00-20:00</p>
                <div class="social-media">
                    <p class="mb-0 d-flex">
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                        <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Grilled<span>taste</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span>
<<<<<<< HEAD

        </button>
=======
        </button>

>>>>>>> fafad3d9bb1ebe1d47cd1dfe745a38b46e59e29e
        @auth
            @if (Auth::check())
                <h4 style="color:white;" class="mb-4">Welcome, {{ Auth::user()->name }}</h4>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="nav-item">
                    @csrf

                    <button class="btn" type="submit" style=" position:relative;  color:red;">Logout</button>

                </form>
            @endif
        @endauth

<<<<<<< HEAD
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">


                @if (!Auth::check())
                    <li
                        class="nav-item
                @if (Request::is('/')) active @endif
                ">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                @endif


                @if (!Auth::check())
                    <li class="nav-item @if (Request::is('about')) active @endif"><a href="/about"
                            class="nav-link">About</a></li>
                @endif


                @if (!Auth::check())
                    <li
                        class="nav-item
                    @if (Request::is('menu')) active @endif
                    ">
                        <a href="/menu" class="nav-link">Menu
                        </a>
                    </li>
                @endif


                @if (!Auth::check())
                    <li
                        class="nav-item
                @if (Request::is('reservation')) active @endif
                ">
                        <a href="/reservation" class="nav-link">Reservation</a>
                    </li>
                @endif


                @if (!Auth::check())
                    <li
                        class="nav-item
                @if (Request::is('feedback')) active @endif
                ">
                        <a href="/feedback" class="nav-link">feedback</a>
                    </li>
                @endif


                @if (Auth::check())
                    @if (Auth::user()->role == 'SUPER_ADMIN')
                        <li
                            class="nav-item
                @if (Request::is('register')) active @endif
                ">
                            <a href="/register" class="nav-link">Register</a>
                        </li>
                    @endif
                @endif

                {{-- //////////////////////////////////////////////////////////////////////////////////////////// --}}


                {{-- Products for editor --}}
                @if (Auth::check())
                    @if (Auth::user()->role == 'SUPER_ADMIN')
                        <li
                            class="nav-item
                     @if (Request::is('product')) active @endif
                 ">
                            <a href="/product" class="nav-link">Products</a>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'EDITOR')
                        <li
                            class="nav-item
                     @if (Request::is('product')) active @endif
                 ">
                            <a href="/product" class="nav-link">Products</a>
                        </li>
                    @endif
                @endif


                {{-- Feedbacks for moderator  feedbackview--}}
                @if (Auth::check())
                    @if (Auth::user()->role == 'SUPER_ADMIN')
                        <li
                            class="nav-item
                     @if (Request::is('feedbackview')) active @endif
                 ">
                            <a href="/feedbackview" class="nav-link">Feedbacks</a>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'MODERATOR')
                        <li
                            class="nav-item
                     @if (Request::is('feedbackview')) active @endif
                 ">
                            <a href="/feedbackview" class="nav-link">Feedbacks</a>
                        </li>
                    @endif
                @endif



                {{-- Reservations for moderator reservationview --}}
                @if (Auth::check())
                    @if (Auth::user()->role == 'SUPER_ADMIN')
                        <li
                            class="nav-item
                     @if (Request::is('reservationview')) active @endif
                 ">
                            <a href="/reservationview" class="nav-link">Reservations</a>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'MODERATOR')
                        <li
                            class="nav-item
                     @if (Request::is('reservationview')) active @endif
                 ">
                            <a href="/reservationview" class="nav-link">Reservations</a>
                        </li>
                    @endif
                @endif



                {{-- Offers for editor offers --}}
                @if (Auth::check())
                    @if (Auth::user()->role == 'SUPER_ADMIN')
                        <li
                            class="nav-item
                     @if (Request::is('offers')) active @endif
                 ">
                            <a href="/offers" class="nav-link">Offers</a>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'EDITOR')
                        <li
                            class="nav-item
                     @if (Request::is('offers')) active @endif
                 ">
                            <a href="/offers" class="nav-link">Offers</a>
                        </li>
                    @endif
                @endif



                {{-- Events for editor events --}}
                @if (Auth::check())
                    @if (Auth::user()->role == 'SUPER_ADMIN')
                        <li
                            class="nav-item
                     @if (Request::is('events')) active @endif
                 ">
                            <a href="/events" class="nav-link">Events</a>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'EDITOR')
                        <li
                            class="nav-item
                     @if (Request::is('events')) active @endif
                 ">
                            <a href="/events" class="nav-link">Events</a>
                        </li>
                    @endif
                @endif




=======
        @if (!Auth::check())
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <!-- Links for all users -->
                        <li class="nav-item @if (Request::is('/')) active @endif">
                            <a href="/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item @if (Request::is('about')) active @endif">
                            <a href="/about" class="nav-link">About</a>
                        </li>
                        <li class="nav-item @if (Request::is('menu')) active @endif">
                            <a href="/menu" class="nav-link">Menu</a>
                        </li>
                        <li class="nav-item @if (Request::is('reservation')) active @endif">
                            <a href="/reservation" class="nav-link">Reservation</a>
                        </li>
                        <li class="nav-item @if (Request::is('feedback')) active @endif">
                            <a href="/feedback" class="nav-link">Feedback</a>
                        </li>
        @endif

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <!-- Links for authenticated users based on roles -->
                    @if (Auth::user()->isAdmin())
                        <li class="nav-item (Request::is('register')) active ">
                            <a href="/register" class="nav-link">Register</a>
                        </li>
                        <li class="nav-item @if (Request::is('product')) active @endif">
                            <a href="/product" class="nav-link">Products</a>
                        </li>
                        <li class="nav-item @if (Request::is('feedbackview')) active @endif">
                            <a href="/feedbackview" class="nav-link">Feedbacks</a>
                        </li>
                        <li class="nav-item @if (Request::is('reservationview')) active @endif">
                            <a href="/reservationview" class="nav-link">Reservations</a>
                        </li>
                        <li class="nav-item @if (Request::is('offers')) active @endif">
                            <a href="/offers" class="nav-link">Offers</a>
                        </li>
                        <li class="nav-item @if (Request::is('events')) active @endif">
                            <a href="/events" class="nav-link">Events</a>
                        </li>
                    @endif
                    @if (Auth::user()->isEditor())
                        <li class="nav-item @if (Request::is('product')) active @endif">
                            <a href="/product" class="nav-link">Products</a>
                        </li>
                        <li class="nav-item @if (Request::is('offers')) active @endif">
                            <a href="/offers" class="nav-link">Offers</a>
                        </li>
                        <li class="nav-item @if (Request::is('events')) active @endif">
                            <a href="/events" class="nav-link">Events</a>
                        </li>
                    @endif
                    @if (Auth::user()->isModerator())
                        <li class="nav-item @if (Request::is('feedbackview')) active @endif">
                            <a href="/feedbackview" class="nav-link">Feedbacks</a>
                        </li>
                        <li class="nav-item @if (Request::is('reservationview')) active @endif">
                            <a href="/reservationview" class="nav-link">Reservations</a>
                        </li>
                    @endif

                    <!-- Logout Link -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
>>>>>>> fafad3d9bb1ebe1d47cd1dfe745a38b46e59e29e
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
