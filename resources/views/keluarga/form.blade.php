@extends('layouts.app')

@section('content')
<div class="d-flex" style="font-family: 'Inter', sans-serif;">

    <!-- Main Content -->
    <main class="flex-grow-1 px-4 py-4" style="min-height: 100vh; background-color: #1f2c45;">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-white pb-3">
            <h3 class="mb-0 fw-semibold text-white">Tambah Data Keluarga</h3>
        </div>

        <!-- Error Alert -->
        @if ($errors->any())
        <div class="glass-alert text-white border-0">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form Card -->
        <div class="glass-card border-0 shadow-sm text-white">
            <div class="card-body">
                <form method="POST" action="{{ route('keluarga.store') }}">
                    @csrf
                    <input type="hidden" name="survey_id" value="{{ $survey->id }}">

                    <div class="mb-3">
                        <label class="form-label fw-medium">Kode Survey</label>
                        <input type="text" class="form-control rounded-pill px-4 py-2" style="background-color: rgba(255,255,255,0.15); color: white;" value="{{ $survey->code ?? '-' }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">NIK</label>
                        <input type="text" class="form-control rounded-pill px-4 py-2" style="background-color: rgba(255,255,255,0.15); color: white;" value="{{ $survey->nik ?? '-' }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">Nama Lengkap</label>
                        <input type="text" class="form-control rounded-pill px-4 py-2" style="background-color: rgba(255,255,255,0.15); color: white;" value="{{ $survey->nama_lengkap ?? '-' }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="status_pernikahan_id" class="form-label fw-medium">Status Pernikahan</label>
                        <select name="status_pernikahan_id" id="status_pernikahan_id" class="form-select rounded-pill px-4 py-2" style="background-color: rgba(255,255,255,0.15); color: white;" required>
                            <option value="">-- Pilih Status Pernikahan --</option>
                            @foreach($statusPernikahans as $status)
                            <option value="{{ $status->id }}">{{ $status->status }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_anak" class="form-label fw-medium">Jumlah Anak</label>
                        <input type="number" name="jumlah_anak" id="jumlah_anak" class="form-control rounded-pill px-4 py-2" required min="0" value="{{ old('jumlah_anak') }}">
                    </div>

                    <div class="mb-4">
                        <label for="jumlah_tanggungan" class="form-label fw-medium">Jumlah Tanggungan Satu Keluarga</label>
                        <input type="number" name="jumlah_tanggungan" id="jumlah_tanggungan" class="form-control rounded-pill px-4 py-2" required min="0" value="{{ old('jumlah_tanggungan') }}">
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

    .form-control,
    .form-select {
        background-color: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .form-control:focus,
    .form-select:focus {
        background-color: rgba(255, 255, 255, 0.12);
        color: white;
        box-shadow: 0 0 0 0.2rem rgba(255,255,255,0.25);
        border-color: #ffffff;
    }

    .form-select {
        background-color: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
    }

    .form-select option {
        background-color: #1f2c45;   /* warna dasar list */
        color: white;                /* teks putih */
    }
`
</style>
@endsection
