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

{{-- events --}}
<section class="ftco-section " style="background-image: url('images/event.jpg');">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate bg-light" >
                <span class="subheading">Events</span>
                <h2 class="mb-4">Recent Events</h2>
            </div>
        </div>
        <div class="row">
            @if (count($eve) >= 1)
                            @foreach ($eve as $e)
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry">
                    <a href="/menu" class="block-20" style="background-image: url({{ url('public/images/' . $e->src) }})">
                    </a>
                    <div class="text px-4 pt-3 pb-4">
                        <div >
                            <div>Events end at : {{$e->enddate}}</div>
                        </div>
                        <h3 class="heading">{{$e->desc}}</h3>
                        <p class="clearfix">
                            <a href="/reservation" class="float-left read btn btn-primary">Reserve!</a>
                        </p>
                    </div>
                </div>
            </div>
                            @endforeach
            @endif
         </div>
    </div>
</section>
{{-- end events --}}

{{-- offers --}}
<section class="ftco-section" style="background-image: url(images/bg_4.jpg);">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate bg-light">
                <span class="subheading">Specialties</span>
                <h2 class="mb-4">Our Offers</h2>
            </div>
        </div>
        <div class="row">
            @if (count($off) >= 1)
                            @foreach ($off as $f)
            <div class="col-md-6 col-lg-4">
                <div class="menu-wrap" >
                    <div class="heading-menu text-center ftco-animate">
                        <h3>{{$f->offername}} </h3>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img" style="background-image: url({{ url('public/images/' . $f->src) }})"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>{{$f->desc}} </h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">{{$f->price}}$ </span>
                                </div>
                            </div>

                        </div>
                    </div>


                    <span class="flat flaticon-bread" style="left: 0;"></span>
                    <span class="flat flaticon-breakfast" style="right: 0;"></span>
                </div>
            </div>
            @endforeach
            @endif

  </div>
    </div>

</section>
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
