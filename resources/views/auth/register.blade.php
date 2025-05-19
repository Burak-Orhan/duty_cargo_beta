@extends('defaultView')
@section('title', 'Kayıt Ol')
@section('content')

    <body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 min-h-screen">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-30 w-auto" src="{{ asset('assets/img/DutyCARGO.webp') }}" alt="Your Company">
                <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900">Kayıt Formu</h2>
            </div>

            <div class="text-center">
                @if (session()->has('success'))
                    <span class="text-green-700 dark:text-green-400">
                        {{ session()->get('success') }}
                    </span>
                @endif
                @if (session()->has('error'))
                    <span class="text-red-700 dark:text-red-400">
                        {{ session()->get('error') }}
                    </span>
                @endif
            </div>

            <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-lg">
                <form method="POST" action="{{ route('register.post') }}" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-900">Ad / Soyad</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                                @if ($errors->has('name'))
                                    {{ $errors->first('name') }}
                                @endif
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-900">E-Mail</label>
                            <div class="mt-2">
                                <input type="email" name="email" id="email"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                                @if ($errors->has('email'))
                                    {{ $errors->first('email') }}
                                @endif
                            </div>
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-900">Telefon Numarası</label>
                            <div class="mt-2">
                                <input type="text" name="phone" id="phone"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                                @if ($errors->has('phone'))
                                    {{ $errors->first('phone') }}
                                @endif
                            </div>
                        </div>

                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-900">Şehir / İl</label>
                            <div class="mt-2">
                                <input type="text" name="city" id="city"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                                @if ($errors->has('city'))
                                    {{ $errors->first('city') }}
                                @endif
                            </div>
                        </div>

                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-900">İlçe</label>
                            <div class="mt-2">
                                <input type="text" name="state" id="state"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                                @if ($errors->has('state'))
                                    {{ $errors->first('state') }}
                                @endif
                            </div>
                        </div>

                        <div>
                            <label for="district" class="block text-sm font-medium text-gray-900">Semt</label>
                            <div class="mt-2">
                                <input type="text" name="district" id="district"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                                @if ($errors->has('district'))
                                    {{ $errors->first('district') }}
                                @endif
                            </div>
                        </div>

                        <div>
                            <label for="zip_code" class="block text-sm font-medium text-gray-900">Zip Kodu</label>
                            <div class="mt-2">
                                <input type="text" name="zip_code" id="zip_code"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                                @if ($errors->has('zip_code'))
                                    {{ $errors->first('zip_code') }}
                                @endif
                            </div>
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-900">Adres</label>
                            <div class="mt-2">
                                <input type="text" name="address" id="address"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                                @if ($errors->has('address'))
                                    {{ $errors->first('address') }}
                                @endif
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-900">Şifre</label>
                            <div class="mt-2">
                                <input type="password" name="password" id="password"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                                @if ($errors->has('password'))
                                    {{ $errors->first('password') }}
                                @endif
                            </div>
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-900">Şifre
                                Tekrar</label>
                            <div class="mt-2">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                                @if ($errors->has('password_confirmation'))
                                    {{ $errors->first('password_confirmation') }}
                                @endif
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Kayıt
                                Ol</button>
                        </div>
                </form>
            </div>
        </div>
    </body>

@endsection



{{-- <body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 min-h-screen">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-30 w-auto" src="{{ asset('assets/img/DutyCARGO.webp') }}" alt="Your Company">
            <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900">Kayıt Formu</h2>
        </div>

        <div class="text-center">
            @if (session()->has('success'))
                <span class="text-green-700 dark:text-green-400">
                    {{ session()->get('success') }}
                </span>
            @endif
            @if (session()->has('error'))
                <span class="text-red-700 dark:text-red-400">
                    {{ session()->get('error') }}
                </span>
            @endif
        </div>

        <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-lg">
            <form method="POST" action="{{ route("auth.register.post") }}" class="space-y-6">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-900">Ad</label>
                        <div class="mt-2">
                            <input type="text" name="name" id="name" maxlength="25" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                            @if ($errors->has('name'))
                                {{ $errors->first('name') }}
                            @endif
                        </div>
                    </div>
                    <div>
                        <label for="surname" class="block text-sm font-medium text-gray-900">Soyad</label>
                        <div class="mt-2">
                            <input type="text" name="surname" id="surname" maxlength="25" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                            @if ($errors->has('surname'))
                                {{ $errors->first('surname') }}
                            @endif
                        </div>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-900">E-posta</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" maxlength="50" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                        @if ($errors->has('email'))
                            {{ $errors->first('email') }}
                        @endif
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-900">Şifre</label>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" maxlength="50" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                        @if ($errors->has('password'))
                            {{ $errors->first('password') }}
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-900">Şehir</label>
                        <div class="mt-2">
                            <input type="text" name="city" id="city" maxlength="50" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                            @if ($errors->has('city'))
                                {{ $errors->first('city') }}
                            @endif
                        </div>
                    </div>
                    <div>
                        <label for="state" class="block text-sm font-medium text-gray-900">İl</label>
                        <div class="mt-2">
                            <input type="text" name="state" id="state" maxlength="50" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                        </div>
                    </div>
                    <div>
                        <label for="zip_code" class="block text-sm font-medium text-gray-900">Posta Kodu</label>
                        <div class="mt-2">
                            <input type="text" name="zip_code" id="zip_code" maxlength="12" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:outline-indigo-600">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-gray-900">Sokak Adresi</label>
                    <div class="mt-2">
                        <textarea name="address" id="address" rows="3" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"></textarea>
                    </div>
                </div>

                
            </form>
        </div>
    </div>
</body> --}}
