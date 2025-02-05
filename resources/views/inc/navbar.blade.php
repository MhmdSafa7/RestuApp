
<div class="wrap ">
    <div class="wrap container-fluid">
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

        </button>

        <!-- Toggler Button for Mobile -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span>
        </button>


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
                        <li class="nav-item @if (Request::is('chatbot')) active @endif">
                            <a href="/chatbot" class="nav-link">Assistant</a>
                        </li>
                        <li class="nav-item @if (Request::is('reservation')) active @endif">
                            <a href="/reservation" class="nav-link">Reservation</a>
                        </li>
                        <li class="nav-item @if (Request::is('feedback')) active @endif">
                            <a href="/feedback" class="nav-link">Feedback</a>
                        </li>
        @endif





                <!-- Authentication Links -->
                @auth
                <h4 style="color:white;" class="mb-4">Welcome, {{ Auth::user()->role }}</h4>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="nav-item">
                    @csrf
                    <button class="btn" type="submit" style="color:red;">Logout</button>
                </form>


                @if (Auth::check())

                    <li class="nav-item @if (Request::is('product')) active @endif">
                        <a href="/product" class="nav-link">Products</a>
                    </li>
                    <li class="nav-item @if (Request::is('offers')) active @endif">
                        <a href="/offers" class="nav-link">Offers</a>
                    </li>
                    <li class="nav-item @if (Request::is('events')) active @endif">
                        <a href="/events" class="nav-link">Events</a>
                    </li>
                    <li class="nav-item @if (Request::is('feedbackview')) active @endif">
                        <a href="/feedbackview" class="nav-link">Feedbacks</a>
                    </li>
                    <li class="nav-item @if (Request::is('reservationview')) active @endif">
                        <a href="/reservationview" class="nav-link">Reservations</a>
                    </li>
                    <li class="nav-item @if (Request::is('statistics')) active @endif">
                        <a href="/statistics" class="nav-link">Statistics</a>
                    </li>
                @endif
{{--
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
                    <li class="nav-item @if (Request::is('statistics')) active @endif">
                        <a href="/statistics" class="nav-link">Statistics</a>
                    </li>
                @endif --}}
            @endauth

            @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endguest

                    </li>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->




