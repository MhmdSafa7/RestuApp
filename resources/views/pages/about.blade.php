@extends('layout.app')


@section('content')

<style>
    body {background-color: #ddd;}
</style>

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
         <p>There is some good news for you. We are proud to inform you that Grilled Taste is opening right next to your own Uni. We serve a variety of our own special mouthwatering burgers, exotic pastas and yummy desserts at very reasonable prices. We are enclosing a menu for you to go through.
         </p>
         <p><a href="/reservation" class="btn btn-primary">RESERVATION</a></p>
       </div>
     </div>

   </div>
   </div>
   </section>
   <section class="ftco-section contact-section bg-light" style="background-color:#ddd ">
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
       <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d828.4396846100502!2d35.49964726961267!3d33.84433199832727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzPCsDUwJzM5LjYiTiAzNcKwMzAnMDEuMSJF!5e0!3m2!1sen!2slb!4v1738691028091!5m2!1sen!2slb" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    </div>
    </div>


   </section>
@endsection
