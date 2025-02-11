@extends('layout.app')

@section('content')


    {{-- product word --}}
    <section class="hero-wrap for-products" style="background-image: url('images/bg_5.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="container" style="position: relative; top: 10em;">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center mb-5">
                    <h1 class="mb-2 bread">Events</h1>
                </div>
            </div>
    </section>



    <br>
    <section>
        <div class="container">
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-md-3 col-lg-3 ftco-animate mb-4" style="background-color: white; border: 1px solid #e0e0e0; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <!-- Image Section -->
                        <div class="work img d-flex align-items-center"
                            style="background-image: url({{ url('public/images/' . $event->src) }}); height: 200px; background-size: cover; background-position: center; width: 100%;">
                            <div class="desc w-100 px-4 text-center pt-5 mt-5">
                                <div class="text w-100 mb-3 mt-4">
                                    <h3 class="prodtxt" style="color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">{{ $event->enddate }}</h3>
                                </div>
                            </div>
                        </div>

                        <!-- Button Section -->
                        <div class="p-3 text-center">
                            <button class="button-82-pushable" role="button" style="margin-top: 10px;">
                                <span class="button-82-shadow"></span>
                                <span class="button-82-edge"></span>
                                <span class="button-82-front text">
                                    <a href={{ 'delete/' . $event->id }} class="button-link">Delete Event</a>
                                </span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <br>
    <!-- Custom CSS for Button Text Color -->
    <style>
          body {
           background: #ddd;
       }
        .button-link {
            text-decoration: none;
            color: #ff5733; /* Change this to your desired color */
        }

        .button-link:hover {
            color: black; /* Change this to your desired hover color */
        }

        .button-link {
            text-decoration: none;
            color: #ff5733;
            transition: color 0.3s ease;
        }

        .button-link:hover {
            color: #ff8c66;
        }
    </style>





{{-- for form --}}
<section>
    <div class="main-block">
        <h1>Add event</h1>
        <form action="/newevent" method="post" class=prodform enctype="multipart/form-data">
            @csrf
            <div class="info">



                <input type="text" name="desc" placeholder="Description">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-wrap">
                            <div class="icon"><span class="fa fa-calendar"></span></div>
                            <input type="text" name="enddate" class="form-control book_date" placeholder="End date">
                        </div>
                    </div>
                </div>
                <input type="file" name="src">

            </div>
            <button type="submit" class="button1">Add</button>
            </div>

        </form>
        <br>
    </div>
</section>
@endsection
