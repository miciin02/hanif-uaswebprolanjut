@extends('layouts.app')

@section('content')
<div class="d-flex" style="font-family: 'Inter', sans-serif;">
    <main class="flex-grow-1 px-4 py-4" style="min-height: 100vh; background: #1e2a46;">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-5 pb-2 border-bottom border-white">
            <h3 class="mb-0 fw-bold text-white">Sistem Aplikasi Kelayakan Terintegrasi</h3>
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

        <!-- Dashboard Grid -->
        <div class="row g-4">

            <!-- Total Survey -->
            <div class="col-12">
                <div class="dashboard-card bg-gradient-blue d-flex align-items-center p-4 rounded-4 shadow-lg">
                    <i class="bi bi-clipboard-data display-4 me-4 icon-style text-info"></i>
                    <div>
                        <div class="fs-6 text-white-50">Total Survey</div>
                        <div class="fs-2 fw-bold text-white">{{ $totalSurvey }}</div>
                    </div>
                </div>
            </div>

            <!-- Survey Layak -->
            <div class="col-12 col-md-6">
                <div class="dashboard-card bg-gradient-green d-flex align-items-center p-4 rounded-4 shadow-lg">
                    <i class="bi bi-check-circle display-4 me-4 icon-style text-success"></i>
                    <div>
                        <div class="fs-6 text-white-50">Survey Layak</div>
                        <div class="fs-2 fw-bold text-white">{{ $surveyLayak }}</div>
                    </div>
                </div>
            </div>

            <!-- Survey Tidak Layak -->
            <div class="col-12 col-md-6">
                <div class="dashboard-card bg-gradient-red d-flex align-items-center p-4 rounded-4 shadow-lg">
                    <i class="bi bi-x-circle display-4 me-4 icon-style text-danger"></i>
                    <div>
                        <div class="fs-6 text-white-50">Survey Tidak Layak</div>
                        <div class="fs-2 fw-bold text-white">{{ $surveyTidakLayak }}</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<style>
    .bg-gradient-blue {
        background: linear-gradient(135deg, #4e54c8, #8f94fb);
    }

    .bg-gradient-green {
        background: linear-gradient(135deg, #00c9a7, #92fe9d);
    }

    .bg-gradient-red {
        background: linear-gradient(135deg, #ff758c, #ff7eb3);
    }

    .dashboard-card {
        transition: 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.25);
    }

    .icon-style {
        width: 64px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(255,255,255,0.1);
        border-radius: 50%;
    }

    .dropdown-toggle:focus {
        box-shadow: none !important;
    }
</style>
@endsection
