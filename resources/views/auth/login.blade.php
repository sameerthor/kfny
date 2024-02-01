@extends('layouts.app')
@section('content')
<section class="admin_login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="login_section_image">
                    <img src="{{ asset('images/other/login_section.jpg') }}" />
                </div>
            </div>
            <div class="col-md-6">

                <div class="login_form_section">

                    <div class="login_form_col">
                        <div class="login_form_logo">
                            <img src="{{ asset('images/logo/logo.svg') }}" />
                        </div>

                        <form class="login_form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email ID*</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <!-- <i class="bi bi-eye-slash-fill" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                      -->
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="login_button">Login</button>
                            <a href="{{ route('password.request') }}" class="Forgot_Password">Forgot Password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@endsection