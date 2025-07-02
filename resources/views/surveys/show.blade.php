@extends('layouts.app')

@section('content')
<div class="d-flex" style="font-family: 'Inter', sans-serif;">
    <!-- Konten utama -->
    <main class="flex-grow-1 px-4 py-4" style="min-height: 100vh; background-color: #1e2a46;">
        <div class="profile-container">
            <h3 class="fw-bold text-white mb-4 border-bottom pb-3">Profil Saya</h3>
            
            <div class="glass-box p-4">
                <div class="profile-item">
                    <label>NIK</label>
                    <div class="profile-value">{{ $survey->nik }}</div>
                </div>

                <div class="profile-item">
                    <label>Nama</label>
                    <div class="profile-value">{{ $survey->nama_lengkap }}</div>
                </div>

                <div class="profile-item">
                    <label>Tanggal Lahir</label>
                    <div class="profile-value">{{ $survey->tanggal_lahir }}</div>
                </div>

                <div class="profile-item">
                    <label>Tempat Lahir</label>
                    <div class="profile-value">{{ $survey->tempat_lahir }}</div>
                </div>

                <div class="profile-item">
                    <label>Alamat</label>
                    <div class="profile-value">{{ $survey->alamat }}</div>
                </div>

                <div class="profile-item">
                    <label>Nomor HP</label>
                    <div class="profile-value">{{ $survey->nomor_telepon }}</div>
                </div>

                <div class="profile-item">
                    <label>Tanggal Survey</label>
                    <div class="profile-value">{{ $survey->tanggal_survey }}</div>
                </div>

                <!-- Tombol kembali -->
                <div class="text-end mt-4">
                    <a href="{{ route('survey.index') }}" class="btn btn-warning fw-semibold px-4">
                        <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- STYLE -->
<style>
    .profile-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .glass-box {
        background: rgba(255, 255, 255, 0.07);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .profile-item {
        margin-bottom: 1.3rem;
    }

    .profile-item label {
        font-weight: 500;
        display: block;
        color: #e0e0e0;
        margin-bottom: 0.4rem;
        font-size: 0.9rem;
    }

    .profile-value {
        background: rgba(255, 255, 255, 0.12);
        border-radius: 50px;
        padding: 0.7rem 1.4rem;
        font-size: 1rem;
        color: white;
    }
</style>
@endsection
