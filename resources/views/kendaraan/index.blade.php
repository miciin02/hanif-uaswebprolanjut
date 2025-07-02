@extends('layouts.app')

@section('content')
<div class="d-flex" style="font-family: 'Inter', sans-serif;">

    <!-- Main Content -->
    <main class="flex-grow-1 px-4 py-3" style="min-height: 100vh; background: #1e2a46;">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-white pb-3 text-white">
            <h3 class="mb-0 fw-semibold">Data Kendaraan</h3>

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

        <!-- Flash Message -->
        @if(session('success'))
        <div class="alert glass-alert text-dark border-0 shadow-sm">
            {{ session('success') }}
        </div>
        @endif

        <!-- Table Card -->
        <div class="glass-card rounded-4 shadow-sm p-4">
            @if($kendaraans->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Kode Survey</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kendaraan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($kendaraans as $index => $kendaraan)
                        <tr>
                            <td>{{ $kendaraan->id }}</td>
                            <td>{{ $kendaraan->survey->code ?? '-' }}</td>
                            <td>{{ $kendaraan->survey->nik ?? '-' }}</td>
                            <td>{{ $kendaraan->survey->nama_lengkap ?? '-' }}</td>
                            <td>{{ $kendaraan->jenisKendaraan->jenis ?? '-' }}</td>
                            <td>{{ $kendaraan->jumlah_kendaraan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert glass-alert text-dark text-center mb-0">
                Data kendaraan belum tersedia.
            </div>
            @endif
        </div>
    </main>
</div>

<!-- Styling -->
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .glass-alert {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(6px);
        border-radius: 12px;
        padding: 12px 20px;
        margin-bottom: 1.5rem;
        color: #000;
    }

    .table th, .table td {
        color: #000 !important;
        font-size: 0.95rem;
        vertical-align: middle;
    }

    .dropdown-toggle:focus {
        box-shadow: none !important;
    }
</style>
@endsection
