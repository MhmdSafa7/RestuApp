@extends('layout.app')

@section('content')

<style>
    body {background-color: #ddd;}


</style>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-5">
                    <h1 class="mb-2 bread">Feedback</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>feedback <i
                                class="fa fa-chevron-right"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt contact-section">
        <div class="container" style="padding-top: 5%;">
            <div class="row d-flex align-items-stretch no-gutters">
                <!-- Red Div (Feedback Form) -->
                <div class="col-md-6 p-5 order-md-last mb-4" style="background-color: #700f0f; ">
                    <h2 class="h4 mb-5 font-weight text-white bold ">Rate Our Restaurant</h2>
                    <form method="post" action="/newfeedback">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            Rating:
                            <div class="rating">
                                <input type="radio" name="star" id="star1" value="5"><label for="star1"></label>
                                <input type="radio" name="star" id="star2" value="4"><label for="star2"></label>
                                <input type="radio" name="star" id="star3" value="3"><label for="star3"></label>
                                <input type="radio" name="star" id="star4" value="2"><label for="star4"></label>
                                <input type="radio" name="star" id="star5" value="1"><label for="star5"></label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea cols="30" rows="7" name="message" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Send Feedback" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
                <!-- Image Div -->
                <div class="col-md-6 align-items-stretch">
                    <img src="images/feedback.png" class="feedbackimg" alt="Feedback Image">
                </div>
            </div>
        </div>
    </section>



{{-- result feedbaks --}}
    <section class="ftco-section testimony-section" style="background-image: url(images/bg_5.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center mb-3 pb-2">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <span class="subheading">Testimony</span>
                    <h2 class="mb-4">Happy Customer</h2>
                </div>
            </div>
            <div class="row ftco-animate justify-content-center">
                <div class="col-md-7">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        @if (count($feedback) >= 1)
                            @foreach ($feedback as $f)
                                <div class="item">
                                    <div class="testimony-wrap text-center">
                                        <div class="text p-3">
                                            <p class="mb-4">{{ $f->body }}</p>
                                            <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                                <span class="quote d-flex align-items-center justify-content-center">
                                                    <i class="fa fa-quote-left"></i>
                                                </span>
                                            </div>
                                            <p class="name">{{ $f->name }}</p>
                                            <span class="position">Customer</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
