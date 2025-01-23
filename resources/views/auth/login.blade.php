@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-responsive" 
     style="background: url('/pexels-andreea-ch-371539-1166644.jpg') no-repeat center center / cover;">
    <div class="card p-4 shadow-lg border-0" 
         style="width: 400px; border-radius: 15px; background: rgba(255, 255, 255, 0.6); backdrop-filter: blur(10px);">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-primary">Portal Berita</h3>
            <p class="text-muted">Masuk untuk melanjutkan</p>
        </div>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan email Anda">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan password Anda">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Remember Me
                </label>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Login</button>

            @if (Route::has('password.request'))
                <div class="mt-3 text-end">
                    <a class="text-decoration-none text-primary" href="{{ route('password.request') }}">Forgot Your Password?</a>
                </div>
            @endif
        </form>

        <div class="mt-4 text-center">
            <p class="mb-0 text-muted">Belum punya akun? <a class="text-primary fw-bold" href="{{ route('register') }}">Daftar sekarang</a></p>
        </div>
    </div>
</div>
@endsection
