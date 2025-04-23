@extends('defaultView')
@section('title', 'Giriş Yap')
@section('content')
    <body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 min-h-screen">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-30 w-auto" src="{{ asset('assets/img/DutyCARGO.webp') }}" alt="Your Company">
                <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900">Hesabınıza Giriş Yapınız</h2>
            </div>

            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-sm">

                <div class="text-center">
                    @if (session('error'))
                        <div class="p-3 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                <form class="space-y-6" action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">E-Posta Adresi</label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email" autocomplete="email"
                                value="{{ old('email') }}" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        {{ $errors->first('email') }}
                    @endif

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm/6 font-medium text-gray-900">Şifre</label>
                        </div>
                        <div class="mt-2">
                            <input type="password" name="password" id="password" autocomplete="current-password" required
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        {{ $errors->first('password') }}
                    @endif

                    <div class="text-sm">
                        <a href="{{ route('forgetPassword') }}"
                            class="font-semibold text-indigo-600 hover:text-indigo-500">Şifremi Unuttum?</a>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Giriş
                            Yap</button>
                    </div>

                    <p class="mt-10 text-center text-sm/6 text-gray-500">
                        Hesabınız yok mu?
                        <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Hesap
                            Oluşturun</a>
                    </p>
                </form>
            </div>
        </div>
    </body>
@endsection
