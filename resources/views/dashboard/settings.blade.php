@extends('defaultDashboardView')
@section('title', 'Ayarlar')
@section('breadcrumb')
    <a href="{{ url('dashboard') }}">Dashboard</a> › Ayarlar
@endsection

{{-- @section('content')
    <div class="w-full px-4 sm:px-8 lg:px-16 xl:px-24 py-8">
        <div class="mb-6">
            <h3 class="text-2xl font-semibold text-gray-900">Hesap Bilgileri</h3>
        </div>

        <form action="{{ route('settings.post') }}" method="POST">
            @csrf

            <div class="bg-white shadow-lg rounded-lg p-6 space-y-8">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">İsim</label>
                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">E-Mail Giriniz</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>

                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Telefon Numarası Giriniz</label>
                        <input type="phone" name="phone"
                            value="{{ old('phone', Auth::user()->userInformation->phone) }}"
                            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Adres</label>
                        <textarea name="address" rows="1"
                            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500">{{ old('address', Auth::user()->userInformation->address) }}</textarea>
                    </div>
                </div>

            
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Şehir</label>
                        <input type="text" name="city" value="{{ old('city', Auth::user()->userInformation->city) }}"
                            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">İl</label>
                        <input type="text" name="state"
                            value="{{ old('state', Auth::user()->userInformation->state) }}"
                            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Posta Kodu</label>
                        <input type="text" name="zip_code"
                            value="{{ old('zip_code', Auth::user()->userInformation->zip_code) }}"
                            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>

                <div class="px-6 py-3 sm:grid sm:grid-cols-1 sm:gap-4 sm:px-0">
                    <dt></dt>
                    <dd class="mt-1 sm:col-span-2 sm:mt-0">
                        <button type="submit"
                            class="w-full inline-flex justify-center py-3 px-6 border border-transparent rounded-md shadow-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 ease-in-out">
                            Değişiklikleri Kaydet
                        </button>
                    </dd>
                </div>

                <div class="text-center">
                    <a href="{{ route('forgetPassword') }}"
                        class="font-semibold text-indigo-600 hover:text-indigo-500">Şifre mi
                        değiştirmek istiyorum</a>
                </div>

        </form>
    </div>
@endsection --}}

@section('content')
    <div class="w-full flex justify-center py-8">
        <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-4xl space-y-8">
            <div class="flex items-center space-x-6">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4F46E5&color=fff&size=96"
                    alt="Profil Fotoğrafı" class="w-20 h-20 rounded-full border-4 border-indigo-100 shadow">
                <div class="flex-1">
                    <h2 class="text-xl font-bold text-gray-900">{{ Auth::user()->name }}</h2>
                    <p class="text-sm text-gray-500 mt-1">{{ Auth::user()->email }}</p>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('forgetPassword') }}"
                        class="font-semibold text-indigo-600 hover:text-indigo-500 text-sm">Şifre Değiştir</a>
                </div>
            </div>
            <form action="{{ route('settings.post') }}" method="POST" class="space-y-8">
                @csrf
                <div class="bg-gray-50 shadow rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Kişisel Bilgiler</h3>
                        <span class="text-xs text-gray-400">Düzenlenebilir</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Ad Soyad</label>
                            <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                                class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">E-Mail</label>
                            <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                                class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Telefon</label>
                            <input type="text" name="phone"
                                value="{{ old('phone', optional(Auth::user()->userInformation)->phone) }}"
                                class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Açıklama (Biyografi)</label>
                            <input type="text" name="bio" disabled value="{{ old('bio', Auth::user()->bio ?? '') }}"
                                class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 shadow rounded-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Adres Bilgileri</h3>
                        <span class="text-xs text-gray-400">Düzenlenebilir</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-4">
                        {{-- <div>
                            <label class="block text-sm font-medium text-gray-700">Şehir/İl</label>
                            <input type="text" name="city"
                                value="{{ old('city', optional(Auth::user()->userInformation)->city) }}"
                                class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        </div> --}}

                        <div>
                            <label for="city"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">İl</label>
                            <select name="city" id="city"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                required>

                                @if ($q && $q->cities_id)
                                    @php
                                        $selectedCity = $cities->firstWhere('id', $q->cities_id);
                                    @endphp
                                    <option selected value="{{ $q->cities_id }}">
                                        {{ $selectedCity->city ?? 'Seçili Şehir' }}</option>
                                @else
                                    <option selected disabled>Şehir seçin</option>
                                @endif

                                @foreach ($cities as $ci)
                                    @if ($ci->id != $q->cities_id)
                                        <option value="{{ $ci->id }}">{{ $ci->city }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-gray-700">İlçe</label>
                            <input type="text" name="state" id="state"
                                value="{{ old('state', optional(Auth::user()->userInformation)->state) }}"
                                class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Semt</label>
                            <input type="text" name="district" id="district"
                                value="{{ old('district', optional(Auth::user()->userInformation)->district) }}"
                                class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Posta Kodu</label>
                            <input type="text" name="zip_code" id="zip_code"
                                value="{{ old('zip_code', optional(Auth::user()->userInformation)->zip_code) }}"
                                class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Adres</label>
                        <input type="text" name="address"
                            value="{{ old('address', optional(Auth::user()->userInformation)->address) }}"
                            class="mt-1 block w-full p-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg shadow-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 ease-in-out">
                        Değişiklikleri Kaydet
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        @if (session('success'))
            Swal.fire({
                title: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "Tamam"
            })
        @endif

        document.getElementById('city').addEventListener('change', function() {
            let cityId = this.value;

            fetch(`/get-city-info/${cityId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('state').value = data.state;
                    document.getElementById('district').value = data.district;
                    document.getElementById('zip_code').value = data.zip_code;
                })
                .catch(error => {
                    console.error('Şehir bilgisi alınamadı:', error);
                });
        });

        // Swal.fire({
        //     title: "Değişiklikleri Kaydetmek İstiyormusunuz?",
        //     showDenyButton: true,
        //     confirmButtonText: "Kaydet",
        //     denyButtonText: "Kaydetme",
        // }).then((result) => {
        //     if (result.isConfirmed)
        //         Swal.fire("{{ session('success') }}", "", "success");
        //     else if (result.isDenied)
        //         Swal.fire("Değişiklikler Kaydetilemedi", "", "info");
        // });
    </script>
@endsection
