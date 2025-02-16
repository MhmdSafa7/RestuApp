@extends('layout.app')


@section('content')

<style>
    body {background-color: #ddd;}

    .card:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
}
</style>
{{-- image --}}
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

{{-- about-discreption--}}
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
         <p>There is some good news for you. We are proud to inform you that Grilled Taste is opening right next to Rawshe landmark. We serve a variety of our own special mouthwatering burgers, exotic pastas and yummy desserts at very reasonable prices. We are enclosing a menu for you to go through.
         </p>
         <p><a href="/reservation" class="btn btn-primary">RESERVATION</a></p>
       </div>
     </div>

   </div>
   </div>
   </section>


  {{-- Location and Address Section --}}
<section class="ftco-section contact-section bg-light pt-5" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12 text-center">
                <h2 class="h4 font-weight-bold">Address Information</h2>
            </div>
        </div>

        {{-- Google Map --}}
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="embed-responsive embed-responsive-16by9 shadow-sm">
                    <iframe
                        class="embed-responsive-item"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d413.99681475151095!2d35.471219716179924!3d33.89031010755275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f10ce4670b63f%3A0x934a47c15b1815b9!2sAl%20Raouche%20Rocks!5e0!3m2!1sen!2slb!4v1739403498039!5m2!1sen!2slb"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        {{-- Address, Phone, and Email Boxes --}}
        <div class="row mt-5">
            {{-- Address Box --}}
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 bg-danger text-white">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-map-marker-alt fa-3x mb-3"></i> <!-- Icon -->
                        <h5 class="card-title font-weight-bold">Address</h5>
                        <p class="card-text">Beirut, Rawshe Rock</p>
                    </div>
                </div>
            </div>

            {{-- Phone Box --}}
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 bg-danger text-white">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-phone fa-3x mb-3"></i> <!-- Icon -->
                        <h5 class="card-title font-weight-bold">Phone</h5>
                        <p class="card-text">+961 123 456 789</p>
                    </div>
                </div>
            </div>

            {{-- Email Box --}}
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 bg-danger text-white">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-envelope fa-3x mb-3"></i> <!-- Icon -->
                        <h5 class="card-title font-weight-bold">Email</h5>
                        <p class="card-text">info@grilledtaste.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
   
@endsection
