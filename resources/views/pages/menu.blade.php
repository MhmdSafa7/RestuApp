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
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i
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
<!-- Order Section (Target Section) -->
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
                <div id="order-list" class="row"></div>
                <h3 id="total-price" class="mt-4">Total Price: 0</h3>
            </div>
        </div>
    </div>
</section>


    <div class="container">
        <div class="row no-gutters">
            <div class="col-sm-12 p-4 p-md-5 d-flex align-items-center justify-content-center bg-primary">
                <form method="post" action="{{ route('order.store') }}" class="appointment-form">
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
                                <input type="text" name="time" class="form-control book_time" placeholder="When you want your order" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-white py-3 px-4">Confirm Your Order Now</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

   <!-- Fixed "Your Order" Button -->
   <div class="fixed-order-button" onclick="scrollToOrder()">
    Your Order
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


        // Scroll to Order Section
        function scrollToOrder() {
            document.getElementById('order-display').scrollIntoView({ behavior: 'smooth' });
        }

    let orderProducts = [];

    $(document).ready(function () {
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

        function updateOrderList() {
            let orderList = $("#order-list");
            orderList.empty();
            let totalPrice = 0;

            orderProducts.forEach(product => {
                let productTotal = product.quantity * product.price;
                totalPrice += productTotal;

                // Create a card for each product
                let card = `
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">${product.name}</h5>
                                <p class="card-text">
                                    Quantity: ${product.quantity}<br>
                                    Price: ${product.price} ${product.currency}<br>
                                    Total: ${productTotal.toFixed(2)} ${product.currency}
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                orderList.append(card);
            });

            $("#total-price").text(`Total Price: ${totalPrice.toFixed(2)} ${orderProducts[0]?.currency || ''}`);
        }
    });
</script>

<style>

.fixed-order-button {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 20%;
    background-color: rgba(255, 0, 0, 0.8); /* Transparent red */
    color: #fff;
    text-align: center;
    padding: 15px;
    font-size: 1.2rem;
    cursor: pointer;
    z-index: 1000; /* Ensure it's above other elements */
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;

}

.fixed-order-button:hover {
    background-color: #cc0000; /* Darker red on hover */
}
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

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

@endsection
