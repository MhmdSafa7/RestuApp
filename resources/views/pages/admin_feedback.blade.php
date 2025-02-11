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
                <div class="row justify-content-center">
                    @if(count($feedback) >= 1)
                        @foreach($feedback as $f)
                            <div class="col-md-8 mb-4">
                                <div class="media g-mb-30 media-comment bg-white p-4 rounded-lg shadow-sm feedback-box d-flex align-items-center">
                                    <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
                                    <div class="media-body">
                                        <div class="g-mb-15">
                                            <h5 class="h5 feedback-name mb-0">{{$f->name}}</h5>
                                            <small class="feedback-email">{{$f->Email}}</small>
                                        </div>

                                        <p class="mt-3 feedback-body">{{$f->body}}</p>

                                        <ul class="list-inline d-sm-flex my-0">
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
                    @else
                        <div class="col-md-8 text-center">
                            <p class="text-muted">No feedback available.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Custom CSS for Additional Styling -->
    <style>
        body {
            background-color: #ddd;
        }

        .media-comment {
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease, border 0.3s ease;
            border: 1px solid transparent; /* Add transparent border by default */
        }

        .media-comment:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            background-color: #f8f9fa; /* Light gray background on hover */
            border: 1px solid #ff0000; /* Red border on hover */
        }

        .rounded-lg {
            border-radius: 12px;
        }

        .shadow-sm {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .bg-white {
            background-color: #fff;
        }

        .text-muted {
            color: #6c757d !important;
        }

        .g-color-primary--hover:hover {
            color: #007bff !important;
        }

        .fa-envelope {
            margin-right: 5px;
        }

        /* Custom text colors for feedback variables */
        .feedback-name {
            color: #000000;
            font-size: 150%; /* Dark blue for name */
        }

        .feedback-email {
            color: #050505; /* Red for email */
        }

        .feedback-body {
            color: #b40808; /* Dark gray for body text */
        }

        /* Hover effect for feedback boxes */
        .feedback-box:hover {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .feedback-box:hover .feedback-name {
            color: #000000; /* Change name color on hover */
        }

        .feedback-box:hover .feedback-email {
            color: #000000; /* Change email color on hover */
        }

        .feedback-box:hover .feedback-body {
            color: #ff0000;
            font-size: 200%; /* Change body text color on hover */
        }
        .media-comment:hover {
    border: 2px solid #ff0000; /* Thicker red border on hover */
}
    </style>
@endsection

@section('footer')
    <!-- Footer Content -->
    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <h3 class="ftco-heading-2">About Us</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel purus non est feugiat convallis.</p>
                </div>
                <div class="col-md-6">
                    <h3 class="ftco-heading-2">Follow Us</h3>
                    <ul class="ftco-footer-social list-unstyled">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
@endsection
