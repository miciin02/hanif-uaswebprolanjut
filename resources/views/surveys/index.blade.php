@extends('layouts.app')

@section('content')
<div class="d-flex" style="font-family: 'Inter', sans-serif;">
    <main class="flex-grow-1 px-4 py-3" style="min-height: 100vh; background: #1e2a46;">
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3 text-white">
            <h3 class="mb-0 fw-semibold">Data Survey</h3>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('survey.create') }}" class="btn btn-warning text-dark fw-semibold shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Survey
                </a>
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
        </div>

        @if(session('success'))
        <div class="alert glass-alert text-dark shadow-sm">{{ session('success') }}</div>
        @endif

        <!-- Pencarian -->
        <form method="GET" action="{{ route('survey.index') }}" class="mb-3 d-flex justify-content-end">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control w-25 me-2" placeholder="Cari Nama atau NIK">
            <button type="submit" class="btn btn-light">Cari</button>
            <a href="{{ route('survey.index') }}" class="btn btn-outline-light ms-2">Reset</a>
        </form>

        <div class="glass-card p-3 rounded-4 shadow-sm">
            @if($surveys->count() > 0)
            <div class="table-responsive">
                <table class="table table-sm table-bordered align-middle text-center table-hover mb-0">
                    <thead class="table-light text-dark">
                        @php
                        $sort = request('sort', 'created_at');
                        $order = request('order', 'desc');
                        function sortLink($field, $label, $currentSort, $currentOrder) {
                            $newOrder = ($currentSort == $field && $currentOrder == 'asc') ? 'desc' : 'asc';
                            $icon = '';
                            if ($currentSort == $field) {
                                $icon = $currentOrder == 'asc' ? 'bi-caret-up-fill' : 'bi-caret-down-fill';
                            }
                            return '<a href="?sort='.$field.'&order='.$newOrder.'" class="text-dark text-decoration-none fw-normal">'.$label.' <i class="bi '.$icon.'"></i></a>';
                        }
                        @endphp
                        <tr>
                            <th>{!! sortLink('id', 'No', $sort, $order) !!}</th>
                            <th>{!! sortLink('code', 'Kode Survey', $sort, $order) !!}</th>
                            <th>{!! sortLink('nik', 'NIK', $sort, $order) !!}</th>
                            <th>{!! sortLink('nama_lengkap', 'Nama Lengkap', $sort, $order) !!}</th>
                            <th>{!! sortLink('tempat_lahir', 'Tempat Lahir', $sort, $order) !!}</th>
                            <th>{!! sortLink('tanggal_lahir', 'Tanggal Lahir', $sort, $order) !!}</th>
                            <th>{!! sortLink('alamat', 'Alamat', $sort, $order) !!}</th>
                            <th>{!! sortLink('nomor_telepon', 'Telepon', $sort, $order) !!}</th>
                            <th>{!! sortLink('created_at', 'Tanggal Survey', $sort, $order) !!}</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: rgba(255,255,255,0.5);" class="text-dark">
                        @foreach($surveys as $index => $survey)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $survey->code }}</td>
                            <td>{{ $survey->nik }}</td>
                            <td>{{ $survey->nama_lengkap }}</td>
                            <td>{{ $survey->tempat_lahir }}</td>
                            <td>{{ $survey->tanggal_lahir }}</td>
                            <td>{{ $survey->alamat }}</td>
                            <td>{{ $survey->nomor_telepon }}</td>
                            <td>{{ $survey->created_at }}</td>
                            <td>
                                @php
                                $lengkap = $survey->dataRumah && $survey->dataPekerjaanPendapatan && $survey->dataKeluarga && $survey->dataKendaraan->count() > 0 && $survey->skor;
                                @endphp
                                @if(!$lengkap)
                                    <span class="badge bg-secondary">Belum Lengkap</span>
                                @elseif($survey->skor && $survey->skor->kelayakan == 'Layak')
                                    <span class="badge bg-success">Layak</span>
                                @elseif($survey->skor && $survey->skor->kelayakan == 'Tidak Layak')
                                    <span class="badge bg-danger">Tidak Layak</span>
                                @else
                                    <span class="badge bg-secondary">Belum Lengkap</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('survey.show', $survey->id) }}" class="btn btn-outline-info btn-sm mb-1" title="Lihat Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('survey.edit', $survey->id) }}" class="btn btn-outline-warning btn-sm mb-1" title="Edit Data">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('survey.destroy', $survey->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm mb-1" onclick="return confirm('Yakin ingin menghapus survey ini?')" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert glass-alert text-dark text-center mb-0">Data survey belum tersedia.</div>
            @endif
        </div>
    </main>
</div>

<!-- Styling -->
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease-in-out;
    }

    .glass-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .glass-alert {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(6px);
        border-radius: 12px;
        padding: 12px 20px;
        margin-bottom: 1.5rem;
    }

    .table th, .table td {
        font-size: 0.85rem;
        vertical-align: middle;
        padding: 6px 10px;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.05);
    }
</style>
@endsection
