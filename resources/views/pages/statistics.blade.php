@extends('layout.app')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-5">
                <h1 class="mb-2 bread">Statistics</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Statistics <i class="fa fa-chevron-right"></i></span></p>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Analytics</span>
                <h2 class="mb-4">Feedback Statistics</h2>
            </div>
        </div>

        <div style="width: 50%; margin: auto; margin-bottom: 30px;"> <!-- Added margin-bottom here -->
            {!! $chart->container() !!}
        </div>
    </div>
</section>

<div style="width: 80%; height: 2px; background-color: red; margin: 20px auto;"></div>

<section class="ftco-section">
    <div class="container">
         <!-- Bar Graph Section -->
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Analytics</span>
                <h2 class="mb-4">Reservation Statistics</h2>
            </div>
        </div>
        <div style="width: 80%; margin: auto; margin-bottom: 30px;">
            {!! $reservationChart->container() !!}
        </div>


    </div>
</section>

<!-- You can include your footer here -->
<footer>
    <div class="container">
        <!-- Footer Content -->
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{ $chart->script() }}
{{ $reservationChart->script() }}

@endsection
