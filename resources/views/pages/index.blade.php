@extends('layout.app')


@section('content')

<section class="hero-wrap">

    <style>
        body {background-color: #ddd;}
    </style>
    <div class="home-slider owl-carousel js-fullheight">
        <div class="slider-item js-fullheight" style="background-image:url(images/feanebck.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 mt-5 text-center">
                            <span class="subheading">Grilled taste Restaurant</h2></span>
                            <h1>Cooking Since</h1>
                            <span class="subheading-2">1958</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight" style="background-image:url(images/bg_2.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 mt-5 text-center">
                            <span class="subheading">Grilled taste Restaurant</h2></span>
                            <h1>Best Quality</h1>
                            <span class="subheading-2 sub">Food</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- for about --}}
<section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/aboutUsimg.png" alt="about us">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">

              <h2 style="color: red">
                We Are Grilled taste Restaurant
              </h2>
            </div>
            <p style="color: rgb(7, 5, 5);">
                There is some good news for you. We are proud to inform you that Grilled Taste is opening right next to your own Uni. We serve a variety of our own special mouthwatering burgers, exotic pastas and yummy desserts at very reasonable prices. We are enclosing a menu for you to go through.
            </p>
            <a href="/about">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

{{-- end about --}}
<div style="width: 80%; height: 2px; background-color: red; margin: 20px auto;"></div>
{{-- events --}}
<section class="ftco-section" style="background-image: url('images/event.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate" style="background-color: rgba(255, 255, 255, 0.1); padding: 20px; border-radius: 10px; backdrop-filter: blur(5px);">
                <span class="subheading" style="color: black; font-size: 3.2rem; letter-spacing: 2px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Events</span>
                <h2 class="mb-4" style="color: #fff; font-size: 2.5rem; font-weight: 700; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Recent Events</h2>
            </div>
        </div>
        <div class="row">
            @if (count($eve) >= 1)
                @foreach ($eve as $e)
                    <div class="col-md-4 ftco-animate mb-4">
                        <div class="blog-entry" style="background: #474646af; border-radius: 15px; overflow: hidden; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <!-- Image with Padding -->
                            <a href="/menu" class="block-20" style="display: block; height: 250px; background-image: url({{ url('public/images/' . $e->src) }}); background-size: cover; background-position: center; position: relative; margin: 15px; border-radius: 10px;">
                                <div class="overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.3); transition: background 0.3s ease; border-radius: 10px;"></div>
                            </a>
                            <!-- Card Content -->
                            <div class="text px-4 pt-3 pb-4" style="background: #ffffff81";>
                                <!-- Event Date -->
                                <div style="font-size: 0.9rem; color: #000000; margin-bottom: 10px;">
                                    <i class="fa fa-calendar" style="margin-right: 5px; color: #dc3545;"></i> Events end at: {{ $e->enddate }}
                                </div>
                                <!-- Event Description -->
                                <h3 class="heading" style="font-size: 1.5rem; font-weight: 600; color: #343a40; margin-bottom: 15px;">{{ $e->desc }}</h3>
                                <!-- Reserve Button -->
                                <p class="clearfix">
                                    <a href="/reservation" class="float-left read btn btn-primary" style="background-color: #dc3545; border: none; padding: 10px 20px; border-radius: 5px; font-size: 1rem; transition: background-color 0.3s ease;">
                                        Reserve!
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12 text-center">
                    <p style="color: #fff; font-size: 1.2rem;">No events available at the moment.</p>
                </div>
            @endif
        </div>

        <style>
            /* Custom Styles for Event Cards */
            .blog-entry:hover {
                transform: translateY(-10px);
                box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
            }

            .blog-entry .block-20:hover .overlay {
                background: rgba(0, 0, 0, 0.5);
            }

            .btn-primary {
                background-color: #dc3545 !important;
            }

            .btn-primary:hover {
                background-color: #c82333 !important;
            }
             /* Custom Styles for Events Section */
            .blog-entry:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            }

            .blog-entry .block-20:hover .overlay {
                background: rgba(0, 0, 0, 0.5);
            }

            .btn-primary:hover {
                background-color: red !important;
            }
        </style>
</section>

{{-- end events --}}

{{-- offers --}}
<section class="ftco-section" style="background-image: url(images/bg_4.jpg); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate" style="background-color: rgba(255, 255, 255, 0.1); padding: 20px; border-radius: 10px; backdrop-filter: blur(5px);">
                <span class="subheading" style="color: black; font-size: 3.2rem; letter-spacing: 2px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Specialties</span>
                <h2 class="mb-4" style="color: #fff; font-size: 2.5rem; font-weight: 700; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Our Offers</h2>
            </div>
        </div>
        <div class="row">
            @if (count($off) >= 1)
                @foreach ($off as $f)
                    <div class="col-md-4 ftco-animate mb-4">
                        <div class="blog-entry" style="background: #474646af; border-radius: 15px; overflow: hidden; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <!-- Image with Padding -->
                            <a href="/menu" class="block-20" style="display: block; height: 250px; background-image: url({{ url('public/images/' . $f->src) }}); background-size: cover; background-position: center; position: relative; margin: 15px; border-radius: 10px;">
                                <div class="overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.3); transition: background 0.3s ease; border-radius: 10px;"></div>
                            </a>
                            <!-- Card Content -->
                            <div class="text px-4 pt-3 pb-4" style="background: #ffffff81;">
                                <!-- Offer Name -->
                                <h3 class="heading" style="font-size: 1.5rem; font-weight: 600; color: #343a40; margin-bottom: 15px;">{{ $f->offername }}</h3>
                                <!-- Offer Description -->
                                <p style="font-size: 1rem; color: #000000; margin-bottom: 10px;">{{ $f->desc }}</p>
                                <!-- Offer Price -->
                                <div style="font-size: 1.2rem; color: #dc3545; margin-bottom: 15px;">
                                    <span class="price">{{ $f->price }}$</span>
                                </div>
                                <!-- Reserve Button -->
                                <p class="clearfix">
                                    <a href="/reservation" class="float-left read btn btn-primary" style="background-color: #dc3545; border: none; padding: 10px 20px; border-radius: 5px; font-size: 1rem; transition: background-color 0.3s ease;">
                                        Reserve!
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12 text-center">
                    <p style="color: #fff; font-size: 1.2rem;">No offers available at the moment.</p>
                </div>
            @endif
        </div>
    </div>
</section>


    <style>
    /* Custom Styles for Offer Cards */
    .blog-entry:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
    }

    .blog-entry .block-20:hover .overlay {
        background: rgba(0, 0, 0, 0.5);
    }

    .btn-primary {
        background-color: #dc3545 !important;
    }

    .btn-primary:hover {
        background-color: black !important;
    }
</style>
  {{-- end offers --}}

{{-- for booking --}}
<section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center" >
                <span>Now Booking</span>
                <h2>Private Dinners &amp; Happy Hours</h2>
                <button class="button-49" role="button" onclick="window.location.href='/reservation'">BOOK NOW!</button>

            </div>
        </div>
    </div>
</section>
{{-- end booking --}}


@endsection
