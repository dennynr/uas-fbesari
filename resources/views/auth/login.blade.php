@vite('resources/sass/app.scss')
<title>{{ $pageTitle }}</title>
<link rel="stylesheet" href="css/login.css">
<div class="container">
    <div class="login-container shadow">
      <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid">
      </div>
      <h2>F'Besari App</h2>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">{{ __('Email Address') }}</label>
          <input type="email" placeholder="Masukkan Email" class="form-control rounded-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">{{ __('Password') }}</label>
          <input type="password" placeholder="Password" class="form-control rounded-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="mb-3 form-check">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
          </label>
        </div>
        <button type="submit" class="btn btn-primary rounded-4">Login</button>
      </form>
    </div>
  </div>

