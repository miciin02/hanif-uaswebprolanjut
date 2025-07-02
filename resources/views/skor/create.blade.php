@extends('layouts.app')

@section('content')
<main class="flex-grow-1 px-4 py-3 bg-light" style="min-height: 100vh; font-family: 'Inter', sans-serif;">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h3 class="mb-0 fw-semibold text-primary">Form Skor</h3>
    </div>

    <div class="card shadow-sm border-0 rounded-4 p-4">
        <div class="card-body">
            <form method="POST" action="{{ route('skor.store') }}">
                @csrf

                <input type="hidden" name="survey_id" value="{{ $survey->id }}">

                <div class="mb-3">
                    <label class="form-label">Kode Survey</label>
                    <input type="text" class="form-control" value="{{ $survey->code }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" class="form-control" value="{{ $survey->nik }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" value="{{ $survey->nama_lengkap }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pendapatan Bulanan</label>
                    <select class="form-select" name="pendapatan_id" required>
                        <option value="1"><= 500K</option>
                        <option value="2">500K - 1Jt</option>
                        <option value="3">1Jt - 2Jt</option>
                        <option value="4">2Jt - 3.5Jt</option>
                        <option value="5">3.5Jt - 5Jt</option>
                        <option value="6">5Jt - 7.5Jt</option>
                        <option value="7">7.5Jt - 10Jt</option>
                        <option value="8">10Jt - 15Jt</option>
                        <option value="9">15Jt - 20Jt</option>
                        <option value="10">> 20Jt</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Tanggungan</label>
                    <input type="number" class="form-control" name="jumlah_tanggungan" value="{{ old('jumlah_tanggungan') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Pernikahan</label>
                    <select class="form-select" name="status_pernikahan_id" required>
                        <option value="1">Belum Menikah</option>
                        <option value="2">Menikah</option>
                        <option value="3">Cerai Mati</option>
                        <option value="4">Cerai Hidup</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Rumah</label>
                    <select class="form-select" name="status_rumah_id" required>
                        <option value="1">Milik Sendiri</option>
                        <option value="2">Menumpang Orang Tua</option>
                        <option value="3">Menumpang Saudara</option>
                        <option value="4">Kontrak/Sewa</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Rumah</label>
                    <select class="form-select" name="jenis_rumah_id" required>
                        <option value="1">Permanen</option>
                        <option value="2">Semi Permanen</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kondisi Rumah</label>
                    <select class="form-select" name="kondisi_rumah_id" required>
                        <option value="1">Baik</option>
                        <option value="2">Rusak Sebagian</option>
                        <option value="3">Rusak Parah</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Luas Rumah (m²)</label>
                    <input type="number" class="form-control" name="luas_rumah" value="{{ old('luas_rumah') }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Jumlah Kendaraan (Sepeda/Motor)</label>
                    <input type="number" class="form-control" name="jumlah_kendaraan" value="{{ old('jumlah_kendaraan') }}" required>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan Skor dan Selesai</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
