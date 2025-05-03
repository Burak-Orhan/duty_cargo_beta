@extends('defaultDashboardView')
@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

{{-- @section('content')
    <div class="bg-white py-12 sm:py-16">
        <div class="mx-auto max-w-2xl px-6 lg:max-w-7xl lg:px-8">

            <h2 class="text-center text-base/7 font-semibold text-indigo-600">{{ $user->name }} , <span id="trackingCount"
                    onmouseover="mouseOver()">({{ $trackingsCount }})</span></h2>

            <p
                class="mx-auto mt-2 max-w-lg text-center text-4xl font-semibold tracking-tight text-balance text-gray-950 sm:text-3xl">
                Duty Kargo Takip Sistemi</p>

            <div class="mt-10 grid gap-6 sm:mt-16 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                @foreach ($trackings as $t)
                    <form action="{{ route('tracking.post') }}" method="POST" id="{{ $t->trackingCode }}">
                        @csrf
                        <input type="hidden" name="trackingCode" value="{{ $t->trackingCode }}">

                        <div onclick="submitForm('{{ $t->trackingCode }}')"
                            class="relative flex h-full flex-col overflow-hidden rounded-2xl transition hover:shadow-lg hover:scale-[1.02] duration-200 cursor-pointer border border-gray-200 bg-white">
                            <div class="px-8 pt-8 sm:px-10 sm:pt-10">
                                <p class="mt-2 text-lg font-medium tracking-tight text-gray-950 text-center">
                                    {{ $t->trackingCode }}</p>
                                <p class="mt-2 max-w-lg text-sm text-gray-600 text-center">
                                    Gönderen: {{ $t->company_name }} , {{ $t->company_country }}</p>
                                <p class="mt-2 max-w-lg text-sm text-gray-600 text-center">
                                    Alıcı: {{ $t->users_information_city }} , {{ $t->users_information_country }}</p>
                            </div>
                            <div class="flex flex-1 items-center justify-center px-8 pt-10 pb-12">
                                <img class="w-full max-w-xs"
                                    src="https://static.vecteezy.com/system/resources/previews/050/463/005/non_2x/global-logistics-concept-fast-and-accurate-cargo-delivery-online-delivery-courier-service-or-mobile-application-concept-for-tracking-shipments-on-a-smartphone-with-ready-made-packaging-illustration-vector.jpg"
                                    alt="">
                            </div>
                        </div>
                    </form>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="module">
        import {
            toastFire
        } from '{{ asset('assets/js/toastFire.js') }}';

        window.mouseOver = function() {
            toastFire("info", "Son Kargo Tarihi: {{ $lastTracking }} ({{ $lastTrackingLong }})");
        }

        window.submitForm = function(trackingCode) {
            const form = document.getElementById(trackingCode);
            if (form) {
                form.submit();
            }
        }
    </script>

@endsection --}}



@section('content')
<div class="p-8">
    <div class="grid grid-cols-10 gap-6">
        {{-- Sol Kısım (Tablo) - %70 --}}
        <div class="col-span-7">
            <div class="rounded-xl border border-gray-100 overflow-hidden shadow-sm" style="background-color: rgba(255, 255, 255, 0.8);">
                <div class="flex justify-between items-center p-4 border-b border-gray-200" style="background-color: rgba(255, 255, 255, 0.9);">
                    <div class="flex items-center space-x-3">
                        <button class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Yeni Ekle
                        </button>
                        <button class="px-4 py-2 text-sm font-medium text-indigo-600 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                            </svg>
                            Kaydet
                        </button>
                    </div>
                    <div class="relative">
                        <input type="text" placeholder="İsim veya e-posta ara..." class="w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-colors bg-white/80">
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-5 gap-10 p-5 border-b border-gray-200 bg-white/90">
                    <div class="font-medium text-gray-700">E-posta</div>
                    <div class="font-medium text-gray-700">Konum</div>
                    <div class="font-medium text-gray-700">Durum</div>
                    <div class="font-medium text-gray-700">Kargo No</div>
                    <div class="font-medium text-gray-700"></div>
                </div>

                @foreach ($trackings as $t)
                <div class="divide-y divide-gray-200">
                    <div class="grid grid-cols-5 gap-10 p-5 hover:bg-gray-50/30 transition-colors" style="background-color: rgba(255, 255, 255, 0.8);">
                        <div class="text-gray-600">{{ $user->email }}</div>
                        <div class="text-gray-600">{{ $t->users_information_city }}, {{ $t->users_information_country }}</div>
                        <div>
                            @switch($t->cargo_status)
                                @case(1)
                                    <span class="px-2.5 py-1 text-sm rounded-full bg-green-200 text-green-800">Depo Teslim Aldı</span>
                                    @break
                                @case(2)
                                    <span class="px-2.5 py-1 text-sm rounded-full bg-purple-100 text-purple-800">Yola Çıktı</span>
                                    @break
                                @case(3)
                                    <span class="px-2.5 py-1 text-sm rounded-full bg-blue-100 text-blue-800">Dağıtımda</span>
                                    @break
                                @case(4)
                                    <span class="px-2.5 py-1 text-sm rounded-full bg-green-100 text-green-800">Teslim Edildi</span>
                                    @break
                                @case(5)
                                    <span class="px-2.5 py-1 text-sm rounded-full bg-red-100 text-red-800">İptal Edildi</span>
                                    @break
                                @default
                                    <span class="px-2.5 py-1 text-sm rounded-full bg-gray-400 text-white">Kargo Durumu Yok</span>
                            @endswitch
                        </div>
                        <div class="text-gray-900 font-medium">{{ $t->trackingCode }}</div>
                        <div>
                            <form action="{{ route('tracking.post') }}" method="POST" id="{{ $t->trackingCode }}">
                                @csrf
                                <input type="hidden" name="trackingCode" value="{{ $t->trackingCode }}">
                                <button type="submit" class="px-4 py-1.5 text-sm font-medium text-indigo-600 hover:text-indigo-700 bg-indigo-50/50 hover:bg-indigo-50 rounded-lg transition-colors">
                                    İncele
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="flex items-center justify-between px-6 py-4 bg-white border-t border-gray-200">
                    <div class="flex flex-col">
                        <span class="text-sm font-medium text-gray-700 mb-1">Toplam {{ $trackingsCount }}</span>
                        <span class="text-sm text-gray-500" id="pageInfo"></span>
                    </div>

                    <div class="flex items-center space-x-2">
                        <button class="p-2 text-gray-400 hover:text-gray-600 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>

                        <button class="px-3 py-1 text-white bg-indigo-600 rounded-lg">1</button>
                        <button class="px-3 py-1 text-gray-600 hover:bg-gray-50 rounded-lg">2</button>
                        <button class="px-3 py-1 text-gray-600 hover:bg-gray-50 rounded-lg">3</button>
                        <button class="px-3 py-1 text-gray-600 hover:bg-gray-50 rounded-lg">4</button>
                        <span class="px-2 text-gray-500">...</span>

                        <button class="p-2 text-gray-600 hover:text-gray-900 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center space-x-2">
                        <select id="itemsPerPageSelect" class="text-sm text-gray-600 border border-gray-200 rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                            <option value="5">5 / sayfa</option>
                            <option value="10">10 / sayfa</option>
                            <option value="15">15 / sayfa</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sağ Kısım (Kartlar) - %30 --}}
        <div class="col-span-3 space-y-5">
            <div class="bg-gray-50 rounded-xl border border-gray-100 p-6 shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Toplam Kargo</h3>
                <div class="text-2xl font-bold text-gray-900">{{ $trackingsCount ?? '0' }} <span class="text-sm text-gray-500">adet</span></div>
            </div>

            <div class="bg-green-200 rounded-xl border border-gray-100 p-6 shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Depodan Teslim Alındı</h3>
                <div class="text-2xl font-bold text-gray-900">{{ $receivedFromWarehouse ?? "0" }} <span class="text-sm text-gray-500">adet</span></div>
            </div>

            <div class="bg-purple-100 rounded-xl border border-gray-100 p-6 shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Yola Çıktı</h3>
                <div class="text-2xl font-bold text-gray-900">{{ $cargoesSetOff ?? "0" }} <span class="text-sm text-gray-500">adet</span></div>
            </div>

            <div class="bg-blue-100 rounded-xl border border-gray-100 p-6 shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Dağıtımda</h3>
                <div class="text-2xl font-bold text-gray-900">{{ $cargoesInDistribution ?? "0" }} <span class="text-sm text-gray-500">adet</span></div>
            </div>

            <div class="bg-green-100 rounded-xl border border-gray-100 p-6   shadow-sm">
                <h3 class="text-sm font-medium text-gray-500 mb-2">Teslim Edildi</h3>
                <div class="text-2xl font-bold text-gray-900">{{ $cargoesDelivered ?? "0" }} <span class="text-sm text-gray-500">adet</span></div>
            </div>
        </div>
    </div>
</div>
@endsection
