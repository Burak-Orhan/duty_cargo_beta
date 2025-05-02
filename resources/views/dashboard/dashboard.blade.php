@extends('defaultDashboardView')
@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard ›')

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
        <div class="grid grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-sm font-medium text-gray-500">Toplam Kargo</h3>
                    <div class="inline-flex items-center text-sm font-medium text-green-600">
                        <span>+12.5%</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <span class="text-2xl font-bold text-gray-900">{{ $trackingsCount ?? '0' }}</span>
                    <span class="text-sm text-gray-500 ml-2">adet</span>
                </div>
            </div>
            <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-sm font-medium text-gray-500">Dağıtımda</h3>
                    <div class="inline-flex items-center text-sm font-medium text-yellow-600">
                        <span>+3.2%</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <span class="text-2xl font-bold text-gray-900">485</span>
                    <span class="text-sm text-gray-500 ml-2">adet</span>
                </div>
            </div>
            <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-sm font-medium text-gray-500">Teslim Edilen</h3>
                    <div class="inline-flex items-center text-sm font-medium text-green-600">
                        <span>+8.7%</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <span class="text-2xl font-bold text-gray-900">789</span>
                    <span class="text-sm text-gray-500 ml-2">adet</span>
                </div>
            </div>
        </div>
        <div class="rounded-xl border border-gray-100 overflow-hidden shadow-sm"
            style="background-color: rgba(255, 255, 255, 0.8);">
            <div class="flex justify-between items-center p-4 border-b border-gray-200"
                style="background-color: rgba(255, 255, 255, 0.9);">
                <div class="flex items-center space-x-3">
                    <button
                        class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-colors flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Yeni Ekle
                    </button>
                    <button
                        class="px-4 py-2 text-sm font-medium text-indigo-600 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition-colors flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                            </path>
                        </svg>
                        Kaydet
                    </button>
                </div>
                <div class="relative">
                    <input type="text" placeholder="İsim veya e-posta ara..."
                        class="w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-colors bg-white/80">
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-6 gap-4 p-5 border-b border-gray-200"
                style="background-color: rgba(255, 255, 255, 0.9);">
                {{-- <div class="flex items-center">
                    <input type="checkbox" class="rounded border-gray-200">
                    <span class="ml-3 font-medium text-gray-700">Ad-Soyad</span>
                </div> --}}
                <div class="font-medium text-gray-700">E-posta</div>
                <div class="font-medium text-gray-700">Konum</div>
                <div class="font-medium text-gray-700">Durum</div>
                <div class="font-medium text-gray-700">Kargo No</div>
                <div></div>
            </div>

            @foreach ($trackings as $t)
                <div class="divide-y divide-gray-200">
                    <div class="grid grid-cols-6 gap-4 p-5 hover:bg-gray-50/30 transition-colors"
                        style="background-color: rgba(255, 255, 255, 0.8);">
                        {{-- <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-200">
                            <span class="ml-3 text-gray-900">{{ $user->name }}</span>
                        </div> --}}
                        <div class="text-gray-600">{{ $user->email }}</div>
                        <div class="text-gray-600">{{ $t->users_information_city }}, {{ $t->users_information_country }}
                        </div>
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
                                <button type="submit"
                                    class="px-4 py-1.5 text-sm font-medium text-indigo-600 hover:text-indigo-700 bg-indigo-50/50 hover:bg-indigo-50 rounded-lg transition-colors">
                                    İncele
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="flex items-center justify-between px-6 py-4 bg-white border-t border-gray-200">
                <div class="flex flex-col">
                    <span class="text-sm font-medium text-gray-700 mb-1">Toplam</span>
                    <span class="text-sm text-gray-500" id="pageInfo"></span>
                </div>

                <div class="flex items-center space-x-2">
                    <button class="p-2 text-gray-400 hover:text-gray-600 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </button>

                    <button class="px-3 py-1 text-white bg-indigo-600 rounded-lg">1</button>
                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-50 rounded-lg">2</button>
                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-50 rounded-lg">3</button>
                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-50 rounded-lg">4</button>
                    <span class="px-2 text-gray-500">...</span>

                    <button class="p-2 text-gray-600 hover:text-gray-900 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>

                <div class="flex items-center space-x-2">
                    <select id="itemsPerPageSelect"
                        class="text-sm text-gray-600 border border-gray-200 rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                        <option value="5">5 / sayfa</option>
                        <option value="10">10 / sayfa</option>
                        <option value="15">15 / sayfa</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const profileBtn = document.getElementById('profileDropdownBtn');
            const dropdownMenu = document.querySelector('.dropdown-menu');
            const currentProfile = profileBtn.querySelector('.team-icon');
            const currentName = profileBtn.querySelector('.text-sm');
            const currentRole = profileBtn.querySelector('.text-xs');
            let isDropdownOpen = false;

            function markActiveUser(initials) {
                document.querySelectorAll('.dropdown-item').forEach(item => {
                    item.classList.toggle('active', item.dataset.initials === initials);
                });
            }

            markActiveUser(currentProfile.textContent);

            profileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                isDropdownOpen = !isDropdownOpen;
                dropdownMenu.classList.toggle('hidden');

                const svg = profileBtn.querySelector('svg');
                svg.style.transform = isDropdownOpen ? 'rotate(180deg)' : 'rotate(0)';
            });

            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', function() {
                    const {
                        initials,
                        name,
                        role
                    } = this.dataset;

                    currentProfile.textContent = initials;
                    currentName.textContent = name;
                    currentRole.textContent = role;

                    markActiveUser(initials);

                    dropdownMenu.classList.add('hidden');
                    isDropdownOpen = false;
                    profileBtn.querySelector('svg').style.transform = 'rotate(0)';
                });
            });

            document.addEventListener('click', function(e) {
                if (isDropdownOpen && !profileBtn.contains(e.target)) {
                    dropdownMenu.classList.add('hidden');
                    isDropdownOpen = false;
                    profileBtn.querySelector('svg').style.transform = 'rotate(0)';
                }
            });

            const listItems = document.querySelectorAll('.divide-y > div[class*="grid"]');
            const allListItems = Array.from(listItems);

            const itemsPerPageSelect = document.getElementById('itemsPerPageSelect');
            let itemsPerPage = parseInt(itemsPerPageSelect.value);
            let currentPage = 1;

            const prevButton = document.getElementById('prevButton');
            const nextButton = document.getElementById('nextButton');
            const pageButtons = document.querySelectorAll('.pagination-btn');
            const pageInfo = document.getElementById('pageInfo');
            const searchInput = document.querySelector('input[placeholder*="İsim veya e-posta ara"]');

            itemsPerPageSelect.addEventListener('change', function() {
                itemsPerPage = parseInt(this.value);
                currentPage = 1;
                performSearch();
            });

            function updateStats() {
                const activeItems = Array.from(document.querySelectorAll('.text-green-700')).length;
                const passiveItems = Array.from(document.querySelectorAll('.text-gray-600')).filter(el => !el
                    .classList.contains('hover:text-gray-700')).length;
                const totalItems = allListItems.length;

                const totalStats = document.querySelector('.grid.grid-cols-3 > div:nth-child(1) .text-2xl');
                const inDeliveryStats = document.querySelector('.grid.grid-cols-3 > div:nth-child(2) .text-2xl');
                const deliveredStats = document.querySelector('.grid.grid-cols-3 > div:nth-child(3) .text-2xl');

                if (totalStats) totalStats.textContent = totalItems.toLocaleString();
                if (inDeliveryStats) inDeliveryStats.textContent = activeItems.toLocaleString();
                if (deliveredStats) deliveredStats.textContent = passiveItems.toLocaleString();

                const percentages = document.querySelectorAll('.grid.grid-cols-3 .inline-flex span');
                const changes = [15, 5, 10].map(r => (Math.random() * r).toFixed(1));

                percentages.forEach((el, i) => el.textContent = `+${changes[i]}%`);
            }

            function performSearch() {
                const term = searchInput.value.toLowerCase().trim();

                const filteredItems = allListItems.filter(item => {
                    const name = item.querySelector('.ml-3.text-gray-900')?.textContent.toLowerCase() || '';
                    const email = item.querySelector('.text-gray-600')?.textContent.toLowerCase() || '';
                    return term === '' || name.includes(term) || email.includes(term);
                });

                updatePagination(filteredItems);
                updateStats();
            }

            function updatePagination(items) {
                allListItems.forEach(item => item.style.display = 'none');

                const totalPages = Math.ceil(items.length / itemsPerPage);
                currentPage = Math.min(currentPage, totalPages || 1);

                const start = (currentPage - 1) * itemsPerPage;
                const end = start + itemsPerPage;

                items.slice(start, end).forEach(item => item.style.display = 'grid');

                pageInfo.textContent = items.length > 0 ? `${items.length}` : 'Sonuç bulunamadı';

                pageButtons.forEach((btn, i) => {
                    if (i < totalPages) {
                        btn.style.display = 'block';
                        btn.textContent = i + 1;
                        btn.classList.toggle('bg-indigo-600', currentPage === i + 1);
                        btn.classList.toggle('text-white', currentPage === i + 1);
                        btn.classList.toggle('text-gray-600', currentPage !== i + 1);
                        btn.classList.toggle('hover:bg-gray-50', currentPage !== i + 1);
                    } else {
                        btn.style.display = 'none';
                    }
                });

                prevButton.disabled = currentPage === 1;
                nextButton.disabled = currentPage === totalPages || items.length === 0;

                prevButton.classList.toggle('text-gray-400', prevButton.disabled);
                prevButton.classList.toggle('text-gray-600', !prevButton.disabled);
                nextButton.classList.toggle('text-gray-400', nextButton.disabled);
                nextButton.classList.toggle('text-gray-600', !nextButton.disabled);

                const existingMessage = document.querySelector('.text-center.py-4');
                if (existingMessage) existingMessage.remove();

                if (items.length === 0) {
                    const noResult = document.createElement('div');
                    noResult.className = 'text-center py-4 text-gray-500';
                    noResult.textContent = 'Arama kriterine uygun sonuç bulunamadı.';
                    document.querySelector('.divide-y').appendChild(noResult);
                }
            }

            let searchTimeout;
            searchInput.addEventListener('input', () => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(performSearch, 300);
            });

            pageButtons.forEach(button => {
                button.addEventListener('click', () => {
                    currentPage = parseInt(button.textContent);
                    performSearch();
                });
            });

            prevButton.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    performSearch();
                }
            });

            nextButton.addEventListener('click', () => {
                const filtered = allListItems.filter(item => {
                    const name = item.querySelector('.ml-3.text-gray-900')?.textContent
                        .toLowerCase() || '';
                    const email = item.querySelector('.text-gray-600')?.textContent.toLowerCase() ||
                        '';
                    return searchInput.value === '' || name.includes(searchInput.value
                        .toLowerCase()) || email.includes(searchInput.value.toLowerCase());
                });

                const totalPages = Math.ceil(filtered.length / itemsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    performSearch();
                }
            });

            performSearch();
            setInterval(updateStats, 30000);
        });
    </script>
@endsection
