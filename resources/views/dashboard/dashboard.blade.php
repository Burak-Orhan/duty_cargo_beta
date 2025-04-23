@extends('defaultDashboardView')
@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard ›')

@section('content')
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
                                {{-- <img class="w-full max-w-xs"
                                    src="https://tailwindcss.com/plus-assets/img/component-images/bento-03-performance.png"
                                    alt=""> --}}

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
    import { toastFire } from '{{ asset('assets/js/toastFire.js') }}';

    window.mouseOver = function () {
        toastFire("info", "Son Kargo Tarihi: {{ $lastTracking }} ({{ $lastTrackingLong }})");
    }

    window.submitForm = function (trackingCode) {
        const form = document.getElementById(trackingCode);
        if (form) {
            form.submit();
        }
    }
</script>

@endsection
