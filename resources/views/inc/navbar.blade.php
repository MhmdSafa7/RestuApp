{{-- first line --}}
<div class="wrap ">
    <div class="wrap container-fluid">
        <div class="row justify-content-between">
            <div class="col-12 col-md d-flex align-items-center">
                <p class="mb-0 phone"><span class="mailus">Phone no:</span> <a href="#">+961 78983139</a> or
                    <span class="mailus">email us:</span> <a href="#">Grilledtaste@email.com</a>
                </p>
            </div>
            <div class="col-12 col-md d-flex justify-content-md-end">
                <p class="mb-0">Mon - thu / 9am-12am, fri - Sun / 9am-2am</p>
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
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <div class="three-dots">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </button>

        <style>
            .three-dots {
                display: flex;
                flex-direction: column;
                gap: 3px;
                /* Space between dots */
            }

            .dot {
                width: 6px;
                /* Size of each dot */
                height: 6px;
                /* Size of each dot */
                background-color: rgb(147, 7, 7);
                /* Color of the dots */
                border-radius: 50%;
                /* Makes the dots circular */
            }
        </style>

{{-- guest --}}
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
            <h4 style="color:white;" class="mb-4">Welcome, {{ Auth::user()->name }}</h4>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="nav-item">
                @csrf
                <button class="btn" type="submit" style="color:red;">Logout</button>
            </form>

{{-- user --}}
            @if (auth()->user()->role == 'USER')
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
                        <li class="nav-item @if (Request::is('history')) active @endif">
                            <a href="/history" class="nav-link">History</a>
                        </li>
            @endif

{{-- user --}}
            @if (auth()->user()->role == 'ADMIN')
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">

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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('register') }}</a>
                        </li>
            @endif
{{-- editor --}}
            @if (auth()->user()->role == 'EDITOR')
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">

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
{{-- Moderator --}}
            @if (auth()->user()->role == 'MODERATOR')
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
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
        @endauth

        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('UserRegister') }}">{{ __('register') }}</a>
            </li>
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
