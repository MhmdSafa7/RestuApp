@extends('layout.app')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-5">
                <h1 class="mb-2 bread">Reservation</h1>
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span>
                    <span>Reservation View <i class="fa fa-chevron-right"></i></span>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Custom CSS for Styling -->
<style>
    body {
        background-color: #ddd; /* Set background color to #ddd */
    }

    .reservation-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #fff; /* White background for cards */
        border: 1px solid #e0e0e0; /* Add border to cards */
        border-radius: 10px; /* Rounded corners */
    }

    .reservation-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        border: 1px solid #ff0000; /* Red border on hover */
        background: linear-gradient(135deg, #f8f9fa, #e9ecef); /* Gradient background on hover */
    }

    .card-header {
        background-color: #23292e; /* Dark background for header */
        color: #fff; /* White text for header */
        border-bottom: 1px solid #583e3e; /* Add a border to separate header */
        border-top-left-radius: 10px; /* Rounded corners for header */
        border-top-right-radius: 10px;
    }

    .card-body {
        background-color: #fff; /* White background for body */
    }

    .table-bordered {
        border: 1px solid #e0e0e0; /* Add border to the table */
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #e0e0e0; /* Add border to table cells */
    }

    .u-link-v5 {
        color: #ff0000; /* Red color for links */
        text-decoration: none; /* Remove underline */
    }

    .u-link-v5:hover {
        color: #b30000; /* Darker red on hover */
    }
</style>

<section class="ftco-section">
    <div class="container-fluid"> <!-- Use container-fluid for full width -->
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Customers</span>
                <h2 class="mb-4">Reservations</h2>
            </div>
        </div>

        <div class="student-profile py-4">
            <div class="container-fluid"> <!-- Use container-fluid for full width -->
                <div class="row" style="padding: 0 2%;"> <!-- Add 2% padding to the row -->
                    @if(count($res) >= 1)
                        @foreach($res as $f)
                            <!-- Adjust column width for 2 or 3 cards per row -->
                            <div class="col-lg-4 col-md-6 mb-4"> <!-- Use col-lg-4 for 3 cards per row -->
                                <div class="card shadow-sm reservation-card">
                                    <div class="card-header bg-transparent border-0">
                                        <h3 class="mb-0"><i class="fas fa-info-circle"></i> Reservation Information</h3>
                                    </div>
                                    <div class="card-body pt-0">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th width="30%">Name</th>
                                                <td width="2%">:</td>
                                                <td>{{$f->name}}</td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Email</th>
                                                <td width="2%">:</td>
                                                <td>{{$f->Email}}</td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Phone Number</th>
                                                <td width="2%">:</td>
                                                <td>{{$f->phonenumber}}</td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Date</th>
                                                <td width="2%">:</td>
                                                <td>{{$f->date}}</td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Time</th>
                                                <td width="2%">:</td>
                                                <td>{{$f->time}}</td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Contact Customer</th>
                                                <td width="2%">:</td>
                                                <td>
                                                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="mailto:{{$f->Email}}">
                                                        <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                                                        Send Email
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <p class="text-muted">No reservations available.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
