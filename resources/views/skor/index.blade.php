@extends('layouts.app')

@section('content')
<div class="d-flex" style="font-family: 'Inter', sans-serif;">
    <!-- Main Content -->
    <main class="flex-grow-1 px-4 py-4" style="min-height: 100vh; background: #1e2a46;">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom border-white">
            <h4 class="mb-0 fw-semibold text-white">Data Skor</h4>
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

        @if(session('success'))
        <div class="alert glass-alert text-dark border-0 shadow-sm">
            {{ session('success') }}
        </div>
        @endif

        <!-- Table -->
        <div class="glass-card rounded-4 shadow-sm p-3">
            @if($skors->count() > 0)
            <div class="table-responsive">
                <table class="table align-middle mb-0 text-center table-hover table-bordered">
                    <thead class="table-light text-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode Survey</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Skor Total</th>
                            <th>Hasil Kelayakan</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-dark">
                        @foreach ($skors as $skor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $skor->survey->code ?? '-' }}</td>
                            <td>{{ $skor->survey->nik ?? '-' }}</td>
                            <td>{{ $skor->survey->nama_lengkap ?? '-' }}</td>
                            <td>{{ $skor->total_skor }}</td>
                            <td>
                                @if($skor->kelayakan == 'Layak')
                                    <span class="badge bg-success">Layak</span>
                                @else
                                    <span class="badge bg-danger">Tidak Layak</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert glass-alert text-dark text-center mb-0">
                Data skor belum tersedia.
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

    .glass-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
    }

    .glass-alert {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(6px);
        border-radius: 12px;
        padding: 12px 20px;
        margin-bottom: 1.5rem;
    }

    .table th, .table td {
        font-size: 0.95rem;
        vertical-align: middle;
    }

    .dropdown-toggle:focus {
        box-shadow: none !important;
    }
</style>
@endsection
