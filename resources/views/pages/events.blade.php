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
                <div class="col-md-3 col-lg-3 ftco-animate">
                    <div class="work img d-flex align-items-center"
                        style="background-image: url({{ url('public/images/' . $event->src) }})">

                        <div class="desc w-100 px-4 text-center pt-5 mt-5">
                            <div class="text w-100 mb-3 mt-4">
                                <h3 class="prodtxt">{{ $event->enddate }}</h3>
                            </div>
                        </div>
                    </div>

                    <!-- HTML !-->
                    <button class="button-82-pushable" role="button">
                        <span class="button-82-shadow"></span>
                        <span class="button-82-edge"></span>
                        <span class="button-82-front text" >
                            <a href={{ 'delete/' . $event->id }}>Delete Event</a>
                        </span>
                    </button>


                </div>
            @endforeach
        </div>
    </div>
</section>
<br>




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
