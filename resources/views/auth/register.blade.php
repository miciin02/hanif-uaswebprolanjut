@extends('layouts.registrasi')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card glassmorphism p-5 shadow-lg w-100" style="max-width: 520px;">
        <h3 class="text-center mb-4 fw-bold text-white" style="font-size: 1.8rem;">Form Pendaftaran</h3>

        @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <ul class="mb-0 small">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="nik" class="form-label text-white fw-semibold">NIK</label>
                <input type="text" name="nik" id="nik" class="form-control rounded-pill" required value="{{ old('nik') }}" placeholder="Nomor Induk Kependudukan">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label text-white fw-semibold">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-control rounded-pill" required value="{{ old('name') }}" placeholder="Nama sesuai KTP">
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label text-white fw-semibold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control rounded-pill" required value="{{ old('tanggal_lahir') }}">
            </div>

            <div class="mb-3">
                <label for="tempat_lahir" class="form-label text-white fw-semibold">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control rounded-pill" required value="{{ old('tempat_lahir') }}" placeholder="Contoh: Bandung">
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label text-white fw-semibold">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control rounded-4" rows="2" required placeholder="Alamat lengkap">{{ old('alamat') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label text-white fw-semibold">Email</label>
                <input type="email" name="email" id="email" class="form-control rounded-pill" required value="{{ old('email') }}" placeholder="you@example.com">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label text-white fw-semibold">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control rounded-start-pill" required placeholder="••••••••">
                    <button class="btn btn-light rounded-end-pill" type="button" id="togglePassword">
                        <i class="bi bi-eye" id="iconEyePassword"></i>
                    </button>
                </div>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label text-white fw-semibold">Konfirmasi Password</label>
                <div class="input-group">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded-start-pill" required placeholder="••••••••">
                    <button class="btn btn-light rounded-end-pill" type="button" id="togglePasswordConfirm">
                        <i class="bi bi-eye" id="iconEyeConfirm"></i>
                    </button>
                </div>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="terms" id="terms" class="form-check-input" {{ old('terms') ? 'checked' : '' }}>
                <label for="terms" class="form-check-label text-white small">Saya setuju dengan persyaratan dan ketentuan pekerjaan</label>
            </div>

            <button type="submit" class="btn btn-warning w-100 rounded-pill fw-bold py-2">
                Register
            </button>

            <div class="mt-4 text-center">
                <a href="{{ route('login') }}" class="text-decoration-none text-white small">Sudah punya akun? <span class="fw-semibold text-warning">Login</span></a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const pass = document.getElementById('password');
        const icon = document.getElementById('iconEyePassword');
        pass.type = pass.type === 'password' ? 'text' : 'password';
        icon.classList.toggle('bi-eye');
        icon.classList.toggle('bi-eye-slash');
    });

    document.getElementById('togglePasswordConfirm').addEventListener('click', function () {
        const pass = document.getElementById('password_confirmation');
        const icon = document.getElementById('iconEyeConfirm');
        pass.type = pass.type === 'password' ? 'text' : 'password';
        icon.classList.toggle('bi-eye');
        icon.classList.toggle('bi-eye-slash');
    });
</script>
@endsection
