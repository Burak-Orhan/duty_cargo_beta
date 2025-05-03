@extends('defaultDashboardView')
@section('title', 'Ayarlar')
@section('breadcrumb', 'Dashboard › Ayarlar')

@section('content')
<div class="w-full px-4 sm:px-8 lg:px-16 xl:px-24 py-8">
    <div class="mb-6">
        <h3 class="text-2xl font-semibold text-gray-900">Hesap Bilgileri</h3>
    </div>

    <form action="{{ route('settings.post') }}" method="POST">
        @csrf

        <div class="bg-white shadow-lg rounded-lg p-6 space-y-8">
            {{-- İsim ve E-Mail --}}
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

            {{-- Telefon ve Adres --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Telefon Numarası Giriniz</label>
                    <input type="phone" name="phone" value="{{ old('phone', Auth::user()->userInformation->phone) }}"
                        class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Adres</label>
                    <textarea name="address" rows="1"
                        class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500">{{ old('address', Auth::user()->userInformation->address) }}</textarea>
                </div>
            </div>

            {{-- Şehir - İl - Posta Kodu --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Şehir</label>
                    <input type="text" name="city" value="{{ old('city', Auth::user()->userInformation->city) }}"
                        class="mt-1 block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">İl</label>
                    <input type="text" name="state" value="{{ old('state', Auth::user()->userInformation->state) }}"
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

        {{-- Şifre değiştirmek istiyorum --}}
        <div class="text-center">
            <a href="{{ route('forgetPassword') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Şifre mi
                değiştirmek istiyorum</a>
        </div>

    </form>
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