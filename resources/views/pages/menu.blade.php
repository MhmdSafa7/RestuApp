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

                                        <form action="{{ route('menu.add', ['productId' => $product->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary mt-2">Add to Order</button>
                                        </form>
                                        
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Your Order</span>
                </div>
            </div>
    
            <div class="row">
                @php $totalPrice = 0; @endphp
    
                @if(session()->has('order') && count(session('order')) > 0)
                    @foreach(session('order') as $productId => $orderedProduct)
                        @php
                            // Calculate the total price for the product (price * quantity)
                            $totalPrice += $orderedProduct['price'];
                        @endphp
    
                        <div class="col-md-6 col-lg-4">
                            <div class="menu-wrap">
                                <div class="heading-menu text-center ftco-animate">
                                    <h3>{{ $orderedProduct['name'] }}</h3>
                                </div>
                                <div class="menus d-flex ftco-animate">
                                    <div class="menu-img img" style="background-image: url({{ asset('images/'.$orderedProduct['src']) }});"></div>
                                    <div class="text">
                                        <div class="d-flex">
                                            <div class="one-half">
                                                <h3>{{ $orderedProduct['name'] }}</h3>
                                            </div>
                                            <div class="one-forth">
                                                <span class="price">
                                                    {{ number_format($orderedProduct['price'], 2) }} {{ $orderedProduct['currency'] }}
                                                </span>
                                            </div>
                                        </div>
                                        <p>{{ $orderedProduct['description'] }}</p>
    
                                        <!-- Clear Button for Individual Product -->
                                        <form action="{{ route('menu.remove', ['productId' => $productId]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger mt-2">Clear</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
    
                    <!-- Display Total Price -->
                    <div class="col-md-12 text-center mt-4">
                        <h3>Total Price: {{ number_format($totalPrice, 2) }} {{ $orderedProduct['currency'] }}</h3>
                    </div>
                @else
                    <div class="col-md-12 text-center">
                        <p>No products added yet!</p>
                    </div>
                @endif
            </div>
        </div>
        
    
        <div class="container">
            <div class="row no-gutters">
                <div class="col-sm-12 p-4 p-md-5 d-flex align-items-center justify-content-center bg-primary">
                    <form method="post" action="/newres" class="appointment-form">
                        @csrf
                        <h3 class="mb-3">Your Informations</h3>
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="name" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="phonenumber" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="location" class="form-control" placeholder="Location">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="fa fa-clock-o"></span></div>
                                        <input type="text" name="time" class="form-control book_time" placeholder="When you want your order">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="submit" value="Confirm Your Order Now" class="btn btn-white py-3 px-4">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
@endsection
