@extends('layout.app')

@section('content')



    {{-- product word --}}
    <section class="hero-wrap for-products" style="background-image: url('images/bg_5.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="container" style="position: relative; top: 10em;">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-5">
                    <h1 class="mb-2 bread">Products</h1>
                </div>
            </div>
    </section>





    <br>
    <style>

        body {
            background: #ddd;
        }

        /* Card Styling */
        .product-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .card-image {
            height: 200px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
        }

        .card-body {
            position: relative;
            z-index: 1;
            color: white;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-footer {
            padding: 15px;
            background: #f8f9fa;
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .prodtxt {
                color: black; /* Make the name black */
                font-size: 1.2rem;
                font-weight: bold;
                text-align: center;
                margin: 10px 0; /* Add space between name and buttons */
            }


        /* Button Styling */
        .button-82-pushable {
            position: relative;
            border: none;
            background: transparent;
            padding: 0;
            cursor: pointer;
            outline-offset: 4px;
            transition: filter 250ms;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;

        }

        .button-82-shadow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 12px;
            background: hsl(0deg 0% 0% / 0.25);
            will-change: transform;
            transform: translateY(2px);
            transition: transform 600ms cubic-bezier(.3, .7, .4, 1);
        }

        .button-82-edge {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 12px;
            background: linear-gradient(
                to left,
                hsl(340deg 100% 16%) 0%,
                hsl(340deg 100% 32%) 8%,
                hsl(340deg 100% 32%) 92%,
                hsl(340deg 100% 16%) 100%
            );
        }

        .button-82-front {
            display: block;
            position: relative;
            padding: 10px 20px;
            border-radius: 12px;
            font-size: 1rem;
            color: white;
            background: red;
            will-change: transform;
            transform: translateY(-4px);
            transition: transform 600ms cubic-bezier(.3, .7, .4, 1);
        }

        .button-82-pushable:hover {
            filter: brightness(110%);
        }

        .button-82-pushable:hover .button-82-front {
            transform: translateY(-6px);
            transition: transform 250ms cubic-bezier(.3, .7, .4, 1.5);
        }

        .button-82-pushable:active .button-82-front {
            transform: translateY(-2px);
            transition: transform (34ms);
        }

        .button-82-pushable:hover .button-82-shadow {
            transform: translateY(4px);
            transition: transform 250ms cubic-bezier(.3, .7, .4, 1.5);
        }

        .button-82-pushable:active .button-82-shadow {
            transform: translateY(1px);
            transition: transform (34ms);
        }

        .button-82-pushable:focus:not(:focus-visible) {
            outline: none;
        }

        .button-82-front a {
            color: white;
            text-decoration: none;
        }
    </style>
   <section>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 col-lg-3 ftco-animate mb-4">
                    <!-- Product Card -->
                    <div class="card product-card">
                        <!-- Product Image -->
                        <div class="card-image" style="background-image: url({{ url('public/images/' . $product->src) }});">
                            <div class="overlay"></div>
                        </div>

                        <!-- Buttons -->
                        <div class="card-footer">
                            <!-- Edit Button -->
                            <button class="button-82-pushable" role="button">
                                <span class="button-82-front text">
                                    <a href="{{ url('editp/' . $product->id) }}">Edit</a>
                                </span>
                            </button>

                            <!-- Delete Button -->
                            <button class="button-82-pushable" role="button">
                                <span class="button-82-front text">
                                    <a href="{{ url('deletep/' . $product->id) }}">Delete</a>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>








    {{-- for form --}}
    <section>
        <div class="main-block">
            <h1>Add Product</h1>
            <form action="/newproduct" method="post" class=prodform enctype="multipart/form-data">
                @csrf
                <div class="info">


                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="desc" placeholder="Description">
                    <input type="number" name="price" placeholder="Price">
                    <input type="file" name="src">

                    <select name="menu_type">
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="button1">Add</button>
            </form>
        </div>
    </section>
    {{-- end of form --}}



@endsection
