@extends('layout.app')
@section('content')

<style>
    body {background-color: #ddd;}
</style>

{{-- image --}}
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-5">
                <h1 class="mb-2 bread">Menu</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i
                                class="fa fa-chevron-right"></i></a></span> <span>Menu <i
                            class="fa fa-chevron-right"></i></span></p>
            </div>
        </div>
    </div>
</section>

<!-- Display product -->
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
                                        <button class="btn btn-primary add-to-order"
                                            data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}"
                                            data-price="{{ $product->price }}"
                                            data-currency="{{ $product->currency }}"
                                            data-src="{{ url('public/images/'.$product->src) }}">
                                            Add to Order
                                        </button>
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

<!-- Display Order -->
<section class="ftco-section" id="order-display">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Your Order</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Selected Products:</h4>
                <div id="order-list" class="row">
                    @if(session()->has('cart') && is_array(session('cart')) && count(session('cart')) > 0)
                        @foreach(session('cart') as $product)
                            <div class="col-md-4 mb-3 product-item" data-id="{{ $product['id'] }}" data-price="{{ $product['price'] }}">
                                <div class="card p-3">
                                    <h5>{{ $product['name'] }}</h5>
                                    <p>Price: ${{ $product['price'] }}</p>
                                    <input type="number" name="products[{{ $product['id'] }}][quantity]" class="form-control quantity-input" value="{{ $product['quantity'] }}" min="1">
                                    <input type="hidden" name="products[{{ $product['id'] }}][id]" value="{{ $product['id'] }}">
                                    <button type="button" class="btn btn-danger mt-2 remove-product">Remove</button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No products selected yet.</p>
                    @endif
                </div>
                <h3 id="total-price" class="mt-4">Total Price: $0</h3>
            </div>
        </div>
    </div>
</section>

{{-- User Information for Orders --}}
<section class="order-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 p-4 p-md-5 d-flex align-items-center justify-content-center bg-gray">
                <form method="post" action="{{ route('order.store') }}" class="appointment-form" id="order-form">
                    @csrf
                    <h3 class="text-center text-white mb-4">Your Information</h3>

                    <div class="row">
                        {{-- Name Field --}}
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control form-control-lg" placeholder="Name" required value="{{ old('name') }}">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Email Field --}}
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required value="{{ old('email') }}">
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Phone Field --}}
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control form-control-lg" placeholder="Phone" required value="{{ old('phone') }}">
                                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Location Field --}}
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="location" class="form-control form-control-lg" placeholder="Location" required value="{{ old('location') }}">
                                @error('location') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Order Arrival Time --}}
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="datetime-local" name="order_arrival_time" class="form-control form-control-lg" required value="{{ old('order_arrival_time') }}">
                                @error('order_arrival_time') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Hidden Input for Products --}}
                        <input type="hidden" name="products" id="products-input">

                        {{-- Submit Button --}}
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-light btn-lg py-3 px-5 rounded-pill font-weight-bold">
                                Confirm Your Order Now
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>




<style>
    .hero-wrap {
        position: relative;
        background-size: cover;
        background-position: center;
    }

    .hero-wrap .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
    }

    .hero-wrap .slider-text {
        position: relative;
        z-index: 1;
    }

    .hero-wrap h1 {
        font-size: 3rem;
        font-weight: 700;
        color: #fff;
    }

    .breadcrumbs {
        color: #fff;
    }

    .breadcrumbs a {
        color: #fff;
        text-decoration: none;
    }

    .breadcrumbs a:hover {
        color: #ffc107;
    }

    .appointment-form {
        background: #790505;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 10px 60px rgba(80, 0, 0, 0.5);
    }

    .appointment-form h3 {
        font-size: 2rem;
        font-weight: 700;
        color: #0f1011;
        margin-bottom: 20px;
        text-align: center;

    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        height: 50px;
        border-radius: 5px;
        border: 1px solid black;
        padding: 10px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
        color: #0f1011;
        text-decoration-color:  #000;

    }

    .form-control:focus {
        border-color: black;
        box-shadow: none;
        color: #000;
    }

    .input-wrap {
        position: relative;
    }

    .input-wrap .icon {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: black;
    }

    .input-wrap input {
        padding-left: 40px;
    }

    .select-wrap {
        position: relative;
    }

    .select-wrap .icon {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        color: black;
        pointer-events: none;
    }

    .select-wrap select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        padding-right: 40px;
    }

    .btn-white {
        background-color: #fff;
        color: black;
        border: 2px solid black;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-white:hover {
        background-color: black;
        color: #fff;
    }
</style>

<style>
    .hover-container {
        transition: all 0.3s ease-in-out;
        border: 2px solid transparent;
        padding: 1.5rem; /* Adjust padding as needed */
    }

    .hover-container:hover {
        border: 2px solid #ffffff; /* White border on hover */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Enhanced shadow on hover */
        transform: translateY(-5px); /* Slight lift effect */
    }
</style>

   <!-- Fixed "Your Order" Button -->
   <div class="fixed-order-button" onclick="scrollToOrder()">
    <span class="subheading">your order</span>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


        // Scroll to Order Section
        function scrollToOrder() {
            document.getElementById('order-display').scrollIntoView({ behavior: 'smooth' });
        }

        let orderProducts = [];

        $(document).ready(function () {
        let orderProducts = [];

        // Add product to order
        $(".add-to-order").click(function () {
            let productId = $(this).data("id");
            let productName = $(this).data("name");
            let productPrice = parseFloat($(this).data("price"));
            let productCurrency = $(this).data("currency");

            let existingProduct = orderProducts.find(p => p.id === productId);
            if (existingProduct) {
                existingProduct.quantity += 1;
            } else {
                orderProducts.push({
                    id: productId,
                    name: productName,
                    price: productPrice,
                    currency: productCurrency,
                    quantity: 1
                });
            }
            updateOrderList();
        });

        // Update the order list and total price
        function updateOrderList() {
            let orderList = $("#order-list");
            orderList.empty();
            let totalPrice = 0;

            orderProducts.forEach(product => {
                let productTotal = product.quantity * product.price;
                totalPrice += productTotal;

                let card = `
                    <div class="col-md-4 mb-3 product-item" data-id="${product.id}" data-price="${product.price}">
                        <div class="card p-3">
                            <h5>${product.name}</h5>
                            <p>Price: ${product.price} ${product.currency}</p>
                            <input type="number" class="form-control quantity-input" value="${product.quantity}" min="1" data-id="${product.id}">
                            <input type="hidden" name="products[${product.id}][id]" value="${product.id}">
                            <button type="button" class="btn btn-danger mt-2 remove-product" data-id="${product.id}">Remove</button>
                        </div>
                    </div>
                `;
                orderList.append(card);
            });

            $("#total-price").text(`Total Price: ${totalPrice.toFixed(2)} ${orderProducts[0]?.currency || ''}`);
            attachEventListeners();
        }

        // Attach event listeners for quantity changes and remove buttons
        function attachEventListeners() {
            $(".quantity-input").on("input", function () {
                let productId = $(this).data("id");
                let newQuantity = parseInt($(this).val());

                if (newQuantity < 1) {
                    $(this).val(1);
                    newQuantity = 1;
                }

                let product = orderProducts.find(p => p.id === productId);
                if (product) {
                    product.quantity = newQuantity;
                    updateOrderList();
                }
            });

            $(".remove-product").click(function () {
                let productId = $(this).data("id");
                orderProducts = orderProducts.filter(p => p.id !== productId);
                updateOrderList();
            });
        }

        // Before form submission, populate the hidden input with product data
        $("#order-form").on("submit", function (e) {
            let productsData = JSON.stringify(orderProducts);
            $("#products-input").val(productsData);
        });
    });

</script>

<style>

.fixed-order-button {
    position: fixed;
    bottom: 15px;
    left: 10px;
    width: 18%;
    background-color: rgba(248, 248, 248, 0.397); /* More transparent red */
    color: #e01616;
    text-align: center;
    padding: 15px;
    font-size: 1.6rem;
    font-style: italic
    cursor: pointer;
    z-index: 1000; /* Ensure it's above other elements */
    box-shadow: 0 -2px 10px rgba(187, 8, 8, 0); /* Red glow shadow */
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    border: 5px; /* Remove default border */
    outline: none; /* Remove outline */
    backdrop-filter: blur(10px); /* Adds a blur effect to the background */
    border-radius: 5px 5px 0 0; /* Rounded corners at the top */
}

.fixed-order-button:hover {
    background-color: rgba(0, 0, 0, 0.288); /* Darker and more transparent on hover */
    box-shadow: 0 -2px 40px rgba(255, 0, 0, 0.8); /* Stronger red glow on hover */
}

/* Optional: Add a subtle animation for the glow */
@keyframes glow {
    0% {
        box-shadow: 0 -2px 10px rgba(255, 0, 0, 0.5);
    }
    50% {
        box-shadow: 0 -2px 20px rgba(255, 0, 0, 0.8);
    }
    100% {
        box-shadow: 0 -2px 10px rgba(255, 0, 0, 0.5);
    }
}

.fixed-order-button {
    animation: glow 3s infinite; /* Apply the glow animation */
}

    .menu-wrap {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 20px;
        border: none; /* Ensure no border is applied */
        outline: none; /* Remove any outline */
    }

    .menu-wrap:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(190, 7, 7, 0.555);
        border: none; /* Ensure no border on hover */
        outline: none; /* Remove any outline on hover */
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
        background-color: #ff0000;
        color: #fff;
        border-radius: 10px;
        padding: 5px 10px;
        border: 10px;
        outline: none;
        cursor: pointer;
        transition: background-color 0.3s ease, border-end-end-radius 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #080b0e;
        border-end-end-radius: 10px;
    }
</style>


@endsection
