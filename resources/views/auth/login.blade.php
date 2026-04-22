@extends('layouts.app')

@section('content')
<main class="auth-page">
    <div class="auth-grid"></div>
    <div class="auth-mark auth-mark-one"></div>
    <div class="auth-mark auth-mark-two"></div>

    <div class="container auth-shell">
        <div class="auth-copy">
            <span>Admin Access</span>
            <h1>Welcome back.</h1>
            <p>Sign in to manage portfolio content, projects, services, reviews, and profile details from one clean control panel.</p>
            <div class="auth-mini-stats">
                <div><strong>01</strong><small>Portfolio CMS</small></div>
                <div><strong>24/7</strong><small>Ready to edit</small></div>
            </div>
        </div>

        <section class="auth-card" aria-labelledby="login-title">
            <div class="auth-card-head">
                <span class="auth-dot"></span>
                <div>
                    <h2 id="login-title">{{ __('Login') }}</h2>
                    <p>Use your admin credentials to continue.</p>
                </div>
            </div>

            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf

                <div class="auth-field">
                    <label for="email">{{ __('Email Address') }}</label>
                    <div class="auth-input-wrap">
                        <i class="fa-solid fa-envelope"></i>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="test@gmail.com">
                    </div>
                    @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="auth-field">
                    <label for="password">{{ __('Password') }}</label>
                    <div class="auth-input-wrap">
                        <i class="fa-solid fa-lock"></i>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                    </div>
                    @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="auth-row">
                    <div class="form-check auth-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="auth-link" href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary auth-submit">
                    {{ __('Login') }} <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </form>
        </section>
    </div>
</main>
@endsection
