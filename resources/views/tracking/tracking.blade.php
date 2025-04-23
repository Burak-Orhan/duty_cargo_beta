@extends('defaultView')
@section('title', 'Gönderi Takibi')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/tracking.css') }}">
@endsection

@section('content')

    <body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 min-h-screen">
        <header class="header">
            <div class="header-content">
                <div class="logo-small">
                    <img src="{{ asset('assets/img/DutyCARGO.webp') }}" alt="Logo" class="h-8">
                </div>

                @if (Auth::check())
                    <nav class="nav-links">
                        <a href="{{ route('dashboard') }}" class="auth-link dashboard-link">Dashboard</a>
                    </nav>
                @else
                    <nav class="nav-links">
                        <a href="{{ route('login') }}" class="auth-link login-link">Giriş Yap</a>
                    </nav>
                @endif
            </div>
        </header>

        <main class="main-content">
            <div class="tracking-section">
                <div class="search-section">
                    <h1 class="tracking-title">Gönderi Takibi</h1>
                    <p class="tracking-subtitle">Kargonuzun güncel durumunu öğrenin</p>

                    <form class="tracking-form" action="{{ route('tracking.post') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="trackingCode" placeholder="Gönderi kodunuzu girin"
                                class="tracking-input" required>
                            <button type="submit" class="search-icon">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button onclick="errorTrackingCode()">
                        </div>
                    </form>

                    <p class="help-text">
                        Gönderi takip numaranızı girerek kargonuzun durumunu sorgulayabilirsiniz.
                    </p>
                </div>

                <div class="logo-section">
                    <img src="{{ asset('assets/img/cmp.webp') }}" alt="CMP Logo" class="main-logo">
                </div>
            </div>
        </main>
    </body>
@endsection

@section('js')
    <script>
        @if (session('error'))
            Swal.fire({
                title: "Geçersiz Kargo Kodu",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonText: "Tamam"
            });
        @endif
    </script>
@endsection
