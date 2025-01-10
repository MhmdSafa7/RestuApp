@extends('layout.app')


@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-5">
                    <h1 class="mb-2 bread">Menu</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Menu <i
                                class="fa fa-chevron-right"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Specialties</span>
                    <h2 class="mb-4">Our Menu</h2>
                </div>
            </div>
            <div class="row">
                {{-- begin --}}
                @foreach ($menus as $menu)
                    <div class="col-md-6 col-lg-4">
                        <div class="menu-wrap">
                            <div class="heading-menu text-center ftco-animate">
                                <h3>{{ $menu->name }}</h3>
                            </div>
                            @foreach ($menu->products as $product)
                                <div class="menus d-flex ftco-animate">

                                    <div class="menu-img img" style="background-image: url({{ url( 'public/images/'.$product->src )}});">

                                    </div>
                                    <div class="text">
                                        <div class="d-flex">
                                            <div class="one-half">

                                                <h3>{{ $product->name }}</h3>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">{{ $product->price }}
                                                    {{ $product->currency }}</span>
                                            </div>
                                        </div>
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
