@extends('layouts.app')

@section('content')
<div class="d-flex" style="font-family: 'Inter', sans-serif;">
    <main class="flex-grow-1 px-4 py-4" style="min-height: 100vh; background: #1e2a46;">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-white pb-3">
            <h3 class="mb-0 fw-semibold text-white">Profil Saya</h3>
        </div>

        <!-- Glass Card -->
        <div class="glass-card border-0 shadow-sm">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" value="{{ $user->nik }}" class="form-control rounded-pill px-4 py-2" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" value="{{ $user->name }}" class="form-control rounded-pill px-4 py-2" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="text" value="{{ $user->tanggal_lahir }}" class="form-control rounded-pill px-4 py-2" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" value="{{ $user->tempat_lahir }}" class="form-control rounded-pill px-4 py-2" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control rounded-4 px-4 py-2" rows="2" readonly>{{ $user->alamat }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor HP</label>
                    <input type="text" value="{{ $user->nomor_hp }}" class="form-control rounded-pill px-4 py-2" readonly>
                </div>

                <div class="mb-4">
                    <label class="form-label">Email</label>
                    <input type="email" value="{{ $user->email }}" class="form-control rounded-pill px-4 py-2" readonly>
                </div>

                <a href="{{ route('dashboard.index') }}" class="btn btn-warning rounded-pill fw-semibold px-4 py-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </main>
</div>

<!-- Glass Style -->
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        padding: 2rem;
        color: white;
    }

    .form-label {
        font-size: 0.95rem;
        color: white;
    }

    .form-control {
        background-color: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .form-control:focus {
        background-color: rgba(255, 255, 255, 0.2);
        color: white;
        box-shadow: 0 0 0 0.2rem rgba(255,255,255,0.25);
        border-color: #ffffff;
    }

    .btn-warning:hover {
        background-color: #f0c14b;
        color: #212529;
    }

    .dropdown-toggle:focus {
        box-shadow: none !important;
    }
</style>
@endsection
