@extends('layouts.app')

@section('content')
<div class="d-flex" style="font-family: 'Inter', sans-serif;">
    <main class="flex-grow-1 px-4 py-4" style="min-height: 100vh; background-color: #1f2c45;">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-white pb-3">
            <h3 class="mb-0 fw-semibold text-white">Tambah Survey</h3>
            <div class="dropdown">
                <button class="btn border-0 rounded-circle d-flex align-items-center justify-content-center text-white fw-bold shadow-sm"
                        type="button" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false"
                        style="width: 44px; height: 44px; background: linear-gradient(to right, #4e54c8, #8f94fb);">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownProfile">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Error Alert -->
        @if ($errors->any())
        <div class="glass-alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form Card -->
        <div class="glass-card border-0 shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('survey.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control rounded-pill px-4 py-2" required value="{{ old('nik') }}">
                    </div>

                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control rounded-pill px-4 py-2" required value="{{ old('nama_lengkap') }}">
                    </div>

                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control rounded-pill px-4 py-2" required value="{{ old('tempat_lahir') }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control rounded-pill px-4 py-2" required value="{{ old('tanggal_lahir') }}">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control rounded-4 px-4 py-2" required>{{ old('alamat') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control rounded-pill px-4 py-2" required value="{{ old('nomor_telepon') }}">
                    </div>

                    <button type="submit" class="btn btn-light text-dark rounded-pill fw-semibold px-4 py-2">
                        Simpan dan Lanjutkan
                    </button>
                </form>
            </div>
        </div>
    </main>
</div>

<!-- Glassmorphism Style -->
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(12px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
        padding: 2rem;
        color: white;
    }

    .glass-alert {
        background: rgba(220, 53, 69, 0.15);
        backdrop-filter: blur(6px);
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 1.5rem;
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .form-label {
        font-size: 0.95rem;
        color: white;
    }

    .form-control {
        background-color: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
    }

    .form-control:focus {
        background-color: rgba(255, 255, 255, 0.12);
        color: white;
        border-color: #fff;
        box-shadow: 0 0 0 0.2rem rgba(255,255,255,0.2);
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }
</style>
@endsection
