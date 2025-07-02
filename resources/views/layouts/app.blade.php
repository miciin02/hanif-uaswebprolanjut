<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Aplikasi Saya') }}</title>

    <!-- Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: #a0aec0;>
        }
    </style>
</head>

<body>
    <div class="d-flex" style="min-height: 100vh;">
        {{-- Sidebar ditampilkan hanya jika bukan halaman login atau register --}}
        @unless (in_array(Route::currentRouteName(), ['login', 'register']))
            @include('layouts.sidebar')
        @endunless

        {{-- Main content --}}
        <main class="flex-grow-1 {{ in_array(Route::currentRouteName(), ['login', 'register']) ? 'd-flex justify-content-center align-items-center' : 'px-4 py-3' }}"
              style="{{ in_array(Route::currentRouteName(), ['login', 'register']) ? 'padding: 0;' : '' }}">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

<style>
    .profile-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        font-weight: 700;
        font-size: 1.1rem;
        color: #fff;
        background: linear-gradient(135deg, #4e54c8, #8f94fb);
        border: 2px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        transition: all 0.3s ease;
    }

    .profile-icon:hover {
        transform: scale(1.08);
        box-shadow: 0 0 10px #8f94fb, 0 0 20px #4e54c8;
        border-color: #fff;
    }

    .dropdown-menu {
        font-family: 'Inter', sans-serif;
        border-radius: 10px;
        border: none;
        box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    }

    .dropdown-item:hover {
        background-color: #f5f5f5;
    }
</style>

</html>
