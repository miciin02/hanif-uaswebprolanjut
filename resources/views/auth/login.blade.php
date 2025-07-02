@extends('layouts.login')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; background: #a0aec0;> ; font-family: 'Inter', sans-serif;">
    <div class="card glassmorphism p-5 shadow-lg" style="width: 100%; max-width: 400px; border-radius: 20px; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);">
        <h3 class="text-center mb-4 fw-bold text-white" style="font-size: 1.8rem;">
            {{ config('app.name', 'Aplikasi Saya') }}
        </h3>

        @if(session('error'))
        <div class="alert alert-danger mb-3" style="font-size: 0.95rem;">
            {{ session('error') }}
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success mb-3" style="font-size: 0.95rem;">
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label text-white fw-semibold">Email</label>
                <input type="email" name="email" id="email" class="form-control rounded-pill shadow-sm" required autofocus placeholder="you@example.com" style="padding: 12px 16px;">
            </div>

            <div class="mb-4">
                <label for="password" class="form-label text-white fw-semibold">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control rounded-pill shadow-sm" required placeholder="••••••••" style="padding: 12px 16px;">
                    <button class="btn btn-light ms-2 rounded-pill px-3" type="button" id="togglePassword">
                        <i class="bi bi-eye" id="iconEye"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn btn-light w-100 rounded-pill fw-bold shadow" style="padding: 12px 0;">
                Login
            </button>

            <div class="mt-4 text-center text-white" style="font-size: 0.95rem;">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-decoration-none fw-semibold text-warning">Daftar sekarang</a>
            </div>
        </form>
    </div>
</div>

<style>
    .glassmorphism {
       background: #1e2a46;">
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    }

    .form-control:focus {
        border-color: #fff;
        box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
    }

    .btn-light:hover {
        background-color: #e2e6ea;
    }

    .form-label {
        font-size: 0.95rem;
    }

    .btn:focus {
        box-shadow: none;
    }
</style>

<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        const password = document.getElementById('password');
        const iconEye = document.getElementById('iconEye');
        if (password.type === 'password') {
            password.type = 'text';
            iconEye.classList.remove('bi-eye');
            iconEye.classList.add('bi-eye-slash');
        } else {
            password.type = 'password';
            iconEye.classList.remove('bi-eye-slash');
            iconEye.classList.add('bi-eye');
        }
    });
</script>
@endsection
