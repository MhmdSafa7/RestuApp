@extends('layout.app')

@section('content')


<style>
    /* Custom Styles for the Reservation Page */
    body {background-color: #ddd;}

    .hero-wrap {
        position: relative;
        background-size: cover;
        background-position: center;
    }

    .hero-wrap .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
    }

    .hero-wrap .slider-text {
        position: relative;
        z-index: 1;
    }

    .hero-wrap h1 {
        font-size: 3rem;
        font-weight: 700;
        color: #fff;
    }

    .breadcrumbs {
        color: #fff;
    }

    .breadcrumbs a {
        color: #fff;
        text-decoration: none;
    }

    .breadcrumbs a:hover {
        color: #ffc107;
    }

    .appointment-form {
        background: #790505;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 10px 60px rgba(80, 0, 0, 0.5);
    }

    .appointment-form h3 {
        font-size: 2rem;
        font-weight: 700;
        color: #0f1011;
        margin-bottom: 20px;
        text-align: center;

    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        height: 50px;
        border-radius: 5px;
        border: 1px solid black;
        padding: 10px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
        color: #0f1011;
        text-decoration-color:  #000;

    }

    .form-control:focus {
        border-color: black;
        box-shadow: none;
        color: #000;
    }

    .input-wrap {
        position: relative;
    }

    .input-wrap .icon {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: black;
    }

    .input-wrap input {
        padding-left: 40px;
    }

    .select-wrap {
        position: relative;
    }

    .select-wrap .icon {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        color: black;
        pointer-events: none;
    }

    .select-wrap select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        padding-right: 40px;
    }

    .btn-white {
        background-color: #fff;
        color: black;
        border: 2px solid black;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-white:hover {
        background-color: black;
        color: #fff;
    }
</style>

{{-- image --}}
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-5">
                <h1 class="mb-2 bread">Book A Table Now</h1>
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span>
                    <span>Reservation <i class="fa fa-chevron-right"></i></span>
                </p>
            </div>
        </div>
    </div>
</section>
{{-- reservation container--}}
<section class="ftco-section " style="background-image: url('images/bg_4.jpg');">
        <div class="container">
        <div class="row no-gutters justify-content-center">
            <div class="col-md-8 p-4 p-md-5 d-flex align-items-center justify-content-center bg-gray">
                <form method="post" action="/newres" class="appointment-form">
                    @csrf
                    <h3 class="mb-4">Book Your Table</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name" required
                                       value="{{ Auth::check() ? Auth::user()->name : '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required
                                       value="{{ Auth::check() ? Auth::user()->email : '' }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="phonenumber" class="form-control" placeholder="Phone" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="fa fa-calendar"></span></div>
                                    <input type="text" name="date" class="form-control book_date" placeholder="Date" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="fa fa-clock-o"></span></div>
                                    <input type="text" id="timeInput" name="time" class="form-control book_time" placeholder="Time" required>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="select-wrap">
                                    <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                    <select name="guests" class="form-control" required>
                                        <option value="">Number of Guests</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="form-group">
                                <input type="submit" value="Book Your Table Now" class="btn btn-white py-3 px-5">
                            </div>
                            <script>
                                flatpickr("#timeInput", {
                                   enableTime: true,
                                   noCalendar: true,
                                   dateFormat: "h:i K",
                                   minTime: "09:00",
                                   maxTime: "02:00",
                                   time_24hr: false
                               });

                               function validateForm() {
                                   let name = document.forms["reservationForm"]["name"].value;
                                   let email = document.forms["reservationForm"]["email"].value;
                                   let phone = document.forms["reservationForm"]["phonenumber"].value;
                                   let date = document.forms["reservationForm"]["date"].value;
                                   let time = document.forms["reservationForm"]["time"].value;

                                   if (name == "" || email == "" || phone == "" || date == "" || time == "") {
                                       alert("Please fill in all required fields before submitting.");
                                       return false;
                                   }

                                   alert("Reservation successful!");
                                   return true;
                               }
                           </script>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection


<!-- Include Flatpickr Library -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

