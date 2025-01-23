@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100" 
     style="background: url('/pexels-andreea-ch-371539-1166644.jpg') no-repeat center center / cover; margin: 0; padding: 0;">
    <div class="card p-4 shadow-lg border-0" style="width: 100%; max-width: 400px; border-radius: 15px; background: rgba(255, 255, 255, 0.9);">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-primary">Portal Berita</h3>
            <p class="text-muted">Daftar untuk membuat akun</p>
        </div>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Masukkan nama Anda">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukkan email Anda">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Masukkan password Anda">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi password Anda">
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Register</button>
        </form>

        <div class="mt-4 text-center">
            <p class="mb-0 text-muted">Sudah punya akun? <a class="text-primary fw-bold" href="{{ route('login') }}">Login sekarang</a></p>
        </div>
    </div>
</div>
@endsection
