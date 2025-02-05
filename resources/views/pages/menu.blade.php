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
                @foreach ($menus as $menu)
                <div style="width: 80%; height: 2px; background-color: red; margin: 20px auto;"></div>
                    <div class="col-md-12 mb-5">
                        <div class="heading-menu text-center ftco-animate">
                            <h3>{{ $menu->name }}</h3>
                        </div>
                        <div class="row">
                            @foreach ($menu->products as $product)
                                <div class="col-md-4">
                                    <div class="menu-wrap ftco-animate">
                                        <div class="menu-img img" style="background-image: url({{ url('public/images/'.$product->src) }});"></div>
                                        <div class="text text-center">
                                            <h3>{{ $product->name }}</h3>
                                            <p>{{ $product->description }}</p>
                                            <p class="price">{{ $product->price }} {{ $product->currency }}</p>
                                        </div>
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
                            $totalPrice += $orderedProduct['price'];
                        @endphp

                        <div class="col-md-4 mb-4">
                            <div class="menu-wrap ftco-animate">
                                <div class="menu-img img" style="background-image: url({{ asset('images/'.$orderedProduct['src']) }});"></div>
                                <div class="text text-center">
                                    <h3>{{ $orderedProduct['name'] }}</h3>
                                    <p>{{ $orderedProduct['description'] }}</p>
                                    <p class="price">{{ number_format($orderedProduct['price'], 2) }} {{ $orderedProduct['currency'] }}</p>
                                    {{-- <form action="{{ route('menu.remove', ['productId' => $productId]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Clear</button>
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

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
                        <h3 class="mb-3">Your Information</h3>
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="phonenumber" class="form-control" placeholder="Phone" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="location" class="form-control" placeholder="Location" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="fa fa-clock-o"></span></div>
                                        <input type="text" name="time" class="form-control book_time" placeholder="When you want your order" required>
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

    <style>
        /* Custom Styles for Vertical Categories and Horizontal Products */
        .menu-wrap {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 20px;
        }

        .menu-wrap:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .menu-img {
            height: 200px;
            background-size: cover;
            background-position: center;
        }

        .text {
            padding: 20px;
        }

        .text h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .text p {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 15px;
        }

        .text .price {
            font-size: 1.2rem;
            color: #ff0000;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
@endsection
