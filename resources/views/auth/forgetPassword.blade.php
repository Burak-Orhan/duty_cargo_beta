@extends('defaultView')
@section('title', 'Şifremi Unuttum')
@section('content')

    <body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 min-h-screen">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-30 w-auto" src="{{ asset('assets/img/DutyCARGO.webp') }}" alt="Your Company">
                <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900">Şifremi Sıfırla</h2>
            </div>

            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-sm">

                <div class="text-center">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                <form class="space-y-6" action="{{ route('forgetPassword.post') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">E-Posta Adresi</label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email" autocomplete="email"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        {{ $errors->first('email') }}
                    @endif

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="new_password" class="block text-sm/6 font-medium text-gray-900">Yeni Şifre</label>
                        </div>
                        <div class="mt-2">
                            <input type="password" name="new_password" id="new_password"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    @if ($errors->has('new_password'))
                        {{ $errors->first('new_password') }}
                    @endif

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="new_password_verify" class="block text-sm/6 font-medium text-gray-900">Yeni
                                Şifre</label>
                        </div>
                        <div class="mt-2">
                            <input type="password" name="new_password_verify" id="new_password_verify"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                    @if ($errors->has('new_password_verify'))
                        {{ $errors->first('new_password_verify') }}
                    @endif

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Şifremi
                            Değiştir</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection
