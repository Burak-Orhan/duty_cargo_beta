@extends('defaultView')
@section('title', 'Gönderi Takibi')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/tracking.css') }}">
@endsection

@php
    use Carbon\Carbon;
    Carbon::setLocale('tr');
@endphp

@section('content')
    <!DOCTYPE html>
    <html lang="tr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kargo Detay | Duty</title>
        <link rel="icon" type="image/png" href="dashboard/assets/img/dutyFAV.png">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/trackingResult.css') }}">
    </head>

    <body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 min-h-screen py-8">
        <div class="max-w-3xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="p-2" style="background-color: rgba(79, 70, 229, 0.1); border-radius: 0.5rem;">
                                <svg class="w-6 h-6" style="color: #4F46E5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-xl font-bold text-gray-800">Gönderi Takibi</h1>
                                <div class="flex items-center mt-1">
                                    <span class="text-sm font-medium text-gray-500">Takip No:</span>
                                    <span class="ml-2 font-mono font-bold"
                                        style="color: #4F46E5">{{ $trackingCode->tracking_code }}</span>
                                    {{-- Display current status dynamically --}}
                                    @php
                                        $statusText = '';
                                        $statusColor = '';
                                        switch ($trackingCode->cargo_status) {
                                            case 1:
                                                $statusText = 'Depoda Teslim Alındı';
                                                $statusColor = '#3db910'; // Green
                                                break;
                                            case 2:
                                                $statusText = 'Yola Çıktı';
                                                $statusColor = '#a046e5'; // Purple
                                                break;
                                            case 3:
                                                $statusText = 'Dağıtımda';
                                                $statusColor = '#4F46E5'; // Blue
                                                break;
                                            case 4:
                                                $statusText = 'Teslim Edildi';
                                                $statusColor = '#10B981'; // Emerald Green
                                                break;
                                            case 5:
                                                $statusText = 'İptal Edildi';
                                                $statusColor = '#e54646'; // Red
                                                break;
                                            default:
                                                $statusText = 'Bilinmiyor';
                                                $statusColor = '#6b7280'; // Gray
                                                break;
                                        }
                                    @endphp
                                    <span class="ml-3 px-2 py-1 text-xs font-semibold rounded-full"
                                        style="background-color: rgba(79, 70, 229, 0.1); color: {{ $statusColor }}">{{ $statusText }}</span>
                                </div>
                            </div>
                        </div>
                        <button onclick="window.location.href='{{ url()->previous() }}'"
                            class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
                    <div class="p-6 border-b md:border-r border-gray-200">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-green-100 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Gönderici</h3>
                                <p class="text-base font-semibold text-gray-900 mt-1">{{ $trackingCode->company_name }}</p>
                                <p class="text-sm text-gray-600 mt-1">{{ $trackingCode->company_city }},
                                    {{ $trackingCode->company_country }}</p>
                                <div class="mt-2 flex items-center text-xs text-gray-500">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    Çıkış:
                                    {{ Carbon::parse($trackingCode->customer_purchase_date)->translatedFormat('d F Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-start space-x-4">
                            <div class="p-2 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Alıcı</h3>
                                <p class="text-base font-semibold text-gray-900 mt-1">{{ $trackingCode->users_modal_user_name }}</p>
                                <p class="text-sm text-gray-600 mt-1">{{ $trackingCode->users_information_city }},
                                    {{ $trackingCode->users_information_country }}</p>
                                <div class="mt-2 flex items-center text-xs text-gray-500">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Tahmini:
                                    {{ Carbon::parse($trackingCode->customer_purchase_date)->addDays(2)->translatedFormat('d F Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800 mb-6">Gönderi Durumu</h2>
                    <div class="relative">
                        <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-gray-200"></div>

                        <div class="space-y-8">
                            {{-- Step 1: Depoda Teslim Alındı (Received at Warehouse) --}}
                            @if ($trackingCode->cargo_status >= 1)
                                <div class="relative flex items-center space-x-6 timeline-dot">
                                    <div class="flex-shrink-0 z-10">
                                        <div
                                            class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center status-icon p-4">
                                            <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M20 8h-9.01V4c0-1.1-.89-2-1.99-2h-4c-1.1 0-2 .9-2 2v4H3c-1.1 0-2 .9-2 2v10h20V10c0-1.1-.9-2-2-2zM4 5c0-.55.45-1 1-1h4c.55 0 1 .45 1 1v3H4V5z"
                                                    fill="currentColor" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="bg-gray-50 rounded-lg p-4">
                                            <h3 class="text-lg font-medium text-gray-900">Depoda Teslim Alındı</h3>
                                            <div class="mt-2 text-sm text-gray-600">
                                                <p class="font-medium">Depo Merkezi, {{ $trackingCode->company_city }}</p>
                                                <div class="mt-1 flex items-center text-gray-500">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    {{ Carbon::parse($trackingCode->customer_purchase_date)->translatedFormat('d F Y') }}
                                                    • 11:25 UTC+02
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Step 2: Yola Çıktı (Departed) --}}
                            @if ($trackingCode->cargo_status >= 2)
                                <div class="relative flex items-center space-x-6 timeline-dot">
                                    <div class="flex-shrink-0 z-10">
                                        <div
                                            class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center status-icon p-4">
                                            <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4zM6 18.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm13.5-9l1.96 2.5H17V9.5h2.5zm-1.5 9c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"
                                                    fill="currentColor" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="bg-gray-50 rounded-lg p-4">
                                            <h3 class="text-lg font-medium text-gray-900">Yola Çıktı</h3>
                                            <div class="mt-2 text-sm text-gray-600">
                                                <p class="font-medium">{{ $trackingCode->company_city }} Dağıtım Merkezi
                                                </p>
                                                <div class="mt-1 flex items-center text-gray-500">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    {{ Carbon::parse($trackingCode->customer_purchase_date)->addDays(1)->translatedFormat('d F Y') }}
                                                    • 12:45 UTC+02
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Step 3: Dağıtımda (In Transit/Out for Delivery) --}}
                            @if ($trackingCode->cargo_status >= 3)
                                <div class="relative flex items-center space-x-6 timeline-dot">
                                    <div class="flex-shrink-0 z-10">
                                        <div
                                            class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center status-icon p-4">
                                            <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"
                                                    fill="currentColor" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="bg-gray-50 rounded-lg p-4">
                                            <h3 class="text-lg font-medium text-gray-900">Dağıtımda</h3>
                                            <div class="mt-2 text-sm text-gray-600">
                                                <p class="font-medium">{{ $trackingCode->users_information_city }} Dağıtım
                                                    Merkezi</p>
                                                <div class="mt-1 flex items-center text-gray-500">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    {{ Carbon::parse($trackingCode->customer_purchase_date)->addDays(2)->translatedFormat('d F Y') }}
                                                    • 09:30 UTC+02
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Step 4: Teslim Edildi (Delivered) --}}
                            @if ($trackingCode->cargo_status >= 4)
                                <div class="relative flex items-center space-x-6 timeline-dot">
                                    <div class="flex-shrink-0 z-10">
                                        <div
                                            class="w-16 h-16 bg-emerald-500 rounded-full flex items-center justify-center status-icon p-4">
                                            <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" fill="currentColor" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="bg-gray-50 rounded-lg p-4">
                                            <h3 class="text-lg font-medium text-gray-900">Teslim Edildi</h3>
                                            <div class="mt-2 text-sm text-gray-600">
                                                <p class="font-medium">{{ $trackingCode->users_modal_user_name }},
                                                    {{ $trackingCode->users_information_city }}</p>
                                                <div class="mt-1 flex items-center text-gray-500">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    {{ Carbon::parse($trackingCode->customer_purchase_date)->addDays(2)->translatedFormat('d F Y') }}
                                                    • 14:15 UTC+02
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Handle Cancelled Status (Optional: Display as a separate, final step) --}}
                            @if ($trackingCode->cargo_status === 5)
                                <div class="relative flex items-center space-x-6 timeline-dot">
                                    <div class="flex-shrink-0 z-10">
                                        <div
                                            class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center status-icon p-4">
                                            <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none">
                                                <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 14 12 10.41 8.41 14 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z" fill="currentColor" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="bg-gray-50 rounded-lg p-4">
                                            <h3 class="text-lg font-medium text-gray-900">İptal Edildi</h3>
                                            <div class="mt-2 text-sm text-gray-600">
                                                <p class="font-medium">Gönderi iptal edildi.</p>
                                                <div class="mt-1 flex items-center text-gray-500">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    {{ Carbon::now()->translatedFormat('d F Y') }} • Saat Bilgisi
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($trackingCode->cargo_status === 0)
                                <div class="relative flex items-center space-x-6 timeline-dot">
                                    <div class="flex-shrink-0 z-10">
                                        <div
                                            class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center status-icon p-4">
                                            <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none">
                                                <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 14 12 10.41 8.41 14 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z" fill="currentColor" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-grow">
                                        <div class="bg-gray-50 rounded-lg p-4">
                                            <h3 class="text-lg font-medium text-gray-900">İptal Edildi</h3>
                                            <div class="mt-2 text-sm text-gray-600">
                                                <p class="font-medium">Gönderi iptal edildi.</p>
                                                <div class="mt-1 flex items-center text-gray-500">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    {{ Carbon::now()->translatedFormat('d F Y') }} • Saat Bilgisi
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="p-6"
                    style="background: linear-gradient(to right, rgba(79, 70, 229, 0.05), rgba(79, 70, 229, 0.1))">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 rounded-lg" style="background-color: rgba(79, 70, 229, 0.15)">
                                <svg class="w-6 h-6" style="color: #4F46E5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium" style="color: #4F46E5">Tahmini Teslimat</p>
                                <p class="text-lg font-bold" style="color: #4F46E5">
                                    {{ Carbon::parse($trackingCode->customer_purchase_date)->addDays(2)->translatedFormat('d F Y') }}
                                    , Gün İçerisinde</p>
                            </div>
                        </div>
                        <div>
                            @switch($trackingCode->cargo_status)
                                @case(1)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium"
                                        style="background-color: rgba(79, 70, 229, 0.15); color: #3db910">
                                        Depo Teslim Aldı
                                    </span>
                                @break

                                @case(2)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium"
                                        style="background-color: rgba(79, 70, 229, 0.15); color: #a046e5">
                                        Yola Çıktı
                                    </span>
                                @break

                                @case(3)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium"
                                        style="background-color: rgba(79, 70, 229, 0.15); color: #4F46E5">
                                        Dağıtımda
                                    </span>
                                @break

                                @case(4)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium"
                                        style="background-color: rgba(79, 70, 229, 0.15); color: #10B981">
                                        Teslim Edildi
                                    </span>
                                @break

                                @case(5)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium"
                                        style="background-color: rgba(79, 70, 229, 0.15); color: #e54646">
                                        İptal Edildi
                                    </span>
                                @break

                                @default
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium"
                                        style="background-color: rgba(79, 70, 229, 0.15); color: #ffffff">
                                        Kargo Durumu Yok
                                    </span>
                            @endswitch
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/js/trackingResult.js') }}"></script>
    </body>

    </html>
@endsection