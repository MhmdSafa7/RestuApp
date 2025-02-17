@extends('layout.app')

@section('content')


{{-- image --}}
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-5">
                <h1 class="mb-2 bread">About You</h1>
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span>
                    <span>user <i class="fa fa-chevron-right"></i></span>
                </p>
            </div>
        </div>
    </div>
</section>
<style>
    .section-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 15px;
    }
    .history-section {
        background: #fff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .history-list {
        list-style: none;
        padding: 0;
    }
    .history-item {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }
    .history-item:last-child {
        border-bottom: none;
    }
</style>

<div class="container mt-5">
    <h2 class="text-center mb-4">Your History</h2>

    {{-- Orders Section --}}
    <div class="history-section">
        <h3 class="section-title">📦 Your Orders</h3>
        @if($orders->isEmpty())
            <p>No previous orders found.</p>
        @else
            <ul class="history-list">
                @foreach($orders as $order)
                    <li class="history-item">
                        <strong>Products:</strong>
                        @foreach($order->products as $product)
                            {{ $product->name }}@if (!$loop->last), @endif
                        @endforeach
                        <br><strong>Total Price:</strong> {{ $order->total_price }}$
                        <br><strong>Placed on:</strong> {{ $order->created_at->format('d M Y') }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>


    {{-- Reservations Section --}}
    <div class="history-section">
        <h3 class="section-title">📅 Your Reservations</h3>
        @if($reservations->isEmpty())
            <p>No previous reservations found.</p>
        @else
            <ul class="history-list">
                @foreach($reservations as $reservation)
                    <li class="history-item">
                        <strong>Table for {{ $reservation->guests }} guests</strong>
                        <br>Date: {{ $reservation->date }} | Time: {{ $reservation->time }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

   {{-- Feedback Section --}}
<div class="history-section">
    <h3 class="section-title">💬 Your Feedback</h3>
    @if($feedbacks->isEmpty())
        <p>No feedback submitted yet.</p>
    @else
        <ul class="history-list">
            @foreach($feedbacks as $feedback)
                <li class="history-item">
                    <strong>Feedback:</strong> "{{ $feedback->body }}"
                    <br><strong>Stars:</strong> ⭐ {{ $feedback->stars }}/5
                    <br>
                    <strong>Submitted on:</strong>
                    {{ optional($feedback->created_at)->format('d M Y') ?? now()->format('d M Y') }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
</div>

@endsection
