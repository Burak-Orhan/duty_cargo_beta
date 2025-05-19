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

@php
    use Carbon\Carbon;
    Carbon::setLocale('tr');
@endphp

@section('content')
    <div class="p-8">
        <div class="grid grid-cols-10 gap-6">
            {{-- Sol Kısım (Tablo) - %70 --}}
            <div class="col-span-7">
                <div class="rounded-xl border border-gray-100 overflow-hidden shadow-sm"
                    style="background-color: rgba(255, 255, 255, 0.8);">
                    <div class="flex justify-between items-center p-4 border-b border-gray-200"
                        style="background-color: rgba(255, 255, 255, 0.9);">
                        <div class="flex items-center space-x-3">
                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4"></path>
                                </svg>
                                Yeni Ekle
                            </button>
                            {{-- <button
                                class="px-4 py-2 text-sm font-medium text-indigo-600 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                    </path>
                                </svg>
                                Kaydet
                            </button> --}}

                        </div>

                        <form method="GET" action="{{ route('dashboard') }}">
                            <div class="relative">
                                <input type="text" id="searchInput" name="search" placeholder="Duty Cargo"
                                    value="{{ request('search') }}"
                                    class="w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-colors bg-white/80" />
                                <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="grid grid-cols-5 gap-10 p-5 border-b border-gray-200 bg-white/90">
                        <div class="font-medium text-gray-700">Kargo Tarihi</div>
                        <div class="font-medium text-gray-700">Konum</div>
                        <div class="font-medium text-gray-700">Kargo Durumu</div>
                        <div class="font-medium text-gray-700">Kargo No</div>
                        <div class="font-medium text-gray-700"></div>
                    </div>

                    @if ($trackings->count() > 0)
                        @foreach ($trackings as $t)
                            <div class="divide-y divide-gray-200">
                                <div class="grid grid-cols-5 gap-10 p-5 hover:bg-gray-50/30 transition-colors"
                                    style="background-color: rgba(255, 255, 255, 0.8);">
                                    {{-- <div class="text-gray-600">{{ date("d.m.Y", strtotime($t->customer_purchase_date)) }}</div> --}}
                                    <div class="text-gray-600">
                                        {{ Carbon::parse($t->customer_purchase_date)->translatedFormat('d F Y') }}</div>
                                    <div class="text-gray-600">{{ $t->users_information_city }}</div>
                                    <div>
                                        @switch($t->cargo_status)
                                            @case(1)
                                                <span class="px-2.5 py-1 text-sm rounded-full bg-green-200 text-green-800">Depo
                                                    Teslim
                                                    Aldı</span>
                                            @break

                                            @case(2)
                                                <span class="px-2.5 py-1 text-sm rounded-full bg-purple-100 text-purple-800">Yola
                                                    Çıktı</span>
                                            @break

                                            @case(3)
                                                <span
                                                    class="px-2.5 py-1 text-sm rounded-full bg-blue-100 text-blue-800">Dağıtımda</span>
                                            @break

                                            @case(4)
                                                <span class="px-2.5 py-1 text-sm rounded-full bg-green-100 text-green-800">Teslim
                                                    Edildi</span>
                                            @break

                                            @case(5)
                                                <span class="px-2.5 py-1 text-sm rounded-full bg-red-100 text-red-800">İptal
                                                    Edildi</span>
                                            @break

                                            @default
                                                <span class="px-2.5 py-1 text-sm rounded-full bg-gray-400 text-white">Kargo Durumu
                                                    Yok</span>
                                        @endswitch
                                    </div>
                                    <div class="text-gray-900 font-medium">{{ $t->trackingCode }}</div>
                                    <div>
                                        <form action="{{ route('tracking.post') }}" method="POST"
                                            id="{{ $t->trackingCode }}">
                                            @csrf
                                            <input type="hidden" name="trackingCode" value="{{ $t->trackingCode }}">
                                            <button type="submit"
                                                class="px-4 py-1.5 text-sm font-medium text-indigo-600 hover:text-indigo-700 bg-indigo-50/50 hover:bg-indigo-50 rounded-lg transition-colors">
                                                İncele
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="container mx-auto flex items-center justify-center">
                            <img src="https://img.freepik.com/premium-vector/cloud-storage-concept-vector-isometric-style-stock-illustration-eps-file_848977-890.jpg"
                                width="450px">
                        </div>

                    @endif

                    <div class="flex items-center justify-between px-6 py-4 bg-white border-t border-gray-200">
                        <div class="flex flex-col">
                            {{-- <span class="text-sm font-medium text-gray-700 mb-1">Toplam {{ $trackingsCount }}</span> --}}
                            <span class="text-sm text-gray-500" id="pageInfo">Toplam {{ $trackingsCount }}</span>
                        </div>

                        <div class="flex items-center space-x-2">
                            @php
                                $currentPage = $trackings->currentPage();
                                $lastPage = $trackings->lastPage();
                            @endphp

                            <div class="flex items-center gap-1"> {{-- mt-4 --}}
                                @if ($currentPage > 1)
                                    <a href="{{ $trackings->url($currentPage - 1) . '&' . http_build_query(request()->except('page')) }}"
                                        class="p-2 text-gray-600 hover:text-gray-900 rounded-lg">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </a>
                                @else
                                    {{-- İlk Sayfada İse Pasif --}}
                                    <span class="p-2 text-gray-300 cursor-not-allowed rounded-lg">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </span>
                                @endif

                                @for ($i = 1; $i <= $lastPage; $i++)
                                    @if ($i === $currentPage)
                                        <button
                                            class="px-3 py-1 text-white bg-indigo-600 rounded-lg">{{ $i }}</button>
                                    @elseif ($i === 1 || $i === $lastPage || ($i >= $currentPage - 1 && $i <= $currentPage + 1))
                                        <a href="{{ $trackings->url($i) . '&' . http_build_query(request()->except('page')) }}"
                                            class="px-3 py-1 text-gray-600 hover:bg-gray-50 rounded-lg">{{ $i }}</a>
                                    @elseif ($i === $currentPage - 2 || $i === $currentPage + 2)
                                        <span class="px-2 text-gray-500">...</span>
                                    @endif
                                @endfor

                                @if ($currentPage < $lastPage)
                                    <a href="{{ $trackings->url($currentPage + 1) . '&' . http_build_query(request()->except('page')) }}"
                                        class="p-2 text-gray-600 hover:text-gray-900 rounded-lg">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                @else
                                    {{-- Son Sayfada İse Pasif --}}
                                    <span class="p-2 text-gray-300 cursor-not-allowed rounded-lg">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center space-x-2">
                            {{-- Sayfa başına kaç adet görüneceğini ayarlama --}}
                            <form method="GET" action="{{ route('dashboard') }}" class="flex items-center gap-2">
                                {{-- mb-4 --}}
                                <input type="hidden" name="search" value="{{ request('search') }}">
                                <label for="per_page">Sayfa başına:</label>
                                <select name="per_page" id="per_page" onchange="this.form.submit()"
                                    {{-- class="border rounded px-2 py-1"> --}}
                                    class="py-1.5 sm:py-2 px-3 pe-9 block w-full sm:w-auto border-gray-200 shadow-2xs -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg sm:text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    @foreach ([10, 20, 50, 100] as $size)
                                        <option value="{{ $size }}"
                                            {{ request('per_page', 10) == $size ? 'selected' : '' }}>
                                            {{ $size }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>

                        {{-- <span class="text-sm text-gray-500" onmouseover="mouseOver()" id="trackingCount"><img
                                    width="30px"
                                    src="https://img.icons8.com/?size=75&id=2800&format=png&color=6A7282"></span> --}}
                    </div>
                </div>
            </div>

            <div class="col-span-3 space-y-5">
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
                        <div class="p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500 mb-1">Toplam Kargo</h3>
                                    <div class="text-2xl font-bold text-gray-900">{{ $trackingsCount ?? '0' }}</div>
                                    <p class="text-xs text-gray-500">Toplam kargo sayısı</p>
                                </div>
                                <div class="text-2xl text-gray-400">📦</div>
                            </div>
                        </div>

                        <div class="p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-green-700 mb-1">Depodan Teslim Alındı</h3>
                                    <div class="text-2xl font-bold text-green-800">{{ $receivedFromWarehouse ?? '0' }}
                                    </div>
                                    <p class="text-xs text-green-700">Depo teslimi</p>
                                </div>
                                <div class="text-2xl text-green-400">✓</div>
                            </div>
                        </div>

                        <div class="p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-purple-700 mb-1">Yola Çıktı</h3>
                                    <div class="text-2xl font-bold text-purple-800">{{ $cargoesSetOff ?? '0' }}</div>
                                    <p class="text-xs text-purple-700">Yolculukta</p>
                                </div>
                                <div class="text-2xl text-purple-400">✈️</div>
                            </div>
                        </div>

                        <div class="p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-blue-700 mb-1">Dağıtımda</h3>
                                    <div class="text-2xl font-bold text-blue-800">{{ $cargoesInDistribution ?? '0' }}
                                    </div>
                                    <p class="text-xs text-blue-700">Dağıtım aşaması</p>
                                </div>
                                <div class="text-2xl text-blue-400">🚚</div>
                            </div>
                        </div>

                        <div class="p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-green-700 mb-1">Teslim Edildi</h3>
                                    <div class="text-2xl font-bold text-green-800">{{ $cargoesDelivered ?? '0' }}
                                    </div>
                                    <p class="text-xs text-green-700">Yolculukta</p>
                                </div>
                                <div class="text-2xl text-green-400">✓✓</div>
                            </div>
                        </div>

                        <div class="p-4 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-red-700 mb-1">İptal Edilen</h3>
                                    <div class="text-3xl font-bold text-red-800">{{ $cargoesCanceled ?? '0' }}</div>
                                    <p class="text-xs text-red-700">İptal edilen kargolar</p>
                                </div>
                                <div class="text-3xl text-red-400">✗</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <form action="{{ route('dashboard.post') }}" method="post">
        @csrf
        <div id="crud-modal" tabindex="-1" aria-hidden="true" {{-- add class flex --}}
            class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full justify-center items-center bg-black/40">
            <div class="relative w-full max-w-lg max-h-full">
                <div class="relative bg-white rounded-lg shadow-lg dark:bg-gray-800">

                    <div
                        class="flex items-center justify-between p-6 border-b dark:border-gray-700 bg-indigo-50 dark:bg-gray-900 rounded-t-lg">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                                </path>
                            </svg>
                            Yeni Kargo / Adres Ekle ({{ $newTracking_Code }})
                        </h3>
                        <button type="button"
                            class="text-gray-400 hover:text-gray-900 dark:hover:text-white text-2xl font-bold"
                            data-modal-toggle="crud-modal">×</button>
                    </div>

                    <div class="p-6 space-y-6">
                        <div>
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kargo Durumu
                                Seçiniz</label>
                            <select name="status" id="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                required>
                                <option selected disabled>Kargo Durumu Seçin</option>
                                <option value="1">Depodan Teslim Alındı</option>
                                <option value="2">Yola Çıktı</option>
                                <option value="3">Dağıtımda</option>
                                <option value="4">Teslim Edildi</option>
                                <option value="5">İptal Edildi</option>
                            </select>
                        </div>
                        <div>
                            <label for="company_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satıcı Seçiniz</label>
                            <select name="company_id" id="company_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                required>
                                <option selected disabled>Satıcı Seçin</option>
                                @foreach ($companies as $co)
                                    <option value="{{ $co->companies_id }}">{{ $co->companies_name }} /
                                        {{ $co->companies_country }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="modal_user_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alıcı Adı /
                                    Soyadı</label>
                                <input type="text" name="modal_user_name" id="modal_user_name" placeholder="Alıcı Adı / Soyadı"
                                    required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                            <div>
                                <label for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefon</label>
                                <input type="tel" name="phone" id="users_information__phone"
                                    placeholder="05xx xxx xx xx" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="users_information_city"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">İl</label>
                                <select name="users_information_city" id="users_information_city"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required>
                                    <option selected disabled>İl Seçin</option>
                                    @foreach ($cities as $ci)
                                        <option value="{{ $ci->id }}">{{ $ci->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="state"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">İlçe</label>
                                <input type="text" name="state" id="users_information_state" placeholder="İlçe"
                                    required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                            <div>
                                <label for="district"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Semt</label>
                                <input type="text" name="district" id="users_information_district" placeholder="Semt"
                                    required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            </div>
                        </div>
                        <div>
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adres</label>
                            <textarea name="address" id="users_information_address" rows="2" placeholder="Açık adres" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
                        </div>
                    </div>

                    {{-- Visible İnput --}}
                    <input type="text" name="tracking_code" id="trackingCode" value="{{ $newTracking_Code }}"
                        hidden>
                    <input type="text" name="city" id="users_information_city_name" hidden>
                    <input type="text" name="zip_code" id="users_information_zip_code" hidden>
                    <input type="text" name="country" id="country" value="Türkiye" hidden>

                    <div
                        class="flex justify-end p-6 border-t border-gray-200 dark:border-gray-700 bg-indigo-50 dark:bg-gray-900 rounded-b-lg">
                        <button type="submit" id="modalSubmitButton"
                            class="text-white bg-indigo-600 hover:bg-indigo-700 font-semibold rounded-lg text-base px-6 py-2.5 text-center shadow transition-all">
                            Kaydet
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

    <script type="module">
        import {
            toastFire
        } from '{{ asset('assets/js/toastFire.js') }}';

        // Last Cargo İnformation
        window.mouseOver = function() {
            toastFire("info", "Son Kargo Tarihi: {{ $lastTrackingTime }} ({{ $lastTrackingLongTime }})");
        }

        // Footer content 
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('searchInput');
            const rows = document.querySelectorAll('.divide-y');
            const pageInfo = document.getElementById('pageInfo');

            const total = {{ $trackingsCount }};

            function filterTable() {
                const searchText = input.value.toLowerCase();
                let visibleCount = 0;

                if (searchText === '') {
                    rows.forEach(function(row) {
                        row.style.display = '';
                        visibleCount++;
                    });
                    pageInfo.textContent = "Toplam: " + total;
                } else {
                    rows.forEach(function(row) {
                        const text = row.textContent.toLowerCase();
                        if (text.includes(searchText)) {
                            row.style.display = '';
                            visibleCount++;
                        } else {
                            row.style.display = 'none';
                        }
                    });

                    pageInfo.textContent = visibleCount + " sonuç gösteriliyor (Toplam: " + total + ")";
                }
            }

            input.addEventListener('input', filterTable);
        });

        // Modal
        document.getElementById('users_information_city').addEventListener('change', function() {
            let cityId = this.value;

            fetch(`/get-city-info/${cityId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('users_information_city_name').value = data.city;
                    document.getElementById('users_information_state').value = data.state;
                    document.getElementById('users_information_district').value = data.district;
                    document.getElementById('users_information_zip_code').value = data.zip_code;
                })
                .catch(error => {
                    console.error('Şehir bilgisi alınamadı:', error);
                });
        });

        @if (session('success'))
            Swal.fire({
                title: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "Tamam"
            })
        @endif
    </script>
@endsection
