<nav class="glass-sidebar d-flex flex-column justify-content-between" style="width: 240px; min-height: 100vh;">
    <div>
        <div class="text-center py-4 fs-4 fw-bold text-white border-bottom border-white">MENU</div>
        <div class="list-group list-group-flush mt-2">
            <a href="{{ route('dashboard.index') }}" class="sidebar-link {{ request()->routeIs('dashboard.index') ? 'active-link' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            <a href="{{ route('survey.index') }}" class="sidebar-link {{ request()->routeIs('survey.index') ? 'active-link' : '' }}">
                <i class="bi bi-table me-2"></i> Data Survey
            </a>
            <a href="{{ route('keluarga.index') }}" class="sidebar-link {{ request()->routeIs('keluarga.index') ? 'active-link' : '' }}">
                <i class="bi bi-people me-2"></i> Data Keluarga
            </a>
            <a href="{{ route('rumah.index') }}" class="sidebar-link {{ request()->routeIs('rumah.index') ? 'active-link' : '' }}">
                <i class="bi bi-house-door me-2"></i> Data Rumah
            </a>
            <a href="{{ route('pekerjaan.index') }}" class="sidebar-link {{ request()->routeIs('pekerjaan.index') ? 'active-link' : '' }}">
                <i class="bi bi-briefcase me-2"></i> Pekerjaan & Pendapatan
            </a>
            <a href="{{ route('kendaraan.index') }}" class="sidebar-link {{ request()->routeIs('kendaraan.index') ? 'active-link' : '' }}">
                <i class="bi bi-truck me-2"></i> Data Kendaraan
            </a>
            <a href="{{ route('skor.index') }}" class="sidebar-link {{ request()->routeIs('skor.index') ? 'active-link' : '' }}">
                <i class="bi bi-bar-chart-line me-2"></i> Data Skor
            </a>
            <a href="{{ route('export.index') }}" class="sidebar-link {{ request()->routeIs('export.index') ? 'active-link' : '' }}">
                <i class="bi bi-file-earmark-pdf me-2"></i> Export PDF
            </a>
        </div>
    </div>
    <div class="text-center py-3 small text-white border-top border-white">
        &copy; {{ now()->year }} <strong>SAKTI</strong>
    </div>
</nav>


<style>
.glass-sidebar {
    background: #1e2a46;">
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border-right: 1px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}


.sidebar-link {
    padding: 0.75rem 1.5rem;
    background: transparent;
    color: #ffffff;
    font-weight: 500;
    font-size: 0.95rem;
    border: 0;
    display: flex;
    align-items: center;
    transition: all 0.2s ease;
}

.sidebar-link:hover {
    background: rgba(255, 255, 255, 0.12);
    color: #ffffff;
}

.active-link {
    background: linear-gradient(to right, #4e54c8, #8f94fb);
    color: #ffffff !important;
    font-weight: 600;
    border-radius: 0 50px 50px 0;
}
</style>
