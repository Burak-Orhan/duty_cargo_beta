<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'My App')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/DutyFAV.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=logout" />
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    @yield('css')
</head>

<body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 min-h-screen">

    <!-- Sidebar -->
    <div class="flex min-h-screen">
        <div class="sidebar bg-white h-screen w-64 fixed shadow-lg flex flex-col justify-between">
            <a href="{{ route('tracking') }}">
                <img src="{{ asset('assets/img/DutyCARGO.webp') }}" width="200px" style="margin-top: -30px; margin-left: 20px;">
            </a>

            <nav>
                <div class="menu-items space-y-2">
                    <a href="{{ route('dashboard') }}"
                        class="menu-item {{ Request::is('dashboard*') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span>Kontrol Paneli</span>
                    </a>
                </div>
            </nav>

            <div class="bottom-section border-t border-gray-200">
                <div class="px-3 py-2">
                    <a href="{{ route('settings') }}"
                        class="menu-item {{ Request::is(patterns: 'settings') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Hesap Ayarları</span>
                    </a>
                </div>

                <div class="user-profile p-4 border-t border-gray-200 relative">
                    <div class="flex items-center space-x-3">
                        <div class="team-icon">
                            {{ strtoupper(collect(explode(' ', Auth::user()->name))->map(fn($word) => substr($word, 0, 1))->take(2)->implode('')) }}
                        </div>
                        <div class="flex-1">
                            <div class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-gray-500">{{ Auth::user()->role ?? 'User' }}</div>
                        </div>
                        <form action="{{ route('logout') }}" method="GET">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-red-500">
                                <span class="material-symbols-outlined">
                                    logout
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="ml-64 flex-1">
            <header class="bg-white shadow-sm">
                <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900">@yield('breadcrumb', 'Dashboard')</h1>
                </div>
            </header>

            <main>
                {{-- <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8"> --}}
                @yield('content')
                {{-- </div> --}}
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/js/dashboardStyle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')
</body>

</html>
