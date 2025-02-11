@extends('layout.log')

@section('content')

<style>

    body {
        background-color: #0e070733;
    }

    /* Card Styling */
    .login-card {
        border: none;
        border-radius: 15px;
        color: #700f0f; /* Dark red */
        background-color: rgba(80, 62, 62, 0.137);
        box-shadow: 0 4px 20px rgb(0, 0, 0);
        overflow: hidden;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .login-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(245, 0, 0, 0.74);
    }

    /* Header Styling */
    .login-header {
        background-color: #700f0f; /* Dark red */
        color: rgb(194, 10, 10);
        padding: 20px;
        text-align: center;
        border-bottom: 2px solid #ff4444; /* Bright red border */
    }

    /* Form Styling */
    .login-form {
        padding: 20px;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ddd;
        transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #ff4444; /* Bright red */
        box-shadow: 0 0 8px rgba(255, 68, 68, 0.3); /* Red glow */
    }

    /* Button Styling */
    .btn-login {
        background-color: #700f0f; /* Dark red */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .btn-login:hover {
        color: white;
        background-color: #0a0909; /* Bright red */
        transform: translateY(-2px);
    }

    /* Forgot Password Link Styling */
    .btn-forgot {
        color: #700f0f; /* Dark red */
        text-decoration: none;
        transition: color 0.3s ease-in-out;
    }

    .btn-forgot:hover {
        color: #ff4444; /* Bright red */
    }

    /* Animation for Input Fields */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .login-form .row {
        animation: fadeIn 0.5s ease-in-out;
    }

    .login-form .row:nth-child(1) { animation-delay: 0.1s; }
    .login-form .row:nth-child(2) { animation-delay: 0.2s; }
    .login-form .row:nth-child(3) { animation-delay: 0.3s; }
</style>
<div class="container" style="margin-top: 150px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login-card">
                <div class="card-header login-header">
                    <h2 class="text-center text-white">{{ __('Login') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="login-form">
                        @csrf

                        <!-- Email Input -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Login Button and Forgot Password Link -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-login">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-forgot" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


