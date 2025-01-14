@extends('layout.app')


@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate text-center mb-5">
          <h1 class="mb-2 bread">About</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>About <i class="fa fa-chevron-right"></i></span></p>
        </div>
      </div>
    </div>
  </section>

<section class="ftco-section ftco-no-pt ftco-no-pb" >
    <div class="container">
     <div class="row d-flex">
       <div class="col-md-6 d-flex" >
        <div class="img img-2 w-100 mr-md-2" style="background-image: url(images/bg_6.jpg);"></div>
        <div class="img img-2 w-100 ml-md-2" style="background-image: url(images/bg_4.jpg);"></div>
      </div>
      <div class="col-md-6 ftco-animate makereservation p-4 p-md-5">
        <div class="heading-section ftco-animate mb-5">
         <span class="subheading">This is our secrets</span>
         <h2 class="mb-4">Perfect Ingredients</h2>
         <p>There is some good news for you. We are proud to inform you that Grilled Taste is opening right next to your own home. We serve a variety of our own special mouthwatering burgers, exotic pastas and yummy desserts at very reasonable prices. We are enclosing a menu for you to go through.
         </p>
         <p><a href="/reservation" class="btn btn-primary">RESERVATION</a></p>
       </div>
     </div>
     
   </div>
   </div>
   </section>
   <section class="ftco-section contact-section bg-light">
    <div class="container">
      <div class="row d-flex contact-info">
        <div class="col-md-12">
          <h2 class="h4 font-weight-bold">Address Information</h2>
        </div>
        <div class="w-100"></div>
        <div class="col-md-3 d-flex">
         <div class="dbox">
           <p><span>Address:</span><br> Airport Road, AlMaaref University, Block C, Cafeteria</p>
         </div>
       </div>
       <iframe src="https://www.google.com/maps/place/Al+Maaref+University+-+Block+C+%D8%AC%D8%A7%D9%85%D8%B9%D8%A9+%D8%A7%D9%84%D9%85%D8%B9%D8%A7%D8%B1%D9%81%E2%80%AD/@33.8443165,35.4976037,17z/data=!3m1!4b1!4m15!1m8!3m7!1s0x151f1922fd8dd6e9:0x1d20e98f09f44332!2zQWwgTWFhcmVmIFVuaXZlcnNpdHkgLSBCbG9jayBDINis2KfZhdi52Kkg2KfZhNmF2LnYp9ix2YE!8m2!3d33.8443121!4d35.5001786!10e1!16s%2Fg%2F11vbcqk5rq!3m5!1s0x151f1922fd8dd6e9:0x1d20e98f09f44332!8m2!3d33.8443121!4d35.5001786!16s%2Fg%2F11vbcqk5rq?entry=ttu&g_ep=EgoyMDI1MDEwOC4wIKXMDSoASAFQAw%3D%3D" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" ></iframe>
      </div>
    </div>
   </section>
@endsection