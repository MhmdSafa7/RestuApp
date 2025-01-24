@extends('layout.app')


@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate text-center mb-5">
          <h1 class="mb-2 bread">Feedback</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>feedback View<i class="fa fa-chevron-right"></i></span></p>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Customers</span>
                <h2 class="mb-4">Feedbacks</h2>
            </div>
        </div>
<div class="container">
<div class="row">
    @if(count($feedback)>=1)
    @foreach($feedback as $f)
   
    <div class="col-md-8">
        <div class="media g-mb-30 media-comment">
            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
              <div class="g-mb-15">
                <br>
                <br>
                <br>
                <h5 class="h5 g-color-gray-dark-v1 mb-0">{{$f->name}}</h5>
              </div>
        
              <p>{{$f->body}}</p>
        
              <ul class="list-inline d-sm-flex my-0">
                <li class="list-inline-item g-mr-20">
                    <i ></i>
                    {{$f->Email}}
                </li>
                <li class="list-inline-item ml-auto">
                  <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="mailto:{{$f->Email}}">
                    <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                    Reply
                  </a>
                </li>
              </ul>
            </div>
        </div>
    </div>

    @endforeach
    @endif
</div>
</div>
</section>
@endsection