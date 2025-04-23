@extends('defaultDashboardView')

@section('title', 'Ayarlar')

@section('css')
@endsection

@section('breadcrumb', 'Dashboard › Ayarlar')

@section('content')

    <div class="px-4 sm:px-0">
        <h3 class="text-2xl font-semibold text-gray-900">Hesap Bilgileri</h3>
        {{-- <p class="mt-2 text-sm text-gray-500"></p> --}}
    </div>

    <form action="{{ route('settings.post') }}" method="POST">
        @csrf
        {{-- Kullanıcı Bilgileri --}}
        <div class="container mx-auto mt-6 bg-white shadow-lg rounded-lg p-6">
            <dl class="divide-y divide-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 px-6 py-6">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">İsim</label>
                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out"
                            placeholder="İsim giriniz">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">E-Mail Giriniz</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out"
                            placeholder="E-Mail giriniz">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 px-6 py-6">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Telefon Numarası Giriniz</label>
                        <input type="phone" name="phone"
                            value="{{ old('phone', Auth::user()->userInformation->phone) }}"
                            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out"
                            placeholder="Telefon Numarası Giriniz">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Adres</label>
                        <textarea name="address" cols="1" rows="1"
                            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out"
                            placeholder="Adresinizi giriniz">{{ old('address', Auth::user()->userInformation->address) }}</textarea>
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Şehir , İl, Zip --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <div class="mb-4 px-6">
                        <label class="block text-sm font-medium text-gray-700">Şehir</label>
                        <input type="text" name="city" value="{{ old('city', Auth::user()->userInformation->city) }}"
                            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out"
                            placeholder="Şehir giriniz">
                        @error('city')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 px-6">
                        <label class="block text-sm font-medium text-gray-700">İl</label>
                        <input type="text" name="state"
                            value="{{ old('state', Auth::user()->userInformation->state) }}"
                            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out"
                            placeholder="İl giriniz">
                        @error('state')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 px-6">
                        <label class="block text-sm font-medium text-gray-700">Posta Kodu</label>
                        <input type="text" name="zip_code"
                            value="{{ old('zip_code', Auth::user()->userInformation->zip_code) }}"
                            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out"
                            placeholder="Posta kodu giriniz">
                        @error('zip_code')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </dl>
        </div>

        {{-- Ödeme Bilgileri --}}
        {{-- <div class="container mx-auto mt-6 bg-white shadow-lg rounded-lg p-6">
            <div class="grid gap-4 px-6 py-6">
                <div class="mb-1"><label class="block text-sm font-medium text-gray-700">Kart Numarası</label> <input
                        type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                        class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out"
                        placeholder="XXXX XXXX XXXX XXXX"> @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-1"><label class="block text-sm font-medium text-gray-700">Kartın Üzerindeki İsim</label> <input
                        type="text" name="name" value="{{ old('name', Auth::user()->name ." ". Auth::user()->surname) }}"
                        class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out"
                        placeholder="İsim giriniz"> @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 px-6 py-1">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Son Kullanma Tarihi</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                        class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out"
                        placeholder="AA/YY">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">CCV</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                        class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out"
                        placeholder="000">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div> --}}

        <div class="px-6 py-3 sm:grid sm:grid-cols-1 sm:gap-4 sm:px-0">
            <dt></dt>
            <dd class="mt-1 sm:col-span-2 sm:mt-0">
                <button type="submit"
                    class="w-full inline-flex justify-center py-3 px-6 border border-transparent rounded-md shadow-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 ease-in-out">
                    Değişiklikleri Kaydet
                </button>
            </dd>
        </div>

        {{-- Şifre değiştirmek istiyorum --}}
        <div class="text-center">
            <a href="{{ route('forgetPassword') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Şifre mi
                değiştirmek istiyorum</a>
        </div>

    </form>
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

        // Swal.fire({
        //     title: "Değişiklikleri Kaydetmek İstiyormusunuz?",
        //     showDenyButton: true,
        //     showCancelButton: true,
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

{{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-6 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Kart Numarası</label>
        <input type="text" name="ccn" value="{{ old('city', Auth::user()->city) }}"
            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out"
            placeholder="XXXX XXXX XXXX XXXX">
        @error('city')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Son Kullanma Tarihi</label>
        <input type="text" name="state" value="{{ old('state', Auth::user()->state) }}"
            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out"
            placeholder="AA/YY">
        @error('state')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">CVC</label>
        <input type="text" name="zip_code" value="{{ old('zip_code', Auth::user()->zip_code) }}"
            class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out"
            placeholder="CVC">
        @error('zip_code')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
</div> --}}
