@extends('layouts.app')

@section('content')
<div class="d-flex" style="font-family: 'Inter', sans-serif;">
    <!-- Main Content -->
    <main class="flex-grow-1 px-4 py-4" style="min-height: 100vh; background-color: #1f2c45;">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3 text-white">
            <h3 class="mb-0 fw-semibold">Tambah Data Kendaraan</h3>
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

        <!-- Form Card -->
        <div class="glass-card border-0 shadow-sm text-white">
            <div class="card-body">
                <form method="POST" action="{{ route('kendaraan.store') }}">
                    @csrf

                    <input type="hidden" name="survey_id" value="{{ $survey->id }}">

                    <div class="mb-3">
                        <label class="form-label fw-medium">Kode Survey</label>
                        <input type="text" class="form-control readonly-dark rounded-pill px-4 py-2" value="{{ $survey->code }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">NIK</label>
                        <input type="text" class="form-control readonly-dark rounded-pill px-4 py-2" value="{{ $survey->nik }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">Nama Lengkap</label>
                        <input type="text" class="form-control readonly-dark rounded-pill px-4 py-2" value="{{ $survey->nama_lengkap }}" readonly>
                    </div>

                    <div id="kendaraan-wrapper">
                        <div class="kendaraan-item mb-3 p-3 border rounded kendaraan-block">
                            <button type="button" class="btn-close position-absolute top-0 end-0 m-2 remove-kendaraan"></button>
                            <div class="mb-3">
                                <label class="form-label fw-medium">Jenis Kendaraan</label>
                                <select name="kendaraan[0][jenis_kendaraan_id]" class="form-select dark-select rounded-pill px-4 py-2" required>
                                    <option value="">Pilih Jenis Kendaraan</option>
                                    @foreach($jenis_kendaraan as $jk)
                                    <option value="{{ $jk->id }}">{{ $jk->jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-medium">Jumlah Kendaraan</label>
                                <input type="number" name="kendaraan[0][jumlah_kendaraan]" class="form-control dark-input rounded-pill px-4 py-2" required min="0">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <button type="button" class="btn btn-outline-light text-white fw-semibold rounded-pill px-4" id="add-kendaraan">
                            Tambah Kendaraan
                        </button>
                        <button type="submit" class="btn btn-warning rounded-pill fw-semibold px-4 py-2">
                            Simpan dan Lanjutkan
                        </button>
                    </div>
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
        padding: 2rem;
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .glass-alert {
        background: rgba(220, 53, 69, 0.2);
        backdrop-filter: blur(8px);
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .kendaraan-block {
        background-color: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(6px);
        color: white;
    }

    .form-label {
        font-size: 0.95rem;
        color: white;
    }

    .dark-input,
    .dark-select,
    .readonly-dark {
        background-color: rgba(255, 255, 255, 0.08) !important;
        border: 1px solid rgba(255, 255, 255, 0.3) !important;
        color: white !important;
    }

    .dark-input::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .dark-input:focus,
    .dark-select:focus {
        background-color: rgba(255, 255, 255, 0.12) !important;
        color: white !important;
        border-color: #ffffff;
        box-shadow: 0 0 0 0.2rem rgba(255,255,255,0.25);
    }

    .dark-select option {
        background-color: #1f2c45;
        color: white;
    }
</style>

<!-- Dynamic Kendaraan -->
<script>
    let index = 1;
    document.getElementById('add-kendaraan').addEventListener('click', function () {
        const wrapper = document.getElementById('kendaraan-wrapper');
        const html = `
        <div class="kendaraan-item mb-3 p-3 border rounded kendaraan-block position-relative">
            <button type="button" class="btn-close position-absolute top-0 end-0 m-2 remove-kendaraan"></button>
            <div class="mb-3">
                <label class="form-label fw-medium">Jenis Kendaraan</label>
                <select name="kendaraan[\${index}][jenis_kendaraan_id]" class="form-select dark-select rounded-pill px-4 py-2" required>
                    <option value="">Pilih Jenis Kendaraan</option>
                    @foreach($jenis_kendaraan as $jk)
                    <option value="{{ $jk->id }}">{{ $jk->jenis }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-medium">Jumlah Kendaraan</label>
                <input type="number" name="kendaraan[\${index}][jumlah_kendaraan]" class="form-control dark-input rounded-pill px-4 py-2" required min="0">
            </div>
        </div>`;
        wrapper.insertAdjacentHTML('beforeend', html.replace(/\${index}/g, index));
        index++;
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-kendaraan')) {
            e.target.closest('.kendaraan-item').remove();
        }
    });
</script>
@endsection
