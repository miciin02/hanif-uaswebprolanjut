@extends('layouts.app')

@section('content')
<div class="d-flex" style="font-family: 'Inter', sans-serif;">
    <main class="flex-grow-1 px-4 py-4" style="min-height: 100vh; background-color: #1f2c45;">
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3 text-white">
            <h3 class="mb-0 fw-semibold">
                {{ isset($edit) ? 'Edit Data Pekerjaan & Pendapatan' : 'Tambah Data Pekerjaan & Pendapatan' }}
            </h3>
        </div>

        <!-- Alert Error -->
        @if ($errors->any())
        <div class="alert glass-alert text-white border-0">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form Glass -->
        <div class="glass-card border-0 shadow-sm text-white">
            <div class="card-body">
                <form method="POST" action="{{ isset($edit) ? route('pekerjaan.update', $edit->id) : route('pekerjaan.store') }}">
                    @csrf
                    @if(isset($edit)) @method('PUT') @endif

                    <input type="hidden" name="survey_id" value="{{ $survey->id ?? $edit->survey_id }}">

                    <div class="mb-3">
                        <label class="form-label fw-medium">Kode Survey</label>
                        <input type="text" class="form-control rounded-pill px-4 py-2" value="{{ $survey->code ?? $edit->survey->code ?? '-' }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">NIK</label>
                        <input type="text" class="form-control rounded-pill px-4 py-2" value="{{ $survey->nik ?? $edit->survey->nik ?? '-' }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">Nama Lengkap</label>
                        <input type="text" class="form-control rounded-pill px-4 py-2" value="{{ $survey->nama_lengkap ?? $edit->survey->nama_lengkap ?? '-' }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="pekerjaan_id" class="form-label fw-medium">Pekerjaan</label>
                        <select name="pekerjaan_id" id="pekerjaan_id" class="form-control rounded-pill px-4 py-2" required>
                            <option value="">Pilih Pekerjaan</option>
                            @foreach($pekerjaan as $p)
                            <option value="{{ $p->id }}" {{ (isset($edit) && $edit->pekerjaan_id == $p->id) ? 'selected' : '' }}>
                                {{ $p->nama_pekerjaan }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="pendapatan_id" class="form-label fw-medium">Pendapatan Per Bulan</label>
                        <select name="pendapatan_id" id="pendapatan_id" class="form-control rounded-pill px-4 py-2" required>
                            <option value="">Pilih Pendapatan</option>
                            @foreach($pendapatan as $d)
                            <option value="{{ $d->id }}" {{ (isset($edit) && $edit->pendapatan_id == $d->id) ? 'selected' : '' }}>
                                {{ $d->range_pendapatan }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning rounded-pill fw-semibold px-4 py-2">
                        {{ isset($edit) ? 'Update' : 'Simpan dan Lanjutkan' }}
                    </button>
                </form>
            </div>
        </div>
    </main>
</div>

<!-- Styling Glassmorphism -->
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        padding: 2rem;
    }

    .glass-alert {
        background: rgba(220, 53, 69, 0.2);
        backdrop-filter: blur(8px);
        border-radius: 12px;
        padding: 1rem 1.5rem;
        margin-bottom: 1.5rem;
        color: white;
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
        border-color: #ffffff;
        box-shadow: 0 0 0 0.2rem rgba(255,255,255,0.2);
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .form-control option {
        background-color: #1f2c45;
        color: white;
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
