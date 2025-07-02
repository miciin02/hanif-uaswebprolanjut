@extends('layouts.app')

@section('content')
<div class="d-flex" style="font-family: 'Inter', sans-serif;">

    <!-- Main Content -->
    <main class="flex-grow-1 px-4 py-3" style="min-height: 100vh; background: #1e2a46;">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-white pb-3 text-white">
            <h3 class="mb-0 fw-semibold">Data Pekerjaan & Pendapatan</h3>
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

        <!-- Data Table -->
        <div class="glass-card p-4 rounded-4 shadow-sm">
            @if($pekerjaans->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kode Survey</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pekerjaans as $pekerjaan)
                        <tr>
                            <td>{{ $pekerjaan->id }}</td>
                            <td>{{ $pekerjaan->survey->code }}</td>
                            <td>{{ $pekerjaan->pekerjaan->nama_pekerjaan ?? '-' }}</td>
                            <td>{{ $pekerjaan->pendapatan->range_pendapatan ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert glass-alert text-dark text-center mb-0">
                Data pekerjaan dan pendapatan belum tersedia.
            </div>
            @endif
        </div>
    </main>
</div>

<!-- Glassmorphism & Styling -->
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

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .dropdown-toggle:focus {
        box-shadow: none !important;
    }
</style>
@endsection
