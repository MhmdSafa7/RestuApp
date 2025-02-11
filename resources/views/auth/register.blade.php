@extends('layout.log')

@section('content')
<style>
    body {
        background-color: #0e070733;
    }

    /* Card Styling */
    .register-card {
        border: none;
        border-radius: 15px;
        color: #700f0f; /* Dark red */
        background-color: rgba(80, 62, 62, 0.137);
        box-shadow: 0 4px 20px rgb(0, 0, 0);
        overflow: hidden;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .register-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(245, 0, 0, 0.74);
    }

    /* Header Styling */
    .register-header {
        background-color: #700f0f; /* Dark red */
        color: rgb(194, 10, 10);
        padding: 20px;
        text-align: center;
        border-bottom: 2px solid #ff4444; /* Bright red border */
    }

    /* Form Styling */
    .register-form {
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
    .btn-register {
        background-color: #700f0f; /* Dark red */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .btn-register:hover {
        color: white;
        background-color: #0a0909; /* Bright red */
        transform: translateY(-2px);
    }

    /* Animation for Input Fields */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .register-form .row {
        animation: fadeIn 0.5s ease-in-out;
    }

    .register-form .row:nth-child(1) { animation-delay: 0.1s; }
    .register-form .row:nth-child(2) { animation-delay: 0.2s; }
    .register-form .row:nth-child(3) { animation-delay: 0.3s; }
    .register-form .row:nth-child(4) { animation-delay: 0.4s; }
    .register-form .row:nth-child(5) { animation-delay: 0.5s; }
</style>

<div class="container" style="margin-top: 150px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card register-card">
                <div class="card-header register-header" >
                    <h2 class="text-center text-white">{{ __('Register') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="register-form">
                        @csrf

                        <!-- Name Input -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Input -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Role Selection -->
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <select name="role" class="form-control">
                                    <option value="MODERATOR">Moderator</option>
                                    <option value="EDITOR">Editor</option>
                                </select>
                            </div>
                        </div>

                        <!-- Register Button -->
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-register">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
