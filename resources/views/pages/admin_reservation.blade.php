@extends('layout.app')


@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate text-center mb-5">
          <h1 class="mb-2 bread">Reservation</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Reservation View<i class="fa fa-chevron-right"></i></span></p>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Customers</span>
                <h2 class="mb-4">Reservations</h2>
            </div>
        </div>
  <div class="student-profile py-4">
    <div class="container">
      <div class="row">
        @if(count($res)>=1)
        @foreach($res as $f)
        <div class="col-lg-8">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent border-0">
              <h3 class="mb-0"></i>Reservation Information</h3>
            </div>
            <div class="card-body pt-0">
              <table class="table table-bordered">
                <tr>
                  <th width="30%">Name</th>
                  <td width="2%">:</td>
                  <td>{{$f->name}}</td>
                </tr>
                <tr>
                  <th width="30%">Email	</th>
                  <td width="2%">:</td>
                  <td>{{$f->Email}}</td>
                </tr>
                <tr>
                  <th width="30%">Phone Number</th>
                  <td width="2%">:</td>
                  <td>{{$f->phonenumber}}</td>
                </tr>
                <tr>
                  <th width="30%">date</th>
                  <td width="2%">:</td>
                  <td>{{$f->date}}</td>
                </tr>
                <tr>
                  <th width="30%">time</th>
                  <td width="2%">:</td>
                  <td>{{$f->time}}</td>
                </tr>

                <tr>
                  <th width="30%">Contact Customer</th>
                  <td width="2%">:</td>
                  <td><a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="mailto:{{$f->Email}}">
                    <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                    Send Email
                  </a></td>
                </tr>
              </table>
            </div>
          </div>
            <div style="height: 26px">
            </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </div>
</section>
@endsection