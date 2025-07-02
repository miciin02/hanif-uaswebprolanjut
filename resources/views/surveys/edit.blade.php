@extends('layouts.app')

@section('content')
<main class="flex-grow-1 px-4 py-4" style="background: #1e2a46; min-height: 100vh; font-family: 'Inter', sans-serif;">
    <div class="glass-card p-4 text-white">
        <h4 class="fw-semibold mb-4">Edit Data Survey</h4>

        @if ($errors->any())
        <div class="glass-alert text-dark">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('survey.update', $survey->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">NIK</label>
                <input type="text" name="nik" class="form-control" value="{{ old('nik', $survey->nik) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $survey->nama_lengkap) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $survey->tempat_lahir) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $survey->tanggal_lahir) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ old('alamat', $survey->alamat) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $survey->nomor_telepon) }}" required>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('survey.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-warning text-dark fw-semibold">Update Data</button>
            </div>
        </form>
    </div>
</main>

<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    }

    .glass-alert {
        background: rgba(255, 255, 255, 0.85);
        border-radius: 12px;
        padding: 12px 20px;
        margin-bottom: 1.5rem;
    }
</style>
@endsection
