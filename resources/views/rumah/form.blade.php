@extends('layouts.app')

@section('content')
<div class="d-flex" style="font-family: 'Inter', sans-serif;">
    <!-- Main Content -->
    <main class="flex-grow-1 px-4 py-4" style="min-height: 100vh; background-color: #1f2c45;">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3 text-white">
            <h3 class="mb-0 fw-semibold">Tambah Data Rumah</h3>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle rounded-circle d-flex align-items-center justify-content-center"
                        type="button" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false"
                        style="width: 40px; height: 40px;">
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
        <div class="alert glass-alert text-white border-0">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form -->
        <div class="glass-card border-0 shadow-sm text-white">
            <div class="card-body">
                <form method="POST" action="{{ route('rumah.store') }}">
                    @csrf
                    <input type="hidden" name="survey_id" value="{{ $survey->id }}">

                    <div class="mb-3">
                        <label class="form-label fw-medium">Kode Survey</label>
                        <input type="text" class="form-control rounded-pill px-4 py-2" value="{{ $survey->code }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">NIK</label>
                        <input type="text" class="form-control rounded-pill px-4 py-2" value="{{ $survey->nik }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">Nama Lengkap</label>
                        <input type="text" class="form-control rounded-pill px-4 py-2" value="{{ $survey->nama_lengkap }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="status_rumah_id" class="form-label fw-medium">Status Rumah</label>
                        <select name="status_rumah_id" id="status_rumah_id" class="form-control rounded-pill px-4 py-2" required>
                            <option value="">Pilih Status Rumah</option>
                            @foreach($status_rumah as $s)
                            <option value="{{ $s->id }}">{{ $s->status }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_rumah_id" class="form-label fw-medium">Jenis Rumah</label>
                        <select name="jenis_rumah_id" id="jenis_rumah_id" class="form-control rounded-pill px-4 py-2" required>
                            <option value="">Pilih Jenis Rumah</option>
                            @foreach($jenis_rumah as $j)
                            <option value="{{ $j->id }}">{{ $j->jenis }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="kondisi_rumah_id" class="form-label fw-medium">Kondisi Rumah</label>
                        <select name="kondisi_rumah_id" id="kondisi_rumah_id" class="form-control rounded-pill px-4 py-2" required>
                            <option value="">Pilih Kondisi Rumah</option>
                            @foreach($kondisi_rumah as $k)
                            <option value="{{ $k->id }}">{{ $k->kondisi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="luas_rumah" class="form-label fw-medium">Luas Rumah (m²)</label>
                        <input type="number" name="luas_rumah" id="luas_rumah" class="form-control rounded-pill px-4 py-2" required min="0" step="0.01" value="{{ old('luas_rumah') }}">
                    </div>

                    <button type="submit" class="btn btn-warning rounded-pill fw-semibold px-4 py-2">
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
        background-color: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(6px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 2rem;
        color: white;
    }

    .glass-alert {
        background: rgba(220, 53, 69, 0.2);
        backdrop-filter: blur(8px);
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: white;
    }

    .form-label {
        font-size: 0.95rem;
        color: white;
    }

    .form-control,
.form-select {
    background-color: rgba(255, 255, 255, 0.08) !important;
    border: 1px solid rgba(255, 255, 255, 0.3) !important;
    color: white !important;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    position: relative;
    z-index: 2;
}

.form-control:focus,
.form-select:focus {
    background-color: rgba(255, 255, 255, 0.12) !important;
    color: white !important;
    border-color: #ffffff !important;
    box-shadow: 0 0 0 0.2rem rgba(255,255,255,0.25);
}

/* Tambahan penting */
select.form-control option,
select.form-select option {
    background-color: #1f2c45 !important; /* warna latar belakang opsi */
    color: white !important;              /* warna teks opsi */
}

</style>

@endsection
